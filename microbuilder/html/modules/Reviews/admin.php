<?php
// File: $Id: admin.php,v 1.1 2004/03/01 10:09:02 mbertier Exp $ $Name:  $
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
// Original Author of file:
// Purpose of file:
// ----------------------------------------------------------------------

if (!eregi("admin.php", $PHP_SELF)) {
    die ("Access Denied");
}

$ModName = $module;

modules_get_language();
modules_get_manual();

/**
 * REVIEWS Block Functions
 */

function mod_main()
{
    list($title,
     $description) = pnVarCleanFromInput('title',
                         'description');

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $column = &$pntable['reviews_main_column'];
    $result = $dbconn->Execute("UPDATE $pntable[reviews_main]
                              SET $column[title]='".pnVarPrepForStore($title)."',
                                  $column[description]='".pnVarPrepForStore($description)."'");
    if($dbconn->ErrorNo()<>0) {
        error_log("ERROR: " . $dbconn->ErrorMsg());
    }
    pnRedirect('admin.php?module='.$GLOBALS['module'].'&op=reviews');
}

function reviews()
{
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    include ("header.php");
    GraphicAdmin();
    OpenTable();
    echo "<center><font class=\"pn-title\"><b>"._REVADMIN."</b></font></center>";
    CloseTable();

    $column = &$pntable['reviews_main_column'];
    $resultrm = $dbconn->Execute("SELECT $column[title], $column[description]
                                FROM $pntable[reviews_main]");
    list($title, $description) = $resultrm->fields;

    // Configuration
    if (pnSecAuthAction(0, 'Reviews::', '::', ACCESS_ADMIN)) {
        OpenTable();
        echo "<form action=\"admin.php\" method=\"post\">"
            ."<font class=\"pn-normal\">"._REVTITLE."<br>"
            ."<input type=\"text\" name=\"title\" value=\"$title\" size=\"50\" maxlength=\"100\"><br><br>"
            .""._REVDESC."<br>"
            ."<textarea name=\"description\" rows=\"10\" cols=\"80\">".pnVarPrepForDisplay($description)."</textarea><br><br>"
            ."<input type=\"hidden\" name=\"module\" value=\"".$GLOBALS['module']."\">"
            ."<input type=\"hidden\" name=\"op\" value=\"mod_main\">"
            ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
            ."<input type=\"submit\" value=\""._SAVECHANGES."\">"
            ."</font></form>";
        CloseTable();
    }

    // Waiting reviews
    if (pnSecAuthAction(0, 'Reviews::', '::', ACCESS_ADD)) {
        OpenTable();
        echo "<center><font class=\"pn-title\"><b>"._REVWAITING."</b></font><br>";
        $column = &$pntable['reviews_add_column'];
        $result = $dbconn->Execute("SELECT $column[id], $column[date], $column[title],
                                    $column[text], $column[reviewer], $column[email],
                                    $column[score], $column[url], $column[url_title],
                                    $column[language]
                                  FROM $pntable[reviews_add] ORDER BY $column[id]");
        if (!$result->EOF) {
            while(list($id, $date, $title, $text, $reviewer, $email, $score, $url, $url_title, $rlanguage) = $result->fields) {
                $result->MoveNext();
                echo "<form action=\"admin.php\" method=\"post\">"
                ."<hr noshade size=\"1\"><br><table border=\"0\" cellpadding=\"1\" cellspacing=\"2\">"
                ."<tr><td><b><font class=\"pn-normal\">"._REVIEWID.":</font></td><td><b><font class=\"pn-sub\">".pnVarPrepForDisplay($id)."</font></b></td></tr>"
                ."<input type=\"hidden\" name=\"id\" value=\"$id\">"
                ."<tr><td><font class=\"pn-normal\">"._DATE.":</font></td><td><input type=\"text\" name=\"date\" value=\"".pnVarPrepForDisplay($date)."\" size=\"11\" maxlength=\"10\"></td></tr>"
                ."<tr><td><font class=\"pn-normal\">"._PRODUCTTITLE.":</font></td><td><input type=\"text\" name=\"title\" value=\"".pnVarPrepForDisplay($title)."\" size=\"25\" maxlength=\"40\"></td></tr>"
                ."<tr><td><font class=\"pn-normal\">"._LANGUAGE.":</font></td><td>";

                lang_dropdown();

                echo "</td></tr><tr><td><font class=\"pn-normal\">"._TEXT.":</font></td><td><TEXTAREA name=\"text\" rows=\"10\" wrap=\"virtual\" cols=\"80\">".pnVarPrepHTMLDisplay($text)."</textarea></td></tr>"
                    ."<tr><td><font class=\"pn-normal\">"._REVIEWER."</font></td><td><input type=\"text\" name=\"reviewer\" value=\"".pnVarPrepForDisplay($reviewer)."\" size=\"41\" maxlength=\"40\"></td></tr>"
                    ."<tr><td><font class=\"pn-normal\">"._EMAIL.":</font></td><td><input type=\"text\" name=\"email\" value=\"".pnVarPrepForDisplay($email)."\" size=\"41\" maxlength=\"80\"></td></tr>"
                    ."<tr><td><font class=\"pn-normal\">"._SCORE."</font></td><td><input type=\"text\" name=\"score\" value=\"".pnVarPrepForDisplay($score)."\" size=\"3\" maxlength=\"2\"></td></tr><tr><td>";

                if ($url != "") {
                    echo "<tr><td><font class=\"pn-normal\">"._RELATEDLINK.":</font></td><td><input type=\"text\" name=\"url\" value=\"".pnVarPrepForDisplay($url)."\" size=\"25\" maxlength=\"100\"></td></tr>"
                        ."<tr><td><font class=\"pn-normal\">"._LINKTITLE.":</font></td><td><input type=\"text\" name=\"url_title\" value=\"".pnVarPrepForDisplay($url_title)."\" size=\"25\" maxlength=\"50\"></td></tr>";
                    }

                echo "<tr><td><font class=\"pn-normal\">"._IMAGE.":</font></td><td><input type=\"text\" name=\"cover\" size=\"25\" maxlength=\"100\"><br><i>"
                ._REVIMGINFO."</i></td></tr></table>"
                ."<input type=\"hidden\" name=\"module\" value=\"".$GLOBALS['module']."\">"
                ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
                ."<input type=\"hidden\" name=\"op\" value=\"add_review\"><input type=\"submit\" value=\""
                ._ADDREVIEW."\"> - [ <a href=\"admin.php?module=".$GLOBALS['module']."&op=delete_waiting_review&amp;id=$id\">"
                ._DELETE."</a> ]</form>";
            }
        } else {
            echo "<br><br><i><font class=\"pn-normal\">"._NOREVIEW2ADD."</font></i><br><br>";
        }
        echo "<a href=\"modules.php?op=modload&amp;name=Reviews&amp;file=index&amp;req=write_review\">"._CLICK2ADDREVIEW."</a></center>";
        CloseTable();
    }

    // Modify
    if (pnSecAuthAction(0, 'Reviews::', '::', ACCESS_EDIT)) {
        OpenTable();
        echo "<center><font class=\"pn-title\"><b>"._DELMODREVIEW."</b><br><br>"
            .""._MODREVINFO."</font></center>";
        CloseTable();
    }
    include 'footer.php';
}

function add_review()
{
    list($id,
     $date,
     $title,
     $text,
     $reviewer,
     $email,
     $score,
     $cover,
     $url,
     $url_title,
     $rlanguage) = pnVarCleanFromInput('id',
                       'date',
                       'title',
                       'text',
                       'reviewer',
                       'email',
                       'score',
                       'cover',
                       'url',
                       'url_title',
                       'rlanguage');

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    if (!(pnSecAuthAction(0, 'Reviews::', '::', ACCESS_ADD))) {
        include 'header.php';
        echo _REVIEWSADDNOAUTH;
        include 'footer.php';
        return;
    }

    $column = &$pntable['reviews_column'];
    $nextid = $dbconn->GenId($pntable['reviews']);
    $result = $dbconn->Execute("INSERT INTO $pntable[reviews] ($column[id],
                                $column[date], $column[title], $column[text],
                                $column[reviewer], $column[email], $column[score],
                                $column[cover], $column[url], $column[url_title],
                                $column[hits], $column[language])
                              VALUES ($nextid, '".pnVarPrepForStore($date)."', '".pnVarPrepForStore($title)."', '".pnVarPrepForStore($text)."', '".pnVarPrepForStore($reviewer)."',
                                '".pnVarPrepForStore($email)."', '".pnVarPrepForStore($score)."', '".pnVarPrepForStore($cover)."', '".pnVarPrepForStore($url)."', '".pnVarPrepForStore($url_title)."',
                                '1', '$rlanguage')");
    if($dbconn->ErrorNo()<>0) {
        error_log("ERROR inserting review: " . $dbconn->ErrorMsg());
    }
    else {
        $result = $dbconn->Execute("DELETE FROM $pntable[reviews_add]
                                  WHERE {$pntable['reviews_add_column']['id']} = '".pnVarPrepForStore($id)."'");
        if($dbconn->ErrorNo()<>0) {
            error_log("ERROR deleting queued review: " . $dbconn->ErrorMsg());
        }
    }
    pnRedirect('admin.php?module='.$GLOBALS['module'].'&op=reviews');
}

function ReviewsDelNew()
{
    $id = pnVarCleanFromInput('id');

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    if (!pnSecAuthAction(0, 'Reviews::', '::', ACCESS_DELETE)) {
        include 'header.php';
        echo _REVIEWSDELNOAUTH;
        CloseTable();
        include 'footer.php';
        return;
    }

    $result = $dbconn->Execute("DELETE FROM $pntable[reviews_add] WHERE {$pntable['reviews_add_column']['id']} = '".pnVarPrepForStore($id)."'");
    if($dbconn->ErrorNo()<>0) {
            error_log("ERROR deleting queued review: " . $dbconn->ErrorMsg());
    }

    pnRedirect('admin.php?module='.$GLOBALS['module'].'&op=reviews');
}

function reviews_admin_main($var)
{
   $op = pnVarCleanFromInput('op');
   extract($var);

   if (!(pnSecAuthAction(0, 'Reviews::', '::', ACCESS_EDIT))) {
       include 'header.php';
       echo _REVIEWSNOAUTH;
       include 'footer.php';
   } else {
       switch ($op){

        case "reviews":
            reviews();
            break;

        case "delete_waiting_review":
            ReviewsDelNew();
            break;

        case "add_review":
            add_review();
            break;

        case "mod_main":
            mod_main();
            break;
        default:
            reviews();
        break;
       }
   }
}
?>