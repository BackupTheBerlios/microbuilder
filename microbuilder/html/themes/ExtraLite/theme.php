<?php 
// File: $Id: theme.php,v 1.1 2004/03/01 10:09:10 mbertier Exp $ $Name:  $
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
// Copyright (C) 2001 by the PostNuke Development Team.
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
// Original Author of file:  Francisco Burzi
// Purpose of file: Display a low bandwidth theme.
// ----------------------------------------------------------------------
$bgcolor1 = "#ffffff";
$bgcolor2 = "#cccccc";
$bgcolor3 = "#ffffff";
$bgcolor4 = "#eeeeee";
$bgcolor5 = "#000000";
$textcolor1 = "#ffffff";
$textcolor2 = "#000000";
$postnuke_theme = true;

function OpenTable()
{
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$GLOBALS[bgcolor2]\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$GLOBALS[bgcolor1]\"><tr><td>\n";
} 

function OpenTable2()
{
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$GLOBALS[bgcolor2]\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$GLOBALS[bgcolor1]\"><tr><td>\n";
} 

function CloseTable()
{
    echo "</td></tr></table></td></tr></table><br>\n";
} 

function CloseTable2()
{
    echo "</td></tr></table></td></tr></table><br>\n";
} 

function themeheader()
{
    $sitename = pnConfigGetVar('sitename');
    $banners = pnConfigGetVar('banners');

    echo "</head>";
    echo "<body>" . "<br>";
    if(pnModAvailable('Banners')) 
    {
        pnBannerDisplay();
    }
    echo "<br>" . "<table border=\"0\" cellpadding=\"4\" cellspacing=\"0\" width=\"100%\" align=\"center\"><tr><td bgcolor=\"$GLOBALS[bgcolor1]\">" . "<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"100%\" bgcolor=\"$GLOBALS[bgcolor1]\"><tr><td>" . "<a href=\"index.php\"><img src=\"" . WHERE_IS_PERSO . "images/logo.gif\" Alt=\"" . _WELCOMETO . " $sitename\" border=\"0\"></a>" . "</td><td align=\"right\">" . '<form action="modules.php" method="post">' . '<input type="hidden" name="name" value="Search">' . '<input type="hidden" name="file" value="index">' . '<input type="hidden" name="op" value="modload">' . '<input type="hidden" name="action" value="search">' . '<input type="hidden" name="overview" value="1">' . '<input type="hidden" name="active_stories" value="1">' . '<input type="hidden" name="bool" value="AND">' . '<input type="hidden" name="stories_cat" value="">' . '<input type="hidden" name="stories_topics" value="">' . '<div align="right"><font class="pn-normal">' . _SEARCH . '&nbsp;</font>' . "<input class=\"pn-text\" NAME=\"q\" TYPE=\"text\" VALUE=\"\">&nbsp;\n" . '</div>' . '</form>' . "</td></tr></table></td></tr><tr><td valign=\"top\" width=\"100%\" bgcolor=\"$GLOBALS[bgcolor1]\">" . "<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\" width=\"100%\">
          <tr><td valign=\"top\" width=\"150\" bgcolor=\"$GLOBALS[bgcolor1]\">";
    blocks('left');
    echo "<img src=\"images/global/pix.gif\" border=\"0\" width=\"100%\" height=\"1\" alt=\"\">
          </td>
          <td>&nbsp;&nbsp;</td>
          <td valign=\"top\">";
    if ($GLOBALS['index'] == 1) {
        blocks('centre');
    } 
} 

function themefooter()
{
    if ($GLOBALS['index'] == 1) {
        echo "</td>
              <td>&nbsp;&nbsp;</td>
              <td valign=\"top\" width=\"150\" bgcolor=\"$GLOBALS[bgcolor1]\">";
        blocks('right');
    } 
    echo "</td></tr></table>
          </td></tr></table>
          <center>";
    footmsg();
    echo "</center>";
} 

function themeindex ($_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $info, $links, $preformat)
{
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" bgcolor=\"$GLOBALS[bgcolor5]\" width=\"100%\"><tr><td>" . "<table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" width=\"100%\"><tr><td bgcolor=\"$GLOBALS[bgcolor1]\">" . "<b>$preformat[catandtitle]</b><br>" . "<font class=\"pn-normal\">" . "" . _POSTEDBY . ": $info[informant] " . _ON . " $info[longdatetime]";
    echo "<br><a href=\"$links[searchtopic]\">$info[topicname]</a>&nbsp;\n" . "</font></td></tr><tr><td bgcolor=\"$GLOBALS[bgcolor1]\">" . "<font class=\"pn-normal\">" . "$info[hometext]\n" . "<br><br>$preformat[notes]\n" . "<br><br>" . "</font>" . "</td></tr><tr><td bgcolor=\"$GLOBALS[bgcolor1]\" align=\"right\">" . "<font class=\"pn-sub\">$preformat[more]</font>" . "</td></tr></table></td></tr></table>" . "<br>";
} 

function themearticle ($_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $info, $links, $preformat)
{
    echo"
    <table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=\"$GLOBALS[bgcolor5]\" width=\"100%\"><tr><td>
    <table border=0 cellpadding=3 cellspacing=1 width=\"100%\"><tr><td bgcolor=\"$GLOBALS[bgcolor1]\">
    <font class=\"pn-title\">$preformat[catandtitle]</font><br><font class=\"pn-normal\"><font CLASS=\"pn-sub\">" . _POSTEDBY . ": $info[informant] " . _ON . " $info[briefdatetime]</font></font>";

    if (pnSecAuthAction(0, 'Stories::Story', "$info[aid]:$info[cattitle]:$info[sid]", ACCESS_EDIT)) {
        echo "&nbsp;&nbsp; <font class=\"pn-normal\"> [ <a href=\"admin.php?module=NS-AddStory&amp;op=EditStory&amp;sid=$info[sid]\">" . _EDIT . "</a> ]";
        if (pnSecAuthAction(0, 'Stories::Story', "$info[aid]:$info[cattitle]:$info[sid]", ACCESS_DELETE)) {
            echo " [ <a href=\"admin.php?module=NS-AddStory&amp;op=RemoveStory&amp;sid=$info[sid]\">" . _DELETE . "</a> ]</font>";
        } 
    } 
    echo "<br>
          <font class=\"pn-normal\">
          <a href=\"$links[searchtopic]\">$info[topicname]</a>&nbsp;
          </font>
    </td></tr><tr><td bgcolor=\"$GLOBALS[bgcolor1]\"><font class=\"pn-normal\">
    $preformat[fulltext]
    </font></td></tr></table></td></tr></table><br>";
} 

function themesidebox($block)
{
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" width=\"100%\" bgcolor=\"$GLOBALS[bgcolor5]\"><tr><td>" . "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\"><tr><td bgcolor=\"$GLOBALS[bgcolor1]\" class=\"pn-title\">" . "$block[title]</td></tr><tr><td bgcolor=\"$GLOBALS[bgcolor1]\" class=\"pn-normal\">" . "$block[content]" . "</td></tr></table></td></tr></table><br>";
} 

?>