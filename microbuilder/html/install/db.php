<?php
/** Provide common db functions for the installer.
 * @version      $Id: db.php,v 1.3 2004/03/19 14:43:45 mbertier Exp $ $Name:  $
 * @package      Installer
 * @licence      GPL
 * @author       Gregor J. Rothfuss
 */


/** Connect to Database
 * @return    object ADONewConnection    ADODB db handle
 */
function dbconnect($dbhost, $dbuname, $dbpass, $dbname, $dbtype = 'mysql')
{
    $connectString = "$dbtype://$dbuname:$dbpass@$dbhost/$dbname";

    GLOBAL $ADODB_FETCH_MODE;
    $dbconn = &ADONewConnection($dbtype);
    $dbh = $dbconn->Connect($dbhost, $dbuname, $dbpass, $dbname);
    $ADODB_FETCH_MODE = ADODB_FETCH_NUM; 

    // if we get an error, log it and die
    if ($dbh === false) {

        error_log ("connect string: $connectString");
        error_log ("error: " . $dbconn->ErrorMsg()); 

        // show error and die
        PN_DBMsgError($dbconn, __FILE__ , __LINE__, "Error connecting to db");

    } else {

        return $dbconn;

    } 
} 


/** Error message due a ADODB SQL error and die (copied from mainfile.php because it is not included
 */
function PN_DBMsgError($db = '', $prg = '', $line = 0, $message = 'Error accessing the database')
{
    $lcmessage = $message . "<br>" . "Program: " . $prg . " - " . "Line N.: " . $line . "<br>" . "Database: " . $db->database . "<br> ";

    if ($db->ErrorNo() <> 0) {
        $lcmessage .= "Error (" . $db->ErrorNo() . ") : " . $db->ErrorMsg() . "<br>";
    } 
    die($lcmessage);
} 

?>