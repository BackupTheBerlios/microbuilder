<?php // $Id: index.php,v 1.1 2004/03/01 10:08:58 mbertier Exp $ $Name:  $
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
// Purpose of file: displays the FAQS
// ----------------------------------------------------------------------
// Based on Automated FAQ
// Copyright (c) 2001 by
//    Richard Tirtadji AKA King Richard (rtirtadji@hotmail.com)
//    Hutdik Hermawan AKA hotFix (hutdik76@hotmail.com)
// http://www.phpnuke.web.id
// ----------------------------------------------------------------------

if (!defined("LOADED_AS_MODULE")) {
         die ("You can't access this file directly...");
     }
/**
 * Credits to Edgar Miller -- http://www.bosna.de/ from his post on PHP-Nuke
 * (http://phpnuke.org/article.php?sid=2010&mode=nested&order=0&thold=0)
 * Further Credits go to Djordjevic Nebojsa (nesh) for the fix for the fix
 */

$ModName = basename( dirname( __FILE__ ) );

modules_get_language();

// Security check
if (!pnSecAuthAction(0, 'FAQ::', '::', ACCESS_READ)) {
	include 'header.php';
	echo _BADAUTHKEY;
	include 'footer.php';
	return;
}

function ShowFaq() {
	$id_cat = pnVarCleanFromInput('id_cat');

    if (!isset($id_cat) || !is_numeric($id_cat)) {
	    // markwest - removed unneeded call to header.php
		// results is path disclosure if invalid $id_cat
        //include 'header.php';
        echo _MODARGSERROR;
        include 'footer.php';
        exit;
    }
    
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();
    $column = &$pntable['faqcategories_column'];

    $currentlang = pnUserGetLang();

    if (pnConfigGetVar('multilingual') == 1) {
        $querylang = "AND ($column[flanguage]='".pnVarPrepForStore($currentlang)."' OR $column[flanguage]='')"; /* the OR is needed to display stories who are posted to ALL languages */
    } else {
    	$querylang = "";
    }
    
    // get catname for authcheck
    $presult = $dbconn->Execute("SELECT $column[categories], $column[parent_id]
                                   FROM $pntable[faqcategories]
                                   WHERE $column[id_cat]='".(int)pnVarPrepForStore($id_cat)."' $querylang");
    list($categories, $parent_id) = $presult->fields;

    if (pnSecAuthAction(0,"FAQ::","$categories::$id_cat",ACCESS_READ)) {
	    OpenTable();
		echo "<center>"
			."<font class=\"pn-pagetitle\">".pnConfigGetVar('sitename').' '._FAQ2."</font>"
			."</center>"
			."<br />";
    	CloseTable();

    	OpenTable();

    	if (pnSecAuthAction(0,"FAQ::","$categories::$id_cat",ACCESS_COMMENT)) {
		echo"<center>"
			."<font class=\"pn-normal\">"
    	    ."<b>[ <a href=\"modules.php?op=modload&amp;name=".$GLOBALS['ModName']."&amp;file=index&amp;myfaq=yes&amp;askaquestion=yes&amp;id_cat=0\">"._ASKAQUESTION."</a> ]</b>"
		    ."</font>"
    	    ."</center><br>";
    	}
        
    	echo "<a name=\"top\"></a><br>"
			."<font class=\"pn-normal\">"._CATEGORY.":</font> <a class=\"pn-normal\" href=\"modules.php?op=modload&amp;name=".$GLOBALS['ModName']."&amp;file=index\">"._MAIN."</a>";

    	if($parent_id > 0) {
    	    $column = &$pntable['faqcategories_column'];
    	    $presult = $dbconn->Execute("SELECT $column[categories]
    	                               FROM $pntable[faqcategories]
    	                               WHERE $column[id_cat]='".(int)pnVarPrepForStore($parent_id)."' $querylang");
    	    list($pcategories) = $presult->fields;

    	    $pcatname = urlencode($pcategories);
    	    echo "<font class=\"pn-normal\"> -> <a href=\"modules.php?op=modload&amp;name=".$GLOBALS['ModName']."&amp;file=index&amp;myfaq=yes&amp;id_cat=$parent_id&amp;parent_id=0\">".pnVarPrepHTMLDisplay($pcategories)."</a></font>";
    	}

    	echo "<font class=\"pn-normal\"> -> ".pnVarPrepHTMLDisplay($categories)."</font>";

    	if($parent_id == 0) {
    		// it's a parent categories - any childs around?
    	    $column = &$pntable['faqcategories_column'];
    	    $sresult = $dbconn->Execute("SELECT $column[id_cat], $column[categories]
    	                               FROM $pntable[faqcategories]
    	                               WHERE $column[parent_id]='".(int)pnVarPrepForStore($id_cat)."' $querylang");
    	    $parent_id = $id_cat;

    	    for($loopcount=0;!$sresult->EOF;$sresult->MoveNext() ) {
    	        list($sid_cat, $scategories) = $sresult->fields;
      	        if (pnSecAuthAction(0,"FAQ::","$scategories::$sid_cat",ACCESS_READ)) {
					if(!$loopcount) {
						// do we need to display the headline?
						echo "<br><font class=\"pn-normal\">"._SUBCATEGORIES.":</font><br>";
			    	}
		           	echo"<strong><big>&nbsp;&nbsp;&nbsp;</big></strong><a class=\"pn-normal\" href=\"modules.php?op=modload&amp;name=".$GLOBALS['ModName']."&amp;file=index&amp;myfaq=yes&amp;id_cat=$sid_cat\">".pnVarPrepHTMLDisplay($scategories)."</a><br>";
					$loopcount++;
	            }
        	}
        	echo "<br>";

    	}

    	echo "<br><br>"
    	."<table width=\"100%\" cellpadding=\"4\" cellspacing=\"0\" border=\"0\">"
    	."<tr bgcolor=\"".$GLOBALS['bgcolor2']."\"><td colspan=\"2\"><font class=\"pn-title\">"._QUESTION."</font></td></tr><tr><td colspan=\"2\">";

	    $column = &$pntable['faqanswer_column'];
    	$result = $dbconn->Execute("SELECT $column[id], $column[id_cat], $column[question], $column[answer]
    	                       		FROM $pntable[faqanswer]
                           			WHERE $column[id_cat]='".(int)pnVarPrepForStore($id_cat)."' AND $column[answer] != ''");
    	while(list($id, $id_cat, $question, $answer) = $result->fields) {
        	$result->MoveNext();
			echo"<font class=\"pn-normal\"><strong><big>&middot;</big></strong></font>&nbsp;&nbsp;<a class=\"pn-title\" href=\"#$id\">".pnVarPrepHTMLDisplay($question)."</a><br>";
    	}

    	echo "</td></tr></table>
    	<br>";
    } else {
		echo _BADAUTHKEY;
		include 'footer.php';
		exit;
    }
}

function ShowFaqAll() {
    $id_cat = pnVarCleanFromInput('id_cat');

    if (!isset($id_cat) || !is_numeric($id_cat)) {
	    // markwest - removed unneeded call to header.php
		// results is path disclosure if invalid $id_cat
        //include 'header.php';
        echo _MODARGSERROR;
        include 'footer.php';
        exit;
    }
    
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    echo "<table width=\"100%\" cellpadding=\"4\" cellspacing=\"0\" border=\"0\">"
    	."<tr bgcolor=\"".$GLOBALS['bgcolor2']."\"><td colspan=\"2\"><font class=\"pn-title\">"._ANSWER."</font></td></tr>";

    $column = &$pntable['faqanswer_column'];
    $result = $dbconn->Execute("SELECT $column[id],
                                     $column[id_cat],
                                     $column[question],
                                     $column[answer]
                              FROM $pntable[faqanswer]
                              WHERE $column[id_cat]='".(int)pnVarPrepForStore($id_cat)."' AND $column[answer] != ''");
    while(list($id, $id_cat, $question, $answer) = $result->fields) {
        $result->MoveNext();

        echo"<tr><td><a class=\"pn-normal\" name=\"$id\"></a>"
            ."<font class=\"pn-normal\"><strong><big>&middot;</big></strong></font>&nbsp;&nbsp;<font class=\"pn-title\">".pnVarPrepHTMLDisplay(nl2br($question))."</font><br>"
            ."<p align=\"justify\"><font class=\"pn-normal\">".pnVarPrepHTMLDisplay(nl2br($answer))."</font></p>"
            ."<a class=\"pn-normal\" href=\"#top\">"._BACKTOTOP."</a>"
            ."<br><br><hr>";
        // added hook call - markwest
        echo pnModCallHooks('item', 'display', $id, "modules.php?op=modload&name=$GLOBALS[ModName]&file=index&myfaq=yes&id_cat=$id_cat#$id");
        echo"</td></tr>";

    }

    echo "</table><br><br>"
    ."<div align=\"center\"><font class=\"pn-normal\">[ <a class=\"pn-normal\" href=\"modules.php?op=modload&amp;name=".$GLOBALS['ModName']."&amp;file=index\">"._BACKTOFAQINDEX."</a> ]</font></div>";
}

function AskQuestion()
{

    $id_cat = pnVarCleanFromInput('id_cat');

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    if (!(pnSecAuthAction(0, 'FAQ::', '::', ACCESS_COMMENT))) {
        echo _FAQADDNOAUTH;
        return;
    }

    OpenTable();
      echo"<center><font class=\"pn-pagetitle\">".pnConfigGetVar('sitename').' '._FAQ2."</font></center><br/>";
    CloseTable();
    echo "<br/>";
    OpenTable();

    echo "<center><font class=\"pn-title\">"._ASKAQUESTION."</font>";
    echo "</center><br>";

    echo "<form action=\"modules.php\" method=\"post\">";
    echo "<input type=\"hidden\" name=\"op\" value=\"modload\">";
    echo "<input type=\"hidden\" name=\"name\" value=\"FAQ\">";
    echo "<input type=\"hidden\" name=\"file\" value=\"index\">";
    echo "<input type=\"hidden\" name=\"myfaq\" value=\"yes\">";
    echo "<input type=\"hidden\" name=\"askaquestion\" value=\"yes\">";
    echo "<input type=\"hidden\" name=\"askquestionsubmit\" value=\"yes\">";
    echo "  <table align=center>";
    //email makes no sense, let's store the userid later on...
    //echo "      <tr align=center>";
    //echo "          <td><font class=\"pn-normal\">"._SPECIFYEMAIL.":</font></td>";
    //echo "      </tr>";
    //echo "      <tr align=center>";
    //echo "          <td><input type=text name=email size=60><br><br></td>";
    //echo "      </tr>";
    echo "      <tr align=center>";
    echo "          <td><font class=\"pn-normal\">"._SPECIFYQUESTION.":</font></td>";
    echo "      </tr>";
    echo "      <tr align=center><td>";

    echo "          <select name=id_cat>";
    echo "              <option value=0>"._UNSURE."</option>";

    $column = &$pntable['faqcategories_column'];
    $result = $dbconn->Execute("SELECT $column[id_cat], $column[categories]
                           FROM $pntable[faqcategories]
                           WHERE $column[parent_id]=0 ORDER BY $column[id_cat]");
    while(list($id_cat, $categories) = $result->fields) {
        $result->MoveNext();
		if (pnSecAuthAction(0,"FAQ::","$categories::$id_cat",ACCESS_READ)) {
	        echo "                  <option value=$id_cat>".pnVarPrepHTMLDisplay($categories)."</option>";
		}
    }
    echo "          </select><br><br>";

    echo "      </td></tr>";
    echo "      <tr align=center>";
    echo "          <td><font class=\"pn-normal\">"._PLEASEDESCRIBE."</font></td>";
    echo "      </tr>";
    echo "      <tr align=center>";
    echo "          <td><textarea name=question cols=80 rows=10></textarea><br><br></td>";
    echo "      </tr>";
    echo "      <tr align=center>";
    echo "          <td>";
    echo "              <input type=hidden name=\"cat_id\" value=\"$id_cat\">";
    echo "              <input type=submit value=\""._SUBMITQUESTION."\">";
    echo "          </td>";
    echo "      </tr>";
    echo "  </table>";
    echo "</form>";

    echo "<div align=\"center\"><b><font class=\"pn-normal\">[ <a href=\"modules.php?op=modload&amp;name=".$GLOBALS['ModName']."&amp;file=index\">"._BACKTOFAQINDEX."</a> ]</font></b></div>";
}

function AskQuestionSubmit()
{

    list($id_cat,
	 $question) = pnVarCleanFromInput('id_cat',
					  'question');
					  
    if (!isset($id_cat) || !is_numeric($id_cat)) {
        include 'header.php';
        echo _MODARGSERROR;
        include 'footer.php';
        exit;
    }
    
	//make sure question is filled in. - skooter
    if (empty($question)){
		OpenTable();
		echo "<center><br><b>";
        echo _QUESTIONBLANK;
		echo  "</b><br><br>"._GOBACK."</center>";
		CloseTable();
		include 'footer.php';
		exit;
	}
    
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    if (!(pnSecAuthAction(0, 'FAQ::', '::', ACCESS_COMMENT))) {
        echo _FAQADDNOAUTH;
        return;
    }
    OpenTable();

        //$question = pnVarPrepForStore($question);
        //$email = pnVarPrepForStore($email);
        $uid = pnUserGetVar('uid');
        $column = &$pntable['faqanswer_column'];
        $nextid = $dbconn->GenId($pntable['faqanswer']);
        $sql = "INSERT INTO $pntable[faqanswer]
                   ($column[id], $column[id_cat], $column[question], $column[submittedby], $column[answer])
                   VALUES ($nextid, ".(int)pnVarPrepForStore($id_cat).", '".pnVarPrepForStore($question)."', '".(int)pnVarPrepForStore($uid)."', '')";
        $result = $dbconn->Execute($sql);
        echo "<font class=\"pn-normal\">"._THANKSSUB."<br><br></font>";
        echo "<div align=\"center\"><b><font class=\"pn-normal\">[ <a href=\"modules.php?op=modload&amp;name=".$GLOBALS['ModName']."&amp;file=index\">"._BACKTOFAQINDEX."</a> ]</font></b></div>";
}

if (empty($myfaq)) {

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $currentlang = pnUserGetLang();

    $column = &$pntable['faqcategories_column'];
    if (pnConfigGetVar('multilingual') == 1) {
        $column = &$pntable['faqcategories_column'];
        $querylang = "AND ($column[flanguage]='".pnVarPrepForStore($currentlang)."' OR $column[flanguage]='')"; /* the OR is needed to display stories who are posted to ALL languages */
    } else {
    $querylang = "";
    }

    include 'header.php';
    OpenTable();
    echo "<center><font class=\"pn-title\">".pnConfigGetVar('sitename').' '._FAQ2."</font>";

    echo "<br><br>";

    $column = &$pntable['faqcategories_column'];
    $total_result = $dbconn->Execute("SELECT COUNT($column[id_cat]) FROM $pntable[faqcategories]");
    list($total) = $total_result->fields;
    if ($total) {
        if (pnSecAuthAction(0, 'FAQ::', '::', ACCESS_COMMENT)){
            echo "<font class=\"pn-normal\">[ <a href=\"modules.php?op=modload&amp;name=".$GLOBALS['ModName']."&amp;file=index&amp;myfaq=yes&amp;askaquestion=yes&amp;id_cat=0\">"._ASKAQUESTION."</a> ]</font>";
        }
    }
    echo "</center><br><br>"
    ."<table width=\"100%\" cellpadding=\"4\" cellspacing=\"0\" border=\"0\">"
    ."<tr><td bgcolor=\"".$GLOBALS['bgcolor2']."\"><font class=\"pn-title\">"._CATEGORIES."</font></td></tr><tr><td>";

    /* $column = &$pntable['faqcategories_column'];
    $fields = array('id_cat'     => '',
                    'categories' => '',
                    'parent_id'  => '');

    $query = getSelectViaHashKeysFrom ('faqcategories', $fields, "$column[parent_id]=0");
    $result = $dbconn->Execute($query);*/

        $column = &$pntable['faqcategories_column'];
        $result = $dbconn->Execute("SELECT $column[id_cat], $column[categories]
                                FROM $pntable[faqcategories]
                                WHERE $column[parent_id]=0 $querylang");

    while(list($id_cat, $categories) = $result->fields) {
        $result->MoveNext();
		if (pnSecAuthAction(0,"FAQ::","$catname::$id_cat",ACCESS_READ)) {
        	echo "<a class=\"pn-title\" href=\"modules.php?op=modload&amp;name=".$GLOBALS['ModName']."&amp;file=index&amp;myfaq=yes&amp;id_cat=$id_cat\">".pnVarPrepForDisplay($categories)."</a><br>";

        	$column = &$pntable['faqcategories_column'];
        	$sresult = $dbconn->Execute("SELECT $column[id_cat], $column[categories]
                                	FROM $pntable[faqcategories]
                                	WHERE $column[parent_id]='".(int)pnVarPrepForStore($id_cat)."' $querylang");

        	$parent_id = $id_cat;

        	for(;!$sresult->EOF;$sresult->MoveNext()) {
				list($sid_cat, $scategories) = $sresult->fields;
				if (pnSecAuthAction(0,"FAQ::","$scategories::$sid_cat",ACCESS_READ)) {
            		echo "<strong><big>&nbsp;&nbsp;&nbsp;</big></strong><a class=\"pn-normal\" href=\"modules.php?op=modload&amp;name=".$GLOBALS['ModName']."&amp;file=index&amp;myfaq=yes&amp;id_cat=$sid_cat\">".pnVarPrepForDisplay($scategories)."</a><br>";
				}
        	}
        	echo "<br>";
        }
    }

    echo "</td></tr></table>";

    CloseTable();

    include 'footer.php';

} else {

    include 'header.php';

    if(isset($askaquestion))
    {
        if(empty($askquestionsubmit))
        {
            AskQuestion();
        } else {
            AskQuestionSubmit();
        }
    } else {
        ShowFaq();
        ShowFaqAll();
    }

    CloseTable();
    include 'footer.php';
}
?>