<?php
// File: $Id: print.php,v 1.1 2004/03/01 10:08:57 mbertier Exp $ $Name:  $
// ----------------------------------------------------------------------
// POSTNUKE Content Management System
// Copyright (C) 2001 by the PostNuke Development Team.
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
// Original Author of file: Francisco Burzi
// Purpose of file: Displays a printer friendly (story) page
// ----------------------------------------------------------------------

include 'includes/pnAPI.php';
pnInit();
include 'includes/legacy.php';
// eugenio themeover 20020413
// pnThemeLoad();


if(!isset($sid)  || !is_numeric($sid)) {
        include 'header.php';
        echo _MODARGSERROR;
        include 'footer.php';
        exit;
    }

if (!pnLocalReferer() && pnConfigGetVar('refereronprint')) {
    pnRedirect("modules.php?op=modload&name=News&file=article&sid=$sid");
    exit;
}

function PrintPage($sid) {
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();
    // grab the actual story from the database
    $column = &$pntable['stories_column'];
    $result = $dbconn->Execute("SELECT $column[title],
                                     $column[time],
                                     $column[hometext],
                                     $column[bodytext],
                                     $column[topic],
                                     $column[notes],
                                     $column[cid],
                                     $column[aid]
                              FROM $pntable[stories] where $column[sid] = '".pnVarPrepForStore($sid)."'");
    list($title, $time, $hometext, $bodytext, $topic, $notes, $cid, $aid) = $result->fields;

	if (!isset($title) || $title == '') {
        include 'header.php';
        echo _DBSELECTERROR;
        include 'footer.php';
        exit;
    }

    if ($dbconn->ErrorNo() != 0) {
        include 'header.php';
        echo _DBSELECTERROR;
        include 'footer.php';
        exit;
    }

    // Get data for "autorise check"
    // Just a temp. solution; 
    // Print.php needs completely redesign by using getArticles() and genArticleInfo()
	// fix for Stories::Story, Topics::Topic [larsneo]
	
	// find out the cattitle
	if ($cid == 0) {
		// Default category
		$cattitle = ""._ARTICLES."";
	} else {
		$catcolumn = &$pntable['stories_cat_column'];
		$catquery = buildSimpleQuery('stories_cat', array('title'), "$catcolumn[catid] = $cid");
		$catresult = $dbconn->Execute($catquery);
		list($cattitle) = $catresult->fields;
	}

	// find out the topictext
	$topicscolumn = &$pntable['topics_column'];
	$topicquery = buildSimpleQuery('topics', array('topictext', 'topicname'), "$topicscolumn[topicid] = $topic");
	$topicresult = $dbconn->Execute($topicquery);
	list($topictext, $topicname) = $topicresult->fields;
	
	if ((pnSecAuthAction(0, 'Stories::Story', "$aid:$cattitle:$sid", ACCESS_READ)) && (pnSecAuthAction(0, 'Topics::Topic', "$topicname::$topic", ACCESS_READ))) {	
	// user is authorised to view Stories::Story and Topics::Topic
	// Increment the read counter
    $column = &$pntable['stories_column'];
    $dbconn->Execute("UPDATE $pntable[stories] SET $column[counter]=$column[counter]+1 WHERE $column[sid]='".pnVarPrepForStore($sid)."'");

	$time=$result->UnixTimeStamp($time);

    $cWhereIsPerso = WHERE_IS_PERSO;

    if (!empty($cWhereIsPerso)) {
        include("modules/NS-Multisites/print.inc.php");
    } else {
        $themesarein = "";

        $ThemeSel = pnUserGetTheme();
    }

    /* with this code there's no output if wiki is removed [larsneo]
    pnModAPILoad('Wiki', 'user');
    list($title,
         $hometext,
         $bodytext,
         $notes) = pnModAPIFunc('wiki',
                                'user',
                                'transform',
                                array('objectid' => $sid,
                                      'extrainfo' => array($title,
                                                           $hometext,
                                                           $bodytext,
                                                           $notes)));
	*/
	
	// call hooks
	list($title,
         $hometext,
         $bodytext,
         $notes) = pnModCallHooks('item', 'transform', '', array($title,
                                                           		$hometext,
                                                           		$bodytext,
                                                           		$notes));

    echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">\n"
        ."<html>\n"
        ."<head><title>" . pnConfigGetVar('sitename') . "</title>\n";

    if (defined("_CHARSET") && _CHARSET != "") {
        echo "<META HTTP-EQUIV=\"Content-Type\" ".
            "CONTENT=\"text/html; charset="._CHARSET."\">\n";
    }

	//changed to local stylesheet
    //echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".$themesarein."themes/$ThemeSel/style/style.css\">";
    echo "<style type=\"text/css\">\n"
        ."<!--\n"
		.".print-title {\n"
		."background-color: transparent;\n"
		."color: #990000;\n"
		."font-family: Verdana, Arial, sans-serif;\n"
		."font-size: 14px;\n"
		."font-weight: bold;\n"
		."text-decoration: none;\n"
		."}\n"
		.".print-sub {\n"
		."background-color: transparent;\n"
		."color: #000000;\n"
		."font-family: Verdana, Arial, sans-serif;\n"
		."font-size: 11px;\n"
		."font-weight: normal;\n"
		."text-decoration: none;\n"
		."}\n"
		.".print-normal {\n"
		."background-color: transparent;\n"
		."color: #000000;\n"
		."font-family: Verdana, Arial, sans-serif;\n"
		."font-size: 12px;\n"
		."font-weight: normal;\n"
		."text-decoration: none;\n"
		."}\n"
        .".print {\n"  
        ."color: #000000;\n" 
        ."background-color: #FFFFFF;\n"
        ."}\n"
        ."-->\n"
        ."</style>\n";

    echo "</head>\n"
    	."<body class=\"print\" bgcolor=\"#FFFFFF\" text=\"#000000\">\n"
    	."\n<table border=\"0\" width=\"85%\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#FFFFFF\">\n"
    	."<tr><td>\n"
    	."<table border=\"0\" width=\"100%\" cellpadding=\"5\" cellspacing=\"1\" bgcolor=\"#FFFFFF\">\n"
        ."<tr><td>\n"
    	."<img src=\"".WHERE_IS_PERSO."images/" . pnConfigGetVar('site_logo') . "\" border=\"0\" alt=\"".pnConfigGetVar('sitename')."\">\n"
        ."<br /><br />\n"
    	."<b><font class=\"print-title\">" . pnVarPrepHTMLDisplay($title) . "</font></b><br /><br />\n"
    	."<font class=\"print-sub\">".pnVarPrepHTMLDisplay($cattitle)." / ".pnVarPrepHTMLDisplay($topictext)."<br />\n"
		."<b>"._DATE.":</b> ".ml_ftime(_DATETIMEBRIEF,$time)."</font>\n"
        ."</td></tr>\n"
        ."<tr><td>\n"
    	."<font class=\"print-normal\">"
		. pnVarPrepHTMLDisplay($hometext) . "<br /><br />\n";

    	if (!empty($bodytext)) {
			echo pnVarPrepHTMLDisplay($bodytext) . "<br />\n";
		}
		if (!empty($notes)) {
			echo pnVarPrepHTMLDisplay($notes) . "<br />\n";
    	} else {
        	echo "<br />\n";
    	}

    echo "</font>\n"
    	."</td></tr>\n"
    	."<tr><td>\n"
    	."<hr size=\"1\"><font class=\"print-normal\">\n"
    	.""._COMESFROM." " . pnConfigGetVar('sitename') . "<br />\n"
    	."<a class=\"print-normal\" href=\"" . pnGetBaseURL() . "\">"
    	.pnGetBaseURL()
    	."</a>\n"
    	."<br /><br />\n"
    	.""._THEURL.""
    	."<br />\n"
    	."<a class=\"print-normal\" href=\"" . pnGetBaseURL() . "modules.php?op=modload&amp;name=News&amp;file=article&amp;sid=$sid\">"
    	. pnGetBaseURL() . "modules.php?op=modload&amp;name=News&amp;file=article&amp;sid=$sid"
    	."</a>\n"
    	."</font>\n"
    	."</td></tr>\n"
    	."</table>\n</td></tr>\n</table>\n"
    	."</body>\n"
    	."</html>\n";
    } else {
    	// user is not authorised to view Stories::Story and Topics::Topic
    	include 'header.php';
    	echo _BADAUTHKEY;
    	include 'footer.php';
    	exit;
    }

}

PrintPage($sid);

?>