<?php // $Id: links.php,v 1.1 2004/03/01 10:09:13 mbertier Exp $ $Name:  $
// ----------------------------------------------------------------------
// Post-Nuke: Content Management System
// ====================================
// Module: Search/downloads plugin
//
// Copyright (c) 2001 by the Post Nuke development team
// http://www.postnuke.com
// ----------------------------------------------------------------------
// Search Module
// ===========================
//
// Copyright (c) 2001 by Patrick Kellum (webmaster@ctarl-ctarl.com)
// http://www.ctarl-ctarl.com
//
// This program is free software. You can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation; either version 2 of the License.
// ----------------------------------------------------------------------
// Filename: includes/search/links.php
// Original Author: Patrick Kellum
// Purpose: Search web_links
// ----------------------------------------------------------------------
// Download plugin: adam_baum, based on Patrick Kellum's reviews plugin.
// ----------------------------------------------------------------------

$search_modules[] = array(
    'title' => 'Web Links',
    'func_search' => 'search_weblinks',
    'func_opt' => 'search_weblinks_opt'
);

function search_weblinks_opt() {
    global
        $bgcolor2,
        $textcolor1;

    $output = new pnHTML();
    $output->SetInputMode(_PNH_VERBATIMINPUT);

    if (pnSecAuthAction(0, 'Web Links::', '::', ACCESS_READ)) {
        $output->Text("<table border=\"0\" width=\"100%\"><tr bgcolor=\"$bgcolor2\"><td><font class=\"pn-normal\" style=\"text-color:$textcolor1\"><input type=\"checkbox\" name=\"active_weblinks\" id=\"active_weblinks\" value=\"1\" checked>&nbsp;<label for=\"active_weblinks\">"._SEARCH_LINKS."</label></font></td></tr></table>");
    }

    return $output->GetOutput();
}

function search_weblinks() {

    list($active_weblinks,
         $startnum,
         $total,
         $q,
         $bool) = pnVarCleanFromInput('active_weblinks',
                                      'startnum',
                                      'total',
                                      'q',
                                      'bool');

    if(empty($active_weblinks)) {
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
    $column = &$pntable['links_links_column'];
    $query = "SELECT $column[url] as url, $column[title] as title, $column[linkratingsummary] as linkratingsummary, $column[totalcomments] as totalcomments, $column[hits] as hits, $column[submitter] as submitter, $column[description] as description, $column[lid] as lid, $column[cat_id] as cat_id
              FROM $pntable[links_links]
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
        // web links
        $query .= "$column[description] LIKE '$word' OR \n";
        $query .= "$column[url] LIKE '$word' OR \n";
        $query .= "$column[submitter] LIKE '$word' OR \n";
        $query .= "$column[title] LIKE '$word' \n";
        $query .= ')';
        $flag = true;
    }
    $query .= " ORDER BY $column[lid]";

	// get the total count with permissions!
    if (empty($total)) {
		$total = 0;
        $countres = $dbconn->Execute($query);
		while(!$countres->EOF) {
			$row = $countres->GetRowAssoc(false);
            // we have a link id so get its category
        	$column2 = &$pntable['links_categories_column'];
            $result2=$dbconn->Execute("SELECT $column2[title] 
									FROM $pntable[links_categories] 
									WHERE $column2[cat_id]=$row[cat_id]");
	    	list($title) = $result2->fields;
            if (pnSecAuthAction(0, 'Web Links::Link', "$title:$row[title]:$row[lid]", ACCESS_READ) && pnSecAuthAction(0, 'Web Links::Category', "$title::$row[cat_id]", ACCESS_READ)) {
				$total++;
			}
			$countres->MoveNext();
		}
    }

	$result = $dbconn->SelectLimit($query, 10, $startnum-1);

    if (!$result->EOF) {
		$output->Text(_WEBLINKS . ': ' . $total . ' ' . _SEARCHRESULTS);
		$output->SetInputMode(_PNH_VERBATIMINPUT);
        // Rebuild the search string from previous information
		$url = "modules.php?op=modload&amp;name=Search&amp;file=index&amp;action=search&amp;active_weblinks=1&amp;bool=$bool&amp;q=$q";
        $output->Text("<ul>");
        while(!$result->EOF) {
             $row = $result->GetRowAssoc(false);
            // we have a link id so get its category
        	$column2 = &$pntable['links_categories_column'];
            $result2=$dbconn->Execute("SELECT $column2[title] 
									FROM $pntable[links_categories] 
									WHERE $column2[cat_id]=$row[cat_id]");
	    	list($title) = $result2->fields;
            if (pnSecAuthAction(0, 'Web Links::Link', "$title:$row[title]:$row[lid]", ACCESS_READ) && pnSecAuthAction(0, 'Web Links::Category', "$title::$row[cat_id]", ACCESS_READ)) {
            	$output->Text("<li><a class=\"pn-normal\" href=\"$row[url]\" target=\"_new\">$row[title]</a> <font class=\"pn-normal\">(rating: $row[linkratingsummary] - comments: $row[totalcomments] - hits: $row[hits])</font><br>Submitter: $row[submitter]<br>$row[description]</li>");
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
        $output->Text('<font class="pn-normal">'._SEARCH_NO_LINKS.'</font>');
        $output->SetInputMode(_PNH_PARSEINPUT);
    }
    $output->Linebreak(3);

    return $output->GetOutput();
}
?>