<?php 
/** Provides functions for a new install.
 * @version      $Id: newinstall.php,v 1.3 2004/03/13 04:31:08 mbertier Exp $
 * @package      Installer
 * @license      GPL
 * @author       Gregor J. Rothfuss
 */


/** This function creates the DB on new installs.
 * @param      string      $dbhost
 * @param      string      $dbuname
 * @param      string      $dbpass
 * @param      string      $prefix        Prefix for db tables
 * @param      string      $dbtype        Used by dbconnect() in install/newtables.php
 * @param      bool        $dbmake        Should DB be created ?
 * @param                  $dbtabletype   MyISAM ...
 *
 */
function make_db($dbhost, $dbuname, $dbpass, $dbname, $prefix, $dbtype, $dbmake, $dbtabletype) {
    global $dbconn;
    echo "<center><br><br>";

    // Create DB if asked to
    if ($dbmake) {
        mysql_pconnect($dbhost, $dbuname, $dbpass);
        $result = mysql_query("CREATE DATABASE $dbname") or die (_MAKE_DB_1);
        $message = "<br><br><font class=\"pn-failed\">$dbname " . _MAKE_DB_2 . "</font>";
        echo $message;
    } else {
        echo "<font class=\"pn-failed\">" . _MAKE_DB_3 . "</font>";
    } 

    // Creation of all tables
    include("install/newtables.php");
} 

/** This function inserts the default data in DB on new installs.
 * @param     string      $aid
 * @param     string      $name        User login
 * @param     string      $pwd         Form validation
 * @param     string      $repeatpwd   Form validation
 * @param     string      $email
 * @param     string      $url
 *
 * @return    void
 */
function input_data($dbhost, $dbuname, $dbpass, $dbname, $prefix, $dbtype, $aid, $name, $pwd, $repeatpwd, $email, $url) {
    if ($pwd != $repeatpwd) {
        echo _PWBADMATCH;
        exit;
    } else {
        echo "<font class=\"pn-title\">" . _INPUT_DATA_1 . "</font>";

        echo "<center>";

        global $dbconn;
        mysql_connect($dbhost, $dbuname, $dbpass);
        mysql_select_db("$dbname") or die ("<br><font class=\"pn-sub\">" . _NOTSELECT . "</font>"); 

        // Put basic information in first
        include("install/newdata.php"); 

        // new installs will use md5 hashing - compatible on windows and *nix variants.
        $pwd = md5($pwd);

        $result = 
            $dbconn->Execute("INSERT INTO " . $prefix . "_users VALUES ( NULL, '$name', '$aid', '$email', '', '$url', 'blank.gif', " . time() . ", '', '', '', '', '', '', '', '', '', '', '$pwd', 10, '', 0, 0, 0, '', 0, '', '', 4096, 0, '12.0')")
            or die ("<b>" . _NOTUPDATED . $prefix . "_users</b>");

        echo "<br><font class=\"pn-sub\">" . $prefix . "_users" . _UPDATED . "</font>"; 

        // We know that the above user is UID 2 and that the admin group is GID 2 from the install/newdata
        $result = $dbconn->Execute("INSERT INTO " . $prefix . "_group_membership VALUES (2, 2)") or die ("<b>" . _NOTUPDATED . $prefix . "_group_membership</b>");
        echo "<br><font class=\"pn-sub\">" . $prefix . "_group_membership" . _UPDATED . "</font>";
    } 
} 

?>