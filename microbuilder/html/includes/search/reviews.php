<?php // $Id: reviews.php,v 1.1 2004/03/01 10:09:12 mbertier Exp $ $Name:  $
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
// Copyright (C) 2001 by the Post-Nuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// Based on: Reviews Addon
// Copyright (c) 2000 by Jeff Lambert (jeffx@ican.net)
// http://www.qchc.com
// More scripts on http://www.jeffx.qchc.com
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
// Original Author: Patrick Kellum
// Purpose: Search reviews
// ----------------------------------------------------------------------


$search_modules[] = array(
    'title' => 'Reviews',
    'func_search' => 'search_reviews',
    'func_opt' => 'search_reviews_opt'
);

function search_reviews_opt() {
    global
        $bgcolor2,
        $textcolor1;

    $output = new pnHTML();
    $output->SetInputMode(_PNH_VERBATIMINPUT);

    if (pnSecAuthAction(0, 'Reviews::', '::', ACCESS_READ)){
        $output->Text("<table border=\"0\" width=\"100%\"><tr bgcolor=\"$bgcolor2\"><td><font class=\"pn-normal\" style=\"text-color:$textcolor1\"><input type=\"checkbox\" name=\"active_reviews\" id=\"active_reviews\" value=\"1\" checked>&nbsp;<label for=\"active_reviews\">"._SEARCH_REVIEWS."</label></font></td></tr></table>");
    }

    return $output->GetOutput();
}

function search_reviews() {

    list($active_reviews,
         $startnum,
         $total,
         $bool,
         $q) = pnVarCleanFromInput('active_reviews',
                                   'startnum',
                                   'total',
                                   'bool',
                                   'q');

    if(empty($active_reviews)) {
        return;
    }

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $output = new pnHTML();
    $output->SetInputMode(_PNH_VERBATIMINPUT);

    if (!isset($startnum) || !is_numeric($startnum)) {
        $startnum = 1;
    }
    if (isset($total) && !is_numeric($total)) {
    	unset($total);
    }

    $w = search_split_query($q);
    $flag = false;

    $revcol = &$pntable['reviews_column'];
    $comcol = &$pntable['reviews_comments_column'];
    $query = "SELECT DISTINCT $revcol[id] as id, $revcol[title] as title, $revcol[score] as score, $revcol[hits] as hits, $revcol[reviewer] as reviewer, $revcol[date] AS fdate
              FROM $pntable[reviews] LEFT JOIN $pntable[reviews_comments] ON $comcol[rid]=$revcol[id]
              WHERE \n";
    foreach($w as $word) {
        if($flag) {
            switch($bool) {
                case 'AND' :
                    $query .= ' AND ';
                    break;
                case 'OR' :
                default :
                    $query .= ' OR ';
                    break;
            }
        }
        $query .= '(';
        // reviews
        $query .= "$revcol[title] LIKE '$word' OR \n";
        $query .= "$revcol[text] LIKE '$word' OR \n";
        $query .= "$revcol[reviewer] LIKE '$word' OR \n";
        $query .= "$revcol[cover] LIKE '$word' OR \n";
        $query .= "$revcol[url] LIKE '$word' OR \n";
        $query .= "$revcol[url_title] LIKE '$word' OR \n";
        // reviews_comments
        $query .= "$comcol[comments] LIKE '$word'\n";
        $query .= ')';
        $flag = true;
    }
    if (pnConfigGetVar('multilingual') == 1) {
           $query .= " AND ($revcol[rlanguage]='" . pnVarPrepForStore(pnUserGetLang()) . "' OR $revcol[rlanguage]='')";
    }
    $query .= " ORDER BY $revcol[date]";

	// get the total count with permissions!
    if (empty($total)) {
		$total = 0;
        $countres = $dbconn->Execute($query);
		while(!$countres->EOF) {
			$row = $countres->GetRowAssoc(false);
            if (pnSecAuthAction(0,"Reviews::","$row[title]::$row[id]",ACCESS_READ)) {
				$total++;
			}
			$countres->MoveNext();
		}
    }

    $result = $dbconn->SelectLimit($query, 10, $startnum-1);

    if(!$result->EOF) {
        $output->Text(_REVIEWS . ': ' . $total . ' ' . _SEARCHRESULTS);
        $output->SetInputMode(_PNH_VERBATIMINPUT);
        // Rebuild the search string from previous information
        $url = "modules.php?op=modload&amp;name=Search&amp;file=index&amp;action=search&amp;active_reviews=1&amp;bool=$bool&amp;q=$q";
        $output->Text("<ul>");
        while(!$result->EOF) {
            $row = $result->GetRowAssoc(false);
            $row['fdate'] = ml_ftime(_DATELONG,$result->UnixTimeStamp($row['fdate']));
            if (pnSecAuthAction(0,"Reviews::","$row[title]::$row[id]",ACCESS_READ)) {
            	$output->Text("<li><a class=\"pn-normal\" href=\"modules.php?op=modload&amp;name=Reviews&amp;file=index&amp;req=showcontent&id=$row[id]\">$row[title]</a> <font class=\"pn-sub\">(score: $row[score] - hits: $row[hits])</font><br>$row[reviewer]<br>$row[fdate]</li>");
			}
            $result->MoveNext();
        }
        $output->Text("</ul>");

        // Munge URL for template
        $urltemplate = $url . "&amp;startnum=%%&amp;total=$total";
        $output->Pager($startnum,
                       $total,
                       $urltemplate,
                       10);
    } else {
        $output->SetInputMode(_PNH_VERBATIMINPUT);
        $output->Text('<font class="pn-normal">'._SEARCH_NO_REVIEWS.'</font>');
        $output->SetInputMode(_PNH_PARSEINPUT);
    }
    $output->Linebreak(3);

    return $output->GetOutput();
}
?>