<?php // $Id: comments.php,v 1.1 2004/03/01 10:09:13 mbertier Exp $ $Name:  $
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
// Original Author: Patrick Kellum
// Purpose: Search comments
// ----------------------------------------------------------------------


$search_modules[] = array(
    'title' => 'Comments',
    'func_search' => 'search_comments',
    'func_opt' => 'search_comments_opt'
);

function search_comments_opt() {
    global
        $bgcolor2,
        $textcolor1,
        $info
    ;

    $output = new pnHTML();
    $output->SetInputMode(_PNH_VERBATIMINPUT);

    if (pnSecAuthAction(0, 'Stories::', "::", ACCESS_READ)) {
        $output->Text("<table border=\"0\" width=\"100%\"><tr bgcolor=\"$bgcolor2\"><td><font class=\"pn-normal\" style=\"text-color:$textcolor1\"><input type=\"checkbox\" name=\"active_comments\" id=\"active_comments\" value=\"1\" checked>&nbsp;"._SEARCH_COMMENTS."</font></td></tr></table>");
    }

    return $output->GetOutput();
}

function search_comments() {

    list($active_comments,
         $startnum,
         $total,
         $bool,
         $q) = pnVarCleanFromInput('active_comments',
                                   'startnum',
                                   'total',
                                   'bool',
                                   'q');

    if(empty($active_comments)) {
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
    $column = &$pntable['comments_column'];
    $query = "SELECT $column[subject] as subject, $column[tid] as tid, ";
    $query .= "$column[sid] as sid, $column[pid] as pid FROM $pntable[comments] WHERE ";
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
        $query .= "$column[subject] LIKE '$word' OR ";
        $query .= "$column[comment] LIKE '$word'";
        $query .= ')';
        $flag = true;
    }
    $query .= " ORDER BY $column[subject]";

    if (empty($total)) {
        $countres = $dbconn->Execute($query);
        $total = $countres->PO_RecordCount();
        $countres->Close();
    }
    $result = $dbconn->SelectLimit($query, 10, $startnum-1);

    if(!$result->EOF) {
        $output->Text(_COMMENTS . ': ' . $total . ' ' . _SEARCHRESULTS);
        $output->SetInputMode(_PNH_VERBATIMINPUT);
        // Rebuild the search string from previous information
        $url = "modules.php?op=modload&amp;name=Search&amp;file=index&amp;action=search&amp;active_comments=1&amp;bool=$bool&amp;q=$q";
        $output->Text("<ul>");
        while(!$result->EOF) {
            $row = $result->GetRowAssoc(false);
            if ($row[pid] != 0) {
            	// comment with parent posting
	            $output->Text("<li><a class=\"pn-normal\" href=\"modules.php?op=modload&amp;name=NS-Comments&amp;file=index&amp;req=showreply&amp;tid=$row[tid]&amp;sid=$row[sid]&amp;pid=$row[pid]\">$row[subject]</a></li>");
			} else {
				// comment without parent posting
	            $output->Text("<li><a class=\"pn-normal\" href=\"modules.php?op=modload&amp;name=NS-Comments&amp;file=index&amp;tid=$row[tid]&amp;sid=$row[sid]#$row[tid]\">$row[subject]</a></li>");
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
        $output->Text('<font class="pn-normal">'._SEARCH_NO_COMMENTS.'</font>');
        $output->SetInputMode(_PNH_PARSEINPUT);
    }
    $output->Linebreak(3);

    return $output->GetOutput();
}
?>