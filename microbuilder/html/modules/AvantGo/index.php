<?php // File: $Id: index.php,v 1.1 2004/03/01 10:09:00 mbertier Exp $
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
// Copyright (C) 2001 by the Post-Nuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// Based on PHP-NUKE Web Portal System
// Copyright (C) 2001 by Francisco Burzi (fbc@mandrakesoft.com)
// http://www.phpnuke.org/
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
// Original Author of this file: Tim Litwiller http://linux.made-to-order.net/
// Purpose of this file: This module is to view your last news items via
//   Palm or Windows CE devices, using AvantGo software or compatible
//   Palm device browsers.
// ----------------------------------------------------------------------
// Installation: Simply place this file in your root PostNuke install.
// ----------------------------------------------------------------------
// Changelog
// 2001-07-28  Tim Litwiller  converted to PostNuke
// 2000-12-02  Fabian Rodriguez - http://sourceforge.net/users/MagicFab/
//   - changed name of addon
//   - corrected logo image to reflect version 4.2 path
//   - included compliant html tags
//   - made it AvantGo "compliant" (see http://avantgo.com/developer/reference/tutorials/jumpstart/jumpstart.html)
// 2000-11-29  Tim Litwiller  original version
// ----------------------------------------------------------------------

if (!defined("LOADED_AS_MODULE")) {
         die ("You can't access this file directly...");
     }

$ModName = basename( dirname( __FILE__ ) );
modules_get_language();

header("Content-Type: text/html");
?>

<HTML>
<HEAD>
    <TITLE><?php echo pnConfigGetVar('sitename'); ?></TITLE>
    <META NAME="HandheldFriendly" content="True">
</HEAD>
<BODY>
    <DIV ALIGN=CENTER>
<?php
if (pnSecAuthAction(0, 'AvantGo::', "::", ACCESS_READ)) {
	$shown_results = 0;
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();
    $column = &$pntable['stories_column'];
    $sql = "SELECT $column[aid],
                   $column[sid],
                   $column[title],
                   $column[time],
                   $column[catid],
                   $column[topic]
			FROM $pntable[stories]
			ORDER BY $column[sid] DESC";

    $result = $dbconn->Execute($sql);
    // can't use SelectLimit here since permissions might take effect later on!
    
    if ($result === false) {
    	// no result from sql-statement
        PN_DBMsgError($dbconn, __FILE__, __LINE__, "An error ocurred");
    } else {
    	// we have stories...
        echo "\t<h1>".pnConfigGetVar('sitename')."</h1>\r\n";
        echo "\t<table border=0 align=center>\r\n";
        echo" \t\t<tr>\r\n";
        echo "\t\t\t<td bgcolor=#EFEFEF>"._AVGARTICLES."</td>\r\n";
        echo "\t\t\t<td bgcolor=#EFEFEF>"._DATE."</td>\r\n";
        echo "\t\t</tr>\r\n";

        while( (list($aid, $sid, $title, $time, $catid, $topic) = $result->fields) && ($shown_results < 10) ){
		 	// find out the cattitle
			if ($catid == 0) {
				// Default category
				$cattitle = ""._ARTICLES."";
			} else {
				$catcolumn = &$pntable['stories_cat_column'];
				$catquery = buildSimpleQuery('stories_cat', array('title'), "$catcolumn[catid] = $catid");
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
				$shown_results++;
				$time=$result->UnixTimeStamp($time);
                echo "\t\t<tr>\r\n";
                echo "\t\t\t<td><a href=print.php?sid=$sid>".pnVarPrepHTMLDisplay($title)."</a></td>\r\n";
                echo "\t\t\t<td>".ml_ftime(_DATETIMEBRIEF,$time)."</td>\r\n";
                echo "\t\t</tr>\r\n";
            }
            $result->MoveNext();
        }
        $result->Close();
        echo"\t</table>\r\n";
    }
} else {
    echo _BADAUTHKEY;
}

?>

</BODY>
</HTML>