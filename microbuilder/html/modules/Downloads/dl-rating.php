<?php
// File: $Id: dl-rating.php,v 1.1 2004/03/01 10:09:05 mbertier Exp $ $Name:  $
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
// Original Author of file: Francisco Burzi
// Purpose of file:
// ----------------------------------------------------------------------

/**
 * @usedby index
 */
function rateinfo($lid) {

    if (!isset($lid) || !is_numeric($lid)){
        pnSessionSetVar('errormsg', _MODARGSERROR);
        return false;
    }

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $itemname = downloads_ItemNameFromIID($lid);
    $catname = downloads_CatNameFromIID($lid);
    if (!(pnSecAuthAction(0, 'Downloads::Item', "$itemname:$catname:$lid", ACCESS_COMMENT))) {
        echo _DOWNLOADSACCESSNOAUTH;
        include 'footer.php';
        return;
    }

    $column = &$pntable['downloads_downloads_column'];
    $dbconn->Execute("UPDATE $pntable[downloads_downloads]
                    SET $column[hits] =$column[hits]+1
                    WHERE $column[lid]='".(int)pnVarPrepForStore($lid)."'");
    $result = $dbconn->Execute("SELECT $column[url]
                              FROM $pntable[downloads_downloads]
                              WHERE $column[lid]='".(int)pnVarPrepForStore($lid)."'");
    list($url) = $result->fields;
    Header("Location: ".$url);
}

/**
 *@usedby index, navigation
 */
function addrating($ratinglid, $ratinguser, $rating, $ratinghost_name, $ratingcomments)
{

    if (!isset($ratinglid) || !is_numeric($ratinglid)){
        pnSessionSetVar('errormsg', _MODARGSERROR);
        return false;
    }

    $anonymous = pnConfigGetVar('anonymous');

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $passtest = "yes";
    include("header.php");
    include(WHERE_IS_PERSO."config.php");


    $itemname = downloads_ItemNameFromIID($ratinglid);
    $catname = downloads_CatNameFromIID($ratinglid);
    if(!isset($lid)) $lid = '';
    if (!(pnSecAuthAction(0, 'Downloads::Item', "$itemname:$catname:$lid", ACCESS_COMMENT))) {
        echo _DOWNLOADSACCESSNOAUTH;
        include 'footer.php';
        return;
    }

    completevoteheader();
    if (pnUserLoggedIn()) {
        $ratinguser = pnUserGetVar('uname');
    } else if ($ratinguser=="outside") {
        $ratinguser = "outside";
    } else {
        $ratinguser = pnConfigGetVar("anonymous");
    }
    $column = &$pntable['downloads_downloads_column'];
    $results3 = $dbconn->Execute("SELECT $column[title]
                                FROM $pntable[downloads_downloads]
                                WHERE $column[lid]='".(int)pnVarPrepForStore($ratinglid)."'");
   while(list($title)=$results3->fields)   {
        $ttitle = $title;
        $results3->MoveNext();
    }
    /* Make sure only 1 anonymous from an IP in a single day. */
    $ip = getenv("REMOTE_HOST");
    if (empty($ip)) {
       $ip = getenv("REMOTE_ADDR");
    }
    /* Check if Rating is Null */
    if ($rating=="--") {
        $error = "nullerror";
        completevote($error);
        $passtest = "no";
    }
    /* Check if Download POSTER is voting (UNLESS Anonymous users allowed to post) */
    if ($ratinguser != $anonymous && $ratinguser != "outside") {
        $column = &$pntable['downloads_downloads_column'];
        $result=$dbconn->Execute("SELECT $column[submitter]
                                FROM $pntable[downloads_downloads]
                                WHERE $column[lid]='".(int)pnVarPrepForStore($ratinglid)."'");
        while(list($ratinguserDB)=$result->fields) {

            $result->MoveNext();
            if ($ratinguserDB==$ratinguser) {
                $error = "postervote";
                completevote($error);
                $passtest = "no";
            }
        }
    }
    /* Check if REG user is trying to vote twice. */
    if ($ratinguser!=$anonymous && $ratinguser != "outside") {
        $column = &$pntable['downloads_votedata_column'];
        $result=$dbconn->Execute("SELECT $column[ratinguser] FROM $pntable[downloads_votedata] WHERE $column[ratinglid]='".(int)pnVarPrepForStore($ratinglid)."'");
        while(list($ratinguserDB)=$result->fields) {

            $result->MoveNext();
            if ($ratinguserDB==$ratinguser) {
                $error = "regflood";
                completevote($error);
                $passtest = "no";
            }
        }
    }
    /* Check if ANONYMOUS user is trying to vote more than once per day. */
    if ($ratinguser==$anonymous){
        $yesterdaytimestamp = (time()-(86400 * $anonwaitdays));
        $ytsDB = Date("Y-m-d H:i:s", $yesterdaytimestamp);
        $column = &$pntable['downloads_votedata_column'];
/* cocomp 2002/07/13 removed mysql specific TO_DAYS(NOW() etc moved to cross db
 * compatible version
        $result=$dbconn->Execute("SELECT count(*)
                                FROM $pntable[downloads_votedata]
                                WHERE $column[ratinglid]='".(int)pnVarPrepForStore($ratinglid)."'
                                   AND $column[ratinguser]='".pnVarPrepForStore($anonymous)."'
                                   AND $column[ratinghostname] = '".pnVarPrepForStore($ip)."'
                                   AND TO_DAYS(NOW()) - TO_DAYS(".pnVarPrepForStore($column['ratingtimestamp']).") < '".pnVarPrepForStore($anonwaitdays)."'");
*/
        $sql = "SELECT count(*)
                FROM $pntable[downloads_votedata]
                WHERE $column[ratinglid]='".pnVarPrepForStore($ratinglid)."'
                AND $column[ratinguser]='".pnVarPrepForStore($anonymous)."'
                AND $column[ratinghostname] = '".pnVarPrepForStore($ip)."'
                AND (".$dbconn->DBTimestamp(time() - $column['ratingtimestamp'])
                . " < '" . pnVarPrepForStore($anonwaitdays * 86400) . "')";
        $result = $dbconn->Execute($sql);
        list($anonvotecount) = $result->fields;
        if ($anonvotecount >= 1) {
            $error = "anonflood";
            completevote($error);
            $passtest = "no";
        }
    }
    /* Check if OUTSIDE user is trying to vote more than once per day. */
    if ($ratinguser=="outside"){
        $yesterdaytimestamp = (time()-(86400 * $outsidewaitdays));
        $ytsDB = Date("Y-m-d H:i:s", $yesterdaytimestamp);
        $column = &$pntable['downloads_votedata_column'];
/* cocomp 2002/07/13 removed mysql specific TO_DAYS(NOW() etc moved to cross db
 * compatible version
        $result=$dbconn->Execute("SELECT count(*) FROM $pntable[downloads_votedata]
                                WHERE $column[ratinglid]='".(int)pnVarPrepForStore($ratinglid)."'
                                   AND $column[ratinguser]='outside'
                                   AND $column[ratinghostname] = '".pnVarPrepForStore($ip)."'
                                   AND TO_DAYS(NOW()) - TO_DAYS(".pnVarPrepForStore($column['ratingtimestamp']).") < '".pnVarPrepForStore($outsidewaitdays)."'");
*/
        $sql = "SELECT count(*) FROM $pntable[downloads_votedata]
                WHERE $column[ratinglid]='".pnVarPrepForStore($ratinglid)."'
                AND $column[ratinguser] = 'outside'
                AND $column[ratinghostname] = '" . pnVarPrepForStore($ip) . "'
                AND (" . $dbconn->DBTimestamp(time() - $column['ratingtimestamp'])
                . " < '" . pnVarPrepForStore($anonwaitdays * 86400) . "')";
        $result = $dbconn->Execute($sql);
        list($outsidevotecount) = $result->fields;
        if ($outsidevotecount >= 1) {
            $error = "outsideflood";
            completevote($error);
            $passtest = "no";
        }
    }
    /* Passed Tests */
    if ($passtest == "yes") {
        /* All is well.  Add to Line Item Rate to DB. */
         $column = &$pntable['downloads_votedata_column'];
// cocomp 2002/07/13 converted to use GenID instead of NULL id insert
// removed NOW() to cross db compatible DBTimestamp
        $votetable = $pntable['downloads_votedata'];
        $bid = $dbconn->GenID($votetable);
         $dbconn->Execute("INSERT INTO $votetable
                         ($column[ratingdbid], $column[ratinglid],
                         $column[ratinguser], $column[rating],
                         $column[ratinghostname], $column[ratingcomments],
                         $column[ratingtimestamp])
                         VALUES (" . (int)pnVarPrepForStore($bid) . ",
                                                                  ".(int)pnVarPrepForStore($ratinglid).", '".pnVarPrepForStore($ratinguser)."', '".pnVarPrepForStore($rating)."',
                                     '".pnVarPrepForStore($ip)."', '".pnVarPrepForStore($ratingcomments)."',
                                                                 " . $dbconn->DBTimestamp(time()) . ")");
        /* All is well.  Calculate Score & Add to Summary (for quick retrieval & sorting) to DB. */
        /* NOTE: If weight is modified, ALL downloads need to be refreshed with new weight. */
        /*   Running a SQL statement with your modded calc for ALL downloads will accomplish this. */
        $voteresult = $dbconn->Execute("SELECT $column[rating], $column[ratinguser],
                                      $column[ratingcomments]
                                      FROM $pntable[downloads_votedata]
                                      WHERE $column[ratinglid] = '".(int)pnVarPrepForStore($ratinglid)."'");
        $totalvotesDB = $voteresult->PO_RecordCount();
        $finalrating = calculateVote($voteresult, $totalvotesDB);
                $commresult = $dbconn->Execute("SELECT $column[ratingcomments]
                                                                                FROM $pntable[downloads_votedata]
                                                                                WHERE $column[ratinglid] = '".pnVarPrepForStore($ratinglid)."'
                                                                                AND $column[ratingcomments] != ''");
                $truecomments = $commresult->PO_RecordCount();
        $column = &$pntable['downloads_downloads_column'];
        $dbconn->Execute("UPDATE $pntable[downloads_downloads]
                        SET $column[downloadratingsummary] = ".pnVarPrepForStore($finalrating).",
                            $column[totalvotes] = ".pnVarPrepForStore($totalvotesDB).",
                            $column[totalcomments] = ".pnVarPrepForStore($truecomments)."
                        WHERE $column[lid] = '".(int)pnVarPrepForStore($ratinglid)."'");
        $error = "none";
        completevote($error);
    }
    if ($error == "none")
    {
    completevotefooter($ratinglid, $ttitle, $ratinguser);
    }
    CloseTable();
    include("footer.php");
}

function completevoteheader() {
    menu(1);

    OpenTable();
}

function completevotefooter($lid, $ttitle, $ratinguser)
{
    if (!isset($lid) || !is_numeric($lid)){
        pnSessionSetVar('errormsg', _MODARGSERROR);
        return false;
    }

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $itemname = downloads_ItemNameFromIID($lid);
    $catname = downloads_CatNameFromIID($lid);
    if (!(pnSecAuthAction(0, 'Downloads::Item', "$itemname:$catname:$lid", ACCESS_COMMENT))) {
        echo _DOWNLOADSACCESSNOAUTH;
        include 'footer.php';
        return;
    }

    $column = &$pntable['downloads_downloads_column'];
    $result=$dbconn->Execute("SELECT $column[url]
                            FROM $pntable[downloads_downloads]
                            WHERE $column[lid]='".(int)pnVarPrepForStore($lid)."'");
    list($url)=$result->fields;
    echo "<center><font class=\"pn-normal\">"._THANKSTOTAKETIME.' '.pnConfigGetVar('sitename').'.<br />'._DLETSDECIDE."</font></center><br /><br /><br />";
    if ($ratinguser=="outside") {
        echo "<center><font class=\"pn-normal\">".WEAPPREACIATE.' '.pnConfigGetVar('sitename')."!<br /><a class=\"pn-normal\" href=\"$url\">"._RETURNTO." $ttitle</a></font></center><br /><br />";
        $column = &$pntable['downloads_downloads_column'];
        $result=$dbconn->Execute("SELECT $column[title]
                                FROM $pntable[downloads_downloads]
                                WHERE $column[lid]='".(int)pnVarPrepForStore($lid)."'");
        list($title)=$result->fields;
        $ttitle = ereg_replace (" ", "_", $title);
    }
    echo "<center><font class=\"pn-normal\">";
    downloadinfomenu($lid,$ttitle);
    echo "</font></center>";
}

function completevote($error) {
    if ($error == "none")
            {
            echo "<center><font class=\"pn-normal\"><b>"._RATENOTE1ERROR."</b></font></center>";
        }
        elseif ($error == "anonflood")
        {
                       $anonwaitdays = pnConfigGetVar('anonwaitdays');
           //           echo "<center><font class=\"pn-normal\"><b>"._RATENOTE2ERROR1." $anonwaitdays "._RATENOTE2ERROR2."</b></font></center><br />";
            echo "<center><font class=\"pn-normal\"><b>"._RATENOTE2ERROR."</b></font></center><br />";
        }
        elseif ($error == "regflood")
        {
            echo "<center><font class=\"pn-normal\"><b>"._RATENOTE3ERROR."</b></font></center><br />";
        }
        elseif ($error == "postervote")
        {
            echo "<center><font class=\"pn-normal\"><b>"._RATENOTE4ERROR."</b></font></center><br />";
                }
                elseif ($error == "nullerror")
                {
            echo "<center><font class=\"pn-normal\"><b>"._RATENOTE5ERROR."</b></font></center><br />";
        }
        elseif ($error == "outsideflood")
        {
                $outsidewaitdays = pnConfigGetVar('outsidewaitdays');
            echo "<center><font class=\"pn-normal\"><b>Only one vote per IP address allowed every $outsidewaitdays day(s).</b></font></center><br />";
            }
}

/**
 * @usedby index
 */
function ratedownload($lid, $ttitle)
{
    include 'header.php';

    menu(1);

    $itemname = downloads_ItemNameFromIID($lid);
    $catname = downloads_CatNameFromIID($lid);
    if (!(pnSecAuthAction(0, 'Downloads::Item', "$itemname:$catname:$lid", ACCESS_COMMENT))) {
        echo _DOWNLOADSACCESSNOAUTH;
        include 'footer.php';
        return;
    }

    OpenTable();
    $transfertitle = ereg_replace ("_", " ", $ttitle);
    $displaytitle = $transfertitle;
    $ip = getenv("REMOTE_HOST");
    if (empty($ip)) {
       $ip = getenv("REMOTE_ADDR");
    }
    echo "<font class=\"pn-normal\">".pnVarPrepForDisplay($displaytitle)."</font>"
    ."<ul>"
    ."<li><font class=\"pn-sub\">"._RATENOTE1."</font>"
    ."<li><font class=\"pn-sub\">"._RATENOTE2."</font>"
    ."<li><font class=\"pn-sub\">"._RATENOTE3."</font>"
    ."<li><font class=\"pn-sub\">"._DRATENOTE4."</font>"
    ."<li><font class=\"pn-sub\">"._RATENOTE5."</font>";
    if (pnUserLoggedIn()) {
        $name = pnUserGetVar('uname');
        echo "<li><font class=\"pn-sub\">"._YOUAREREGGED."</font>"
        ."<li><font class=\"pn-sub\">"._FEELFREE2ADD."</font>";
    } else {
        echo "<li><font class=\"pn-sub\">"._YOUARENOTREGGED."</font>"
        ."<li><font class=\"pn-sub\">"._IFYOUWEREREG."</font>";
        $name = pnConfigGetVar('anonymous');
    }
    echo "</ul>"
    ."<form action=\"".$GLOBALS['modurl']."&amp;req=addrating\" method=\"post\">"
    ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" width=\"100%\">"
    ."<tr><td width=\"25\" nowrap></td>"
    ."<tr><td width=\"25\" nowrap></td><td width=\"550\">"
    ."<input type=\"hidden\" name=\"ratinglid\" value=\"$lid\">"
    ."<input type=\"hidden\" name=\"ratinguser\" value=\"$name\">"
    ."<input type=\"hidden\" name=\"ratinghost_name\" value=\"$ip\">"
    ."<font class=\"pn-normal\">"._RATETHISSITE.""
    ."<select name=\"rating\">"
    ."<option>--</option>"
    ."<option>10</option>"
    ."<option>9</option>"
    ."<option>8</option>"
    ."<option>7</option>"
    ."<option>6</option>"
    ."<option>5</option>"
    ."<option>4</option>"
    ."<option>3</option>"
    ."<option>2</option>"
    ."<option>1</option>"
    ."</select></font>"
    ."<font class=\"pn-sub\"><input type=\"submit\" value=\""._RATETHISSITE."\"></font>"
    ."<br /><br />";
    if (pnUserLoggedIn()) {
        echo "<font class=\"pn-normal\">"._COMMENTS.":<br /><textarea wrap=\"virtual\" cols=\"80\" rows=\"10\" name=\"ratingcomments\"></textarea>"
        ."<br /><br /><br />"
        ."</font></td>";
    } else {
        echo"<input type=\"hidden\" name=\"ratingcomments\" value=\"\">";
    }
    echo "</tr></table></form>";
    echo "<center>";

    downloadfooterchild($lid);

    echo "</center>";
    CloseTable();
    include 'footer.php';
}
?>