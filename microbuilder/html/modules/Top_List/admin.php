<?PHP
// File: $Id: admin.php,v 1.1 2004/03/01 10:09:02 mbertier Exp $ $Name:  $
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
// Copyright (C) 2001 by the Post-Nuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// Based on:
// PHP-NUKE Web Portal System - http://phpnuke.org/
// Thatware - http://thatware.org/
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Original Author of file:
// Purpose of file:
// ----------------------------------------------------------------------

if (!eregi("admin.php", $PHP_SELF)) {
    die ("Access Denied");
}

if (pnSecAuthAction(0, 'Top List::', '::', ACCESS_ADMIN)) {

modules_get_language();
modules_get_manual();

function top_list_admin_getConfig()
{
    include ("header.php");

    GraphicAdmin();

    OpenTable();
    echo "<center><font class=\"pn-title\"><b>"._TOPLISTCONFIG."</b></font></center>";
    CloseTable();

    OpenTable();
    print "<form action=\"admin.php\" method=\"post\">" 
	    .'<table border="0"><tr><td class="pn-normal">'
	    ._ITEMSTOP.":</td><td><input type=\"text\" name=\"xtop\" value=\"" . pnConfigGetVar('top') . "\" size=\"11\" maxlength=\"10\" class=\"pn-normal\">"
        .'</td></tr></table>'
        ."<input type=\"hidden\" name=\"module\" value=\"" . $GLOBALS['module'] . "\">"
        ."<input type=\"hidden\" name=\"op\" value=\"setConfig\">"
	    ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
        ."<input type=\"submit\" value=\""._SUBMIT."\">"
        ."</form>";
    ;
    CloseTable();

    include ("footer.php");
}

function top_list_admin_setConfig($var)
{
    if (!pnSecConfirmAuthKey()) {
        include 'header.php';
        echo _BADAUTHKEY;
        include 'footer.php';
        exit;
    }
    // Escape some characters in these variables.
    // hehe, I like doing this, much cleaner :-)
    $fixvars = array();

    // todo: make FixConfigQuotes global / replace with other function
    foreach ($fixvars as $v) {
	//$var[$v] = FixConfigQuotes($var[$v]);
    }
    // Set any numerical variables that havn't been set, to 0. i.e. paranoia check :-)
    $fixvars = array ('xtop',);

    foreach ($fixvars as $v) {
        if (empty($var[$v])) {
            $var[$v] = 0;
        }
    }
    // all variables starting with x are the config vars.
    while(list($key, $val) = each($var)) {
        if(substr($key, 0, 1) == 'x') {
	    pnConfigSetVar(substr($key, 1), $val);
        }
    }
    pnRedirect('admin.php');
}

function top_list_admin_main($var)
{
   $op = pnVarCleanFromInput('op');
   extract($var);

   switch ($op) {

    case "getConfig":
        top_list_admin_getConfig();
        break;

    case "setConfig":
        top_list_admin_setConfig($var);
        break;

    default:
        top_list_admin_getConfig();
        break;
   }
}

} else {
    echo "Access Denied";
}
?>