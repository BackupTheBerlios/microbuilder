<?php 
// $Id: theme.php,v 1.1 2004/03/01 10:09:09 mbertier Exp $ Exp $Name:  $
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
// Filename: theme.php
// Original  Author(s): Andy Varganov email@andyv.co.uk
// Vanessa Haakenson vanessa@distance-educator.com
// Purpose:  Theme layout
// ----------------------------------------------------------------------

$thename = 'PostNukeSilver';
$postnuke_theme = true;

themes_get_language();
// legacy variables and functions, left here just in case if some modules
// still need to use them. opentable is also used in this theme (articles)
$bgcolor1 = '#e7e7e7'; // lite greyish
$bgcolor2 = '#FFFFFF'; // pure white
$bgcolor3 = '#999999'; // near white
$bgcolor4 = '#e9e9e9'; // lite greyish
$textcolor1 = '#000000'; // black
$textcolor2 = '#000000'; // black

// appearance of these areas is completely controlled via CSS styles
function OpenTable()
{
    echo '<table class="opentable"><tr><td>';
} 

function OpenTable2()
{
    echo '<table class="opentable2"><tr><td>';
} 

function CloseTable()
{
    echo '</td></tr></table>';
} 

function CloseTable2()
{
    echo '</td></tr></table>';
} 
// end legacy functions and variables
function themeheader()
{
    $slogan = pnConfigGetVar('slogan');
    $sitename = pnConfigGetVar('sitename');
    $banners = pnConfigGetVar('banners');
    $type = pnVarCleanFromInput('type'); 
    // We will come back to main page when the site logo is clicked.
    // To be redirected somewhere else, enter a fully qualified URL
    $siteurl = 'index.php';

    echo '</head><body>' . '<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td>'; 
    // logo and banner
    echo '<table width="100%" border="0" cellspacing="0" cellpadding="4"><tr>' . 
	     '<td><a href="' . $siteurl . '" target="_top">' . '<span class="logo">' . '<img src="themes/' . $GLOBALS['thename'] . '/images/logo.gif" width="231" height="68" alt="' . $sitename . '">' . '</span>' . '</a></td><td align="right" width="468">' . '<span class="banner">';
    if ((!empty($banners)) && (!pnSecAuthAction(0, '::', '::', ACCESS_EDIT))) {
        pnBannerDisplay();
    } else {
        // for testing theme only, comment out or delete the next line in the production environment
        echo '<img src="themes/' . $GLOBALS['thename'] . 
		     '/images/samplebanner.gif" alt="a sample banner, for testing only...">';
    } 
    echo '</span>' . '</td></tr></table>'; 
    // end logo and banner
    // here we place 'the curvy' top-bar with date-clock, SF links and search form
    echo '<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr valign="top">' . 
	     '<td width="168" align="left">' . '<img src="themes/' . $GLOBALS['thename'] . 
		 '/images/spacer.gif" width="168" height="1" alt="">' . '</td>' . '<td>' . '</td>' . 
		 '<td width="27" align="right">' . '<img src="themes/' . $GLOBALS['thename'] . 
		 '/images/spacer.gif" width="27" height="1" alt="">' . '</td></tr><tr valign="top">' . 
		 '<td class="bar-top-left" width="168" align="center" valign="middle">'; 
    // display date and time
    echo ml_ftime(_DATETIMEBRIEF, (GetUserTime(time())));
    echo '</td>' . '<td class="bar-top-middle" align="right" valign="middle">';
    echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" align="right"><tr>' . 
	     '<td class="bar-top-text" align="center" valign="middle">'; 
    // top links
    include('themes/' . $GLOBALS['thename'] . '/top_links.php'); 
    // search form
    echo '</td>' . '<td align="right" valign="middle">' . '<table><tr>' . 
	     '<td class="bar-top-text" align="right" valign="middle">' . _SEARCH . '&nbsp;' . 
		 '</td>' . '<td class="bar-top-form" height="35" align="right" valign="middle">' . 
		 '<form style="display:inline" action="modules.php" method="post">' . 
		 '<input type="hidden" name="name" value="Search">' . 
		 '<input type="hidden" name="file" value="index">' . 
		 '<input type="hidden" name="op" value="modload">' . 
		 '<input type="hidden" name="action" value="search">' . 
		 '<input type="hidden" name="overview" value="1">' . 
		 '<input type="hidden" name="active_stories" value="1">' . 
		 '<input type="hidden" name="bool" value="AND">' . 
		 '<input type="hidden" name="stories_cat" value="">' . 
		 '<input type="hidden" name="stories_topics" value="">' . 
		 '<input name="q" type="text" size="15"></form>' . 
		 '</td></tr></table>' . '</td></tr></table>' . 
		 '</td>' . '<td width="27">' . '<img alt="" src="themes/' . 
		 $GLOBALS['thename'] . '/images/bar_top_right.gif">' . '</td></tr>'; 
    // end top-bar
    // here goes 'the curvy' spacer between the top-bar and middle area
    echo '<tr valign="top">' . '<td width="168" height="13" align="left">' . 
	     '<img alt="" src="themes/' . $GLOBALS['thename'] . 
		 '/images/spacer_top_left.gif" width="168" height="13">' . '</td>' . 
		 '<td class="spacer-top-middle" height="13" align="center">' . 
		 '<img alt="" src="themes/' . $GLOBALS['thename'] . '/images/spacer.gif">' . 
		 '</td>' . '<td width="27" align="right">' . '<img alt="" src="themes/' . 
		 $GLOBALS['thename'] . '/images/spacer_top_right.gif" width="27" height="13">' . 
		 '</td>' . '</tr>'; 
    // end 'the curvy' spacer
    // now lets start formatting left menus and the central area
    echo '<tr valign="top">' . 
	     '<td class="menu-middle-left" width="168" align="center" valign="top">' . 
		 '<table width="150"><tr><td>';
    blocks('left');
    echo '</td></tr></table>' . '</td><td valign="top" align="center" width="100%">' . 
	     '<table class="central-area" width="100%" border="0" cellspacing="0" cellpadding="6">' . 
		 '<tr valign="top"><td>'; 
    // If we have admin messages or blocks of 'centre' type, lets display them
    if ($GLOBALS['index']) {
        OpenTable();
        echo '<div class="message-centre">';
        blocks('centre');
        echo '</div>';
        CloseTable();
    } 
} 

function themefooter()
{ 
    // in the main page we need to take care of the right menus
    if ($GLOBALS['index']) {
        echo '</td><td class="menu-middle-right">'; 
        // place right blocks
        blocks('right');
        echo '</td></tr></table>';
    } else {
        echo '</td></tr></table>';
    } 
    // draw the theme's right margin-border
    echo '</td><td width="27" class="menu-middle-rightborder" valign="top">' . 
	     '<img src="themes/' . $GLOBALS['thename'] . 
		 '/images/spacer.gif" width="1" alt="" height="1">' . '</td>' . '</tr>'; 
    // add 'curvy' spacer
    echo '<tr>' . '<td width="168" align="left">' . '<img alt="" src="themes/' . 
	     $GLOBALS['thename'] . '/images/spacer_bottom_left.gif">' . '</td>' . 
		 '<td class="bar-bottom-middle-spacer">' . '<img alt="" src="themes/' .
		 $GLOBALS['thename'] . '/images/spacer.gif">' . '</td>' . 
		 '<td width="27" align="right">' . '<img alt="" src="themes/' . 
		 $GLOBALS['thename'] . '/images/spacer_bottom_right.gif"><' . 
		 '/td>' . '</tr>'; 
    // the 'curvy' bottom bar with links
    echo '<tr>' . '<td width="168" align="left">' . '<img alt="" src="themes/' . 
	     $GLOBALS['thename'] . '/images/bar_bottom_left.gif">' . '</td>' . 
		 '<td class="bar-bottom-middle" align="center">'; 
    // links to PN resources on SF
    include('themes/' . $GLOBALS['thename'] . '/bottom_links.php');
    echo '</td>' . '<td width="27">' . '<img alt="" src="themes/' . 
	     $GLOBALS['thename'] . '/images/bar_bottom_right.gif">' . 
		 '</td></tr></table>'; 
    // display credits
    // OpenTable();
    echo '<table width="100%" border="0" cellspacing="0" cellpadding="4"><tr>' . 
	     '<td class="credits" align="center">';
    footmsg();
    echo '</td></tr></table>';
    // CloseTable(); 
    // end of the page
    echo '</td></tr></table>';
} 

function themeindex ($_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $info, $links, $preformat)
{
    $anonymous = pnConfigGetVar('anonymous');
    $tipath = pnConfigGetVar('tipath'); 
    // in this function and in the themearticle() we are going to use some of the Rogue defined api
    // as per the article by J.Cox
    // http://postnuke.com/modules.php?op=modload&name=News&file=article&sid=1260
    OpenTable();
    echo '<table border="0" cellspacing="1" cellpadding="0" width="100%"><tr>' . 
	     '<td class="article-table" align="left">' . '' . $preformat['catandtitle'] . 
		 '' . '</td></tr>' . '<tr><td class="article-table">' . 
		 '' . $preformat['searchtopic'] . '' . 
		 '' . $info['hometext'] . '' . 
		 '<br><br>' . '' . $preformat['notes'] . '' . 
		 '</td>' . '</tr>' . '</table>' . 
		 '<table border="0" width="100%" cellspacing="2" cellpadding="0">' . 
		 '<tr><td class="article-table" width="80" align="left">' . $info['counter'] . 
		 '&nbsp;' . _READS . '' . '</td><td class="article-table" align="right">' . 
		 $preformat['more'] . '' . '</td></tr>' . '</table>';
    CloseTable();
} 

function themearticle ($_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $info, $links, $preformat)
{
    OpenTable();
    echo '<table border="0" cellspacing="2" cellpadding="3" width="100%"><tr>' . 
	     '<td class="article-table" align="left">' . '' . $preformat['catandtitle'] . 
		 '' . '</td>' . '<td class="article-table" align="right">' . '' . _POSTEDBY . 
		 ': ' . $info['informant'] . '&nbsp;'; 
    // lets see if we can edit and delete article from this view
    if (pnSecAuthAction(0, 'Stories::Story', "$info[aid]:$info[cattitle]:$info[sid]", ACCESS_EDIT)) {
        echo '[ <a href="admin.php?module=NS-AddStory&amp;op=EditStory&amp;sid=' . $info['sid'] . '">' . _EDIT . '</a> ]';
        if (pnSecAuthAction(0, 'Stories::Story', "$info[aid]:$info[cattitle]:$info[sid]", ACCESS_DELETE)) {
            echo ' [ <a href="admin.php?module=NS-AddStory&amp;op=RemoveStory&amp;sid=' . $info['sid'] . '">' . _DELETE . '</a> ]';
        } 
    } 
    echo '</td>' . '</tr>' . '</table>' . 
	     '<table border="0" cellspacing="2" cellpadding="3" width="100%">' . 
		 '<tr>' . '<td class="article-table" align="left">' . 
		 '<span class="article-table-topic">' . $preformat['searchtopic'] . 
		 '</span>' . '<span class="article-table-text">' . $preformat['fulltext'] . 
		 '</span>' . '</td>' . '</tr>' . '</table>';
    CloseTable();
} 

function themesidebox($block)
{
    echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">' . 
	     '<tr>' . '<td align="left" valign="top">' . 
		 '<table width="100%" border="0" cellspacing="0" cellpadding="4">' . 
		 '<tr>' . '<td class="menu-title" nowrap><div class="border2">' . 
		 $block['title'] . '</div></td>' . '</tr>' . '</table>' . '</td>' . 
		 '</tr>' . '<tr>' . '<td align="left" valign="top">' . $block['content'] . 
		 '</td>' . '</tr>' . '</table>';
} 

?>