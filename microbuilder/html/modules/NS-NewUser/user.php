<?php
// File: $Id: user.php,v 1.1 2004/03/01 10:09:01 mbertier Exp $ $Name:  $
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

// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.

// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.

// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Original Author of this file:
// Purpose of this file:  new user routines
// ----------------------------------------------------------------------
// Added calls to pnVarCleanFromInput since it's more secure than using $var[]. - Skooter
$ModName = 'NS-NewUser';
modules_get_language();

function newuser_user_underage()
{
    include 'header.php';

    OpenTable();
    echo "<font class=\"pn-title\">" . _SORRY . "</font>";
    echo "<br><br>\n" . "<font class=\"pn-normal\">" . _MUSTBE . " $minage " . _MUSTBE . "<br>" . "<br>" . _CLICK . "<a href=\"index.php\">" . _HERE . "</a> " . _RETURN . "</font><br>\n";
    CloseTable();
    include 'footer.php';
}

function newuser_user_check_age($var)
{
    $sitename = pnConfigGetVar('sitename');
    // new by class007
    include 'header.php';
    if (!pnConfigGetVar('reg_allowreg')) {
        echo "<b>"._REGISTERDISABLED."<br>"._REASONS."</b><br>&nbsp;&nbsp;&nbsp;&nbsp;" . pnVarPrepForDisplay(pnConfigGetVar('reg_noregreasons')) . "<br><br>";
        include 'footer.php';
        return false;
    }

    OpenTable();
    echo "<center>" . "<font class=\"pn-title\">" . _WELCOMETO . " " . pnVarPrepForDisplay($sitename) . " " . _REGISTRATION . "</font>" . "<br><br>\n" . "<font class=\"pn-normal\">" . _MUSTBE . " $minage " . _MUSTBE . "</font><br>\n" . "<a href=\"user.php?op=register&amp;module=NS-NewUser\">" . "" . _OVER13 . "" . "</a><br><br>" . "<font class=\"pn-normal\">" . _CONSENT . "</font><br><br>\n" . "<a href=\"user.php?op=underage&amp;module=NS-NewUser\">" . "" . _UNDER13 . "</a><br>\n" . "</font></center>\n";
 //   echo "<center>" . "<font class=\"pn-title\">" . _WELCOMETO . " " . pnVarPrepForDisplay($sitename) . " " . _REGISTRATION . "</font>" . "<br><br>\n" . "<font class=\"pn-normal\">" . _MUSTBE . " $minage " . _MUSTBE . "</font><br>\n" . "<a href=\"user.php?op=register&amp;module=NS-NewUser\">" . "" . _OVER13a . " $minage " . _OVER13b . "" . "</a><br><br>" . "<font class=\"pn-normal\">" . _CONSENT1 . " $minage " . _CONSENT2 . "</font><br><br>\n" . "<a href=\"user.php?op=underage&amp;module=NS-NewUser\">" . "" . _UNDER13a . " $minage " . _UNDER13b . "" . "</a><br>\n" . "</font></center>\n";

    CloseTable();
    include 'footer.php';
}

function newuser_user_register()
{
    $system = pnConfigGetVar('system');

    include 'header.php';
    // new by class007
    if (!pnConfigGetVar('reg_allowreg')) {
		echo "<b>" . _REGISTERDISABLED . "<br>" . _REASONS . "</b><br>&nbsp;&nbsp;&nbsp;&nbsp;" . pnVarPrepForDisplay(pnConfigGetVar('reg_noregreasons')) . "<br><br>";
        include 'footer.php';
        return false;
    }

    OpenTable();
	echo "<font class=\"pn-title\">" . _REGNEWUSER . "</font><br /><br />\n"
		."<font class=\"pn-title\">" . _REGISTERNOW . "</font><br />\n"
		."<font class=\"pn-normal\">" ._WEDONTGIVE . "</font>\n";
	CloseTable();
	
	OpenTable();
	echo "<form name=\"Register\" action=\"user.php\" method=\"post\">\n"
		."<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\">\n"
		. "<tr><td width='25%' align='right'><font class=\"pn-normal\"><b>"
		. _NICKNAME . ":</b> </font></td>"
		. "<td width=\"75%\"><input type=\"text\" name=\"uname\" size=\"35\" maxlength=\"25\"></td></tr>\n";

		// new by class007. echo password area if admin do not want to verify email.
	if (!pnConfigGetVar('reg_verifyemail')) {
		echo "<tr>"
			."<td align='right'><font class=\"pn-normal\"><b>" . _PASSWORD . "</b></font></td>"
			."<td><input type=\"password\" name=\"pass\" size=\"35\" maxlength=\"60\"></td>"
			."</tr>\n"
			."<tr>"
			."<td align=\"right\"><font class=\"pn-normal\"><b>" . _PASSWDAGAIN . "</b></font></td>"
			."<td><input type=\"password\" name=\"vpass\" size=\"35\" maxlength=\"60\"></td>"
			."</tr>\n";
	}

	echo "<tr>"
		."<td align='right'><font class=\"pn-normal\"><b>" . _EMAIL . "</b></font></td>"
		."<td><input type=\"text\" name=\"email\" size=\"35\" maxlength=\"60\"></td>"
		."</tr>\n"
		."<tr>"
		."<td align='right'><font class=\"pn-normal\"><b>" . _EMAILAGAIN . "</b></font></td>"
		."<td><input type=\"text\" name=\"vemail\" size=\"35\" maxlength=\"60\"></td>"
		."</tr>\n";

	// edit by class007
	if (pnConfigGetVar('reg_verifyemail')) {
		echo "<tr>"
			."<td width='75'>&nbsp;</td>"
			."<td><font class=\"pn-normal\">" . _PASSWILLSEND . "</font></td>"
			."</tr>\n";
	}

	echo "<tr>"
		."<td align='right'><font class=\"pn-normal\"><b>" . _OPTION . ":</b></font></td>"
		."<td><INPUT TYPE=\"CHECKBOX\" NAME=\"user_viewemail\" VALUE=\"1\"><font class=\"pn-normal\"> " . _ALLOWEMAILVIEW . "</font></td>"
		."</tr>\n";

	// Check for legal module
	if (pnModAvailable("legal")) {
		echo "<tr>"
			."<td width='75' align='right'><font class=\"pn-normal\">&nbsp;</font></td>"
			."<td>"
			."<INPUT TYPE=\"CHECKBOX\" NAME=\"agreetoterms\" VALUE=\"1\"><font class=\"pn-normal\">" . _REGISTRATIONAGREEMENT . " <a href=\"modules.php?op=modload&amp;name=legal&amp;file=index\">" . _TERMSOFUSE . "</a> " . _ANDCONNECTOR . " <a href=\"modules.php?op=modload&amp;name=legal&amp;file=privacy\">" . _PRIVACYPOLICY . "</a>.</font></td>"
			."</tr>\n";
	}

	echo "<tr>"
		."<td align='right'>&nbsp;</td>"
		."<td><input type=\"hidden\" name=\"module\" value=\"NS-NewUser\">\n"
		."<input type=\"hidden\" name=\"op\" value=\"finishnewuser\">\n"
		."<input type=\"submit\" value=\""
		. _NEWUSER . "\">\n" . "</td>"
		."</tr>\n";

	echo "<tr>"
		."<td>&nbsp;</td>"
		."<td><font class=\"pn-normal\">" . _COOKIEWARNING . "</font></td>"
		."</tr>";

	if (pnConfigGetVar('reg_optitems')) {
		echo "<tr>"
			."<td>&nbsp;</td>"
			."<td><font class=\"pn-normal\"><b>" . _ASREGUSER . "</b></font><br>\n"
			."<font class=\"pn-normal\">" 
			."<br />- " . _ASREG1
			."<br />- " . _ASREG2
			."<br />- " . _ASREG3
			."<br />- " . _ASREG4
			."<br />- " . _ASREG5
			."<br />- " . _ASREG6
			."<br />- " . _ASREG7
			."</font></td>"
			."</tr>\n";

		echo "<tr>"
			."<td>&nbsp;</td>"
			."<td><font class=\"pn-normal\"><b>" . _OPTIONALITEMS . "</b></font></td>"
			."</tr>\n" . "";
			// Display optional items to register
		optionalitems();
	}
	echo "</table>\n";
	echo "</form>\n";
	CloseTable();
	include 'footer.php';
}

function userCheck($uname, $email, $agreetoterms)
{
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $stop = '';
    $res = pnVarValidate($email, 'email');
    if ($res == false) {
        $stop = "<center><font class=\"pn-title\">" . _ERRORINVEMAIL . "</center></font><br>";
    }
    // Check for legal module
    if (pnModAvailable("legal")) {
        // If legal var agreetoterms checkbox not checked, value is 0 and results in error
        if ($agreetoterms == 0) {
            $stop = "<center><font class=\"pn-title\">" . _ERRORMUSTAGREE . "</center></font><br>";
        }
    }
    // By this test (without on printable characters) it should be possible to have
    // eg. Chinese characters on the username. (hinrich, 2002-07-03, reported by class 007

    if ((!$uname) || !(/**
                 * preg_match("/^[[:print:]]+/",$uname) &&
                 */!preg_match("/[[:space:]]/", $uname))) {
        // Here we test the uname. Any value is possible but space.
        // On special character sets you might configure the server.
        // (was bug #455288)
        // if ((!$uname) || !(ereg("^[[:print:]]+",$uname) && !ereg("[[:space:]]",$uname))) {
        /**
         * if ((!$uname) || ($uname=="") || (ereg("[^a-zA-Z0-9_-]",$uname))) {
         */

        $stop = "<center><font class=\"pn-title\">" . _ERRORINVNICK . "</center></font><br>";
    }
    if (strlen($uname) > 25) {
        $stop = "<center><font class=\"pn-title\">" . _NICK2LONG . "</center></font>";
    }
    // Illegal Usernames [class007]
    $reg_illegalusername = pnConfigGetVar('reg_Illegalusername');
    if (!empty($reg_illegalusername)) {
        $usernames = explode(" ", $reg_illegalusername);
        $count = count($usernames);
        $pregcondition = "/((";
        for ($i = 0;$i < $count;$i++) {
            if ($i != $count-1) {
                $pregcondition .= $usernames[$i] . ")|(";
            } else {
                $pregcondition .= $usernames[$i] . "))/iAD";
            }
        }
        // die ($pregcondition);
        if (preg_match($pregcondition, $uname)) {
            $stop = "<center><font class=\"pn-title\">" . _NAMERESERVED . "</center></font>";
        }
    }
    if (strrpos($uname, ' ') > 0) {
        $stop = "<center><font class=\"pn-title\">" . _NICKNOSPACES . "</center></font>";
    }
    $column = &$pntable['users_column'];
    $existinguser = $dbconn->Execute("SELECT $column[uname] FROM $pntable[users] WHERE $column[uname]='" . pnVarPrepForStore($uname) . "'");
    if (!$existinguser->EOF) {
        $stop = "<center><font class=\"pn-title\">" . _NICKTAKEN . "</center></font><br>";
    }
    $existinguser->Close();
    $existinguser = $dbconn->Execute("SELECT $column[email] FROM $pntable[users] WHERE $column[email]='" . pnVarPrepForStore($email) . "'");
    // new by class007
    if (pnConfigGetVar('reg_uniemail')) {
        if (!$existinguser->EOF) {
            $existinguser = $dbconn->Execute("SELECT $column[email] FROM $pntable[users] WHERE $column[email]='" . pnVarPrepForStore($email) . "'");
            $stop = "<center><font class=\"pn-title\">" . _EMAILREGISTERED . "</center></font><br>";
            $existinguser->Close();
        }
    }
    return($stop);
}

/**
 * We do not need this function. [class007]
 * function newuser_user_confirmNewUser($var)
 * {
 * list($uname,$user_viewemail,$email,$agreetoterms) =
 * pnVarCleanFromInput('uname','user_viewemail','email','agreetoterms');
 *
 * include 'header.php';
 *
 * $uname = filter_text($uname);
 *
 * if(isset($user_viewemail) && $user_viewemail == 1) {
 * $user_viewemail = "1";
 * $femail = $email;
 * } else {
 * $user_viewemail = "0";
 * $femail = "-";
 * }
 * if(empty($agreetoterms)) {
 * $agreetoterms = '0';
 * }
 * //Removed if since there is not error checkin in this function it's not necessary.
 * // Audits are completed in the finishnewuser function below. - skooter
 * //if (!$stop) {
 * OpenTable();
 * echo "<font class=\"pn-normal\">"._USERNAME.": ".pnVarPrepForDisplay($uname)."<br>"
 * .""._EMAIL.": ".pnVarPrepForDisplay($email)."<br></font><br><br>\n";
 * echo ""._GOBACK."";
 * echo "<form action=\"user.php\" method=\"post\">"
 * ."<input type=\"hidden\" name=\"uname\" value=\"$uname\">"
 * ."<input type=\"hidden\" name=\"email\" value=\"$email\">"
 * ."<input type=\"hidden\" name=\"agreetoterms\" value=\"$agreetoterms\">"
 * ."<input type=\"hidden\" name=\"user_viewemail\" value=\"$user_viewemail\">"
 * ."<input type=\"hidden\" name=\"op\" value=\"finishnewuser\">"
 * ."<input type=\"hidden\" name=\"module\" value=\"NS-NewUser\">"
 * ."<input type=\"submit\" value=\""._FINISH."\"></form>";
 * CloseTable();
 * //} else {
 * //    OpenTable();
 * //    echo "<center><font class=\"pn-title\">Registration Error!</font><br><br>";
 * //    echo "<font class=\"pn-normal\">$stop<br>"._GOBACK."</font></center>";
 * //    CloseTable();
 * //}
 * include 'footer.php';
 * }
 */

function newuser_user_finishnewuser($var)
{
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    list($name,
        $agreetoterms,
        $email,
        $femail,
        $vemail,
        $url,
        $pass,
        $vpass,
        $bio,
        $uname,
        $user_avatar,
        $user_icq,
        $user_occ,
        $user_from,
        $user_intrest,
        $user_sig,
        $user_aim,
        $user_yim,
        $user_msnm,
        $user_viewemail,
        $timezoneoffset,
        $dynadata) = pnVarCleanFromInput('name',
        'agreetoterms',
        'email',
        'femail',
        'vemail',
        'url',
        'pass',
        'vpass',
        'bio',
        'uname',
        'user_avatar',
        'user_icq',
        'user_occ',
        'user_from',
        'user_intrest',
        'user_sig',
        'user_aim',
        'user_yim',
        'user_msnm',
        'user_viewemail',
        'timezoneoffset',
        'dynadata');

    $system = pnConfigGetVar('system');
    $adminmail = pnConfigGetVar('adminmail');
    $sitename = pnConfigGetVar('sitename');
    $siteurl = pnGetBaseURL();
    $Default_Theme = pnConfigGetVar('Default_Theme');
    $commentlimit = pnConfigGetVar('commentlimit');
    $storynum = pnConfigGetVar('storyhome');
    if (!pnConfigGetVar('reg_optitems')) {
            // if we don't show optional items
            // we should set the timezone based on site settings
            $timezoneoffset = pnConfigGetVar('timezone_offset');
    }
    $minpass = pnConfigGetVar('minpass'); //by class007

    include 'header.php';
    $stop = userCheck($uname, $email, $agreetoterms);
    // add vpass and vemail check. by class007
    // TODO: remove it to userCheck() [class007]
    if ((isset($pass)) && ("$pass" != "$vpass")) {
        $stop = "<center><font class=\"pn-title\">" . _PASSDIFFERENT . "</center></font><br><br><br><br>";
    } elseif (($pass != "") && (strlen($pass) < $minpass)) {
        $stop = "<center><font class=\"pn-title\">" . _YOURPASSMUSTBE . " $minpass " . _CHARLONG . "</center></font><br><br><br><br>";
    } elseif (empty($pass) && !pnConfigGetVar('reg_verifyemail')) {
        $stop = "<center><font class=\"pn-title\">" . _PASSWDNEEDED . "</center></font><br><br><br><br>";
    } elseif ("$email" != "$vemail") {
        $stop = "<center><font class=\"pn-title\">" . _EMAILSDIFF . "</center></font><br><br><br><br>";
    }
    $user_regdate = time();
    if (empty($user_avatar)) $user_avatar = 'blank.gif';
    if (empty($stop)) {
        if (pnConfigGetVar('reg_verifyemail')) {
            $makepass = makepass();
            $cryptpass = md5($makepass);
        } else {
            $makepass = $pass; // for welcome email. [class007]
            $cryptpass = md5($pass);
        }
        $uid = $dbconn->GenId($pntable['users']);
        $column = &$pntable['users_column'];
        $result = $dbconn->Execute("INSERT INTO $pntable[users] ($column[name], $column[uname], $column[email],
                           $column[femail], $column[url], $column[user_avatar], $column[user_regdate], $column[user_icq],
                           $column[user_occ], $column[user_from], $column[user_intrest], $column[user_sig],
                           $column[user_viewemail], $column[user_theme], $column[user_aim], $column[user_yim],
                           $column[user_msnm], $column[pass], $column[storynum], $column[umode], $column[uorder],
                           $column[thold], $column[noscore], $column[bio], $column[ublockon], $column[ublock],
                           $column[theme], $column[commentmax], $column[counter], $column[timezone_offset])
                           VALUES ('" . pnVarPrepForStore($name) . "','" . pnVarPrepForStore($uname) . "',
                           '" . pnVarPrepForStore($email) . "','" . pnVarPrepForStore($femail) . "',
                           '" . pnVarPrepForStore($url) . "','" . pnVarPrepForStore($user_avatar) . "',
                           '" . pnVarPrepForStore($user_regdate) . "','" . pnVarPrepForStore($user_icq) . "',
                           '" . pnVarPrepForStore($user_occ) . "','" . pnVarPrepForStore($user_from) . "',
                           '" . pnVarPrepForStore($user_intrest) . "','" . pnVarPrepForStore($user_sig) . "',
                           '" . pnVarPrepForStore($user_viewemail) . "','',
                           '" . pnVarPrepForStore($user_aim) . "','" . pnVarPrepForStore($user_yim) . "',
                           '" . pnVarPrepForStore($user_msnm) . "','" . pnVarPrepForStore($cryptpass) . "',
                           '" . pnVarPrepForStore($storynum) . "','',0,0,0,'" . pnVarPrepForStore($bio) . "',0,'','',
                           '" . pnVarPrepForStore($commentlimit) . "', '0', '" . pnVarPrepForStore($timezoneoffset) . "')");
        // insert dynadata [class007]
        if (!empty($dynadata) && is_array($dynadata)) {
            while (list($key, $val) = each($dynadata)) {
                pnUserSetVar($key, $val);
            }
        }

        if ($dbconn->ErrorNo() <> 0) {
            echo $dbconn->ErrorNo() . ": " . $dbconn->ErrorMsg() . "<br>";
            error_log ($dbconn->ErrorNo() . ": " . $dbconn->ErrorMsg() . "<br>");
        } else {
            // get the generated id
            $uid = $dbconn->PO_Insert_ID($pntable['users'], $column['uid']);
            // Add user to group
            $column = &$pntable['groups_column'];
            $result = $dbconn->Execute("SELECT $column[gid]
                                      FROM $pntable[groups]
                                      WHERE $column[name]='" . pnConfigGetVar('defaultgroup') . "'");
            if ($dbconn->ErrorNo() <> 0) {
                echo $dbconn->ErrorNo() . _GETGROUP . $dbconn->ErrorMsg() . "<br>";
                error_log ($dbconn->ErrorNo() . _GETGROUP . $dbconn->ErrorMsg() . "<br>");
            } else {
                if (!$result->EOF) {
                    list($gid) = $result->fields;
                    $result->Close();
                    $column = &$pntable['group_membership_column'];
                    $result = $dbconn->Execute("INSERT INTO $pntable[group_membership] ($column[gid], $column[uid])
                                              VALUES (" . pnVarPrepForStore($gid) . ", " . pnVarPrepForStore($uid) . ")");
                    if ($dbconn->ErrorNo() <> 0) {
                        echo $dbconn->ErrorNo() . _CREATEGROUP . $dbconn->ErrorMsg() . "<br>";
                        error_log ($dbconn->ErrorNo() . _CREATEGROUP . $dbconn->ErrorMsg() . "<br>");
                    }
                }
                $message = "" . _WELCOMETO . " $sitename ($siteurl)!\n\n" . _YOUUSEDEMAIL . " ($email) " . _TOREGISTER . " $sitename. " . _FOLLOWINGMEM . "\n\n" . _UNICKNAME . " $uname\n" . _UPASSWORD . " $makepass";
                $subject = "" . _USERPASS4 . " $uname" . _USERPASS42 . "";
                $from = "$adminmail";
                /**
                 * if ($system == 1) {
                 * echo "<table align=\"center\"><tr><td><font class=\"pn-normal\">"._YOURPASSIS." <b>$makepass</b></font><br>";
                 * echo "<a class=\"pn-normal\" href=\"user.php?module=NS-User&op=login&uname=$uname&pass=$makepass&url=user.php\">"._LOGIN."</a><font class=\"pn-normal\"> "._2CHANGEINFO."</font></td></tr></table>";
                 * } else {
                 */
                // 11-09-01 eugeniobaldi not compliant with PHP < 4.0.5
                // pnMail($email, $subject, $message, "From: $from\nX-Mailer: PHP/" . phpversion(), "-f$from");
                // if (pnConfigGetVar('reg_verifyemail')) {
                pnMail($email, $subject, $message, "From: $from\nX-Mailer: PHP/" . phpversion(), 0);
                // }
                if (pnConfigGetVar('reg_notifyemail') != "") {
                    $email2 = pnConfigGetVar('reg_notifyemail');
                    $subject2 = _NOTIFYEMAILSUB;
                    $message2 = _NOTIFYEMAILCONT1 . "$uname" . _NOTIFYEMAILCONT2;
                    pnMail($email2, $subject2, $message2, "From: $from\nX-Mailer: PHP/" . phpversion(), 0);
                }

                OpenTable();
                echo "<font class=\"pn-normal\">" . _YOUAREREGISTERED . "</font>";
                CloseTable();
            }
        }
    } else {
        echo "$stop";
    }
    include 'footer.php';
}

function optionalitems() {
     list($dbconn) = pnDBGetConn();
     $pntable = pnDBGetTables();

     //OpenTable();
     $propertytable = $pntable['user_property'];
     $propertycolumn = &$pntable['user_property_column'];

     $sql = "select " . $propertycolumn['prop_id'] . " AS prop_id, " . $propertycolumn['prop_label'] . " AS prop_label, " . $propertycolumn['prop_dtype'] . " AS prop_dtype, " . $propertycolumn['prop_length'] . " AS prop_length, " . $propertycolumn['prop_weight'] . " AS prop_weight, " . $propertycolumn['prop_validation'] . " AS prop_validation " . "FROM " . $propertytable . " " . "WHERE " . $propertycolumn['prop_weight'] . "!=0 ORDER BY " . $propertycolumn['prop_weight'];

     $result = $dbconn->Execute($sql);

     $core_fields = array();
     //echo "<table cellpadding=\"0\" border=\"0\" class=\"pn-normal\">";
     while (!$result->EOF) {
         list($prop_id, $prop_label, $prop_dtype, $prop_length, $prop_weight, $prop_validation) = $result->fields;
         $result->MoveNext();
         // do not display email & fakeemail & password
         if ($prop_label != "_UREALEMAIL" && $prop_label != "_PASSWORD") {
             $prop_label_text = "";
             $eval_cmd = "\$prop_label_text=$prop_label;";
             @eval($eval_cmd);
             if (empty($prop_label_text)) {
                 $prop_label_text = $prop_label;
             }

             echo "<tr><td valign=\"top\" align=\"right\">" . $prop_label_text . ":</td>" . "<td valign=\"top\" class=pn-normal>";
             switch ($prop_dtype) {
                 case _UDCONST_MANDATORY;
                 case _UDCONST_CORE;
                     $core_fields[] = $prop_label;
                     switch ($prop_label) {
                         case "_UREALNAME":
                             echo "<input type=\"text\" name=\"name\" value=\"" . pnVarPrepForDisplay(pnUserGetVar('name')) . "\" size=\"30\" maxlength=\"60\">";
                             break;
                         case "_UREALEMAIL":
                             // echo "<input type=\"text\" name=\"email\" value=\"" . pnVarPrepForDisplay(pnUserGetVar('email')) . "\" size=\"30\" maxlength=\"60\">"
                             // ."&nbsp;"._REQUIRED."&nbsp;"._EMAILNOTPUBLIC."</td>";
                             break;
                         case "_UFAKEMAIL":
                             echo "<input type=\"text\" name=\"femail\" value=\"" . pnVarPrepForDisplay(pnUserGetVar('femail')) . "\" size=\"30\" maxlength=\"60\">";
                             break;
                         case "_YOURHOMEPAGE":
                             echo "<input type=\"text\" name=\"url\" value=\"" . pnVarPrepForDisplay(pnUserGetVar('url')) . "\" size=\"30\" maxlength=\"100\">";
                             break;
                         case "_TIMEZONEOFFSET":
                             $tzoffset = pnConfigGetVar('timezone_offset');
                             global $tzinfo;
                             echo "<select name=\"timezoneoffset\" class=\"pn-normal\">";
                             foreach ($tzinfo as $tzindex => $tzdata) {
                                 echo "\n<option value=\"$tzindex\"";
                                 if ($tzoffset == $tzindex) {
                                     echo " selected";
                                 }
                                 echo ">";
                                 echo $tzdata;
                                 echo "</option>";
                             }
                             echo "</select></td>";
                             break;
                         case "_YOURAVATAR":
                             $user_avatar = pnUserGetVar('user_avatar');
                             echo "<select name=\"user_avatar\" onChange=\"showimage()\" class=\"pn-normal\">";
                             $handle = opendir('images/avatar');
                             while ($file = readdir($handle)) {
                                 $filelist[] = $file;
                             }
                             asort($filelist);
                             while (list ($key, $file) = each ($filelist)) {
                                 ereg(".gif|.jpg", $file);
                                 if ($file != "." && $file != ".." && $file != "CVS" && $file != "index.html") {
                                                                         echo "<option value=\"$file\"";
                                         if ($file == "blank.gif") {
                                         echo " selected";
                                         }
                                         echo ">$file</option>";
                                 }
                             }
                             echo "</select>&nbsp;&nbsp;<img src=\"images/avatar/blank.gif\" name=\"avatar\" width=\"32\" height=\"32\" alt=\"\" align=\"top\">" . "</td>";
                             break;
                         case "_YICQ":
                             echo "<input type=\"text\" name=\"user_icq\" value=\"" . pnVarPrepForDisplay(pnUserGetVar('user_icq')) . "\" size=\"30\" maxlength=\"100\">";
                             break;
                         case "_YAIM":
                             echo "<input type=\"text\" name=\"user_aim\" value=\"" . pnVarPrepForDisplay(pnUserGetVar('user_aim')) . "\" size=\"30\" maxlength=\"100\">";
                             break;
                         case "_YYIM":
                             echo "<input type=\"text\" name=\"user_yim\" value=\"" . pnVarPrepForDisplay(pnUserGetVar('user_yim')) . "\" size=\"30\" maxlength=\"100\">";
                             break;
                         case "_YMSNM":
                             echo "<input type=\"text\" name=\"user_msnm\" value=\"" . pnVarPrepForDisplay(pnUserGetVar('user_msnm')) . "\" size=\"30\" maxlength=\"100\">";
                             break;
                         case "_YLOCATION":
                             echo "<input type=\"text\" name=\"user_from\" value=\"" . pnVarPrepForDisplay(pnUserGetVar('user_from')) . "\" size=\"30\" maxlength=\"100\">";
                             break;
                         case "_YOCCUPATION":
                             echo "<input type=\"text\" name=\"user_occ\" value=\"" . pnVarPrepForDisplay(pnUserGetVar('user_occ')) . "\" size=\"30\" maxlength=\"100\">";
                             break;
                         case "_YINTERESTS":
                             echo "<input type=\"text\" name=\"user_intrest\" value=\"" . pnVarPrepForDisplay(pnUserGetVar('user_intrest')) . "\" size=\"30\" maxlength=\"100\">";
                             break;
                         case "_SIGNATURE":
                             echo "<textarea cols=\"80\" rows=\"10\" name=\"user_sig\" class=\"pn-normal\">" . pnVarPrepForDisplay(pnUserGetVar('user_sig')) . "</textarea>" . "<br><font class=\"pn-normal\">" . _OPTIONAL . "" . "&nbsp;" . _255CHARMAX . "<br>" . "" . _ALLOWEDHTML . "<br>";
                             $AllowableHTML = pnConfigGetVar('AllowableHTML');
                             while (list($key, $access,) = each($AllowableHTML)) {
                                 if ($access > 0) echo " &lt;" . $key . "&gt;";
                             }
                             echo "</font></td>";
                             break;
                         case "_EXTRAINFO":
                             echo "<textarea cols=\"80\" rows=\"10\" name=\"bio\" class=\"pn-normal\">" . pnVarPrepForDisplay(pnUserGetVar('bio')) . "</textarea>" . "&nbsp;<br><font class=\"pn-normal\">" . _CANKNOWABOUT . "</font></td>";
                             break;

                         case "_PASSWORD":
                             // echo "<input type=\"password\" name=\"pass\" size=\"10\" maxlength=\"20\">&nbsp;&nbsp;<input type=\"password\" name=\"vpass\" size=\"10\" maxlength=\"20\">"
                             // ."&nbsp;<font class=\"pn-normal\">"._TYPENEWPASSWORD."</font>";
                             break;
                         default:
                             echo "Undefined $prop_id, $prop_label, $prop_dtype, $prop_length, $prop_weight, $prop_validation </td>";
                     }
                     break;

                 case _UDCONST_STRING:
                     if (empty($prop_length)) $prop_length = 30;
                     echo "<input type=\"text\" name=\"dynadata[$prop_label]\" value=\"" . pnVarPrepForDisplay(pnUserGetVar($prop_label)) . "\" size=\"30\" maxlength=\"$prop_length\">";
                     break;

                 case _UDCONST_TEXT:
                     echo "<textarea wrap=\"virtual\" cols=\"80\" rows=\"10\" name=\"dynadata[$prop_label]\" class=\"pn-normal\">" . pnVarPrepForDisplay(pnUserGetVar($prop_label)) . "</textarea>";
                     break;

                 case _UDCONST_FLOAT:
                 case _UDCONST_INTEGER:
                     echo "<input type=\"text\" name=\"dynadata[$prop_label]\" value=\"" . pnVarPrepForDisplay(pnUserGetVar($prop_label)) . "\" size=\"30\" maxlength=\"100\">";
                     break;
             }
             echo "</tr>";
         }
     }
     //echo "</table>";

     //CloseTable();
}
?>