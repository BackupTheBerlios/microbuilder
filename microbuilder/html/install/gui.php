<?php
// File: $Id: gui.php,v 1.1 2004/03/01 10:09:14 mbertier Exp $ $Name:  $
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
// Original Author of file:  Gregor J. Rothfuss
// Purpose of file: Provide gui rendering functions for the installer.
// ----------------------------------------------------------------------
function print_header()
{
    $bn_num = mt_rand (1, 5);
    echo "
<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">
<html><head><title>" . _INSTALLATION . "</title>
<META HTTP-EQUIV=\"Content-Type\" CONTENT=\"text/html; charset=" . _CHARSET . "\">
<META NAME=\"AUTHOR\" CONTENT=\"PostNuke Crew\">
<META NAME=\"GENERATOR\" CONTENT=\"PostNuke -- http://www.postnuke.com\">
<link rel=\"StyleSheet\" href=\"install/style/styleNN.css\" type=\"text/css\">
<style type=\"text/css\">@import url(\"install/style/style.css\");</style>
</head><body leftmargin=\"0\" rightmargin=\"0\" topmargin=\"0\" bottommargin=\"0\"><table width=\"100%\" height=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr><td valign=\"top\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#264CB7\" background=\"install/style/bg.gif\"><tr><td align=\"left\"><img src='install/style/top1.jpg'  alt='' border='0' align='middle'></td><td align=\"right\"><a href=\"http://www.postnuke.com\" target=\"_blank\" title=\"Visit the postnuke community !\"><img src='install/style/top2.jpg'  alt='' border='0' align='middle'></a></td></tr><tr bgcolor=\"#000000\" height=\"3\"><td colspan=\"2\"></td></tr></table><br>
<table bgcolor=\"#000000\" cellspacing=\"0\" align=center><tr bgcolor=\"#ffffff\"><td><img src='install/banners/banner.$bn_num.gif' width='468' height='60' alt='' border='0' align='middle'></td></tr></table><br>
<table width=\"80%\" align=\"center\"><tr><td>";
}

/**
 * This function prints the "This is your setting" area
 */
function print_form_text($border = 0)
{
    global $dbhost, $dbuname, $dbpass, $dbname, $prefix, $dbtype, $intranet, $dbtabletype;

    echo "<br>
<table border=$border>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBHOST . "</font></td>
<td><font class=\"pn-normal\">$dbhost</font></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBUNAME . "</font></td>
<td><font class=\"pn-normal\">$dbuname</font></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBPASS . "</font></td>
<td><font class=\"pn-normal\">&middot;&middot;&middot;&middot;&middot;</font></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBNAME . "</font></td>
<td><font class=\"pn-normal\">$dbname</font></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBPREFIX . "</font></td>
<td><font class=\"pn-normal\">$prefix</font></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBTYPE . "</font></td>
<td><font class=\"pn-normal\">$dbtype</font></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBTABLETYPE . "</font></td>
<td><font class=\"pn-normal\">$dbtabletype</font></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _ISINTRANET . "</font></td>
<td><font class=\"pn-normal\">";
    if (!empty($intranet)) {
        echo _YES;
    } else {
        $intranet = 0;
        echo _NO;
    } 
    echo "</font></td></tr>
</table>";
} 

function print_form_editabletext($border = 0)
{
    global $dbhost, $dbuname, $dbpass, $dbname, $intranet, $prefix;

    echo "<br>
<table border=$border>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBHOST . "</font></td>
<td><input type=\"text\" NAME=\"dbhost\" SIZE=30 maxlength=80 value=\"$dbhost\"></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBUNAME . "</font></td>
<td><input type=\"text\" NAME=\"dbuname\" SIZE=30 maxlength=80 value=\"$dbuname\"></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBPASS . "</font></td>
<td><input type=\"password\" NAME=\"dbpass\" SIZE=30 maxlength=80 value=\"$dbpass\"></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBNAME . "</font></td>
<td><input type=\"text\" NAME=\"dbname\" SIZE=30 maxlength=80 value=\"$dbname\"></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBPREFIX . "</font></td>
<td><input type=\"text\" NAME=\"prefix\" SIZE=30 maxlength=80 value=\"$prefix\"></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBTYPE . "</font></td>
<td><select name=\"dbtype\"><option value=\"mysql\" selected>&nbsp;MySQL&nbsp;</option>
</select></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBTABLETYPE . "</font></td>
<td><select name=\"dbtabletype\"><option value=\"myisam\" selected>&nbsp;MyISAM&nbsp;</option>
<option value=\"innodb\">&nbsp;INNODB&nbsp;</option>
</select></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _ISINTRANET . "</font></td>
<td><input type=\"checkbox\" NAME=\"intranet\" VALUE=\"1\"></td></tr>
<tr><td colspan=\"2\" align=\"left\"><font class=\"pn-normal\">" . _INTRANETINFO . "</font></td></tr>
</table>";
} 

/**
 * This function prints the <input type=hidden> area
 */
function print_form_hidden()
{
    global $currentlang;
    global $dbhost, $dbuname, $dbpass, $dbname, $prefix, $dbtype, $intranet, $dbtabletype;

    if (empty($intranet)) {
        $intranet = 0;
    } 

    echo "
<input type=\"hidden\" NAME=\"currentlang\" value=\"$currentlang\">
<input type=\"hidden\" NAME=\"dbhost\" value=\"$dbhost\">
<input type=\"hidden\" NAME=\"dbuname\" value=\"$dbuname\">
<input type=\"hidden\" NAME=\"dbpass\" value=\"$dbpass\">
<input type=\"hidden\" NAME=\"dbname\" value=\"$dbname\">
<input type=\"hidden\" NAME=\"prefix\" value=\"$prefix\">
<input type=\"hidden\" NAME=\"dbtype\" value=\"$dbtype\">
<input type=\"hidden\" NAME=\"dbtabletype\" value=\"$dbtabletype\">
<input type=\"hidden\" NAME=\"intranet\" value=\"$intranet\">";
} 

function print_CHM_check()
{
    global $currentlang;
    progress(40);
    echo "<br>
<font class=\"pn-title\">" . _DBINFO . "</font><font class=\"pn-normal\"> " . _CHM_CHECK_1 . "<br><br>
<form action=\"install.php\" method=\"post\"><center>";

    print_form_editabletext(0);

    echo "<input type=\"hidden\" NAME=\"currentlang\" value=\"$currentlang\">
<input type=\"hidden\" name=\"op\" value=\"Submit\">
<input type=\"submit\" value=\"" . _BTN_SUBMIT . "\"></table></center></form></font>";
} 

function print_submit()
{
    progress(50);
    echo "<br><center>
<font class=\"pn-title\">" . _DBINFO . "</font><br><font class=\"pn-normal\"> " . _SUBMIT_1 . "</font><br><br><center>
<font class=\"pn-normal\">" . _SUBMIT_2 . "</font><br>";

    print_form_text();

    echo "
</font>
<form action=\"install.php\" method=\"post\">
<input type=\"submit\" name=\"op\" value=\"" . _BTN_CHANGEINFO . "\"><br>
<font class=\"pn-normal\">" . _SUBMIT_3 . "</font><br><br>
<table width=\"50%\"><tr align=\"center\"><td>";

    print_form_hidden();

    echo "
<input type=\"submit\" name=\"op\" value=\"" . _BTN_NEWINSTALL . "\">
</td><td><input type=\"submit\" name=\"op\" value=\"" . _BTN_UPGRADE . "\">
</td></tr></table></form></center>";
} 

function print_change_info()
{
    echo "
<font class=\"pn-title\">Change Info</font><font class=\"pn-normal\">" . _CHANGE_INFO_1 . "<br><br>
<form action=\"install.php\" method=\"post\"><center>";

    print_form_editabletext(0);
    print_form_hidden();

    echo "
<input type=\"hidden\" name=\"op\" value=\"Submit\">
<input type=\"submit\" value=\"" . _BTN_SUBMIT . "\"></center></form></font>";
} 

function print_new_install()
{
    progress(60);
    echo "<center><br><font class=\"pn-title\">" . _NEWINSTALL . "</font><br><font class=\"pn-normal\"> " . _NEW_INSTALL_1 . "</font><br><br><center>";

    print_form_text(0);

    echo "
<br><br><font class=\"pn-normal\">" . _NEW_INSTALL_2 . "</font>
<form action=\"install.php\" method=\"post\"><table width=\"50%\"><tr>
<td align=center><font class=\"pn-normal\">" . _NEW_INSTALL_3 . "</font><br><input type=checkbox name=\"dbmake\"><br></td><td>";

    print_form_hidden();

    echo "
<input type=\"hidden\" name=\"op\" value=\"Start\">
<input type=\"submit\" value=\"" . _BTN_START . "\"></td></tr></table></form></font></center>";
} 

function print_start()
{
    echo "<br>
<form action=\"install.php\" method=\"post\"><center><table width=\"50%\" align=center>
<tr><td align=center>";

    print_form_hidden();

    echo "
<input type=\"hidden\" name=\"op\" value=\"Continue\">
<input type=\"submit\" value=\"" . _BTN_CONTINUE . "\"></td></tr></table></center></form>";
} 

function print_continue()
{
    progress(80);
    echo "<br>
<font class=\"pn-title\">" . _CONTINUE_1 . "</font>
<font class=\"pn-normal\">" . _CONTINUE_2 . "</font><br><br>
<center><form action=\"install.php\" method=\"post\"><table width=\"50%\" border=1>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _ADMIN_LOGIN . "</font></td>
<td><input type=\"text\" NAME=\"aid\" SIZE=30 maxlength=80 value=\"Admin\"></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _ADMIN_NAME . "</font></td>
<td><input type=\"text\" NAME=\"name\" SIZE=30 maxlength=80 value=\"Admin\"></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _ADMIN_PASS . "</font></td>
<td><input type=\"password\" NAME=\"pwd\" SIZE=30 maxlength=80 value=\"Password\"></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _ADMIN_REPEATPASS . "</font></td>
<td><input type=\"password\" NAME=\"repeatpwd\" SIZE=30 maxlength=80 value=\"Password\"></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _ADMIN_EMAIL . "</font></td>
<td><input type=\"text\" NAME=\"email\" SIZE=30 maxlength=80 value=\"none@none.com\"></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _ADMIN_URL . "</font></td>
<td><input type=\"text\" NAME=\"url\" SIZE=30 maxlength=80 value=\"http://www.postnuke.com\"></td></tr>";

    print_form_hidden();

    echo "
</td></tr></table><br><br><input type=\"hidden\" name=\"op\" value=\"Set Login\">
<input type=\"submit\" value=\"" . _BTN_SET_LOGIN . "\"></form></font></center>";
} 

function print_set_login()
{
    echo "
<form action=\"install.php\" method=\"post\"><center><table width=\"50%\">";

    print_form_hidden();

    echo "
<tr><td align=center><input type=\"hidden\" name=\"op\" value=\"Finish\">
<input type=\"submit\" value=\"" . _BTN_FINISH . "\"></td></tr></table></center></form>";
} 

function print_finish()
{
    progress(100);
    echo "
<font class=\"pn-title\">" . _FINISH_1 . "</font>
<font class=\"pn-normal\">" . _FINISH_2 . "<br><br><form action=\"install.php\" method=\"post\">
<center><textarea name=\"license\" cols=80 rows=10>";

    include("docs/CREDITS.txt");

    echo "
</textarea><br><br>" . _FINISH_3 . "</center></form></font>
<br><br><center><b><a href=\"index.php\">" . _FINISH_4 . "</a></b></center><br><br>";
} 

function print_upgrade()
{
    echo"<center>";
    progress(60);
    echo"</center>";
    echo "
<font class=\"pn-title\">" . _UPGRADE_1 . "</font><br><font class=\"pn-normal\">" . _UPGRADE_2 . "<br><br>
<form action=\"install.php\" method=\"post\"><table width=\"50%\"><tr align=\"center\"><td>";

    print_form_hidden();

    echo "
<input type=\"submit\" name=\"op\" value=\"PHP-Nuke\"></td><td>
<input type=\"submit\" name=\"op\" value=\"PostNuke\"></td><td>
<input type=\"submit\" name=\"op\" value=\"MyPHPNuke\"></td></tr>
</table></form></center></font>
<center>
<b>Warning</b><p>" .
    _UPGRADETAKESALONGTIME . "</center>
";
} 

function print_select_phpnuke()
{
    echo"<center>";
    progress(70);
    echo"</center>";
    echo "
<font class=\"pn-title\">" . _PHPNUKE_1 . "</font>
<font class=\"pn-normal\">" . _PHPNUKE_2 . "<br><br>
<form action=\"install.php\" method=\"post\"><center><table width=\"50%\" align=center><tr><td align=center>";

    print_form_hidden();

    echo "
<input type=\"submit\" name=\"op\" value=\"PHP-Nuke 4.4\"></td></tr></table></center></form></font>
<font class=\"pn-title\">" . _PHPNUKE_3 . "</font>
<font class=\"pn-normal\">" . _PHPNUKE_4 . "
<form action=\"install.php\" method=\"post\"><center><table width=\"50%\" align=center>
<tr><td align=center>";

    print_form_hidden();

    echo "
<input type=\"submit\" name=\"op\" value=\"PHP-Nuke 5\"></td></tr></table></center></form></font>
<font class=\"pn-title\">" . _PHPNUKE_5 . "</font>
<font class=\"pn-normal\">" . _PHPNUKE_6 . "
<form action=\"install.php\" method=\"post\"><center><table width=\"50%\" align=center>
<tr><td align=center>";

    print_form_hidden();

    echo "
<input type=\"submit\" name=\"op\" value=\"PHP-Nuke 5.2\"></td></tr></table></center></form></font>
<font class=\"pn-title\">" . _PHPNUKE_7 . "</font>
<font class=\"pn-normal\">" . _PHPNUKE_8 . "
<form action=\"install.php\" method=\"post\"><center><table width=\"50%\" align=center>
<tr><td align=center>";

    print_form_hidden();

    echo "
<input type=\"submit\" name=\"op\" value=\"PHP-Nuke 5.3\"></td></tr></table></center></form></font>
<font class=\"pn-title\">" . _PHPNUKE_9 . "</font>
<font class=\"pn-normal\">" . _PHPNUKE_10 . "
<form action=\"install.php\" method=\"post\"><center><table width=\"50%\" align=center>
<tr><td align=center>";

    print_form_hidden();

    echo "
<input type=\"submit\" name=\"op\" value=\"PHP-Nuke 5.3.1\"></td></tr></table></center></form></font>
<font class=\"pn-title\">" . _PHPNUKE_11 . "</font>
<font class=\"pn-normal\">" . _PHPNUKE_12 . "
<form action=\"install.php\" method=\"post\"><center><table width=\"50%\" align=center>
<tr><td align=center>";

    print_form_hidden();

    echo "<input type=\"submit\" name=\"op\" value=\"PHP-Nuke 5.4\"></td></tr></table></center></form></font>";
} 

function print_select_postnuke()
{
    echo"<center>";
    progress(70);
    echo"</center>";
    echo "
<font class=\"pn-title\">" . _POSTNUKE_1 . "</font>
<font class=\"pn-normal\">" . _POSTNUKE_2 . "
<form action=\"install.php\" method=\"post\"><center><table width=\"50%\" align=center><tr>
<td align=center>";

    print_form_hidden();

    echo "
<input type=\"submit\" name=\"op\" value=\"PostNuke .5\"></td></tr>
</table></center></form></font>
<font class=\"pn-title\">" . _POSTNUKE_3 . "</font>
<font class=\"pn-normal\">" . _POSTNUKE_4 . "
<form action=\"install.php\" method=\"post\"><center>
<table width=\"50%\" align=center><tr><td align=center>";

    print_form_hidden();

    echo "
<input type=\"submit\" name=\"op\" value=\"PostNuke .6\"></td>
</tr></table></center></form></font>
<font class=\"pn-title\">" . _POSTNUKE_5 . "</font>
<font class=\"pn-normal\">" . _POSTNUKE_6 . "
<form action=\"install.php\" method=\"post\"><center>
<table width=\"50%\" align=center><tr><td align=center>";

    print_form_hidden();

    echo "
<input type=\"submit\" name=\"op\" value=\"PostNuke .62\"></td>
</tr></table></center></form></font>
<font class=\"pn-title\">" . _POSTNUKE_7 . "</font>
<font class=\"pn-normal\">" . _POSTNUKE_8 . "
<form action=\"install.php\" method=\"post\"><center>
<table width=\"50%\" align=center><tr><td align=center>";

    print_form_hidden();

    echo "
<input type=\"submit\" name=\"op\" value=\"PostNuke .63\"></td>
</tr></table></center></form></font>
<font class=\"pn-title\">" . _POSTNUKE_9 . "</font>
<font class=\"pn-normal\">" . _POSTNUKE_10 . "
<form action=\"install.php\" method=\"post\"><center><table width=\"50%\" align=center>
<tr><td align=center>";

    print_form_hidden();

    echo "
<input type=\"submit\" name=\"op\" value=\"PostNuke .64\"></td>
</tr></table></center></form></font>
<font class=\"pn-title\">" . _POSTNUKE_11 . "</font>
<font class=\"pn-normal\">" . _POSTNUKE_12 . "
<form action=\"install.php\" method=\"post\"><center>
<table width=\"50%\" align=center><tr><td align=center>";

    print_form_hidden();

    echo "
<input type=\"submit\" name=\"op\" value=\"PostNuke .7\"></td>
</tr></table></center></form></font>
<font class=\"pn-title\">" . _POSTNUKE_13 . "</font>
<font class=\"pn-normal\">" . _POSTNUKE_14 . "
<form action=\"install.php\" method=\"post\"><center>
<table width=\"50%\" align=center><tr><td align=center>";

    print_form_hidden(); 
    // Added for 0.7.2.2 Neo
    echo "
<input type=\"submit\" name=\"op\" value=\"PostNuke .71\"></td>
</tr></table></center></form></font>
<font class=\"pn-title\">" . _POSTNUKE_19 . "</font>
<font class=\"pn-normal\">" . _POSTNUKE_20 . "
<form action=\"install.php\" method=\"post\"><center>
<table width=\"50%\" align=center><tr><td align=center>";

    print_form_hidden();

    echo "
<input type=\"submit\" name=\"op\" value=\"PostNuke .72\"></td>
</tr></table></center></form></font>


<center>
<b>Warning</b><p>" .
    _UPGRADETAKESALONGTIME . "</center>
";

    /**
     * Removed for release.  Needs to be updated.
     * <br><br><font class="pn-title">"._POSTNUKE_13."</font>
     * <font class="pn-normal">"._POSTNUKE_14."</font><br><br>
     * <font class="pn-title">"._POSTNUKE_15."</font>
     * <font class="pn-normal">"._POSTNUKE_16."
     * <form action="install.php" method="post"><center>
     * <table width="50%" align=center><tr><td align=center>
     * 
     * print_form_hidden();
     * 
     * <input type="hidden" name="op" value="Validate Language">
     * <input type="submit" value="Validate"></td></tr>
     * </table></center></form></font>
     * <font class="pn-title">"._POSTNUKE_17."</font>
     * <font class="pn-normal">"._POSTNUKE_18."
     * <form action="install.php" method="post"><center>
     * <table width="50%" align=center><tr><td align=center>
     * 
     * print_form_hidden();
     * 
     * </font>
     */
} 

function print_select_myphpnuke()
{
    echo"<center>";
    progress(70);
    echo"</center>";
    echo "
<font class=\"pn-title\">" . _MYPHPNUKE_1 . "</font>
<font class=\"pn-normal\">" . _MYPHPNUKE_2 . "
<form action=\"install.php\" method=\"post\"><center>
<table width=\"50%\" align=center><tr><td align=center>";

    print_form_hidden();

    echo "
<input type=\"submit\" name=\"op\" value=\"MyPHPNuke 1.8.7\"></td>
</tr></table></center></form></font>
<font class=\"pn-title\">" . _MYPHPNUKE_3 . "</font>
<font class=\"pn-normal\">" . _MYPHPNUKE_4 . "
<form action=\"install.php\" method=\"post\"><center>
<table width=\"50%\" align=center><tr><td align=center>";

    print_form_hidden();

    echo "
<input type=\"submit\" name=\"op\" value=\"MyPHPNuke 1.8.8\"></td>
</tr></table></center></form></font>";
} 

function print_success()
{
    echo "
<font class=\"pn-title\">" . _SUCCESS_1 . "</font>
<font class=\"pn-normal\">" . _SUCCESS_2 . "<br><br>
<form action=\"install.php\" method=\"post\"><center><table width=\"50%\">";

    print_form_hidden();

    echo "
<tr><td align=center><input type=\"hidden\" name=\"op\" value=\"Finish\">
<input type=\"submit\" value=\"" . _BTN_FINISH . "\"></td>
</tr></table></center></form></font><br><br>";
} 

function print_forum_info()
{
    echo
    _FORUM_INFO_1 . "<br><br><ul>
<strong><big>?/big></strong>access<br>
<strong><big>?/big></strong>catagories<br>
<strong><big>?/big></strong>config<br>
<strong><big>?/big></strong>forums<br>
<strong><big>?/big></strong>forumstopics<br>
<strong><big>?/big></strong>posts<br>
<strong><big>?/big></strong>ranks<br>
<strong><big>?/big></strong>user_status
</ul>" . _FORUM_INFO_2 . "<br><br>";
} 

function print_default()
{
    progress(20);
    echo "<br>
<font class=\"pn-normal\">" . _DEFAULT_1 . "</font><br><br>
<font class=\"pn-title\">" . _DEFAULT_2 . "</font>
<font class=\"pn-normal\">" . _DEFAULT_3 . "<br><br>
<form action=\"install.php\" method=\"post\"><center>
<textarea name=\"license\" cols=80 rows=10>";

    include("docs/COPYING.txt");

    echo "</textarea><br><br>";

    print_form_hidden();

    echo "
<input type=\"hidden\" name=\"op\" value=\"Check\">
<input type=\"submit\" value=\"" . _BTN_NEXT . "\"></center>
</form></font><br><br>";
} 

function print_select_language()
{
    progress(10);
    echo "<br><center>
	<font class=\"pn-title\">" . _VERSION_WARNING . "</font><br><br>
<font class=\"pn-title\">" . _SELECT_LANGUAGE_1 . "</font></center>
<form action=\"install.php\" method=\"post\"><center><table width=\"50%\" align=center><tr>
<td align=center><font class=\"pn-normal\">" . _SELECT_LANGUAGE_2;

    lang_dropdown();

    echo "<input type=\"hidden\" name=\"op\" value=\"Set Language\">
<input type=\"submit\" value=\"" . _BTN_SET_LANGUAGE . "\"></font></td></tr>
</table></center></form>";
} 

function print_footer()
{
    echo "
</td></tr></table></td></tr><tr bgcolor=\"#000000\" height=\"3\"><td></td></tr><tr  bgcolor=\"#264CB7\" height=\"80\"><td><table width=\"100%\" ><tr><td height=\"20\"><center><font color=\"#ffffff\" size=\"2\"><a href=\"http://support.postnuke.com\" target=\"_blank\"><font color=\"#ffffff\" size=\"2\">Postnuke Support</font></a> - <a href=\"http://forums.postnuke.com\" target=\"_blank\"><font color=\"#ffffff\" size=\"2\">Support Forums</font></a><br><br><b>" . _FOOTER_1 . "</b></font></center></td></tr></table></td></tr></table></body></html>";
} 

?>