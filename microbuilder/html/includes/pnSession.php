<?php
/** Functions dedicated to session handling.
 *
 * Session variables here are a bit 'different'.  Because they sit in the
 * global namespace we use a couple of helper functions to give them their
 * own prefix, and also to force users to set new values for them if they
 * require.  This avoids blatant or accidental over-writing of session
 * variables.
 *
 * @version      $Id: pnSession.php,v 1.2 2004/03/26 00:05:38 mbertier Exp $
 * @package      
 * @license      GPL
 * @author       Jim McDonald
 */


/** Set up session handling.
 * Set all PHP options for PostNuke session handling
 */
function pnSessionSetup() {
    global $HTTP_SERVER_VARS;

    // -- Defaults

    // Base URI
    $path = pnGetBaseURI();
    if (empty($path)) $path = '/';

    // Host
    $host = $HTTP_SERVER_VARS['HTTP_HOST'];
    if (empty($host)) $host = getenv('HTTP_HOST');
    $host = preg_replace('/:.*/', '', $host);

    // -- PHP configuration variables

    // Stop adding SID to URLs
    ini_set('session.use_trans_sid', 0);

    // User-defined save handler
    ini_set('session.save_handler', 'user');

    // How to store data
    ini_set('session.serialize_handler', 'php');

    // Use cookie to store the session ID
    ini_set('session.use_cookies', 1);

    // Name of our cookie
    ini_set('session.name', 'POSTNUKESID');

    // Lifetime of our cookie
    $seclevel = pnConfigGetVar('seclevel');
    switch ($seclevel) {
        case 'High':
            // Session lasts duration of browser
            $lifetime = 0;
            // Referer check
            //ini_set('session.referer_check', "$host$path");
            ini_set('session.referer_check', "$host");
            break;
        case 'Medium':
            // Session lasts set number of days
            $lifetime = pnConfigGetVar('secmeddays') * 86400;
            break;
        case 'Low':
            // Session lasts unlimited number of days (well, lots, anyway)
            // (Currently set to 25 years)
            $lifetime = 788940000;
            break;
    }

    //
    ini_set('session.cookie_lifetime', $lifetime);
    
    //
    ini_set('session.cookie_path', $path);

    // Garbage collection
    ini_set('session.gc_probability', 1);

    // Inactivity timeout for user sessions
    ini_set('session.gc_maxlifetime', pnConfigGetVar('secinactivemins') * 60);

    // Auto-start session
    ini_set('session.auto_start', 1);

    // Session handlers
    session_set_save_handler("pnSessionOpen",
                             "pnSessionClose",
                             "pnSessionRead",
                             "pnSessionWrite",
                             "pnSessionDestroy",
                             "pnSessionGC");
    return true;
}


/** Get a session variable
 * @param       string      $name       Name of the session variable to get
 */
function pnSessionGetVar( $name ) {
    global $HTTP_SESSION_VARS;

    $var = "PNSV$name";

    global $$var;
    if (!empty($HTTP_SESSION_VARS[$var])) {
        return $HTTP_SESSION_VARS[$var];
    }

    return;
}


/** Set a session variable.
 * @param       string      $name       Name of the session variable to set
 * @param       mixed       $value      Valuee to set the named session variable
 */
function pnSessionSetVar( $name, $value ) {
	global $HTTP_SESSION_VARS;
    $var = "PNSV$name";
    
    global $$var;
	$$var = $value;
	$HTTP_SESSION_VARS[$var] = $value;
	session_register($var);

    return true;
}


/** Delete a session variable.
 * @param       string      $name       Name of the session variable to delete
 */
function pnSessionDelVar( $name ) {
    $var = "PNSV$name";

    global $$var;
	unset($GLOBALS[$var]); 

    session_unregister($var);

    return true;
}


/** Initialise session. 
 * @return      bool 
 */
function pnSessionInit() {
    global $HTTP_SERVER_VARS;

    // Fetch database aliases
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    // First thing we do is ensure that there is no attempted pollution
    // of the session namespace
    foreach($GLOBALS as $k => $v) {
        if (preg_match('/^PNSV/', $k)) {
            return false;
        }
    }

    // Kick it
    session_start();

    // Have to re-write the cache control header to remove no-save, this
    // allows downloading of files to disk for application handlers
    // adam_baum - no-cache was stopping modules (andromeda) from caching the playlists, et al.
    // any strange behaviour encountered, revert to commented out code.
    //Header('Cache-Control: no-cache, must-revalidate, post-check=0, pre-check=0');
    Header('Cache-Control: cache');

    // Get session id
    $sessid = session_id();

    // Get (actual) client IP addr
    $ipaddr = $HTTP_SERVER_VARS['REMOTE_ADDR'];
    if (empty($ipaddr)) $ipaddr = getenv('REMOTE_ADDR');
   
    if (!empty($HTTP_SERVER_VARS['HTTP_CLIENT_IP']))  $ipaddr = $HTTP_SERVER_VARS['HTTP_CLIENT_IP'];

    $tmpipaddr = getenv('HTTP_CLIENT_IP');

    if (!empty($tmpipaddr))   $ipaddr = $tmpipaddr;

    if  (!empty($HTTP_SERVER_VARS['HTTP_X_FORWARDED_FOR'])) {
        $ipaddr = preg_replace('/,.*/', '', $HTTP_SERVER_VARS['HTTP_X_FORWARDED_FOR']);
    }
    $tmpipaddr = getenv('HTTP_X_FORWARDED_FOR');
    if  (!empty($tmpipaddr)) {
        $ipaddr = preg_replace('/,.*/', '', $tmpipaddr);
    }
    // END IP addr retrieval

    // Table columns used to store session data in database
    $sessioninfocolumn = &$pntable['session_info_column'];
    $sessioninfotable = $pntable['session_info'];

    // Find out if session already exists
    $query = "SELECT $sessioninfocolumn[ipaddr]
              FROM $sessioninfotable
              WHERE $sessioninfocolumn[sessid] = '" . pnVarPrepForStore($sessid) . "'";

    $result = $dbconn->Execute($query);

    if($dbconn->ErrorNo() != 0) return false; // Die on any error except "no results" 

    // Session already exists, we define it as current
    if (!$result->EOF) {
        $result->Close();
        pnSessionCurrent($sessid);

    } 

    // Session doesn't exist, let's create it
    else {
        pnSessionNew($sessid, $ipaddr);
        
        // Generate a random number, used for
        // some authentication
        srand((double)microtime()*1000000);
        pnSessionSetVar('rand', rand());
    }

    return true;
}


/** Continue a current session
 * @param      string      $sessid      The session ID
 * @return     bool
 */
function pnSessionCurrent( $sessid ) {
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $sessioninfocolumn = &$pntable['session_info_column'];
    $sessioninfotable = $pntable['session_info'];

    // Touch the last used time
    $query = "UPDATE $sessioninfotable
              SET $sessioninfocolumn[lastused] = " . time() . "
              WHERE $sessioninfocolumn[sessid] = '" . pnVarPrepForStore($sessid) . "'";

    $result = $dbconn->Execute($query);

    if ($dbconn->ErrorNo() != 0) {
        return false;
    }

    return true;
}


/** Create a new session.
 * @param       string      $sessid      The session ID
 * @param       string      $ipaddr      The IP address of the host with this session
 * @return      bool
 */
function pnSessionNew( $sessid, $ipaddr ) {

    // Fetch DB info
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $sessioninfocolumn = &$pntable['session_info_column'];
    $sessioninfotable = $pntable['session_info'];

    // Insert session data into DB
    $query = "INSERT INTO $sessioninfotable
                 ($sessioninfocolumn[sessid],
                  $sessioninfocolumn[ipaddr],
                  $sessioninfocolumn[uid],
                  $sessioninfocolumn[firstused],
                  $sessioninfocolumn[lastused])
              VALUES
                 ('" . pnVarPrepForStore($sessid) . "',
                  '" . pnVarPrepForStore($ipaddr) . "',
                  0,
                  " . time() . ",
                  " . time() . ")";
                  
    $dbconn->Execute($query);

    if ( $dbconn->ErrorNo() != 0 ) return false;

    return true;
}


/** PHP function to open the session.
 * Nothing to do - database opened elsewhere.
 *
 * @param      string      $path      
 * @param      string      $name      
 */
function pnSessionOpen( $path, $name ) { return true; }


/** PHP function to close the session.
 * Nothing to do - database closed elsewhere.
 * @return      bool
 */
function pnSessionClose() { return true; }


/** PHP function to read a set of session variables
 * @param      string      $sessid      Session ID
 * @return     bool
 */
function pnSessionRead( $sessid ) {

    // Fetch DB info
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $sessioninfocolumn = &$pntable['session_info_column'];
    $sessioninfotable = $pntable['session_info'];

    // Fetch data corresponding to $sessid
    $query = "SELECT $sessioninfocolumn[vars]
              FROM $sessioninfotable
              WHERE $sessioninfocolumn[sessid] = '" . pnVarPrepForStore($sessid) . "'";
    $result = $dbconn->Execute($query);

    if ($dbconn->ErrorNo() != 0) return false;

    // Populate results (if any) into $value
    if (!$result->EOF) {
        list($value) = $result->fields;
    } else {
        $value = '';
    }
    $result->Close();

    return $value;
}


/** PHP function to write a set of session variables
 * @param      string      $sessid      Session ID
 * @param      array       $vars        Hash of session data to write ( array( 'varname' => 'varvalue' ) )
 */
function pnSessionWrite( $sessid, $vars ) {

    // Fetch DB info
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $sessioninfocolumn = &$pntable['session_info_column'];
    $sessioninfotable = $pntable['session_info'];

    // Modify data corresponding to $sessid
    $query = "UPDATE $sessioninfotable
              SET $sessioninfocolumn[vars] = '" . pnVarPrepForStore($vars) . "'
              WHERE $sessioninfocolumn[sessid] = '" . pnVarPrepForStore($sessid) . "'";
    $dbconn->Execute($query);

    if ($dbconn->ErrorNo() != 0) return false;

    return true;
}


/** PHP function to destroy a session
 * @param      string      $sessid      Session ID
 * @return     bool
 */
function pnSessionDestroy( $sessid ) {

    // Fetch DB info
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $sessioninfocolumn = &$pntable['session_info_column'];
    $sessioninfotable = $pntable['session_info'];

    // Erase DB entry correponding to $sessid
    $query = "DELETE FROM $sessioninfotable
              WHERE $sessioninfocolumn[sessid] = '" . pnVarPrepForStore($sessid) . "'";
    $dbconn->Execute($query);

    if ($dbconn->ErrorNo() != 0) return false;

    return true;
}


/** PHP function to garbage collect session information
 * @param       int      $maxlifetime     Session lifetime in microseconds
 */
function pnSessionGC( $maxlifetime ) {
    
    // Fetch DB info
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $sessioninfocolumn = &$pntable['session_info_column'];
    $sessioninfotable = $pntable['session_info'];

    // Delete session after a certain time
    // Session lifetime in defined by security level
    switch (pnConfigGetVar('seclevel')) {
        case 'Low':
            // Low security - delete session info if user decided not to
            //                remember themself
            $where = "WHERE $sessioninfocolumn[vars] NOT LIKE '%PNSVrememberme|%'
                      AND $sessioninfocolumn[lastused] < " . (time() - (pnConfigGetVar('secinactivemins') * 60));
            break;
        case 'Medium':
            // Medium security - delete session info if session cookie has
            //                   expired or user decided not to remember
            //                   themself
            $where = "WHERE ($sessioninfocolumn[vars] NOT LIKE '%PNSVrememberme|%'
                        AND $sessioninfocolumn[lastused] < " . (time() - (pnConfigGetVar('secinactivemins') * 60)) . ")
                      OR $sessioninfocolumn[firstused] < " . (time() - (pnConfigGetVar('secmeddays') * 86400));
            break;
        case 'High':
        default:
            // High security - delete session info if user is inactive
            $where = "WHERE $sessioninfocolumn[lastused] < " . (time() - (pnConfigGetVar('secinactivemins') * 60));
            break;
    }
    $query = "DELETE FROM $sessioninfotable $where";
    $dbconn->Execute($query);

    if ($dbconn->ErrorNo() != 0) return false;

    return true;
}
?>