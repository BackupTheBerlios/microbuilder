<?php 
// $Id: theme.php,v 1.1 2004/03/01 10:09:09 mbertier Exp $
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
// Copyright (C) 2001 by the PostNuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// Based on:
// Thatware - http://thatware.org/
// PHP-NUKE Web Portal System - http://phpnuke.org/
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
// Original Author of file: J. Cox
// Purpose of file: Default PostNuke Theme
// ----------------------------------------------------------------------

$thename = "PostNuke";
$bgcolor1 = "#F6F7EB";
$bgcolor2 = "#B1B78B";
$bgcolor3 = "#D9DCC2";
$bgcolor4 = "#E1E4CE";
$sepcolor = "#000000"; // Color for the seperator used in the theme.  Theme only.
$textcolor1 = "#000000";
$textcolor2 = "#000000";
$postnuke_theme = true;

themes_get_language();

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
    $slogan = pnConfigGetVar('slogan');
    $sitename = pnConfigGetVar('sitename');
    $banners = pnConfigGetVar('banners');

    echo "</head>\n" . "<body>\n" . "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n" . "<tr>\n" . "<td valign=\"top\">\n" . "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"$GLOBALS[bgcolor1]\" width=\"100%\">\n" . "<tr>\n" . "<td align=\"left\" valign=\"middle\">\n" . "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\">\n" . "<tr>\n" . "<td class=\"pn-title\" valign=\"top\" align=\"left\">\n" . "<a class=\"pn-logo\" href=\"index.php\">$sitename</a><br>\n" . "<font class=\"pn-logo-small\">$slogan</font></td>\n" . "<td width=\"50%\" valign=\"top\" align=\"right\">\n";
    if(pnModAvailable('Banners')) 
    {
		pnBannerDisplay();
	}
    echo "<br><font class=\"pn-logo-small\">";
    echo ml_ftime(_DATETIMEBRIEF, (GetUserTime(time())));
    echo "</font></td>\n" . "</tr>\n" . "</table>\n" . "</td>\n" . "</tr>\n" . "<tr>\n" . "<td width=\"100%\" bgcolor=\"$GLOBALS[sepcolor]\"><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\"></td>\n" . "</tr>\n" . "<tr>\n" . "<td bgcolor=\"$GLOBALS[bgcolor4]\" align=\"center\" valign=\"middle\">\n" . "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\">\n" . "<tr>\n" . "<td align=\"right\" valign=\"middle\" class=\"pn-normal\">\n";
    include("themes/$GLOBALS[thename]/top_links.php");
    echo "</td>\n" . "</tr>\n" . "</table>\n" . "</td>\n" . "</tr>\n" . "<tr>\n" . "<td width=\"100%\" bgcolor=\"$GLOBALS[sepcolor]\"><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\"></td>\n" . "</tr>\n" . "<tr>\n" . "<td>\n" . "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\" bgcolor=\"$GLOBALS[bgcolor2]\">\n" . "<tr>\n" . "<td width=\"100%\" align=\"right\" valign=\"middle\">\n" . "<form action=\"modules.php\" method=\"post\">\n" . "<input type=\"hidden\" name=\"name\" value=\"Search\">\n" . "<input type=\"hidden\" name=\"file\" value=\"index\">\n" . "<input type=\"hidden\" name=\"op\" value=\"modload\">\n" . "<input type=\"hidden\" name=\"action\" value=\"search\">\n" . "<input type=\"hidden\" name=\"overview\" value=\"1\">\n" . "<input type=\"hidden\" name=\"active_stories\" value=\"1\">\n" . "<input type=\"hidden\" name=\"bool\" value=\"AND\">\n" . "<input type=\"hidden\" name=\"stories_cat\" value=\"\">\n" . "<input type=\"hidden\" name=\"stories_topics\" value=\"\">\n" . "<font class=\"pn-normal\">" . _SEARCH . "&nbsp;\n" . "<input class=\"pn-text\" name=\"q\" type=\"text\" value=\"\">&nbsp;\n" . "</font></form>" . "</td>\n" . "</tr>\n" . "</table>\n" . "</td>\n" . "</tr>\n" . "<tr>\n" . "<td width=\"100%\" bgcolor=\"$GLOBALS[sepcolor]\"><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\"></td>\n" . "</tr>\n" . "</table>\n" . "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n" . "<tr>\n" . "<td width=\"150\" bgcolor=\"$GLOBALS[bgcolor3]\"><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"150\" height=\"5\" alt=\"\" border=\"0\"></td>\n" . "<td width=\"5\"><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"5\" height=\"1\" alt=\"\" border=\"0\"></td>\n" . "<td width=\"100%\"><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\"></td>\n";
    if ($GLOBALS['index'] == 1) {
        echo "<td width=\"5\"><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"5\" height=\"1\" alt=\"\" border=\"0\"></td>\n" . "<td width=\"150\"><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"150\" height=\"5\" alt=\"\" border=\"0\"></td>\n";
    } 
    echo "</tr>\n" . "<tr>\n" . "<td width=\"150\" bgcolor=\"$GLOBALS[bgcolor3]\" align=\"center\" valign=\"top\">\n";
    blocks('left');
    echo "</td>\n" . "<td width=\"5\"><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"5\" height=\"1\" alt=\"\" border=\"0\"></td>\n" . "<td align=\"center\" valign=\"top\">\n";
    if ($GLOBALS['index'] == 1) {
        blocks('centre');
    } 
} 

function themefooter()
{
    echo "</td>\n";
    if ($GLOBALS['index'] == 1) {
        echo "<td width=\"5\"><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"5\" height=\"1\" alt=\"\" border=\"0\"></td>\n" . "<td align=\"center\" valign=\"top\">\n";
        blocks('right');
        echo "</td>\n";
    } 
    echo "</tr>\n" . "</table>\n" . "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n" . "<tr>\n" . "<td width=\"100%\" bgcolor=\"$GLOBALS[sepcolor]\"><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\"></td>\n" . "</tr>\n" . "<tr>\n" . "<td bgcolor=\"$GLOBALS[bgcolor2]\" align=\"center\" valign=\"middle\">\n" . "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\">\n" . "<tr>\n" . "<td valign=\"middle\" align=\"right\">\n";
    include("themes/$GLOBALS[thename]/bottom_links.php");
    echo "</td>\n" . "</tr>\n" . "</table>\n" . "</td>\n" . "</tr>\n" . "<tr>\n" . "<td width=\"100%\" bgcolor=\"$GLOBALS[sepcolor]\"><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\"></td>\n" . "</tr>\n" . "<tr>\n" . "<td bgcolor=\"$GLOBALS[bgcolor3]\" align=\"center\" valign=\"middle\">\n";
    footmsg();
    echo "</td>\n" . "</tr>\n" . "<tr>\n" . "<td bgcolor=\"$GLOBALS[sepcolor]\"><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\"></td>\n" . "</tr>\n" . "</table>\n" . "</td>\n" . "</tr>\n" . "</table>\n";
} 

function themeindex ($_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $info, $links, $preformat)
{
    $anonymous = pnConfigGetVar('anonymous');
    $tipath = pnConfigGetVar('tipath');

    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n" . "<tr bgcolor=\"$GLOBALS[sepcolor]\">\n" . "<td><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\"></td>\n" . "</tr>\n" . "<tr>\n" . "<td>\n" . "<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"100%\" bgcolor=\"$GLOBALS[bgcolor4]\">\n" . "<tr>\n" . "<td width=\"100%\"><span class=\"pn-title\">$preformat[catandtitle]</span><br>\n" . "<span class=\"pn-sub\">" . _POSTEDBY . ": $info[informant] " . _ON . " $info[longdatetime]</span></td>\n" . "</tr>\n" . "</table>\n" . "</td>\n" . "</tr>\n" . "<tr style=\"bgcolor:$GLOBALS[sepcolor]\">\n" . "<td><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\"></td>\n" . "</tr>\n" . "<tr>\n" . "<td align=\"left\" valign=\"top\" class=\"pn-normal\">\n" . "$preformat[searchtopic]\n" . "$info[hometext]\n" . "<br><br>$preformat[notes]\n" . "</td>\n" . "</tr>\n" . "<tr bgcolor=\"$GLOBALS[sepcolor]\">\n" . "<td><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\"></td>\n" . "</tr>\n" . "<tr>\n" . "<td valign=\"middle\" align=\"right\" width=\"100%\">\n" . "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" bgcolor=\"$GLOBALS[bgcolor4]\">\n" . "<tr>\n" . "<td width=\"20%\" valign=\"middle\" class=\"pn-sub\">($info[counter] " . _READS . ")</td>\n" . "<td align=\"right\" valign=\"middle\" width=\"80%\" class=\"pn-sub\">$preformat[more]</td>\n" . "</tr>\n" . "</table>\n" . "</td>\n" . "</tr>\n" . "<tr bgcolor=\"$GLOBALS[sepcolor]\">\n" . "<td><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\"></td>\n" . "</tr>\n" . "</table>\n" . "<br>\n";
} 

function themearticle ($_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $info, $links, $preformat)
{
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n" . "<tr bgcolor=\"$GLOBALS[sepcolor]\">\n" . "<td><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\"></td>\n" . "</tr>\n" . "<tr>\n" . "<td>\n" . "<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"100%\" bgcolor=\"$GLOBALS[bgcolor4]\">\n" . "<tr>\n" . "<td width=\"100%\">$preformat[catandtitle]<br>\n" . "<span class=\"pn-sub\">" . _POSTEDBY . ": $info[informant] " . _ON . " $info[briefdatetime]</span></td>\n" . "</tr>\n" . "</table>\n" . "</td>\n" . "</tr>\n" . "<tr bgcolor=\"$GLOBALS[sepcolor]\">\n" . "<td><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\"></td>\n" . "</tr>\n" . "<tr>\n" . "<td align=\"left\" valign=\"top\" class=\"pn-normal\">\n";
    if (pnSecAuthAction(0, 'Stories::Story', "$info[aid]:$info[cattitle]:$info[sid]", ACCESS_EDIT)) {
        echo "<span class=\"pn-sub\"> [ <a href=\"admin.php?module=NS-AddStory&amp;op=EditStory&amp;sid=$info[sid]\">" . _EDIT . "</a> ]";
        if (pnSecAuthAction(0, 'Stories::Story', "$info[aid]:$info[cattitle]:$info[sid]", ACCESS_DELETE)) {
            echo " [ <a href=\"admin.php?module=NS-AddStory&amp;op=RemoveStory&amp;sid=$info[sid]\">" . _DELETE . "</a> ]</span>";
        } 
        echo "<br><br>\n";
    } 
    echo "$preformat[searchtopic]\n" . "$preformat[fulltext]\n" . "</td>\n" . "</tr>\n" . "<tr bgcolor=\"$GLOBALS[sepcolor]\">\n" . "<td><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\"></td>\n" . "</tr>\n" . "<tr bgcolor=\"$GLOBALS[sepcolor]\">\n" . "<td><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\"></td>\n" . "</tr>\n" . "</table>\n";
} 

function themesidebox($block)
{
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
    if (!empty($block['title'])) {
        echo "<tr bgcolor=\"$GLOBALS[sepcolor]\">\n" . "<td><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\"></td>\n" . "</tr>\n" . "<tr>\n" . "<td align=\"center\" valign=\"top\">\n" . "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\">\n" . "<tr>\n" . "<td class=\"pn-title\">$block[title]</td>\n" . "</tr>\n" . "</table>\n" . "</td>\n" . "</tr>\n" . "<tr bgcolor=\"$GLOBALS[sepcolor]\">\n" . "<td><img src=\"themes/$GLOBALS[thename]/images/pix-t.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\"></td>\n" . "</tr>\n" . "\n";
    } 
    echo "<tr><td align=\"left\" valign=\"top\" class=\"pn-normal\">$block[content]</td>\n" . "</tr>\n" . "</table><br>\n";
} 

?>