<?php
// File: $Id: admin.php,v 1.1 2004/03/01 10:09:02 mbertier Exp $ $Name:  $
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
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
// Modified By: bharvey42 CSS implimented 6/29/03
// Purpose of file:
// ----------------------------------------------------------------------

if (!eregi("admin.php", $PHP_SELF))
{
	die ("Access Denied");
}

$ModName = $module;

if (!(pnSecAuthAction(0, 'Referers::', '::', ACCESS_ADMIN)))
{
      include 'header.php';
      echo _REFERERSNOAUTH;
      include 'footer.php';
}

modules_get_language();
modules_get_manual();

/*********************************************************/
/* Referer Functions to know who links to us             */
/*********************************************************/

function referers_admin_main()
{
    include ("header.php");

    $bgcolor2 = $GLOBALS["bgcolor2"];

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    GraphicAdmin();
    OpenTable();
    echo "<center><font class=\"pn-title\"><b>"._HTTPREFERERS."</b></font></center>";
    CloseTable();

    if (!(pnSecAuthAction(0, 'Referers::', '::', ACCESS_ADMIN))) {
        echo _REFERERSNOAUTH;
        include 'footer.php';
        return;
    }

	// Added by Leithya - Start	
   	list($sortby, $page) = pnVarCleanFromInput('sortby','page');    
   	if ( !isset($page) || !is_numeric($page)) {    $page = 1;} 
   	if ( $sortby != "pn_url") { $sortby = "pn_frequency"; }
    $column = &$pntable['referer_column'];
	if ($sortby == 'pn_url'){
		$sort = "ORDER BY $column[url] ";
	} else {
		$sort = "ORDER BY $column[frequency] DESC ";
	} 
	$pagesize = '25';	
	$min = $pagesize * ($page - 1); 
	$max = $pagesize; 
	// Added by Leithya - End

	// Edited by Leithya - Start 
    OpenTable();
    echo "<center><font class=\"pn-normal\"><b>"._WHOLINKS."</b</font></center><br /><br />"
    ."<table border=0 width=\"100%\">"
	."<tr><td><font class=\"pn-normal\"><a class=\"pn-sub\" href='admin.php?module=NS-Referers&amp;op=main&amp;sortby=pn_frequency'>"._FREQUENCY."</a></font></td>"
	."<td><font class=\"pn-normal\"><a class=\"pn-sub\" href='admin.php?module=NS-Referers&amp;op=main&amp;sortby=pn_url'>"._URL."</a></font></td>"
	."<td><font class=\"pn-sub\">"._PERCENT."</font></td></tr>";
    /**
     * fifers: grab the total count of referers for percentage calculations
     */
    $hresult = $dbconn->Execute("SELECT SUM($column[frequency]) FROM $pntable[referer]");
    list($totalfreq) = $hresult->fields;
	
    $hresult5 = $dbconn->Execute("SELECT * FROM $pntable[referer]");
    list($totalurl) = $hresult5->fields;
	$totalurl = $hresult5->PO_RecordCount();
	
	$hresult = $dbconn->Execute("SELECT $column[url], $column[frequency] FROM $pntable[referer] $sort LIMIT ".$min.",".$max." ");
    while(list($url, $freq) = $hresult->fields) {

        $urls = str_replace('&', ' &', $url);
        $urls = str_replace('/', '/ ', $urls);
		
		$url = pnVarPrepForDisplay($url);

	// Edited by Leithya - End	
  
    /* 
    $hresult = $dbconn->Execute("SELECT $column[url], $column[frequency] FROM $pntable[referer] ORDER BY $column[frequency] DESC");
    while(list($url, $freq) = $hresult->fields) {
	*/
	
        $hresult->MoveNext();

        echo "<tr>\n"
            ."<td bgcolor=\"$bgcolor2\"><font class=\"pn-normal\">" . pnVarPrepForDisplay($freq) . "</font></td>\n"
            ."<td bgcolor=\"$bgcolor2\"><font class=\"pn-normal\">".(($url == "bookmark")?(""):("<a target=_blank href=$url>")).pnVarPrepForDisplay($urls).(($url == "bookmark")?(""):("</a>"))."</font></td>\n"
            ."<td bgcolor=\"$bgcolor2\"><font class=\"pn-normal\">".round(($freq / $totalfreq * 100), 2)." %</font></td>\n"
            ."</tr>\n";
    }
    echo "</table><font class=\"pn-normal\">"._TOTAL." " . pnVarPrepForDisplay($totalfreq) . " </font><br />";

	// Added by Leithya - Start	
	if ($totalurl > $pagesize) {
       $total_pages = ceil($totalurl/$pagesize)+ 0.99; 
       $prev_page = $page - 1;
       $next_page = $page + 1;
		if ( $prev_page > 0 ) {
		echo "<a class=\"pn-normal\" href='admin.php?module=NS-Referers&amp;op=main&amp;sortby=$sortby&amp;page=$prev_page'><font class=\"pn-sub\"> <-- </font></a>";
		}
       for($n=1; $n < $total_pages; $n++) {
                	if ($n == $page) {
                		echo " <font class=\"pn-sub\">$n</font></a> ";
                    } else {
                		echo " <a class=\"pn-normal\" href='admin.php?module=NS-Referers&amp;op=main&amp;sortby=$sortby&amp;page=$n'><font class=\"pn-sub\">".pnVarPrepHTMLDisplay($n)."</font></a> ";
                	} }    
		if ( $next_page <= $total_pages ) {
		echo "<a class=\"pn-normal\" href='admin.php?module=NS-Referers&amp;op=main&amp;sortby=$sortby&amp;page=$next_page'><font class=\"pn-sub\"> --> </font></a>";
		}
	}
	// Added by Leithya - End	
    
    echo "<form action=\"admin.php\" method=\"post\">"
    ."<input type=\"hidden\" name=\"module\" value=\"NS-Referers\">"
    ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
    ."<input type=\"hidden\" name=\"op\" value=\"delete\">"
    ."<center><input type=\"submit\" value=\""._DELETEREFERERS."\"></center></form>";
    CloseTable();

// Access Referer Settings
    OpenTable();
    echo "<center><font class=\"pn-title\"><b>"._REFERERSCONF."</b></font></center><br /><br />";
    echo "<center><a href=\"admin.php?module=".$GLOBALS['module']."&amp;op=getConfig\">"._REFERERSCONF."</a></center>";
    CloseTable();

    include ("footer.php");
}

function referers_admin_getConfig() {

    include ("header.php");

    // prepare vars
    $sel_httpref['0'] = '';
    $sel_httpref['1'] = '';
    $sel_httpref[pnConfigGetVar('httpref')] = ' checked';
    $sel_httprefmax['100'] = '';
    $sel_httprefmax['250'] = '';
    $sel_httprefmax['500'] = '';
    $sel_httprefmax['1000'] = '';
    $sel_httprefmax['2000'] = '';
    $sel_httprefmax[pnConfigGetVar('httprefmax')] = ' selected';

    GraphicAdmin();
    OpenTable();
    print '<center><font size="3" class="pn-title"><b>'._REFERERSCONF.'</b></font></center><br />'
          .'<form action="admin.php" method="post">'
        .'<table border="0"><tr><td class="pn-normal">'
        ._ACTIVATEHTTPREF.'</td><td class="pn-normal">'
        ."<input type=\"radio\" name=\"xhttpref\" value=\"1\" class=\"pn-normal\"".$sel_httpref['1'].">"._YES.' &nbsp;'
        ."<input type=\"radio\" name=\"xhttpref\" value=\"0\" class=\"pn-normal\"".$sel_httpref['0'].">"._NO
        .'</td></tr><tr><td class="pn-normal">'
        ._MAXREF.'</td><td>'
        .'<select name="xhttprefmax" size="1" class="pn-normal">'
        ."<option value=\"100\"".$sel_httprefmax['100'].">100</option>\n"
        ."<option value=\"250\"".$sel_httprefmax['250'].">250</option>\n"
        ."<option value=\"500\"".$sel_httprefmax['500'].">500</option>\n"
        ."<option value=\"1000\"".$sel_httprefmax['1000'].">1000</option>\n"
        ."<option value=\"1000\"".$sel_httprefmax['2000'].">2000</option>\n"
        .'</select>'
        .'</td></tr></table>'
        ."<input type=\"hidden\" name=\"module\" value=\"".$GLOBALS['module']."\">"
        ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
        ."<input type=\"hidden\" name=\"op\" value=\"setConfig\">"
        ."<input type=\"submit\" value=\""._SUBMIT."\">"
        ."</form>";
    CloseTable();
    include ("footer.php");
}

function referers_admin_setConfig($var)
{
    if (!pnSecConfirmAuthKey()) {
        include 'header.php';
        echo _BADAUTHKEY;
        include 'footer.php';
        exit;
    }
    // Escape some characters in these variables.
    // hehe, I like doing this, much cleaner :-)
    $fixvars = array (
        );

    // todo: make FixConfigQuotes global / replace with other function
    foreach ($fixvars as $v) {
    // $var[$v] = FixConfigQuotes($var[$v]);
    }

    // Set any numerical variables that havn't been set, to 0. i.e. paranoia check :-)
    $fixvars = array (
    );
    foreach ($fixvars as $v) {
        if (empty($var[$v])) {
            $var[$v] = 0;
        }
    }

    // all variables starting with x are the config vars.
    while (list ($key, $val) = each ($var)) {
        if (substr($key, 0, 1) == 'x') {
            pnConfigSetVar(substr($key, 1), $val);
        }
    }
    pnRedirect('admin.php');
}

function referers_admin_delete($var)
{
    if (!pnSecConfirmAuthKey()) {
        include 'header.php';
        echo _BADAUTHKEY;
        include 'footer.php';
        exit;
    }
    if (!(pnSecAuthAction(0, 'Referers::', '::', ACCESS_ADMIN)))
    {
	include 'header.php';
	echo _REFERERSDELNOAUTH;
	include 'footer.php';
    }
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $dbconn->Execute("DELETE FROM $pntable[referer]");
    pnRedirect('admin.php');
}
?>