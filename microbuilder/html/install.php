<?php
/**
 * PostNuke Install Script.
 *
 * This script will set the database up, and do the basic configurations of the script.  
 * Once this script has run, please delete this file from your root directory.  
 * There is a security risk if you keep this file around.
 *
 * This module of the PostNuke project was inspired by the myPHPNuke project.
 *
 * The PostNuke project is free software released under the GNU License.  
 * Please read the credits file for more information on who has made this project possible.
 *
 * @version    $Id: install.php,v 1.2 2004/03/13 04:49:53 mbertier Exp $
 * @license    GPL
 *
 * @todo       Native "register_globals=off' compliancy
 */

/** initialize vars, and include all necessary files **/


/*	Allows Postnuke to work with register_globals set to off 
 *	Patch for php 4.2.x or greater
 */

if (phpversion() >= "4.2.0") {
    if ( ini_get('register_globals') != 1 ) {
        $supers = array('_REQUEST',
                        '_ENV', 
                        '_SERVER', 
                        '_POST', 
                        '_GET', 
                        '_COOKIE', 
                        '_SESSION', 
                        '_FILES', 
                        '_GLOBALS' );
        				
        foreach( $supers as $__s) {
            if ( ( isset( $$__s ) ) && ( is_array( $$__s ) == true )) {
                extract( $$__s, EXTR_OVERWRITE );
            }
        }
        unset($supers);
    }
} else {
    if ( ini_get('register_globals') != 1 ) {
        $supers = array('HTTP_POST_VARS', 
                        'HTTP_GET_VARS', 
                        'HTTP_COOKIE_VARS', 
                        'GLOBALS', 
                        'HTTP_SESSION_VARS', 
                        'HTTP_REQUEST_VARS', 
                        'HTTP_SERVER_VARS', 
                        'HTTP_ENV_VARS' );
        
        foreach( $supers as $__s) {
            if ( is_array( $$__s ) == true ) {
                extract( $$__s, EXTR_OVERWRITE );
            }
        }
        unset($supers);
    }
}

# -- Do not restrict script execution time
@set_time_limit(0);

define('ADODB_DIR', 'pnadodb');
require_once ("pnadodb/adodb.inc.php");

ini_set('register_globals', 'On');

# -- First time page is loaded, default language is set
if (isset($alanguage)) {
    $currentlang = $alanguage;
}

# -- First time page is loaded, default vals vor variables are set.
if(!isset($prefix)) {

    /** Default values */
    include_once 'config.php';

    $prefix = $pnconfig['prefix'];
    $dbtype = $pnconfig['dbtype'];
    $dbtabletype = $pnconfig['dbtabletype'];
    $dbhost = $pnconfig['dbhost'];
    $dbuname = $pnconfig['dbuname'];
    $dbpass = $pnconfig['dbpass'];
    $dbname = $pnconfig['dbname'];
    $system = $pnconfig['system'];
    $encoded = $pnconfig['encoded'];   
}

# -- Decode username and password
if (!empty($encoded)) {
    $dbuname = base64_decode($dbuname);
    $dbpass = base64_decode($dbpass);
}

# -- ??
$pnconfig['prefix'] = $prefix;

/** Table aliases */
include_once 'pntables.php';

/** Functions for multilanguage support. */
include_once 'install/language.php';


# -- Include selected language constants
installer_get_language();


/** functions to modify config.php */
include_once 'install/modify_config.php';

/** functions for new installs */
include_once 'install/newinstall.php';

/** functions for rendering the GUI (print_*) */
include_once 'install/gui.php';

/** functions for accessing the DB */
include_once 'install/db.php'

/** functions for various checks */
include_once 'install/check.php';


# -- print the page header, include style sheets
print_header();


# --  This starts the switch statement that filters through the form options.
# --  the @ is in front of $op to suppress error messages if $op is unset and E_ALL
# --  is on.
switch(@$op) {

    case "CHM_check":
         print_CHM_check();
         break;

    case "Submit":
         print_submit();
         break;

    case _BTN_CHANGEINFO:
         print_change_info();
         break;

    case _BTN_NEWINSTALL:
         print_new_install();
         break;
    
    case "Start":
         if(!isset($dbmake)) {
            $dbmake = false;
         }
         make_db($dbhost, $dbuname, $dbpass, $dbname, $prefix, $dbtype, $dbmake, $dbtabletype);
         print_start();
         break;

    case "Continue":
         print_continue();
         break;

    case "Set Login":
         $dbconn = dbconnect($dbhost, $dbuname, $dbpass, $dbname, $dbtype);
         input_data($dbhost, $dbuname, $dbpass, $dbname, $prefix, $dbtype, $aid, $name, $pwd, $repeatpwd, $email, $url);
         update_config_php(true); // Scott - added
         print_set_login();
         break;

    case "Select Language":
         print_select_language();
         break;

    case "Set Language":
         $currentlang = $alanguage;
         print_default();
         break;

    case "Finish":
         print_finish();
         break;

    case "Check":
        do_check_php();
        do_check_chmod();
        break;

    default:
         print_select_language();
         break;
}

/** print the footer, and closing tags **/
print_footer();

?>