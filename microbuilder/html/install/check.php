<?php 
// File: $Id: check.php,v 1.1 2004/03/01 10:09:14 mbertier Exp $ $Name:  $
// ----------------------------------------------------------------------
// PostNuke Content Management System
// Copyright (C) 2002 by the PostNuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// LICENSE
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Original Author of file: Gregor J. Rothfuss
// Purpose of file: Provide checks for the installer.
// ----------------------------------------------------------------------
/**
 * Checks various php settings
 * by Bob Herald
 */
function do_check_php()
{
    if (phpversion() < "4.0.1") {
        $phpver = phpversion();
        echo "<br><font class=\"pn-title\">" . _PHP_CHECK_1 . $phpver . "<br>
             " . _PHP_CHECK_2 . "</font><br>";
    } 

    if (get_magic_quotes_gpc() == 0) {
        echo "<br><font class=\"pn-title\">" . _PHP_CHECK_3 . "</font><br>";
    } 

    if (get_magic_quotes_runtime() == 1) {
        echo "<br><font class=\"pn-title\">" . _PHP_CHECK_4 . "</font><br>";
    } 
} 

/**
 * Checks if config.php has the correct permissions set
 */
function do_check_chmod()
{
    global $currentlang;

    echo "<font class=\"pn-title\">" . _CHMOD_CHECK_1 . "</font><br><br>
         <font class=\"pn-normal\">" . _CHMOD_CHECK_2 . "</font>";
    $file = 'config.php';
    $sideblock = "chmod"; 
    // $mode = fileperms($file);
    // $mode &= 0x1ff; # Remove the bits we don't need
    // $chmod = sprintf("%o", $mode);
    // if ($chmod == '666'){
    if (is_writable($file)) {
        echo "<br><br><img src='install/style/green_check.gif'  alt='' border='0' align='absmiddle'><font class=\"pn-title\">" . _CHMOD_CHECK_3 . "</font><br>";
        $chmod = 0;
    } else {
        echo "<br><br><img src='install/style/red_check.gif'  alt='' border='0' align='absmiddle'><font class=\"pn-title\">" . _CHMOD_CHECK_4 . "</font><br>";
        $chmod = 1;
    } 

    $file = 'config-old.php'; 
    // $mode = fileperms($file);
    // $mode &= 0x1ff; # Remove the bits we don't need
    // $chmod = sprintf("%o", $mode);
    // if ($chmod == '666'){
    if (is_writable($file)) {
        echo "<p><img src='install/style/green_check.gif'  alt='' border='0' align='absmiddle'><font class=\"pn-title\">" . _CHMOD_CHECK_5 . "</font></p>
             <p><form action=\"install.php\" method=\"post\">
             <input type=\"hidden\" name=\"currentlang\" value=\"$currentlang\">
             ";
        $chmod = 0;
    } else {
        echo "<img src='install/style/red_check.gif'  alt='' border='0' align='middle'><font class=\"pn-title\">" . _CHMOD_CHECK_6 . "</font>
             <p><form action=\"install.php\" method=\"post\">
             <input type=\"hidden\" name=\"currentlang\" value=\"$currentlang\">
             ";
        $chmod = 1;
    } 

    $dirname = "modules/NS-Quotes";

    if (is_dir($dirname)) {
        echo "<font class=\"pn-title\" color=red><br><b>" . _QUOTESCHECK_1 . "</b><br><br>";
        echo "<img src='install/style/red_check.gif'  alt='' border='0' align='absmiddle'><font color=red><b>" . _QUOTESCHECK_2 . "</b></font></font><br><br>";
        $dircheck = 1;
    } else {
        $dircheck = 0;
    } 
    if ($chmod == 1 or $dircheck == 1) {
        echo "<center><input type=\"hidden\" name=\"op\" value=\"Check\"><input type=\"submit\" value=\"" . _BTN_RECHECK . "\"></center></form></p>";
    } elseif ($chmod == 0 or $dircheck == 0) {
        echo "<center><input type=\"hidden\" name=\"op\" value=\"CHM_check\"><input type=\"submit\" value=\"" . _BTN_CONTINUE . "\"></center></form></p>";
    } 
} 
function progress($percent)
{
    echo "<table align=\"center\" width=\"400\" bgcolor=\"#000000\" cellspacing=\"1\" cellpadding=\"0\"><tr bgcolor=\"#cccccc\"><td><table cellspacing=\"0\" cellpadding=\"0\" width=\"$percent%\"><tr><td align=\"center\" bgcolor=\"#264CB7\"><font size=\"1\" color=\"white\">$percent%</font></td></tr></table></td></tr></table>";
} 

?>