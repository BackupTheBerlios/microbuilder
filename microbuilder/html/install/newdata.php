<?php
/** Populate data into tables.
 * @version      $Id: newdata.php,v 1.3 2004/03/18 16:12:54 mbertier Exp $
 * @package      Installer
 * @license      GPL
 *
 * @todo  Remove even more data
 */

# -- populate blocks table
// Menu block
$result = $dbconn->Execute("INSERT INTO ".$prefix."_blocks VALUES (1,'menu','$mainblock_block_title',
'style:=1\ndisplaymodules:=0\ndisplaywaiting:=0\ncontent:=index.php|$mainblock_block_home|$mainblock_block_homealt.LINESPLITuser.php|$mainblock_block_user|$mainblock_block_useralt.LINESPLITadmin.php|$mainblock_block_admin|$mainblock_block_adminalt.LINESPLITuser.php?module=NS-User&op=logout|$mainblock_block_userexit|$mainblock_block_userexitalt.LINESPLIT|Modules|LINESPLIT[AvantGo]|$mainblock_block_avantgo|$mainblock_block_avantgoalt.LINESPLIT[Downloads]|$mainblock_block_dl|$mainblock_block_dlalt.LINESPLIT[FAQ]|$mainblock_block_faq|$mainblock_block_faqalt.LINESPLIT[Members_List]|$mainblock_block_mlist|$mainblock_block_mlistalt.LINESPLIT[News]|$mainblock_block_news|$mainblock_block_newsalt.LINESPLIT[Recommend_Us]|$mainblock_block_rus|$mainblock_block_rusalt.LINESPLIT[Reviews]|$mainblock_block_rws|$mainblock_block_rwsalt.LINESPLIT[Search]|$mainblock_block_search|$mainblock_block_searchalt.LINESPLIT[Sections]|$mainblock_block_sections|$mainblock_block_sectionsalt.LINESPLIT[Stats]|$mainblock_block_stats|$mainblock_block_statsalt.LINESPLIT[Submit_News]|$mainblock_block_snews|$mainblock_block_snewsalt.LINESPLIT[Topics]|$mainblock_block_topics|$mainblock_block_topicsalt.LINESPLIT[Top_List]|$mainblock_block_tlist|$mainblock_block_tlistalt.LINESPLIT[Web_Links]|$mainblock_block_wlinks|$mainblock_block_wlinksalt.','',0, 'l','1.0',1,'',20011122090726,'')")
or die ("<b>"._NOTUPDATED. $prefix."_blocks ($mainblock_block_title)</font>");

// Login block
$result = $dbconn->Execute("INSERT INTO ".$prefix."_blocks VALUES ( '13', 'login', '$userslogin_block_title', '', '', 0, 'r', '5.0', '1', '0', '00000000000000', '')") or die ("<b>"._NOTUPDATED.$prefix."_blocks ($userslogin_block_title)</b>");

echo "<br><font class=\"pn-sub\">".$prefix."_blocks "._UPDATED."</font>";


# -- populate module_vars table
// Theme selection
$truetheme = 's:9:\"ExtraLite\";';

// get startdate
$date = date("m.Y", time());

$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('1', '/PNConfig','debug','i:0;')") or die ("<b>"._NOTUPDATED. $prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('2', '/PNConfig','sitename','s:14:\"Micromusic.net\";')") or die ("<b>"._NOTUPDATED. $prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('3', '/PNConfig','site_logo','s:8:\"logo.gif\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('4', '/PNConfig','slogan','s:35:\"Low-tech music for high-tech people\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('5', '/PNConfig','metakeywords','s:218:\"nuke, postnuke, postnuke, free, community, php, portal, opensource, open source, gpl, mysql, sql, database, web site, website, weblog, content management, contentmanagement, web content management, webcontentmanagement\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('6', '/PNConfig','dyn_keywords','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('7', '/PNConfig','startdate','s:9:\"$date\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('8', '/PNConfig','adminmail','s:13:\"none@none.com\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('9', '/PNConfig','Default_Theme','$truetheme')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('10', '/PNConfig','foot1','". serialize($footmsg) ."')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('12', '/PNConfig','anonymous','s:9:\"Anonymous\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('13', '/PNConfig','defaultgroup','s:5:\"Users\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('14', '/PNConfig','timezone_offset','i:12;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('15', '/PNConfig','nobox','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('16', '/PNConfig','funtext','s:1:\"0\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('17', '/PNConfig','reportlevel','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('18', '/PNConfig','startpage','s:4:\"News\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('19', '/PNConfig','admingraphic','s:1:\"1\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('20', '/PNConfig','admart','i:20;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('21', '/PNConfig','backend_title','s:21:\"PostNuke Powered Site\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('22', '/PNConfig','backend_language','s:5:\"en-us\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('23', '/PNConfig','seclevel','s:6:\"Medium\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('24', '/PNConfig','secmeddays','i:7;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('25', '/PNConfig','secinactivemins','i:10;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('26', '/PNConfig','Version_Num','s:7:\"0.7.2.6\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('27', '/PNConfig','Version_ID','s:8:\"PostNuke\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('28', '/PNConfig','Version_Sub','s:7:\"Phoenix\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('29', '/PNConfig','debug_sql','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('30', '/PNConfig','anonpost','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('31', '/PNConfig','minpass','i:5;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('32', '/PNConfig','pollcomm','i:1;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('33', '/PNConfig','minage','i:13;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('34', '/PNConfig','top','i:10;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('35', '/PNConfig','storyhome','i:10;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('36', '/PNConfig','banners','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('37', '/PNConfig','myIP','s:12:\"192.168.123.254\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('38', '/PNConfig','language','s:3:\"eng\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('39', '/PNConfig','locale','s:5:\"en_US\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('40', '/PNConfig','multilingual','i:1;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('41', '/PNConfig','useflags','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('42', '/PNConfig','perpage','i:10;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('43', '/PNConfig','popular','i:500;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('44', '/PNConfig','newlinks','i:10;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('45', '/PNConfig','toplinks','i:25;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('46', '/PNConfig','linksresults','i:10;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('47', '/PNConfig','links_anonaddlinklock','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('48', '/PNConfig','anonwaitdays','i:1;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('49', '/PNConfig','outsidewaitdays','i:1;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('50', '/PNConfig','useoutsidevoting','i:1;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('51', '/PNConfig','anonweight','i:10;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('52', '/PNConfig','outsideweight','i:20;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('53', '/PNConfig','detailvotedecimal','i:2;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('54', '/PNConfig','mainvotedecimal','i:1;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('55', '/PNConfig','toplinkspercentrigger','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('56', '/PNConfig','mostpoplinkspercentrigger','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('57', '/PNConfig','mostpoplinks','i:25;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('58', '/PNConfig','featurebox','i:1;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('59', '/PNConfig','linkvotemin','i:5;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('60', '/PNConfig','blockunregmodify','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('61', '/PNConfig','newdownloads','i:10;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('62', '/PNConfig','topdownloads','i:25;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('63', '/PNConfig','downloadsresults','i:10;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('64', '/PNConfig','downloads_anonadddownloadlock','s:0:\"1\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('65', '/PNConfig','topdownloadspercentrigger','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('66', '/PNConfig','mostpopdownloadspercentrigger','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('67', '/PNConfig','mostpopdownloads','i:25;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('68', '/PNConfig','downloadvotemin','i:5;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('69', '/PNConfig','notify','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('70', '/PNConfig','notify_email','s:15:\"me@yoursite.com\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('71', '/PNConfig','notify_subject','s:16:\"NEWS for my site\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('72', '/PNConfig','notify_message','s:44:\"Hey! You got a new submission for your site.\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('73', '/PNConfig','notify_from','s:9:\"webmaster\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('74', '/PNConfig','moderate','i:1;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('75', '/PNConfig','BarScale','i:1;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('76', '/PNConfig','tipath','s:14:\"images/topics/\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('77', '/PNConfig','userimg','s:11:\"images/menu\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('78', '/PNConfig','usergraphic','i:1;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('79', '/PNConfig','topicsinrow','i:5;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('80', '/PNConfig','httpref','i:1;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('81', '/PNConfig','httprefmax','i:1000;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('83', '/PNConfig','reasons','a:11:{i:0;s:5:\"As Is\";i:1;s:8:\"Offtopic\";i:2;s:9:\"Flamebait\";i:3;s:5:\"Troll\";i:4;s:9:\"Redundant\";i:5;s:10:\"Insightful\";i:6;s:11:\"Interesting\";i:7;s:11:\"Informative\";i:8;s:5:\"Funny\";i:9;s:9:\"Overrated\";i:10;s:10:\"Underrated\";}')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('84', '/PNConfig','AllowableHTML','a:83:{s:3:\"!--\";s:1:\"2\";s:1:\"a\";s:1:\"2\";s:4:\"abbr\";i:0;s:7:\"acronym\";i:0;s:7:\"address\";i:0;s:6:\"applet\";i:0;s:4:\"area\";i:0;s:1:\"b\";s:1:\"1\";s:4:\"base\";i:0;s:8:\"basefont\";i:0;s:3:\"bdo\";i:0;s:3:\"big\";i:0;s:10:\"blockquote\";i:0;s:2:\"br\";s:1:\"1\";s:6:\"button\";i:0;s:7:\"caption\";i:0;s:6:\"center\";i:0;s:4:\"cite\";i:0;s:4:\"code\";i:0;s:3:\"col\";i:0;s:8:\"colgroup\";i:0;s:3:\"del\";i:0;s:3:\"dfn\";i:0;s:3:\"dir\";i:0;s:3:\"div\";i:0;s:2:\"dl\";i:0;s:2:\"dd\";i:0;s:2:\"dt\";i:0;s:2:\"em\";i:0;s:5:\"embed\";i:0;s:8:\"fieldset\";i:0;s:4:\"font\";i:0;s:4:\"form\";i:0;s:2:\"h1\";i:0;s:2:\"h2\";i:0;s:2:\"h3\";i:0;s:2:\"h4\";i:0;s:2:\"h5\";i:0;s:2:\"h6\";i:0;s:2:\"hr\";s:1:\"1\";s:1:\"i\";s:1:\"1\";s:6:\"iframe\";i:0;s:3:\"img\";i:0;s:5:\"input\";i:0;s:3:\"ins\";i:0;s:3:\"kbd\";i:0;s:5:\"label\";i:0;s:6:\"legend\";i:0;s:2:\"li\";s:1:\"1\";s:3:\"map\";i:0;s:7:\"marquee\";i:0;s:4:\"menu\";i:0;s:4:\"nobr\";i:0;s:6:\"object\";i:0;s:2:\"ol\";s:1:\"1\";s:8:\"optgroup\";i:0;s:6:\"option\";i:0;s:1:\"p\";s:1:\"1\";s:5:\"param\";i:0;s:3:\"pre\";s:1:\"1\";s:1:\"q\";i:0;s:1:\"s\";i:0;s:4:\"samp\";i:0;s:6:\"script\";i:0;s:6:\"select\";i:0;s:5:\"small\";i:0;s:4:\"span\";i:0;s:6:\"strike\";i:0;s:6:\"strong\";s:1:\"1\";s:3:\"sub\";i:0;s:3:\"sup\";i:0;s:5:\"table\";s:1:\"2\";s:5:\"tbody\";i:0;s:2:\"td\";s:1:\"2\";s:8:\"textarea\";i:0;s:5:\"tfoot\";i:0;s:2:\"th\";s:1:\"2\";s:5:\"thead\";i:0;s:2:\"tr\";s:1:\"2\";s:2:\"tt\";s:1:\"1\";s:1:\"u\";i:0;s:2:\"ul\";s:1:\"1\";s:3:\"var\";i:0;}')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('85', '/PNConfig','CensorList','a:14:{i:0;s:4:\"fuck\";i:1;s:4:\"cunt\";i:2;s:6:\"fucker\";i:3;s:7:\"fucking\";i:4;s:5:\"pussy\";i:5;s:4:\"cock\";i:6;s:4:\"c0ck\";i:7;s:3:\"cum\";i:8;s:4:\"twat\";i:9;s:4:\"clit\";i:10;s:5:\"bitch\";i:11;s:3:\"fuk\";i:12;s:6:\"fuking\";i:13;s:12:\"motherfucker\";}')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('86', '/PNConfig','CensorMode','i:1;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('87', '/PNConfig','CensorReplace','s:5:\"*****\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('90', '/PNConfig','theme_change','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
global $intranet;
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('93', '/PNConfig','intranet','i:$intranet;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");

$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('100', 'Blocks','collapseable','1')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('101', '/PNConfig','htmlentities','s:1:\"1\";')") or die ("<b>" ._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('102', '/PNConfig','UseCompression','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('103', '/PNConfig','refereronprint','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('104', '/PNConfig','WYSIWYGEditor','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('105', '/PNConfig','storyorder','s:1:\"1\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('106', '/PNConfig','pnAntiCracker','s:1:\"1\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('107', '/PNConfig','reg_allowreg','s:1:\"1\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('108', '/PNConfig','reg_verifyemail','s:1:\"1\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('109', '/PNConfig','reg_Illegalusername','s:87:\"root adm linux webmaster admin god administrator administrador nobody anonymous anonimo\"')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('110', '/PNConfig','reg_noregreasons','s:45:\"Sorry, registration is disabled at this time.\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('111', '/PNConfig','reg_uniemail','s:1:\"1\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('116', 'Template','bold','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('117', 'Template','itemsperpage','i:20;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");

echo "<br><font class=\"pn-sub\">".$prefix."_module_vars"._UPDATED."</font>";


// populate users table
$result = $dbconn->Execute("INSERT INTO ".$prefix."_users VALUES ( '1', '', 'Anonymous', '', '', '', 'blank.gif', ".time().", '', '', '', '', '', '0', '0', '', '', '', '', '10', '', '0', '0', '0', '', '0', '', '', '4096', '0', '12.0')") or die ("<b>"._NOTUPDATED.$prefix."_users</b>");
echo "<br><font class=\"pn-sub\">".$prefix."_users"._UPDATED."</font>";

// populate groups table
$result = $dbconn->Execute("INSERT INTO ".$prefix."_groups VALUES (0,'Users')") || die("<b>"._NOTUPDATED.$prefix."_groups</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_groups VALUES (0,'Admins')") || die("<b>"._NOTUPDATED.$prefix."_groups</b>");
echo "<br><font class=\"pn-sub\">".$prefix."_groups"._UPDATED."</font>";

// populate group_membership table
$result = $dbconn->Execute("INSERT INTO ".$prefix."_group_membership VALUES (1, 1)") || die("<b>"._NOTUPDATED.$prefix."_group_membership</b>");
echo "<br><font class=\"pn-sub\">".$prefix."_group_membership"._UPDATED."</font>";

// populate group_perms table
$result = $dbconn->Execute("INSERT INTO ".$prefix."_group_perms VALUES (0, 2, 1, 0, '.*', '.*', 800, 0)") || die("<b>"._NOTUPDATED.$prefix."_group_perms</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_group_perms VALUES (0, -1, 2, 0, 'Menublock::', '$mainblock_block_title:Administration:', 0, 0)") || die("<b>"._NOTUPDATED.$prefix."_group_perms</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_group_perms VALUES (0, 1, 3, 0, '.*', '.*', 300, 0)") || die("<b>"._NOTUPDATED.$prefix."_group_perms</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_group_perms VALUES (0, 0, 4, 0, 'Menublock::', '$mainblock_block_title:($mainblock_block_user|$mainblock_block_userexit|$mainblock_block_snews):', 0, 0)") || die("<b>"._NOTUPDATED.$prefix."_group_perms</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_group_perms VALUES (0, 0, 5, 0, '.*', '.*', 200, 0)") || die("<b>"._NOTUPDATED.$prefix."_group_perms</b>");
echo "<br><font class=\"pn-sub\">".$prefix."_group_perms"._UPDATED."</font>";

// populate modules table
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (7,'Admin',1,'Admin','Administration',9,'NS-Admin','0.1',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (11,'Blocks',2,'Blocks','Side blocks',13,'Blocks','2.0',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (14,'Groups',1,'Groups','Set up administrative groups',16,'NS-Groups','0.1',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (17,'Modules',2,'Modules','Module configuration',1,'Modules','2.0',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (18,'Permissions',2,'Permissions','Configure permissions',22,'Permissions','0.4',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (22,'Settings',1,'Settings','Settings',26,'NS-Settings','1.2',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (32,'User',1,'Users','User Administration',27,'NS-User','0.2',1,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (42,'NewUser',1,'NewUser','New User for postnuke.',21,'NS-NewUser','0,5',0,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (44,'Your_Account',1,'Your Account','User options',0,'NS-Your_Account','0.8',0,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (45,'Template',2,'Template','Template for new modules',0,'Template','1.0',1,1,2)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
echo "<br><font class=\"pn-sub\">".$prefix."_modules"._UPDATED."</font>";


// populate user_property table
$dbconn->Execute("INSERT INTO ".$prefix."_user_property VALUES (1, '_UREALNAME', 0, 255, 1, NULL)") || die("<b>"._NOTUPDATED.$prefix."_user_property</b>");
$dbconn->Execute("INSERT INTO ".$prefix."_user_property VALUES (2, '_UREALEMAIL', -1, 255, 2, NULL)") || die("<b>"._NOTUPDATED.$prefix."_user_property</b>");
$dbconn->Execute("INSERT INTO ".$prefix."_user_property VALUES (3, '_UFAKEMAIL', 0, 255, 3, NULL)") || die("<b>"._NOTUPDATED.$prefix."_user_property</b>");
$dbconn->Execute("INSERT INTO ".$prefix."_user_property VALUES (4, '_YOURHOMEPAGE', 0, 255, 4, NULL)") || die("<b>"._NOTUPDATED.$prefix."_user_property</b>");
$dbconn->Execute("INSERT INTO ".$prefix."_user_property VALUES (5, '_TIMEZONEOFFSET', 0, 255, 5, NULL)") || die("<b>"._NOTUPDATED.$prefix."_user_property</b>");
$dbconn->Execute("INSERT INTO ".$prefix."_user_property VALUES (6, '_YOURAVATAR', 0, 255, 6, NULL)") || die("<b>"._NOTUPDATED.$prefix."_user_property</b>");
$dbconn->Execute("INSERT INTO ".$prefix."_user_property VALUES (7, '_YICQ', 0, 255, 7, NULL)") || die("<b>"._NOTUPDATED.$prefix."_user_property</b>");
$dbconn->Execute("INSERT INTO ".$prefix."_user_property VALUES (8, '_YAIM', 0, 255, 8, NULL)") || die("<b>"._NOTUPDATED.$prefix."_user_property</b>");
$dbconn->Execute("INSERT INTO ".$prefix."_user_property VALUES (9, '_YYIM', 0, 255, 9, NULL)") || die("<b>"._NOTUPDATED.$prefix."_user_property</b>");
$dbconn->Execute("INSERT INTO ".$prefix."_user_property VALUES (10, '_YMSNM', 0, 255, 10, NULL)") || die("<b>"._NOTUPDATED.$prefix."_user_property</b>");
$dbconn->Execute("INSERT INTO ".$prefix."_user_property VALUES (11, '_YLOCATION', 0, 255, 11, NULL)") || die("<b>"._NOTUPDATED.$prefix."_user_property</b>");
$dbconn->Execute("INSERT INTO ".$prefix."_user_property VALUES (12, '_YOCCUPATION', 0, 255, 12, NULL)") || die("<b>"._NOTUPDATED.$prefix."_user_property</b>");
$dbconn->Execute("INSERT INTO ".$prefix."_user_property VALUES (13, '_YINTERESTS', 0, 255, 13, NULL)") || die("<b>"._NOTUPDATED.$prefix."_user_property</b>");
$dbconn->Execute("INSERT INTO ".$prefix."_user_property VALUES (14, '_SIGNATURE', 0, 255, 14, NULL)") || die("<b>"._NOTUPDATED.$prefix."_user_property</b>");
$dbconn->Execute("INSERT INTO ".$prefix."_user_property VALUES (15, '_EXTRAINFO', 0, 255, 15, NULL)") || die("<b>"._NOTUPDATED.$prefix."_user_property</b>");
$dbconn->Execute("INSERT INTO ".$prefix."_user_property VALUES (16, '_PASSWORD', -1, 255, 16, NULL)") || die("<b>"._NOTUPDATED.$prefix."_user_property</b>");
echo "<br><font class=\"pn-sub\">".$prefix."_user_property"._UPDATED."</font>";

// populate hooks table
$dbconn->Execute("INSERT INTO ".$prefix."_hooks VALUES (1, 'item', 'display', NULL, NULL, 'GUI', 'Ratings', 'user', 'display')") || die("<b>"._NOTUPDATED.$prefix."_hooks</b>");
$dbconn->Execute("INSERT INTO ".$prefix."_hooks VALUES (2, 'item', 'transform', NULL, NULL, 'API', 'Wiki', 'user', 'transform')") || die("<b>"._NOTUPDATED.$prefix."_hooks</b>");
$dbconn->Execute("INSERT INTO ".$prefix."_hooks VALUES (3, 'item', 'transform', NULL, NULL, 'API', 'Autolinks', 'user', 'transform')") || die("<b>"._NOTUPDATED.$prefix."_hooks</b>");
echo "<br><font class=\"pn-sub\">".$prefix."_hooks"._UPDATED."</font>";
?>