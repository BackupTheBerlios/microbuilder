<?php 
// $Id: theme.php,v 1.1 2004/03/01 10:09:10 mbertier Exp $ Exp $Name:  $
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
// Copyright (C) 2002 by the PostNuke Development Team.
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
// Original Author of file: Brumie - http://vipixel.com
// Purpose of file: Default PostNuke Theme
// Graphics designed by Abraham Irawan - Brumie - http://vipixel.com
// Helped by Dracos
// ----------------------------------------------------------------------

$thename = "PostNukeBlue";
$postnuke_theme = true;

themes_get_language();

$bgcolor1 = "#D4E2ED";
$bgcolor2 = "#739FC4";
$bgcolor3 = "#D4E2ED";
$bgcolor4 = "#739FC4";
$textcolor1 = "#000000";
$textcolor2 = "#000000";

function OpenTable()
{
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$GLOBALS[bgcolor2]\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$GLOBALS[bgcolor1]\"><tr><td>\n";
} 

function CloseTable()
{
    echo "</td></tr></table></td></tr></table>\n";
} 

function OpenTable2()
{
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$GLOBALS[bgcolor2]\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$GLOBALS[bgcolor1]\"><tr><td>\n";
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
    $type = pnVarCleanFromInput('type');

    echo "</head>\n";
    echo "<body bgcolor=\"#FFFFFF\" text=\"#000000\">\n\n\n";
    // Begin Header
    include("themes/$GLOBALS[thename]/header.html");

    echo "<table width=\"780\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">\n" . 
	     "<tr valign=\"top\">\n" . "<td width=\"42\" align=\"left\" valign=\"top\">" .
		 "<img src=\"themes/$GLOBALS[thename]/images/left.gif\" width=\"42\" height=\"233\"" . 
		 "border=\"0\" alt=\"\"></td>\n" . "<td bgcolor=\"#333333\">" .
		 "<img src=\"themes/$GLOBALS[thename]/images/pixel.gif\" width=\"1\" height=\"1\"".
		 " border=\"0\" alt=\"\"></td>\n" . 
		 "<td class=\"blockrightcontent\">" .
		 "<img src=\"themes/$GLOBALS[thename]/images/pixel.gif\" width=\"10\" height=\"1\"" . 
		 "border=\"0\" alt=\"\"></td>\n" . 
		 "<td class=\"blockrightcontent\" width=\"150\"" .
		 " valign=\"top\">\n";
    blocks('left');
    echo "</td>\n" . "<td bgcolor=\"#FFFFFF\"><img src=\"themes/$GLOBALS[thename]/images/pixel.gif\"".
	     " width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td>\n" . 
		 "<td width=\"100%\" bgcolor=\"#FFFFFF\">\n";
    if ($GLOBALS['index'] == 1) {
        blocks('centre');
    } 
} 

function themefooter()
{
    $slogan = pnConfigGetVar('slogan');
    if ($GLOBALS['index'] == 1) {
        echo "</td>\n" . "<td bgcolor=\"#FFFFFF\"><img src=\"themes/$GLOBALS[thename]/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td>\n" . "<td bgcolor=\"#FFFFFF\" valign=\"top\" width=\"150\">\n";
        blocks('right');
    } 
    echo "</td>\n" . 
	     "<td bgcolor=\"#FFFFFF\"><img src=\"themes/$GLOBALS[thename]/images/pixel.gif\" width=10 height=1 border=0 alt=\"\">\n" . 
		 "<td bgcolor=\"#333333\"><img src=\"themes/$GLOBALS[thename]/images/pixel.gif\" width=\"1\" height=\"1\" border=\"0\" alt=\"\"></td>\n" . "\n" . "</tr>\n" . "</table>\n\n\n";
    // Begin Foot Slogan
    include("themes/$GLOBALS[thename]/footnav.html");
    echo "<br><table width=\"780\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#ffffff\">\n" . 
	     "<tr align=\"center\">\n" . "<td width=\"100%\" colspan=\"3\">\n";
    footmsg();
    echo "</td>\n" . "</tr>\n" . "</table>\n\n\n";
} 

function themeindex ($_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $info, $links, $preformat)
{
    $anonymous = pnConfigGetVar('anonymous');
    $tipath = pnConfigGetVar('tipath');
    // Begin Story Box
    include("themes/$GLOBALS[thename]/storybox.html");
} 

function themearticle ($_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $info, $links, $preformat)
{ 
    // Begin Article Box
    include("themes/$GLOBALS[thename]/articlebox.html");
} 

function themesidebox($block)
{
    if (empty($block['position'])) {
        $block['position'] = "a";
    } 
    // Begin Left Block
    if ($block['position'] == 'l') {
        include("themes/$GLOBALS[thename]/leftblock.html");
    } 
    // Begin Right Block
    if ($block['position'] == 'r') {
        include("themes/$GLOBALS[thename]/righblock.html");
    } 
    // Begin Center Block
    if ($block['position'] == 'c') {
        echo "$block[content]<br>";
    } 
} 

?>