<?php 
// $Id: theme.php,v 1.1 2004/03/01 10:09:11 mbertier Exp $ Exp $Name:  $
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
// Copyright (C) 2002 by the PostNuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// Based on:
// Thatware - http://thatware.org/
// PHP-NUKE Web Portal System - http://phpnuke.org/
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
// Filename: theme.php                                               
// Original  Author(s): Vanessa Haakenson vanessa@distance-educator.com
// Purpose:  Theme layout
// Edited: 2003/05/08 Martin St¾r Andersen
// ----------------------------------------------------------------------
//

/**
 * version: 1.0 - Designs4Nuke.com
 * version: 2.0 - Mark West and Martin Anderson
 */

/************************************************************/
/* Theme Colors Definition                                  */
/*                                                          */
/* Define colors for your web site. $bgcolor2 is generally  */
/* used for the tables border as you can see on OpenTable() */
/* function, $bgcolor1 is for the table background and the  */
/* other two bgcolor variables follows the same criteria.   */
/* $texcolor1 and 2 are for tables internal texts           */
/************************************************************/

$thename = "SeaBreeze";
/*************************************************************************************************/
/* If you stuff up your theme and you can't change it through the browser,                       */
/* either rename the folder to something else, and copy a working theme with the new name, or:   */
/* Run an SQL query in MySQL:                                                                    */
/* > UPDATE nuke_users                                                                           */
/* > SET pn_theme = "name-of-theme" where pn_uname = "your-user-name";                           */
/* Replace 'name-of-theme' and 'your-user-name' as appropriate.  Ending semicolon required.      */
/*                                                                                               */
/* Damaged tables can often be repaired with:                                                    */
/* > REAPAIR TABLE nuke_table_name, nuke_another_table;                                          */
/* where 'nuke_table_name' and 'nuke_another_table' are the damaged tables, separated by a comma,*/
/* and ending with a semicolon (;).                                                              */
/*************************************************************************************************/

$postnuke_theme = true;
themes_get_language();
/************************************************************/
/* Theme Colors Definition                                  */
/*                                                          */
/* Define colors for your web site. $bgcolor2 is generally  */
/* used for the tables border as you can see on OpenTable() */
/* function, $bgcolor1 is for the table background and the  */
/* other two bgcolor variables follows the same criteria.   */
/* $texcolor1 and 2 are for tables internal texts           */
/************************************************************/
$bgcolor1 = "#FFFFFF"; // White: 0/0/100
$bgcolor2 = "#E6E6E6"; // Lightest Grey: 0/0/90 
$bgcolor3 = "#CCCCCC"; // Med Grey: 0/0/80 
$bgcolor4 = "#F3F3F3"; // Light Gray - #4C5EA8 
$bgcolor5 = "#ACB2D4"; // Light Cornflower Blue HSB: 213/19/83
$bgcolor6 = "#CC6600"; // Warm Orange: 30/100/80

$textcolor1 = "#000000"; // Black
$textcolor2 = "#000000"; // Black


/************************************************************/
/* function themeheader()                                   */
/*                                                          */
/* Place this whole section of code at the top,             */
/* before your html.                                        */
/* Other functions to call within here:                     */
/* blocks(left);  // show left blocks menus                 */
/* blocks(center);  // show center blocks menus             */
/* blocks(right);  // show right blocks menus               */
/* footmsg(); // outputs bottom footer text(admin settings) */
/* $index  // global variable. 1 if on homepage else 0      */
/* $slogan  // your slogan (administration settings)        */
/* $sitename // your site name                              */
/* $banners   //                                            */
/*                                                          */
/************************************************************/
function themeheader() {
  

    $slogan = pnConfigGetVar('slogan');
    $sitename = pnConfigGetVar('sitename');
    $banners = pnConfigGetVar('banners');
    $type = pnVarCleanFromInput('type');

    echo "</head>
<body leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\" text=\"#333333\" link=\"#000000\" alink=\"#FF9900\" vlink=\"#CC6600\" bgcolor=\"$GLOBALS[bgcolor1]\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"100%\" bgcolor=\"$GLOBALS[bgcolor1]\">
  <tr>
    <td class=\"headerbackground\" valign=\"top\" height=\"91\">
    <a href=\"index.php\"><img src=\"themes/$GLOBALS[thename]/images/logoshort.gif\" alt=\"logoshort.gif\" width=\"230\" height=\"91\" border=\"0\" align=\"top\"></a>
    </td>
<td class=\"headerbackground\">
<img src=\"themes/$GLOBALS[thename]/images/blank.gif\" height=\"0\" width=\"460\" alt=\"\" border=\"0\"><br />
<?php if(pnModAvailable('Banners')) { echo pnBannerDisplay(); }?>
</td>
  </tr>
  <tr>\n"; 
        if (!pnUserLoggedIn()) {
            echo "<td bgcolor=\"$GLOBALS[bgcolor4]\" valign=\"middle\" align=\"left\" width=\"50%\">&nbsp;<a class=\"cssbtn\" href=\"user.php\">"._MEMBERLOGIN."</a></td>\n";
        } else {
            echo "<td bgcolor=\"$GLOBALS[bgcolor4]\" valign=\"middle\" align=\"left\" width=\"50%\">&nbsp;<a class=\"cssbtn\" href=\"user.php\">"._YOURACCCOUNT."</a></td>\n";
        }
		


    echo "<td width=\"50%\" height=\"21\" align=\"right\" bgcolor=\"$GLOBALS[bgcolor4]\" valign=\"middle\">\n";

	include "themes/$GLOBALS[thename]/top_links.php";

    echo "<img src=\"themes/$GLOBALS[thename]/images/blank.gif\" alt=\"blank.gif\" width=\"1\" height=\"1\"></td>
  </tr>
</table>
<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
  <tr>
    <td width=\"150\" valign=\"top\" bgcolor=\"$GLOBALS[bgcolor4]\">
      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
        <tr bgcolor=\"$GLOBALS[bgcolor4]\">
          <td><img src=\"themes/$GLOBALS[thename]/images/blank.gif\" width=\"1\" height=\"17\" alt=\"\" border=\"0\"></td>
        </tr>
        <tr>
          <td valign=\"top\">\n";

          blocks('left');

    echo "</td>
        </tr>
      </table>
    </td>
    <td width=\"35\" bgcolor=\"$GLOBALS[bgcolor1]\" align=\"left\" valign=\"top\">
    <div align=\"left\"><img src=\"themes/$GLOBALS[thename]/images/lefttop.gif\" width=\"17\" height=\"17\" border=\"0\"  alt=\"\"></div>
    </td>
    <td width=\"100%\" valign=\"top\" align=\"center\" bgcolor=\"$GLOBALS[bgcolor1]\">\n";

    if ($GLOBALS['index'] == 1) {
        echo "<div class=\"message-centre\">\n";
        blocks('centre');
        echo "</div>\n";
    }
} 

/************************************************************/
/* Function themefooter()                                   */
/*                                                          */
/* Controls the footer for your site. You don't need to     */
/* close BODY and HTML tags at the end. In some part call   */
/* the function for right blocks with: blocks(right);       */
/* Also, $index variable needs to be global and is used to  */
/* determine if the page you're viewing is the Homepage or  */
/* and internal one.                                        */
/* Remember the footer contains the formatting for the      */
/* right side bar on the three column page design           */
/************************************************************/ 
function themefooter() {
    if ($GLOBALS['index'] == 1) {
	echo "    <td width=\"15\"><img src=\"themes/$GLOBALS[thename]/images/blank.gif\" alt=\"\" width=\"15\" height=\"10\"></td>
    <td width=\"150\" valign=\"top\" bgcolor=\"$GLOBALS[bgcolor1]\"><img src=\"themes/$GLOBALS[thename]/images/blank.gif\" alt=\"\" width=\"150\" height=\"10\">";    
       blocks('right');
    }

    echo "<br></td>
  </tr>
</table>
<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"$GLOBALS[bgcolor1]\">
  <tr bgcolor=\"$GLOBALS[bgcolor4]\">
    <td height=\"20\"><img src=\"themes/$GLOBALS[thename]/images/blank.gif\" width=\"1\" height=\"20\" border=0 alt=\"\" align=\"right\">";
    	include "themes/$GLOBALS[thename]/bottom_links.php";
echo"	</td>
  </tr>
  <tr class=\"footerbackground\">
    <td>
      <table width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\">
        <tr>
          <td><div class=\"pn-sub\" align=\"center\">\n";

    footmsg();

    echo "          </div>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>\n";

}

/************************************************************/
/* Function themeindex()                                    */
/* This formats the articles/stories on the homepage        */
/************************************************************/
function themeindex ($_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $info, $links, $preformat) {
	$tipath = pnConfigGetVar('tipath'); // path to topic image
    echo "<table width=\"90%\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\">
  <tr>
    <td>$preformat[catandtitle]</td></tr><tr><td>\n";
    if (pnSecAuthAction(0, 'Stories::Story', "$info[aid]:$info[cattitle]:$info[sid]", ACCESS_EDIT)) {
        echo "<span class=\"pn-sub\">[ <a href=\"admin.php?module=NS-AddStory&amp;op=EditStory&amp;sid=$info[sid]\">"._EDIT."</a>";
        if (pnSecAuthAction(0, 'Stories::Story', "$info[aid]:$info[cattitle]:$info[sid]", ACCESS_DELETE)) {
            echo " | <a href=\"admin.php?module=NS-AddStory&amp;op=RemoveStory&amp;sid=$info[sid]\">"._DELETE."</a> ]";
        } else { echo " ]";
        }
        echo "</span></td></tr><tr><td>\n";
     }
     echo"<div class=\"pn-normal\"><a href=\"$links[searchtopic]\"> 
    <img class=\"TopicImgLeft\" src=\"$tipath$info[topicimage]\" border=\"0\" alt=\"$info[topictext]\" align=\"left\" hspace=\"5\" vspace=\"5\"></a>\n";
    echo $preformat['hometext']."</div></td></tr><tr><td>\n"; // $preformat[searchtopic] 
// To change picture from left to right, change class=\"TopicImgLeft\" to class=\"TopicImgRight\"   
     if ($preformat['notes']){
        echo "<div class=\"pn-sub\">$preformat[notes]</div></td></tr>\n";
     }
     echo "<tr><td><div class=\"pn-sub\">
     "._PUBLISHED." ".$info['briefdatetime']."<br />
     ".$preformat['more']."</div>
    </td>
  </tr>
</table><hr width=\"90%\" size=\"1\">\n";
}

/************************************************************/
/* Function themearticle()                                  */
/* This function formats the stories on the story,          */
/* when you click on the "Title Link" or "Read More..."     */
/* link                                                     */
/************************************************************/  
function themearticle ($_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $info, $links, $preformat) {
	$tipath = pnConfigGetVar('tipath'); // path to topic image
OpenTable();  
echo "<table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\"><tr><td><img src=\"themes/$GLOBALS[thename]/images/article.gif\" width=\"17\" height=\"18\" alt=\"*\" border=\"0\" align=\"absbottom\">
    $preformat[catandtitle]<br>
    <span class=\"pn-sub\">"._POSTED." $info[briefdatetime]</span>
	<hr size=\"1\">
	<div class=\"pn-sub\"><nobr>";
    if (pnSecAuthAction(0, 'Stories::Story', "$info[aid]:$info[cattitle]:$info[sid]", ACCESS_EDIT)) {
        echo "[ <a href=\"admin.php?module=NS-AddStory&amp;op=EditStory&amp;sid=$info[sid]\">"._EDIT."</a>";
        if (pnSecAuthAction(0, 'Stories::Story', "$info[aid]:$info[cattitle]:$info[sid]", ACCESS_DELETE)) {
            echo " | <a href=\"admin.php?module=NS-AddStory&amp;op=RemoveStory&amp;sid=$info[sid]\">"._DELETE."</a> ]";
        } else { echo " ]";
        }
    }
	echo "</div>
    <span class=\"pnsub\"><nobr>$preformat[print]&nbsp;<a href=\"$links[print]\">"._PRINTTHISSTORY."</a>&nbsp;&nbsp;$preformat[send]&nbsp;<a href=\"$links[send]\">"._EMAILTOAFRIEND."</a></nobr></span>
    </div><br>
    <div class=\"pn-art\"><a href=\"$links[searchtopic]\"> 
    <img class=\"TopicImgLeft\" src=\"$tipath$info[topicimage]\" border=\"0\" alt=\"$info[topictext]\" align=\"left\" hspace=\"5\" vspace=\"5\"></a>\n";
    echo "$preformat[fulltext]</div></td></tr></table>\n"; // $preformat[searchtopic]
// To change picture from left to right, change class=\"TopicImgLeft\" to class=\"TopicImgRight\"
      CloseTable();
}

/***************************************************************/
/* Function themesidebox()                                     */
/*                                                             */
/* Controls the look of your blocks.                           */
/* The array $block contain things like the title and content: */
/*    $block['title'] - the block title, eg "Main Menu"        */
/*    $block['content'] - preformatted HTML content of block   */
/*    $block['position'] - block position                      */
/*                         "l" = left block                    */
/*                         "r" = right block                   */
/*                         "c" - centre (admin) block          */
/***************************************************************/

/***************************************************************/
/* Function themesidebox()                                     */
/*                                                             */
/* Controls the look of your blocks.                           */
/* The array $block contain things like the title and content: */
/*    $block['title'] - the block title, eg "Main Menu"        */
/*    $block['content'] - preformatted HTML content of block   */
/*    $block['position'] - block position                      */
/*                         "l" = left block                    */
/*                         "r" = right block                   */
/*                         "c" - centre (admin) block          */
/***************************************************************/

function themesidebox($block) { 

if (empty($block['position'])) {
    $block['position'] = "a";
}

if($block['position'] == 'l') { // left side blocks 
    echo "<table width=\"150\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">
  <tr>
    <td class=\"pn-title-lblock\">$block[title]</td>
  </tr>
  <tr>
    <td valign=\"top\">$block[content]</td>
  </tr>
</table>
<table width=\"150\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">
  <tr>
    <td><hr size=\"1\"></td>
  </tr>
</table>\n";
}

if($block['position'] == 'r') { 
    echo "<br>
<table width=\"150\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td class=\"tdback\" valign=\"top\" height=\"13\" colspan=\"2\">
    <div align=\"left\"><img src=\"themes/$GLOBALS[thename]/images/corner_top_right.gif\" width=\"15\" height=\"13\" alt=\"\"></div>
    </td>
    <td rowspan=\"3\" bgcolor=\"#CC6600\" width=\"1%\"><img src=\"themes/$GLOBALS[thename]/images/.gif\" width=\"2\" height=\"100%\" alt=\"\" border=\"0\"></td>
  </tr>
  <tr>
    <td width=\"8%\" class=\"tdback\"><img src=\"themes/$GLOBALS[thename]/images/blank.gif\" width=\"10\" height=\"1\" alt=\"\" border=\"0\"></td>
    <td width=\"91%\" class=\"tdback\"><span class=\"pn-title-rblock\"><b>$block[title]</b></span><br>
    <div class=\"RightBlock\">$block[content]</div></td>
  </tr>
  <tr>
    <td class=\"tdback\" valign=\"bottom\" height=\"11\" colspan=\"2\">
    <div align=\"left\"><img src=\"themes/$GLOBALS[thename]/images/corner_bottom_right.gif\" width=\"11\" height=\"11\" alt=\"\"></div>
    </td>
  </tr>
</table>";

}

  if($block['position'] == 'c') { 
    echo "<table width=\"90%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
	<tr>
	<td>
	<div class=\"pn-normal\">$block[content]</div><hr size=\"1\">
	</td>
	</tr>
	</table>";
  } 
}

/************************************************************/
/* OpenTable Functions                                      */
/*                                                          */
/* Used to display general system output.                   */
/* Define the tables' look & feel for you site. For this    */
/* we have two options: OpenTable and OpenTable2 functions. */
/* Then we have CloseTable and CloseTable2 function to      */
/* properly close our tables. The difference is that        */
/* OpenTable has a 100% width and OpenTable2 has a width    */
/* according with the table content                         */ 
/************************************************************/
function opentable() {
   
    echo "<br>
<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"5\">
  <tr>
    <td>\n";
}

function closetable() {
    echo "    </td>
  </tr>
</table>\n";
}

function opentable2() {
    
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"5\">
  <tr>
    <td>\n";
}

function closetable2() {
    echo "    </td>
  </tr>
</table>\n";
}
?>
