<?php
// File: $Id: admin.php,v 1.1 2004/03/01 10:09:04 mbertier Exp $ $Name:  $
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
// Purpose of file: 
// ----------------------------------------------------------------------

if (!eregi("admin.php", $PHP_SELF)) { 
	die ("Access Denied"); 
}
$ModName = $module;

modules_get_language();
modules_get_manual();

/*********************************************************/
/* Messages Functions                                    */
/*********************************************************/

function MsgDeactive()
{
    $mid = (int)pnVarCleanFromInput('mid');

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $column = &$pntable['message_column'];
    $result = $dbconn->Execute("SELECT $column[title]
                              FROM $pntable[message]
                              WHERE $column[mid] = '" . (int)pnVarPrepForStore($mid)."'");
    if($dbconn->ErrorNo() != 0) {
        error_log("Error: " . $dbconn->ErrorMsg());
    }
    list($title) = $result->fields;
    if (!pnSecAuthAction(0, 'Messages::', "$title::$mid", ACCESS_EDIT)) {
        include 'header.php';
        echo _MESSAGESDEACTIVATENOAUTH;
        include 'footer.php';
        return;
    }

    $result = $dbconn->Execute("UPDATE $pntable[message] 
                              SET $column[active]=0 
                              WHERE $column[mid]='" . (int)pnVarPrepForStore($mid)."'");
    if($dbconn->ErrorNo() != 0) {
        error_log("Error: " . $dbconn->ErrorMsg());
    }
    pnRedirect('admin.php?module='.$GLOBALS['module'].'&op=messages');
}

function messages()
{
    //$bgcolor1 = $GLOBALS["bgcolor1"];
    //$bgcolor2 = $GLOBALS["bgcolor2"];

    $authid = pnSecGenAuthKey();

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    include ("header.php");
    $lang = languagelist();
    GraphicAdmin();
    OpenTable();
    echo "<center><font class=\"pn-title\"><b>"._MESSAGESADMIN."</b></font></center>";
    CloseTable();

    // Current messages
    if (pnSecAuthAction(0, 'Messages::', '::', ACCESS_EDIT)) {
        OpenTable();
        echo "<center><font class=\"pn-title\"><b>"._ALLMESSAGES."</b></font><br><br><table border=\"1\" width=\"100%\" bgcolor=\"".$GLOBALS["bgcolor1"]."\"<tr>"
            ."<td bgcolor=\"".$GLOBALS["bgcolor2"]."\" align=\"center\"><b><font class=\"pn-title\">"._ID."</font></b></td>"
            ."<td bgcolor=\"".$GLOBALS["bgcolor2"]."\" align=\"center\"><b><font class=\"pn-title\">"._TITLE."</font></b></td>"
            ."<td bgcolor=\"".$GLOBALS["bgcolor2"]."\" align=\"center\">&nbsp;<b><font class=\"pn-title\">"._LANGUAGE."</font></b>&nbsp;</td>"
            ."<td bgcolor=\"".$GLOBALS["bgcolor2"]."\" align=\"center\">&nbsp;<b><font class=\"pn-title\">"._VIEW."</font></b>&nbsp;</td>"
            ."<td bgcolor=\"".$GLOBALS["bgcolor2"]."\" align=\"center\">&nbsp;<b><font class=\"pn-title\">"._ACTIVE."</font></b>&nbsp;</td>"
            ."<td bgcolor=\"".$GLOBALS["bgcolor2"]."\" align=\"center\">&nbsp;<b><font class=\"pn-title\">"._FUNCTIONS."</font></b>&nbsp;</td></tr>";
        $column = &$pntable['message_column'];
        $result = $dbconn->Execute("SELECT $column[mid],
                                           $column[title],
                                           $column[content],
                                           $column[date],
                                           $column[expire],
                                           $column[active],
                                           $column[view],
                                           $column[mlanguage] 
                                    FROM $pntable[message] ");
        while(list($mid, $title, $content, $mdate, $expire, $active, $view, $mlanguage) = $result->fields) {

            $result->MoveNext();

            if (!pnSecAuthAction(0, 'Messages::', "$title::$mid", ACCESS_EDIT)) {
                continue;
            }
            if ($active == 1) {
                $mactive = ""._YES."";
            } elseif ($active == 0) {
                $mactive = ""._NO."";
            }
            switch ($view) {
                case "1":
                    $mview = ""._MVALL."";
                    break;
                case "2":
                    $mview = ""._MVUSERS."";
                    break;
                case "3":
                    $mview = ""._MVANON."";
                    break;
                case "4":
                    $mview = ""._MVADMIN."";
                    break;
            }
            if ($mlanguage == "") {
                $mlanguage = ""._ALL."";
            }
            echo "<tr><td align=\"right\"><font class=\"pn-normal\"><b>" . pnVarPrepForDisplay($mid) . "</b>"
                ."</font></td><td align=\"left\" width=\"100%\"><font class=\"pn-normal\"><b>" . pnVarPrepForDisplay($title) . "</b>"
                ."</font></td><td align=\"center\"><font class=\"pn-normal\">" . pnVarPrepForDisplay($mlanguage)
                ."</font></td><td align=\"center\" nowrap><font class=\"pn-normal\">" . pnVarPrepForDisplay($mview)
                ."</font></td><td align=\"center\"><font class=\"pn-normal\">" . pnVarPrepForDisplay($mactive)
                ."</font></td><td align=\"right\" nowrap><font class=\"pn-normal\">(<a href=\"admin.php?module=".$GLOBALS['module']."&amp;op=editmsg&amp;mid=$mid&amp;authid=$authid\">"._EDIT."</a></font>";
            if (pnSecAuthAction(0, 'Messages::', "$title::$mid", ACCESS_DELETE)) {
                echo "-<a href=\"admin.php?module=".$GLOBALS['module']
                ."&amp;op=deletemsg&amp;mid=$mid\">"._DELETE."</a>)";
            } else {
                echo ")";
            }
            echo "</td></tr>";
        }
        echo "</table></center><br>";
    }
    CloseTable();

    // New message
    if (pnSecAuthAction(0, 'Messages::', '::', ACCESS_ADD)) {
        OpenTable();
        echo "<center><font class=\"pn-title\"><b>"._ADDMSG."</b></font></center><br>";
        echo "<form action=\"admin.php\" method=\"post\">";

        echo "<b><font class=\"pn-normal\">"._MESSAGETITLE.":</font></b><br>"
            ."<input type=\"text\" name=\"add_title\" value=\"\" size=\"50\" maxlength=\"100\"><br><br>"
            ."<b><font class=\"pn-normal\">"._MESSAGECONTENT.":</font></b><br>"
            ."<textarea name=\"add_content\" rows=\"10\" cols=\"80\"></textarea><br><br><font class=\"pn-normal\">"
            .'<b>'._LANGUAGE.': </b></font>'
            .'<select name="add_mlanguage" size="1">'
            .'<option value="">'._ALL.'</option>';

        $sel_lang[pnUserGetLang()] = ' selected';
        $handle = opendir('language');
        while ($f = readdir($handle)) {
            if (is_dir("language/$f") && (!empty($lang[$f]))) {
                $langlist[$f] = $lang[$f];
            }
        }
        asort($langlist);
        //  a bit ugly, but it works in E_ALL conditions (Andy Varganov)
        foreach ($langlist as $k=>$v){
        echo '<option value="'.$k.'"';
        if (isset($sel_lang[$k])) echo ' selected';
        echo '>'. $v . '</option>';
        }
        print '</select><br><br>';
        $now = time();
        //print '<b>'._EXPIRATION.':</b> <select name="add_expire">'
            //."<option value=\"86400\" >1 "._DAY."</option>"
            //."<option value=\"172800\" >2 "._DAYS."</option>"
            //."<option value=\"432000\" >5 "._DAYS."</option>"
            //."<option value=\"1296000\" >15 "._DAYS."</option>"
            //."<option value=\"2592000\" >30 "._DAYS."</option>"
            //."<option value=\"0\" >"._UNLIMITED."</option>"
            //."</select><br><br>"
        print "<font class=\"pn-normal\"><b>"._ACTIVE."?</b> <input type=\"radio\" name=\"add_active\" value=\"1\" checked>"._YES." "
            ."<input type=\"radio\" name=\"add_active\" value=\"0\" >"._NO."</font>";
        echo "<br><br><b><font class=\"pn-normal\">"._VIEWPRIV."</font></b> <select name=\"add_view\">"
            ."<option value=\"1\" >"._MVALL."</option>"
            ."<option value=\"2\" >"._MVUSERS."</option>"
            ."<option value=\"3\" >"._MVANON."</option>"
            ."<option value=\"4\" >"._MVADMIN."</option>"
            ."</select><br><br>"
            ."<input type=\"hidden\" name=\"module\" value=\"".$GLOBALS['module']."\">"
            ."<input type=\"hidden\" name=\"op\" value=\"addmsg\">"
            ."<input type=\"hidden\" name=\"add_mdate\" value=\"$now\">"
	    ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
            ."<input type=\"submit\" value=\""._ADDMSG."\">"
            ."</form>";
        CloseTable();
    }
    include ("footer.php");
}

function editmsg()
{
    list($mid, $authid) = pnVarCleanFromInput('mid', 'authid');

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    include ("header.php");

    GraphicAdmin();
    OpenTable();
    echo "<center><font class=\"pn-title\"><b>"._MESSAGESADMIN."</b></font></center>";
    CloseTable();

    $column = &$pntable['message_column'];
    $result = $dbconn->Execute("SELECT $column[title],
                                       $column[content],
                                       $column[date],
                                       $column[expire],
                                       $column[active],
                                       $column[view],
                                       $column[mlanguage] 
                                FROM $pntable[message]
                                WHERE $column[mid]= '" . pnVarPrepForStore($mid)."'");
    list($title, $content, $mdate, $expire, $active, $view, $mlanguage) = $result->fields;

    if (!pnSecAuthAction(0, 'Messages::', "$title::$mid", ACCESS_EDIT)) {
        echo _MESSAGESEDITNOAUTH;
        include 'footer.php';
        return;
    }
    OpenTable();
    echo "<center><font class=\"pn-title\"><b>"._EDITMSG."</b></font></center>";
    $asel1 = '';
    $asel2 = '';
    if ($active == 1) {
        $asel1 = "checked";
    } elseif ($active == 0) {
        $asel2 = "checked";
    }

    $sel1 = '';
    $sel2 = '';
    $sel3 = '';
    $sel4 = '';
    if ($view == 1) {
        $sel1 = "selected";
    } elseif ($view == 2) {
        $sel2 = "selected";
    } elseif ($view == 3) {
        $sel3 = "selected";
    } elseif ($view == 4) {
        $sel4 = "selected";
    }

    $esel1 = '';
    $esel2 = '';
    $esel3 = '';
    $esel4 = '';
    $esel5 = '';
    $esel6 = '';
    if ($expire == 86400) {
        $esel1 = "selected";
    } elseif ($expire == 172800) {
        $esel2 = "selected";
    } elseif ($expire == 432000) {
        $esel3 = "selected";
    } elseif ($expire == 1296000) {
        $esel4 = "selected";
    } elseif ($expire == 2592000) {
        $esel5 = "selected";
    } elseif ($expire == 0) {
        $esel6 = "selected";
    }

    echo "<form action=\"admin.php\" method=\"post\">";

    echo "<b><font class=\"pn-normal\">"._MESSAGETITLE.":</font></b><br>"
    ."<input type=\"text\" name=\"title\" value=\"" . pnVarPrepForDisplay($title) . "\" size=\"50\" maxlength=\"100\"><br><br>"
    ."<b><font class=\"pn-normal\">"._MESSAGECONTENT.":</font></b><br>"
    ."<textarea name=\"content\" rows=\"10\" cols=\"80\">" . pnVarPrepForDisplay($content) . "</textarea><br><br><font class=\"pn-normal\">"
    .'<b>'._LANGUAGE.': </b></font>'
    .'<select name="mlanguage" size="1">'
    .'<option value="">'._ALL.'</option>'
    ;
    $lang = languagelist();
    $sel_lang[$mlanguage] = ' selected';
	$handle = opendir('language');
	while ($f = readdir($handle)) {
		if (is_dir("language/$f") && (!empty($lang[$f]))) {
			$langlist[$f] = $lang[$f];
		}
	}
	asort($langlist);
	//  a bit ugly, but it works in E_ALL conditions (Andy Varganov)
	foreach ($langlist as $k=>$v){
		echo '<option value="'.$k.'"';
		if (isset($sel_lang[$k])) echo ' selected';
		echo '>'. $v . '</option>';
	}
    print '</select><br><br>'
    //."<b>"._EXPIRATION.":</b> <select name=\"expire\">"
    //."<option name=\"expire\" value=\"86400\" $esel1>1 "._DAY."</option>"
    //."<option name=\"expire\" value=\"172800\" $esel2>2 "._DAYS."</option>"
    //."<option name=\"expire\" value=\"432000\" $esel3>5 "._DAYS."</option>"
    //."<option name=\"expire\" value=\"1296000\" $esel4>15 "._DAYS."</option>"
    //."<option name=\"expire\" value=\"2592000\" $esel5>30 "._DAYS."</option>"
    //."<option name=\"expire\" value=\"0\" $esel6>"._UNLIMITED."</option>"
    //."</select><br><br>"
    ."<font class=\"pn-normal\"><b>"._ACTIVE."?</b> <input type=\"radio\" name=\"active\" value=\"1\" $asel1>"._YES." "
    ."<input type=\"radio\" name=\"active\" value=\"0\" $asel2>"._NO."</font>";
    if ($active == 1) {
        echo "<br><br><font class=\"pn-normal\"><b>"._CHANGEDATE."</b>"
            ."<input type=\"radio\" name=\"chng_date\" value=\"1\">"._YES." "
            ."<input type=\"radio\" name=\"chng_date\" value=\"0\" checked>"._NO."</font><br><br>";
    } elseif ($active == 0) {
        echo "<br><font class=\"pn-sub\">"._IFYOUACTIVE."</font><br><br>"
            ."<input type=\"hidden\" name=\"chng_date\" value=\"1\">";
    }
    echo "<font class=\"pn-normal\"><b>"._VIEWPRIV."</b> <select name=\"view\">"
        ."<option value=\"1\" $sel1>"._MVALL."</option>"
        ."<option value=\"2\" $sel2>"._MVUSERS."</option>"
        ."<option value=\"3\" $sel3>"._MVANON."</option>"
        ."<option value=\"4\" $sel4>"._MVADMIN."</option>"
        ."</select></font><br><br>"
        ."<input type=\"hidden\" name=\"mdate\" value=\"$mdate\">"
        ."<input type=\"hidden\" name=\"mid\" value=\"$mid\">"
        ."<input type=\"hidden\" name=\"module\" value=\"".$GLOBALS['module']."\">"
        ."<input type=\"hidden\" name=\"op\" value=\"savemsg\">"
	."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
        ."<input type=\"submit\" value=\""._SAVECHANGES."\">"
        ."</form>";
    CloseTable();
    include ("footer.php");
}

function savemsg()
{
    if (!pnSecConfirmAuthKey()) {
        include 'header.php';
        echo _BADAUTHKEY;
        include 'footer.php';
        exit;
    }
    list($mid,
         $title,
         $content,
         $mdate,
         $expire,
         $active,
         $view,
         $chng_date,
         $mlanguage) = pnVarCleanFromInput('mid',
                                           'title',
                                           'content',
                                           'mdate',
                                           'expire',
                                           'active',
                                           'view',
                                           'chng_date',
                                           'mlanguage');

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    if (!pnSecAuthAction(0, 'Messages::', "$title::$mid", ACCESS_EDIT)) {
        include 'header.php';
        echo _MESSAGESEDITNOAUTH;
        include 'footer.php';
        return;
    }
    
    if ($chng_date == 1) {
        $newdate = time();
    } elseif ($chng_date == 0) {
        $newdate = $mdate;
    }

    // Work out expiry of message
    if ($expire  != 0) {
        $expire += time();
    }
    //$column[expire]=" . pnVarPrepForStore($expire) . ", -- Removed as a temp fix
    $column = &$pntable['message_column'];
    $sql = "UPDATE $pntable[message] 
            SET $column[title]='" . pnVarPrepForStore($title) . "', 
                $column[content]='" . pnVarPrepForStore($content) . "',
                $column[date]='" . pnVarPrepForStore($newdate) . "',
                $column[expire] = '0',
                $column[active]=" . pnVarPrepForStore($active) . ",
                $column[view]=" . pnVarPrepForStore($view) . ",
                $column[mlanguage]='" . pnVarPrepForStore($mlanguage) . "'
            WHERE $column[mid]='" . pnVarPrepForStore($mid)."'";
    $result = $dbconn->Execute($sql);
    if($dbconn->ErrorNo() != 0) {
        error_log("Error: " . $dbconn->ErrorMsg());
    }
    pnRedirect('admin.php?module='.$GLOBALS['module'].'&op=messages');
}

function addmsg()
{
    if (!pnSecConfirmAuthKey()) {
        include 'header.php';
        echo _BADAUTHKEY;
        include 'footer.php';
        exit;
    }
    list($title,
         $content,
         $mdate,
         $expire,
         $active,
         $view,
         $mlanguage) = pnVarCleanFromInput('add_title',
                                           'add_content',
                                           'add_mdate',
                                           'add_expire',
                                           'add_active',
                                           'add_view',
                                           'add_mlanguage');

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    if (!pnSecAuthAction(0, 'Messages::', "$title::", ACCESS_ADD)) {
        include 'header.php';
        echo _MESSAGESADDNOAUTH;
        include 'footer.php';
        return;
    }
    
    // Work out expiry of message
    if ($expire  != 0) {
        $expire += time();
    }
    //" . pnVarPrepForStore($expire) . ", -- Removed as a temp fix
    $column = &$pntable['message_column'];
    $nextid = $dbconn->GenId($pntable['message']);
    $sql = "INSERT INTO $pntable[message]
              ($column[mid],
               $column[title],
               $column[content],
               $column[date],
               $column[expire],
               $column[active],
               $column[view],
               $column[mlanguage])
            VALUES
              (" . pnVarPrepForStore($nextid) . ",
              '" . pnVarPrepForStore($title) . "',
              '" . pnVarPrepForStore($content) . "',
              '" . pnVarPrepForStore($mdate) . "',
              0,
              " . pnVarPrepForStore($active) . ",
              " . pnVarPrepForStore($view) . ",
              '" . pnVarPrepForStore($mlanguage) . "')";
    $result = $dbconn->Execute($sql);
    if($dbconn->ErrorNo() != 0) {
        error_log("Error: " . $dbconn->ErrorMsg());
        echo $dbconn->ErrorNo(). ": ".$dbconn->ErrorMsg(). "<br>";
        exit();
    }

    pnRedirect('admin.php?module='.$GLOBALS['module'].'&op=messages');
}

function deletemsg()
{
    list($mid,
         $ok) = pnVarCleanFromInput('mid',
                                    'ok');

    if (!isset($ok)) {
        $ok = 0;
    }

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $column = &$pntable['message_column'];
    $result = $dbconn->Execute("SELECT $column[title]
                                FROM $pntable[message]
                                WHERE $column[mid] = '" . pnVarPrepForStore($mid)."'");
    list($title) = $result->fields;
    $result->Close();
    if (!pnSecAuthAction(0, 'Messages::', "$title::$mid", ACCESS_DELETE)) {
        include 'header.php';
        echo _MESSAGESDELNOAUTH;
        include 'footer.php';
        return;
    }
    if ($ok) {
        if (!pnSecConfirmAuthKey()) {
            include 'header.php';
            echo _BADAUTHKEY;
            include 'footer.php';
            return;
        }
            
        $result = $dbconn->Execute("DELETE FROM $pntable[message]
                                    WHERE $column[mid]='" . pnVarPrepForStore($mid)."'");
        if($dbconn->ErrorNo() != 0) {
            error_log("Error: " . $dbconn->ErrorMsg());
            echo $dbconn->ErrorNo(). ": ".$dbconn->ErrorMsg(). "<br>";
            return;
        }

        pnRedirect('admin.php?module='.$GLOBALS['module'].'&op=messages');
    } else {
        include("header.php");
        GraphicAdmin();
        OpenTable();
        echo "<center><font class=\"pn-title\"><b>"._MESSAGESADMIN."</b></font></center>";
        CloseTable();

	OpenTable();
        echo "<center><font class=\"pn-normal\">"._REMOVEMSG." <b>$mid </font></b>";
        echo "<table><tr><td>\n";
        echo myTextForm("admin.php?module=".$GLOBALS['module']."&op=messages", _NO);
        echo "</td><td>\n";
        echo myTextForm("admin.php?module=".$GLOBALS['module']."&op=deletemsg&amp;mid=$mid&amp;ok=1&amp;authid=" . pnSecGenAuthKey(), _YES);
        echo "</td></tr></table>\n";
        echo "</center>\n";
        CloseTable();
        include("footer.php");
    }
}

function admin_messages_admin_main($var)
{
   $op = pnVarCleanFromInput('op');

   if (!(pnSecAuthAction(0, 'Messages::', '::', ACCESS_EDIT))) {
      include 'header.php';
       echo _MESSAGESNOAUTH;
       include 'footer.php';
   } else {
       switch ($op){

        case "messages":
            messages();
            break;

        case "editmsg":
            
            editmsg();
            break;

        case "addmsg":
            addmsg();
            break;

        case "deletemsg":
            deletemsg();
            break;

        case "savemsg":
            savemsg();
            break;
            
        default:
            messages();
            break;
       }
   }
}

?>
