<?php // $Id: index.php,v 1.1 2004/03/01 10:09:06 mbertier Exp $ $Name:  $
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
// Filename: modules/Recommed_Us/index.php
// Original Author: Francisco Burzi
// Purpose: Recommend site/send articles to 'friends'
// ----------------------------------------------------------------------

if (!defined("LOADED_AS_MODULE")) {
         die ("You can't access this file directly...");
     }

$ModName = basename(dirname(__FILE__));

modules_get_language();

function FriendSend($sid)
{
   // global $ModName, $cattitle;

    $ModName = $GLOBALS['ModName'];
    if (isset($GLOBALS['cattitle'])) {
	    $cattitle = $GLOBALS['cattitle'];
	}
	
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    if(pnUserLoggedIn()) {
		$uid = pnUserGetVar('uid');
		$uname = pnUserGetVar('uname');
    } else {
    	$uid = 1;
        $uname = pnConfigGetVar('anonymous');
    }

    include ("header.php");

    if(empty($sid) || !is_numeric($sid)) {
        echo _MODARGSERROR;
        include 'footer.php';
        exit;
    }


    if (!pnSecAuthAction(0, 'Recommend us::', '::', ACCESS_READ)) {
        echo _RECOMMENDUSNOAUTH;
        include 'footer.php';
        return;
    }

	/* that's not enough due to the permission check!
    $column = &$pntable['stories_column'];
    $result=$dbconn->Execute("SELECT $column[title] FROM $pntable[stories] WHERE $column[sid]='".pnVarPrepForStore($sid)."'");
    list($title) = $result->fields;
	*/

    // grab the actual story from the database
    $column = &$pntable['stories_column'];
    $result = $dbconn->Execute("SELECT $column[title],
                                     $column[topic],
                                     $column[cid],
                                     $column[aid]
                              FROM $pntable[stories] where $column[sid] = '".pnVarPrepForStore($sid)."'");
    list($title, $topic, $cid, $aid) = $result->fields;

	// Get data for "autorise check"
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
	
    if (!pnSecAuthAction(0, 'Recommend us::', '::', ACCESS_READ) || !pnSecAuthAction(0, 'Stories::Story', "$aid:$cattitle:$sid", ACCESS_READ) ||
!pnSecAuthAction(0, 'Topics::Topic', "$topicname::$topic", ACCESS_READ) ) {
        echo _RECOMMENDUSNOAUTH;
        include 'footer.php';
        return;
    }

    OpenTable();
    echo "<font class=\"pn-title\">"._FRIEND."</font><br /><br />"
    ."<font class=\"pn-normal\">"._YOUSENDSTORY." <font class=\"pn-title\">" . pnVarPrepForDisplay($title) . "<br />(".pnVarPrepHTMLDisplay($cattitle)." / ".pnVarPrepHTMLDisplay($topictext).")</font><font class=\"pn-normal\"> "._TOAFRIEND."</font>"
    ."<form action=\"modules.php\" method=\"post\">"
    ."<input type=\"hidden\" name=\"op\" value=\"modload\">"
    ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">"
    ."<input type=\"hidden\" name=\"file\" value=\"index\">"
    ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
    ."<input type=\"hidden\" name=\"sid\" value=\"$sid\">";

    $yn = $ye = "";
    if (pnUserLoggedIn()) {
        //$uid = pnUserGetVar('uid');
        //$column = &$pntable['users_column'];
        //$result=$dbconn->Execute("select $column[name], $column[email] from $pntable[users] WHERE $column[uid]='".pnVarPrepForStore($uid)."'");
        // let's use the API for that kind of stuff...
        //list($yn, $ye) = $result->fields;
        $yn = pnUserGetVar('name');
        $ye = pnUserGetVar('email');
    }
    echo "<font class=\"pn-normal\">"._FYOURNAME." </font> <input type=\"text\" name=\"yname\" value=\"$yn\"><br>\n"
    ."<font class=\"pn-normal\">"._FYOUREMAIL." </font> <input type=\"text\" name=\"ymail\" value=\"$ye\"><br><br>\n"
    ."<font class=\"pn-normal\">"._FFRIENDNAME." </font> <input type=\"text\" name=\"fname\"><br>\n"
    ."<font class=\"pn-normal\">"._FFRIENDEMAIL." </font> <input type=\"text\" name=\"fmail\"><br><br>\n"
    ."<input type=\"hidden\" name=\"req\" value=\"SendStory\">\n"
    ."<input type=\"submit\" value="._SEND.">\n"
    ."</form>\n";
    CloseTable();
    include ('footer.php');
}

function SendStory($sid, $yname, $ymail, $fname, $fmail)
{
   // global $ModName, $cattitle;

    $ModName = $GLOBALS['ModName'];
    //$cattitle = $GLOBALS['cattitle'];

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    if(pnUserLoggedIn()) {
		$uid = pnUserGetVar('uid');
    	$uname = pnUserGetVar('uname');
    } else {
  		$uid = 1;
		$uname = pnConfigGetVar('anonymous');
	}
    $sitename = pnConfigGetVar('sitename');

    if (!pnSecAuthAction(0, 'Recommend us::', '::', ACCESS_READ)) {
		include 'header.php';
		echo _RECOMMENDUSNOAUTH;
        include 'footer.php';
        return;
    }

    if (!pnSecConfirmAuthKey()) {
        include 'header.php';
        echo _BADAUTHKEY;
        include 'footer.php';
        return;
    }

	/* that's not enough due to permission check
    $column = &$pntable['stories_column'];
    $result2=$dbconn->Execute("SELECT $column[title], $column[time], $column[topic] FROM $pntable[stories] WHERE $column[sid]='".pnVarPrepForStore($sid)."'");
    list($title, $time, $topic) = $result2->fields;
	*/
	
    // grab the actual story from the database
    $column = &$pntable['stories_column'];
    $result = $dbconn->Execute("SELECT $column[title],
    								 $column[time],
                                     $column[topic],
                                     $column[cid],
                                     $column[aid]
                              FROM $pntable[stories] where $column[sid] = '".pnVarPrepForStore($sid)."'");
    list($title, $time, $topic, $cid, $aid) = $result->fields;

	// Get data for "autorise check"
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
	
    if (!pnSecAuthAction(0, 'Recommend us::', '::', ACCESS_READ) || !pnSecAuthAction(0, 'Stories::Story', "$aid:$cattitle:$sid", ACCESS_READ) ||
!pnSecAuthAction(0, 'Topics::Topic', "$topicname::$topic", ACCESS_READ) ) {
        echo _RECOMMENDUSNOAUTH;
        include 'footer.php';
        return;
    }

    // Security checks
    // 1) the name isn't too long
    if (strlen($fname)>25 || strlen($yname)>25) {
        include 'header.php';
        echo _NAMETOOLONG;
        include 'footer.php';
        return;
    }

    // 2) the fmail is valid
    $valid = pnVarValidate($fmail, 'email');
    if ($valid == false) {
        include 'header.php';
        echo _EMAILWRONG;
        include 'footer.php';
        return;
    }

    // 3) the ymail is valid
    $valid = pnVarValidate($ymail, 'email');
    if ($valid == false) {
        include 'header.php';
        echo _EMAILWRONG;
        include 'footer.php';
        return;
    }

    // convert time
        $formatted_time = ml_ftime(_DATETIMELONG, $dbconn->UnixTimestamp($time));


    $column = &$pntable['topics_column'];
    $result3=$dbconn->Execute("SELECT $column[topictext] FROM $pntable[topics] WHERE $column[topicid]='".pnVarPrepForStore($topic)."'");
    list($topictext) = $result3->fields;

    $newlang = pnSessionGetVar('lang');

    $subject = ""._INTERESTING." $sitename";
    $message = ""._HELLO." $fname\r\n"
    		   ._YOURFRIEND." $yname "._CONSIDERED."\r\n\n$title\n"
               ."($cattitle / $topictext)\r\n"
			   ._FDATE." $formatted_time\n\n"
               ._URL.": " . pnGetBaseURL()
               . "modules.php?op=modload&name=News&file=article&sid=$sid&newlang=$newlang\r\n\n"
               ._YOUCANREAD." $sitename\n" . pnGetBaseURL();
// 11-09-01 eugeniobaldi not compliant with PHP < 4.0.5
//    pnMail($fmail, $subject, $message, "From: \"$yname\" <$ymail>\nX-Mailer: PHP/" . phpversion(), "-f$yname");
    pnMail($fmail, $subject, $message, "From: \"$yname\" <$ymail>\nX-Mailer: PHP/" . phpversion());
    $title = urlencode($title);
    $fname = urlencode($fname);

    pnRedirect("modules.php?op=modload&name=$ModName&file=index&req=StorySent&title=$title&fname=$fname");
}

function StorySent($title, $fname)
{

    include ("header.php");
    $title = urldecode($title);
    $fname = urldecode($fname);
    OpenTable();
    echo "<center><font class=\"pn-normal\">"._FSTORY." <b>".pnVarPrepForDisplay($title)."</b> "._HASSENT." ".pnVarPrepForDisplay($fname)."... "._THANKS."</font></center>";
    CloseTable();
    include ("footer.php");
}

function RecommendSite()
{
 //   global $ModName;

  $ModName = $GLOBALS['ModName'];

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    include ("header.php");
    OpenTable();

    if (!pnSecAuthAction(0, 'Recommend us::', '::', ACCESS_READ)) {
        echo _RECOMMENDUSNOAUTH;
        CloseTable();
        include 'footer.php';
        return;
    }
        echo "<center><font class=\"pn-pagetitle\">"._RECOMMEND."</font></center>";

    CloseTable();

    OpenTable();
    echo ""
    ."<form action=\"modules.php\" method=\"post\">"
    ."<input type=\"hidden\" name=\"op\" value=\"modload\">"
    ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">"
    ."<input type=\"hidden\" name=\"file\" value=\"index\">"
    ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
    ."<input type=\"hidden\" name=\"req\" value=\"SendSite\">";

    $yn = $ye = "";
    if (pnUserLoggedIn()) {
        $uid = pnUserGetVar('uid');
        $column = &$pntable['users_column'];
        $result=$dbconn->Execute("SELECT $column[name], $column[email] FROM $pntable[users] WHERE $column[uid]='".pnVarPrepForStore($uid)."'");
        //ADODBtag list+row
        list($yn, $ye) = $result->fields;
    }
    echo "
    <table>
      <tr>
        <td>
      <font class=\"pn-normal\">"._FYOURNAME." </font>
    </td>
    <td><input type=\"text\" name=\"yname\" value=\"$yn\" SIZE=\"25\" MAXLENGTH=\"25\">
      </tr>
      <tr>
        <td>
      <font class=\"pn-normal\">"._FYOUREMAIL." </font>
    </td>
    <td>
      <input type=\"text\" name=\"ymail\" value=\"$ye\" SIZE=\"25\">
    </td>
      </tr>
      <tr>
        <td>
      <font class=\"pn-normal\">"._FFRIENDNAME." </font>
    </td>
    <td>
      <input type=\"text\" name=\"fname\" SIZE=\"25\" MAXLENGTH=\"25\">
    </td>
      </tr>
      <tr>
        <td>
      <font class=\"pn-normal\">"._FFRIENDEMAIL." </font>
    </td>
    <td>
      <input type=\"text\" name=\"fmail\" SIZE=\"25\">
    </td>
      </tr>
      <tr>
        <td colspan=\"2\">
      <input type=\"submit\" value="._SEND.">
    </td>
      </tr>\n
    </table>
    </form>";
    CloseTable();
    include ('footer.php');
}

function SendSite($yname, $ymail, $fname, $fmail)
{
   // global $ModName;

   $ModName = $GLOBALS['ModName'];


    $sitename = pnConfigGetVar('sitename');
    $slogan = pnConfigGetVar('slogan');

    if (!pnSecAuthAction(0, 'Recommend us::', '::', ACCESS_READ)) {
        include 'header.php';
        echo _RECOMMENDUSNOAUTH;
        include 'footer.php';
        return;
    }

    if (!pnSecConfirmAuthKey()) {
        include 'header.php';
        echo _BADAUTHKEY;
        include 'footer.php';
        return;
    }

    // Security checks
    // 1) the name isn't too long
    if (strlen($fname)>25 || strlen($yname)>25) {
        include 'header.php';
        echo _NAMETOOLONG;
        include 'footer.php';
        return;
    }

    // 2) the fmail is valid
    if (!pnVarValidate($fmail, 'email')) {
        include 'header.php';
        echo _EMAILWRONG;
        include 'footer.php';
        return;
    }

    // 3) the ymail is valid
    if (!pnVarValidate($ymail, 'email')) {
        include 'header.php';
        echo _EMAILWRONG;
        include 'footer.php';
        return;
    }

    $subject = ""._INTSITE." $sitename";
    $message = ""._HELLO." $fname:\r\n"._YOURFRIEND." $yname "._OURSITE." $sitename "._INTSENT."\r\n\n"._FSITENAME." $sitename\n$slogan\n"._FSITEURL. pnGetBaseURL() . "\n";
    pnMail($fmail, $subject, $message, "From: \"$yname\" <$ymail>\nX-Mailer: PHP/" .phpversion());

    $fname = urlencode($fname);
    pnRedirect("modules.php?op=modload&name=$ModName&file=index&req=SiteSent&fname=$fname");
}

function SiteSent($fname)
{
    $fname = urldecode($fname);

    include ('header.php');
    OpenTable();
    echo "<center><font class=\"pn-normal\">"._FREFERENCE." ".pnVarPrepForDisplay($fname)."...<br><br>"._THANKSREC."</font></center>";
    CloseTable();
    include ('footer.php');
}

if(empty($req)) {
    $req = '';
}

switch($req) {

    case "SendStory":
        list($sid, $yname, $ymail, $fname, $fmail) = pnVarCleanFromInput('sid', 'yname', 'ymail', 'fname', 'fmail');
        SendStory($sid, $yname, $ymail, $fname, $fmail);
        break;

    case "StorySent":
        list($title, $fname) = pnVarCleanFromInput('title', 'fname');
        StorySent($title, $fname);
        break;

    case "SendSite":
        list($yname, $ymail, $fname, $fmail) = pnVarCleanFromInput('yname', 'ymail', 'fname', 'fmail');
        SendSite($yname, $ymail, $fname, $fmail);
        break;

    case "SiteSent":
        $fname = pnVarCleanFromInput('fname');
        SiteSent($fname);
        break;

    case "FriendSend":
        $sid = pnVarCleanFromInput('sid');
        FriendSend($sid);
        break;

    default:
        RecommendSite();
        break;

}
?>