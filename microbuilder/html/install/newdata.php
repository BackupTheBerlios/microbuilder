<?php
// File: $Id: newdata.php,v 1.1 2004/03/01 10:09:13 mbertier Exp $ $Name:  $

// ml-stuff
// we check if specific defines are already set
// (from the corresponding /lang/xxx/global.php file)
// if not we use the english defaults
// this way we have some ml-installation ;)

// reminder block
if (!defined('_INSTALL_REMINDERBLOCK')) {
	define ('_INSTALL_REMINDERBLOCK',"Please remember to remove the following files from your PostNuke directory<br>&middot;<b>install.php</b> file<br>&middot;<b>install</b> directory<p>If you do not remove these files then users can obtain the password to your database!<br /><br /><i>Note: This block can be edited in Administration-Blocks</i>");
}
$reminder_block = ""._INSTALL_REMINDERBLOCK."";

// admin message title
if (!defined('_INSTALL_ADMINMESSAGE_TITLE')) {
	define ('_INSTALL_ADMINMESSAGE_TITLE',"Welcome to PostNuke, the =-Phoenix-= release (0.726)");
}
$admin_message_title = ""._INSTALL_ADMINMESSAGE_TITLE."";

// admin message text
if (!defined('_INSTALL_ADMINMESSAGE_TEXTE')) {
	define ('_INSTALL_ADMINMESSAGE_TEXTE', "<a target=\"_blank\" href=\"http://www.postnuke.com\">PostNuke</a> is a weblog/Content Management System (CMS). It is far more secure and stable than competing products, and able to work in high-volume environments with ease.<br /><br />Some of the highlights of PostNuke are<ul /><li /> Customisation of all aspects of the website\'s appearance through themes, including CSS support<li /> The ability to specify items as being suitable for either a single or all languages<li /> The best guarantee of displaying your webpages on all browsers due to HTML 4.01 transitional compliance<li /> A standard API and extensive documentation to allow for easy creation of extended functionality through modules and blocks</ul><br /><br />PostNuke has a very active developer and support community at <a target=\"_blank\" href=\"http://www.postnuke.com\">www.postnuke.com</a>.<br /><br />We hope you will enjoy using PostNuke.<br /><br /><b>Your PostNuke development team </b><br /><br /><i>Note: This message can be edited in Administration-Admin Messages</i>");
}
$admin_message_texte = ""._INSTALL_ADMINMESSAGE_TEXTE."";

// footermessage
if (!defined('_FOOTMSGTEXT')) {
        define ('_FOOTMSGTEXT','<br /><a href="http://www.postnuke.com" target="_blank"><img src="images/powered/postnuke.butn.gif" border="0" alt="Web site powered by PostNuke" hspace="10" /></a> <a href="http://php.weblogs.com/ADODB" target="_blank"><img src="images/powered/adodb2.gif" alt="ADODB database library" border="0" hspace="10" /></a><a href="http://www.php.net" target="_blank"><img src="images/powered/php2.gif" alt="PHP Language" border="0" hspace="10" /></a><br /><br />All logos and trademarks in this site are property of their respective owner. The comments are property of their posters, all the rest (c) 2003 by me<br />This web site was made with <a href="http://www.postnuke.com" target="_blank">PostNuke</a>, a web portal system written in PHP. PostNuke is Free Software released under the <a href="http://www.gnu.org" target="_blank">GNU/GPL license</a>.<br />You can syndicate our news using the file <a href="backend.php">backend.php</a>');
}
$footmsg = ""._FOOTMSGTEXT."";

// title of blocks
if (!defined('_BLOCKTITLE_INCOMING')) {
        define('_BLOCKTITLE_INCOMING','Incoming');
}
$incoming_block_title = ""._BLOCKTITLE_INCOMING."";

if (!defined('_BLOCKTITLE_WHOISONLINE')) {
        define('_BLOCKTITLE_WHOISONLINE','Online');
}
$whoisonline_block_title = ""._BLOCKTITLE_WHOISONLINE."";


if (!defined('_BLOCKTITLE_OTHERSTORIES')) {
        define('_BLOCKTITLE_OTHERSTORIES','Other Stories');
}
$otherstories_block_title = ""._BLOCKTITLE_OTHERSTORIES."";

if (!defined('_BLOCKTITLE_USERSBLOCK')) {
        define('_BLOCKTITLE_USERSBLOCK','Users Block');
}
$usersblock_block_title = ""._BLOCKTITLE_USERSBLOCK."";

if (!defined('_BLOCKTITLE_SEARCHBOX')) {
        define('_BLOCKTITLE_SEARCHBOX','Search Box');
}
$searchbox_block_title = ""._BLOCKTITLE_SEARCHBOX."";

if (!defined('_BLOCKTITLE_EPHEMERIDS')) {
        define('_BLOCKTITLE_EPHEMERIDS','Ephemerids');
}
$ephemerids_block_title = ""._BLOCKTITLE_EPHEMERIDS."";

if (!defined('_BLOCKTITLE_LANGUAGES')) {
        define('_BLOCKTITLE_LANGUAGES','Languages');
}
$languages_block_title = ""._BLOCKTITLE_LANGUAGES."";

if (!defined('_BLOCKTITLE_CATMENU')) {
        define('_BLOCKTITLE_CATMENU','Categories Menu');
}
$catmenu_block_title = ""._BLOCKTITLE_CATMENU."";

if (!defined('_BLOCKTITLE_RANHEAD')) {
        define('_BLOCKTITLE_RANHEAD','Random Headlines');
}
$ranhead_block_title = ""._BLOCKTITLE_RANHEAD."";

if (!defined('_BLOCKTITLE_POLL')) {
        define('_BLOCKTITLE_POLL','Poll');
}
$poll_block_title = ""._BLOCKTITLE_POLL."";

if (!defined('_BLOCKTITLE_BIGSTORY')) {
        define('_BLOCKTITLE_BIGSTORY','Todays Big Story');
}
$bigstory_block_title = ""._BLOCKTITLE_BIGSTORY."";

if (!defined('_BLOCKTITLE_USERSLOGIN')) {
        define('_BLOCKTITLE_USERSLOGIN','Login');
}
$userslogin_block_title = ""._BLOCKTITLE_USERSLOGIN."";

if (!defined('_BLOCKTITLE_PASTART')) {
        define('_BLOCKTITLE_PASTART','Past Articles');
}
$pastart_block_title = ""._BLOCKTITLE_PASTART."";

if (!defined('_BLOCKTITLE_ADMINMESS')) {
        define('_BLOCKTITLE_ADMINMESS','Administration Messages');
}
$adminmess_block_title = ""._BLOCKTITLE_ADMINMESS."";

if (!defined('_BLOCKTITLE_REMINDER')) {
        define('_BLOCKTITLE_REMINDER','Reminder');
}
$reminder_block_title = ""._BLOCKTITLE_REMINDER."";

if (!defined('_BLOCKTITLE_USERSBLOCK_TEXTE')) {
        define('_BLOCKTITLE_USERBLOCK_TEXTE','Put anything you want here');
}
$usersblocktexte_block_title = ""._BLOCKTITLE_USERSBLOCK_TEXTE."";

// main menu
// note: this is also used for setting up the permission table!
if (!defined('_BLOCKTITLE_MAINMENU')) {
        define('_BLOCKTITLE_MAINMENU','Main Menu');
}
$mainblock_block_title = ""._BLOCKTITLE_MAINMENU."";

if (!defined('_BLOCKTITLE_MAINMENU_HOME')) {
        define('_BLOCKTITLE_MAINMENU_HOME','Home');
}
$mainblock_block_home = ""._BLOCKTITLE_MAINMENU_HOME."";

if (!defined('_BLOCKTITLE_MAINMENU_HOMEALT')) {
        define('_BLOCKTITLE_MAINMENU_HOMEALT','Back to the home page.');
}
$mainblock_block_homealt = ""._BLOCKTITLE_MAINMENU_HOMEALT."";

if (!defined('_BLOCKTITLE_MAINMENU_USER')) {
        define('_BLOCKTITLE_MAINMENU_USER','My Account');
}
$mainblock_block_user = ""._BLOCKTITLE_MAINMENU_USER."";

if (!defined('_BLOCKTITLE_MAINMENU_USERALT')) {
        define('_BLOCKTITLE_MAINMENU_USERALT','Administer your personal account.');
}
$mainblock_block_useralt = ""._BLOCKTITLE_MAINMENU_USERALT."";

if (!defined('_BLOCKTITLE_MAINMENU_ADMIN')) {
        define('_BLOCKTITLE_MAINMENU_ADMIN','Administration');
}
$mainblock_block_admin = ""._BLOCKTITLE_MAINMENU_ADMIN."";

if (!defined('_BLOCKTITLE_MAINMENU_ADMINALT')) {
        define('_BLOCKTITLE_MAINMENU_ADMINALT','Administer your PostNuked site.');
}
$mainblock_block_adminalt = ""._BLOCKTITLE_MAINMENU_ADMINALT."";

if (!defined('_BLOCKTITLE_MAINMENU_USEREXIT')) {
        define('_BLOCKTITLE_MAINMENU_USEREXIT','Logout');
}
$mainblock_block_userexit = ""._BLOCKTITLE_MAINMENU_USEREXIT."";

if (!defined('_BLOCKTITLE_MAINMENU_USEREXITALT')) {
        define('_BLOCKTITLE_MAINMENU_USEREXITALT','Logout of your account.');
}
$mainblock_block_userexitalt = ""._BLOCKTITLE_MAINMENU_USEREXITALT."";

if (!defined('_BLOCKTITLE_MAINMENU_AVANTGO')) {
        define('_BLOCKTITLE_MAINMENU_AVANTGO','AvantGo');
}
$mainblock_block_avantgo = ""._BLOCKTITLE_MAINMENU_AVANTGO."";

if (!defined('_BLOCKTITLE_MAINMENU_AVANTGOALT')) {
        define('_BLOCKTITLE_MAINMENU_AVANTGOALT','Stories formatted for PDAs.');
}
$mainblock_block_avantgoalt = ""._BLOCKTITLE_MAINMENU_AVANTGOALT."";

if (!defined('_BLOCKTITLE_MAINMENU_DL')) {
        define('_BLOCKTITLE_MAINMENU_DL','Downloads');
}
$mainblock_block_dl = ""._BLOCKTITLE_MAINMENU_DL."";

if (!defined('_BLOCKTITLE_MAINMENU_DLALT')) {
        define('_BLOCKTITLE_MAINMENU_DLALT','Find downloads listed on this website.');
}
$mainblock_block_dlalt = ""._BLOCKTITLE_MAINMENU_DLALT."";

if (!defined('_BLOCKTITLE_MAINMENU_FAQ')) {
        define('_BLOCKTITLE_MAINMENU_FAQ','FAQ');
}
$mainblock_block_faq = ""._BLOCKTITLE_MAINMENU_FAQ."";

if (!defined('_BLOCKTITLE_MAINMENU_FAQALT')) {
        define('_BLOCKTITLE_MAINMENU_FAQALT','Frequently Asked Questions');
}
$mainblock_block_faqalt = ""._BLOCKTITLE_MAINMENU_FAQALT."";

if (!defined('_BLOCKTITLE_MAINMENU_MLIST')) {
        define('_BLOCKTITLE_MAINMENU_MLIST','Members List');
}
$mainblock_block_mlist = ""._BLOCKTITLE_MAINMENU_MLIST."";

if (!defined('_BLOCKTITLE_MAINMENU_MLISTALT')) {
        define('_BLOCKTITLE_MAINMENU_MLISTALT','Listing of registered users on this site.');
}
$mainblock_block_mlistalt = ""._BLOCKTITLE_MAINMENU_MLISTALT."";

if (!defined('_BLOCKTITLE_MAINMENU_NEWS')) {
        define('_BLOCKTITLE_MAINMENU_NEWS','News');
}
$mainblock_block_news = ""._BLOCKTITLE_MAINMENU_NEWS."";

if (!defined('_BLOCKTITLE_MAINMENU_NEWSALT')) {
        define('_BLOCKTITLE_MAINMENU_NEWSALT','Latest News on this site.');
}
$mainblock_block_newsalt = ""._BLOCKTITLE_MAINMENU_NEWSALT."";

if (!defined('_BLOCKTITLE_MAINMENU_RUS')) {
        define('_BLOCKTITLE_MAINMENU_RUS','Recommend Us');
}
$mainblock_block_rus = ""._BLOCKTITLE_MAINMENU_RUS."";

if (!defined('_BLOCKTITLE_MAINMENU_RUSALT')) {
        define('_BLOCKTITLE_MAINMENU_RUSALT','Recommend this website to a friend.');
}
$mainblock_block_rusalt = ""._BLOCKTITLE_MAINMENU_RUSALT."";

if (!defined('_BLOCKTITLE_MAINMENU_RWS')) {
        define('_BLOCKTITLE_MAINMENU_RWS','Reviews');
}
$mainblock_block_rws = ""._BLOCKTITLE_MAINMENU_RWS."";

if (!defined('_BLOCKTITLE_MAINMENU_RWSALT')) {
        define('_BLOCKTITLE_MAINMENU_RWSALT','Reviews Section on this website.');
}
$mainblock_block_rwsalt = ""._BLOCKTITLE_MAINMENU_RWSALT."";

if (!defined('_BLOCKTITLE_MAINMENU_SEARCH')) {
        define('_BLOCKTITLE_MAINMENU_SEARCH','Search');
}
$mainblock_block_search = ""._BLOCKTITLE_MAINMENU_SEARCH."";

if (!defined('_BLOCKTITLE_MAINMENU_SEARCHALT')) {
        define('_BLOCKTITLE_MAINMENU_SEARCHALT','Search our website.');
}
$mainblock_block_searchalt = ""._BLOCKTITLE_MAINMENU_SEARCHALT."";

if (!defined('_BLOCKTITLE_MAINMENU_SECTIONS')) {
        define('_BLOCKTITLE_MAINMENU_SECTIONS','Sections');
}
$mainblock_block_sections = ""._BLOCKTITLE_MAINMENU_SECTIONS."";

if (!defined('_BLOCKTITLE_MAINMENU_SECTIONSALT')) {
        define('_BLOCKTITLE_MAINMENU_SECTIONSALT','Other content on this website.');
}
$mainblock_block_sectionsalt = ""._BLOCKTITLE_MAINMENU_SECTIONSALT."";

if (!defined('_BLOCKTITLE_MAINMENU_STATS')) {
        define('_BLOCKTITLE_MAINMENU_STATS','Stats');
}
$mainblock_block_stats = ""._BLOCKTITLE_MAINMENU_STATS."";

if (!defined('_BLOCKTITLE_MAINMENU_STATSALT')) {
        define('_BLOCKTITLE_MAINMENU_STATSALT','Detailed traffic statistics.');
}
$mainblock_block_statsalt = ""._BLOCKTITLE_MAINMENU_STATSALT."";

if (!defined('_BLOCKTITLE_MAINMENU_SNEWS')) {
        define('_BLOCKTITLE_MAINMENU_SNEWS','Submit News');
}
$mainblock_block_snews = ""._BLOCKTITLE_MAINMENU_SNEWS."";

if (!defined('_BLOCKTITLE_MAINMENU_SNEWSALT')) {
        define('_BLOCKTITLE_MAINMENU_SNEWSALT','Submit an article.');
}
$mainblock_block_snewsalt = ""._BLOCKTITLE_MAINMENU_SNEWSALT."";

if (!defined('_BLOCKTITLE_MAINMENU_TOPICS')) {
        define('_BLOCKTITLE_MAINMENU_TOPICS','Topics');
}
$mainblock_block_topics = ""._BLOCKTITLE_MAINMENU_TOPICS."";

if (!defined('_BLOCKTITLE_MAINMENU_TOPICSALT')) {
        define('_BLOCKTITLE_MAINMENU_TOPICSALT','Listing of news topics on this website.');
}
$mainblock_block_topicsalt = ""._BLOCKTITLE_MAINMENU_TOPICSALT."";

if (!defined('_BLOCKTITLE_MAINMENU_TLIST')) {
        define('_BLOCKTITLE_MAINMENU_TLIST','Top List');
}
$mainblock_block_tlist = ""._BLOCKTITLE_MAINMENU_TLIST."";

if (!defined('_BLOCKTITLE_MAINMENU_TLISTALT')) {
        define('_BLOCKTITLE_MAINMENU_TLISTALT','Top 10list.');
}
$mainblock_block_tlistalt = ""._BLOCKTITLE_MAINMENU_TLISTALT."";

if (!defined('_BLOCKTITLE_MAINMENU_WLINKS')) {
        define('_BLOCKTITLE_MAINMENU_WLINKS','Web Links');
}
$mainblock_block_wlinks = ""._BLOCKTITLE_MAINMENU_WLINKS."";

if (!defined('_BLOCKTITLE_MAINMENU_WLINKSALT')) {
        define('_BLOCKTITLE_MAINMENU_WLINKSALT','Links to other sites.');
}
$mainblock_block_wlinksalt = ""._BLOCKTITLE_MAINMENU_WLINKSALT."";


// popuplate blocks table
$result = $dbconn->Execute("INSERT INTO ".$prefix."_blocks VALUES (1,'menu','$mainblock_block_title',
'style:=1\ndisplaymodules:=0\ndisplaywaiting:=0\ncontent:=index.php|$mainblock_block_home|$mainblock_block_homealt.LINESPLITuser.php|$mainblock_block_user|$mainblock_block_useralt.LINESPLITadmin.php|$mainblock_block_admin|$mainblock_block_adminalt.LINESPLITuser.php?module=NS-User&op=logout|$mainblock_block_userexit|$mainblock_block_userexitalt.LINESPLIT|Modules|LINESPLIT[AvantGo]|$mainblock_block_avantgo|$mainblock_block_avantgoalt.LINESPLIT[Downloads]|$mainblock_block_dl|$mainblock_block_dlalt.LINESPLIT[FAQ]|$mainblock_block_faq|$mainblock_block_faqalt.LINESPLIT[Members_List]|$mainblock_block_mlist|$mainblock_block_mlistalt.LINESPLIT[News]|$mainblock_block_news|$mainblock_block_newsalt.LINESPLIT[Recommend_Us]|$mainblock_block_rus|$mainblock_block_rusalt.LINESPLIT[Reviews]|$mainblock_block_rws|$mainblock_block_rwsalt.LINESPLIT[Search]|$mainblock_block_search|$mainblock_block_searchalt.LINESPLIT[Sections]|$mainblock_block_sections|$mainblock_block_sectionsalt.LINESPLIT[Stats]|$mainblock_block_stats|$mainblock_block_statsalt.LINESPLIT[Submit_News]|$mainblock_block_snews|$mainblock_block_snewsalt.LINESPLIT[Topics]|$mainblock_block_topics|$mainblock_block_topicsalt.LINESPLIT[Top_List]|$mainblock_block_tlist|$mainblock_block_tlistalt.LINESPLIT[Web_Links]|$mainblock_block_wlinks|$mainblock_block_wlinksalt.','',0, 'l','1.0',1,'',20011122090726,'')")
or die ("<b>"._NOTUPDATED. $prefix."_blocks ($mainblock_block_title)</font>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_blocks VALUES ( '2', 'menu', '$incoming_block_title', 'style:=1\ndisplaymodules:=0\ndisplaywaiting:=1\ncontent:=', '', 0, 'l', '2.0', '1', '0', '00000000000000', '')") or die ("<b>"._NOTUPDATED.$prefix."_blocks ($incoming_block_title)</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_blocks VALUES ( '3', 'online', '$whoisonline_block_title', '', '', 0, 'l', '3.0', '1', '0', '00000000000000', '')") or die ("<b>"._NOTUPDATED. $prefix."_blocks ($whoisonline_block_title)</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_blocks VALUES ( '4', 'stories', '$otherstories_block_title', 'type:=1 topic:=-1  category:=-1 limit:=10', '', 0, 'r', '1.0', '1', '0', '00000000000000', '')") or die ("<b>"._NOTUPDATED. $prefix."_blocks ($otherstories_block_title)</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_blocks VALUES ( '5', 'user', '$usersblock_block_title', '$usersblocktexte_block_title', '', 0, 'l', '3.5', '1', '0', '00000000000000', '')") or die ("<b>"._NOTUPDATED.$prefix."_blocks ($usersblock_block_title)</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_blocks VALUES ( '6', 'search', '$searchbox_block_title', '', '', 0, 'l', '4.0', '0', '0', '00000000000000', '')") or die ("<b>"._NOTUPDATED.$prefix."_blocks ($searchbox_block_title)</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_blocks VALUES ( '7', 'ephem', '$ephemerids_block_title', '', '', 0, 'l', '5.0', '0', '0', '00000000000000', '')") or die ("<b>"._NOTUPDATED.$prefix."_blocks ($ephemerids_block_title)</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_blocks VALUES ( '8', 'thelang', '$languages_block_title', '', '', 0, 'l', '6.0', '1', '0', '00000000000000', '')") or die ("<b>"._NOTUPDATED.$prefix."_blocks ($languages_block_title)</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_blocks VALUES ( '9', 'category', '$catmenu_block_title', '', '', 0, 'r', '1.5', '1', '0', '00000000000000', '')") or die ("<b>"._NOTUPDATED.$prefix."_blocks ($catmenu_block_title)</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_blocks VALUES ( '10', 'random', '$ranhead_block_title', '', '', 0, 'r', '2.0', '0', '0', '00000000000000', '')") or die ("<b>"._NOTUPDATED.$prefix."_blocks ($ranhead_block_title)</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_blocks VALUES ( '11', 'poll', '$poll_block_title', '', '', 0, 'r', '3.0', '1', '0', '00000000000000', '')") or die ("<b>"._NOTUPDATED.$prefix."_blocks ($poll_block_title)</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_blocks VALUES ( '12', 'big', '$bigstory_block_title', '', '', 0, 'r', '4.0', '1', '0', '00000000000000', '')") or die ("<b>"._NOTUPDATED.$prefix."_blocks ($bigstory_block_title)</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_blocks VALUES ( '13', 'login', '$userslogin_block_title', '', '', 0, 'r', '5.0', '1', '0', '00000000000000', '')") or die ("<b>"._NOTUPDATED.$prefix."_blocks ($userslogin_block_title)</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_blocks VALUES ( '14', 'past', '$pastart_block_title', '', '', 0, 'r', '6.0', '1', '0', '00000000000000', '')") or die ("<b>"._NOTUPDATED.$prefix."_blocks ($pastart_block_title)</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_blocks VALUES ( '15', 'messages', '$adminmess_block_title', '', '', 8, 'c', '1.0', '1', '0', '00000000000000', '')") or die ("<b>"._NOTUPDATED.$prefix."_blocks ($adminmess_block_title)</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_blocks VALUES ( '16', 'html', '$reminder_block_title', '$reminder_block', '', 0, 'l', '0.5', '1', '0', '00000000000000', '')") or die ("<b>"._NOTUPDATED.$prefix."_blocks ($reminder_block_title)</b>");
echo "<br><font class=\"pn-sub\">".$prefix."_blocks "._UPDATED."</font>";

// populate counter table
$result = $dbconn->Execute("INSERT INTO ".$prefix."_counter VALUES ('total','hits',0)") or die ("<b>"._NOTUPDATED. $prefix."_counter</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_counter VALUES ('browser','Lynx',0)") or die ("<b>"._NOTUPDATED. $prefix."_counter</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_counter VALUES ('browser','MSIE',0)") or die ("<b>"._NOTUPDATED. $prefix."_counter</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_counter VALUES ('browser','Opera',0)") or die ("<b>"._NOTUPDATED. $prefix."_counter</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_counter VALUES ('browser','Konqueror',0)") or die ("<b>"._NOTUPDATED. $prefix."_counter</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_counter VALUES ('browser','Netscape',0)") or die ("<b>"._NOTUPDATED. $prefix."_counter</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_counter VALUES ('browser','Bot',0)") or die ("<b>"._NOTUPDATED. $prefix."_counter</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_counter VALUES ('browser','Other',0)") or die ("<b>"._NOTUPDATED. $prefix."_counter</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_counter VALUES ('os','Windows',0)") or die ("<b>"._NOTUPDATED. $prefix."_counter</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_counter VALUES ('os','Linux',0)") or die ("<b>"._NOTUPDATED. $prefix."_counter</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_counter VALUES ('os','Mac',0)") or die ("<b>"._NOTUPDATED. $prefix."_counter</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_counter VALUES ('os','FreeBSD',0)") or die ("<b>"._NOTUPDATED. $prefix."_counter</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_counter VALUES ('os','SunOS',0)") or die ("<b>"._NOTUPDATED. $prefix."_counter</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_counter VALUES ('os','IRIX',0)") or die ("<b>"._NOTUPDATED. $prefix."_counter</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_counter VALUES ('os','BeOS',0)") or die ("<b>"._NOTUPDATED. $prefix."_counter</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_counter VALUES ('os','OS/2',0)") or die ("<b>"._NOTUPDATED. $prefix."_counter</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_counter VALUES ('os','AIX',0)") or die ("<b>"._NOTUPDATED. $prefix."_counter</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_counter VALUES ('os','Other',0)") or die ("<b>"._NOTUPDATED. $prefix."_counter</b>");
echo "<br><font class=\"pn-sub\">".$prefix."_counter "._UPDATED."</font>";

// populate headlines table
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (1,'PostNuke',NULL,NULL,'','http://postnuke.com/backend.php',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (2,'LinuxCentral',NULL,NULL,'','http://linuxcentral.com/backend/lcnew.rdf',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (3,'Slashdot',NULL,NULL,'','http://slashdot.org/slashdot.rdf',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (4,'NewsForge',NULL,NULL,'','http://www.newsforge.com/newsforge.rdf',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (5,'PHPBuilder',NULL,NULL,'','http://phpbuilder.com/rss_feed.php',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (6,'Linux.com',NULL,NULL,'','http://linux.com/mrn/front_page.rss',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (7,'Freshmeat',NULL,NULL,'','http://freshmeat.net/backend/fm.rdf',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (9,'LinuxWeeklyNews',NULL,NULL,'','http://lwn.net/headlines/rss',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (11,'Segfault',NULL,NULL,'','http://segfault.org/stories.xml',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (13,'KDE',NULL,NULL,'','http://www.kde.org/news/kdenews.rdf',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (14,'Perl.com',NULL,NULL,'','http://www.perl.com/pace/perlnews.rdf',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (17,'MozillaNewsBot',NULL,NULL,'','http://www.mozilla.org/newsbot/newsbot.rdf',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (21,'SciFi-News',NULL,NULL,'','http://www.technopagan.org/sf-news/rdf.php',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (26,'DrDobbsTechNetCast',NULL,NULL,'','http://www.technetcast.com/tnc_headlines.rdf',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (27,'RivaExtreme',NULL,NULL,'','http://rivaextreme.com/ssi/rivaextreme.rdf.cdf',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (29,'PBSOnline',NULL,NULL,'','http://cgi.pbs.org/cgi-registry/featuresrdf.pl',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (30,'Listology',NULL,NULL,'','http://listology.com/recent.rdf',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (33,'exoScience',NULL,NULL,'','http://www.exosci.com/exosci.rdf',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (39,'DailyDaemonNews',NULL,NULL,'','http://daily.daemonnews.org/ddn.rdf.php3',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (40,'PerlMonks',NULL,NULL,'','http://www.perlmonks.org/headlines.rdf',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (42,'BSDToday',NULL,NULL,'','http://www.bsdtoday.com/backend/bt.rdf',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (45,'HotWired',NULL,NULL,'','http://www.hotwired.com/webmonkey/meta/headlines.rdf',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_headlines VALUES (52,'SolarisCentral',NULL,NULL,'','http://www.SolarisCentral.org/news/SolarisCentral.rdf',10,'','')") or die ("<b>"._NOTUPDATED.$prefix."_headlines</b>");
echo "<br><font class=\"pn-sub\">".$prefix."_headlines"._UPDATED."</font>";

// populate messages table
$result = $dbconn->Execute("INSERT INTO ".$prefix."_message VALUES ( '1','$admin_message_title','$admin_message_texte', '993373194', '0', '1', '1', '')") or die ("<b>"._NOTUPDATED.$prefix."_message</font>");
echo "<br><font class=\"pn-sub\">".$prefix."_message"._UPDATED."</font>";

// populate module_vars table
// Default theme selection
$themesel = rand(1 , 5);
if ($themesel == 1){
        $truetheme = 's:8:\"PostNuke\";';
}
if ($themesel == 2){
        $truetheme = 's:12:\"PostNukeBlue\";';
}
if ($themesel == 3){
        $truetheme = 's:14:\"PostNukeSilver\";';
}
if ($themesel == 4){
        $truetheme = 's:9:\"SeaBreeze\";';
}
if ($themesel == 5){
        $truetheme = 's:9:\"ExtraLite\";';
}

// get startdate
$date = date("m.Y", time());

$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('1', '/PNConfig','debug','i:0;')") or die ("<b>"._NOTUPDATED. $prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('2', '/PNConfig','sitename','s:14:\"Your Site Name\";')") or die ("<b>"._NOTUPDATED. $prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('3', '/PNConfig','site_logo','s:8:\"logo.gif\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('4', '/PNConfig','slogan','s:16:\"Your slogan here\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('5', '/PNConfig','metakeywords','s:218:\"nuke, postnuke, postnuke, free, community, php, portal, opensource, open source, gpl, mysql, sql, database, web site, website, weblog, content management, contentmanagement, web content management, webcontentmanagement\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('6', '/PNConfig','dyn_keywords','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('7', '/PNConfig','startdate','s:9:\"$date\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('8', '/PNConfig','adminmail','s:13:\"none@none.com\";')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('9', '/PNConfig','Default_Theme','$truetheme')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('10', '/PNConfig','foot1','". serialize($footmsg) ."')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('11', '/PNConfig','commentlimit','i:4096;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
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
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('91', 'Ratings','defaultstyle','outoffivestars')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('92', 'Ratings','seclevel','medium')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
global $intranet;
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('93', '/PNConfig','intranet','i:$intranet;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('94', 'Wiki','AllowedProtocols','http|https|mailto|ftp|news|gopher')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('95', 'Wiki','ExtlinkNewWindow','0')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('97', 'Wiki','IntlinkNewWindow','0')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('98', 'Wiki','FieldSeparator','\263')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('99', 'Wiki','InlineImages','png|jpg|gif')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
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
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('118', 'Autolinks','itemsperpage','i:20;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('119', 'Autolinks','linkfirst','i:1;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_module_vars VALUES ('120', 'Autolinks','invisilinks','i:0;')") or die ("<b>"._NOTUPDATED.$prefix."_module_vars</b>");
echo "<br><font class=\"pn-sub\">".$prefix."_module_vars"._UPDATED."</font>";

// set pol block

if (!defined('_POLLDATATEXT1')) {
        define ('_POLLDATATEXT1','What is PostNuke ?');
}
     $polldatatext1 = ""._POLLDATATEXT1."";

 if (!defined('_POLLDATATEXT2')) {
        define ('_POLLDATATEXT2','It is what was needed.');
}

        $polldatatext2 = ""._POLLDATATEXT2."";

if (!defined('_POLLDATATEXT3')) {
        define ('_POLLDATATEXT3','Think? I use it!');
}

        $polldatatext3 = ""._POLLDATATEXT3."";

// populate poll_data table
$result = $dbconn->Execute("INSERT INTO ".$prefix."_poll_data VALUES ( '2', '', '0', '12')") or die ("<b>"._NOTUPDATED. $prefix."_poll_data</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_poll_data VALUES ( '2', '', '0', '11')") or die ("<b>"._NOTUPDATED. $prefix."_poll_data</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_poll_data VALUES ( '2', '', '0', '10')") or die ("<b>"._NOTUPDATED. $prefix."_poll_data</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_poll_data VALUES ( '2', '', '0', '9')") or die ("<b>"._NOTUPDATED. $prefix."_poll_data</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_poll_data VALUES ( '2', '', '0', '8')") or die ("<b>"._NOTUPDATED. $prefix."_poll_data</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_poll_data VALUES ( '2', '', '0', '7')") or die ("<b>"._NOTUPDATED. $prefix."_poll_data</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_poll_data VALUES ( '2', '', '0', '6')") or die ("<b>"._NOTUPDATED. $prefix."_poll_data</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_poll_data VALUES ( '2', '', '0', '5')") or die ("<b>"._NOTUPDATED. $prefix."_poll_data</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_poll_data VALUES ( '2', '', '0', '4')") or die ("<b>"._NOTUPDATED. $prefix."_poll_data</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_poll_data VALUES ( '2', '$polldatatext1', '0', '3')") or die ("<b>"._NOTUPDATED. $prefix."_poll_data</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_poll_data VALUES ( '2', '$polldatatext2', '0', '2')") or die ("<b>"._NOTUPDATED. $prefix."_poll_data</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_poll_data VALUES ( '2', '$polldatatext3', '0', '1')") or die ("<b>"._NOTUPDATED. $prefix."_poll_data</b>");
echo "<br><font class=\"pn-sub\">".$prefix."_poll_data"._UPDATED."</font>";



if (!defined('_POLLDESCTEXT')) {
        define ('_POLLDESCTEXT','What do you think of PostNuke?');
}
          $polldesctext = ""._POLLDESCTEXT."";

if (!defined('_REWIEWSMAINTITLE')) {
        define ('_REWIEWSMAINTITLE','Reviews Section Title');
}
          $reviewsmaintitle = ""._REWIEWSMAINTITLE."";

if (!defined('_REWIEWSMAINDESC')) {
        define ('_REWIEWSMAINDESC','Reviews Section Long Description');
}
        $reviewsmaindesc = ""._REWIEWSMAINDESC."";
// populate poll_desc table
$result = $dbconn->Execute("INSERT INTO ".$prefix."_poll_desc VALUES ( '2', '$polldesctext', '995385085', '0', '')") or die ("<b>"._NOTUPDATED. $prefix."_poll_desc</b>");
echo "<br><font class=\"pn-sub\">".$prefix."_poll_desc"._UPDATED."</font>";

// populate reviews_main table
$result = $dbconn->Execute("INSERT INTO ".$prefix."_reviews_main VALUES ( '$reviewsmaintitle', '$reviewsmaindesc')") or die ("<b>"._NOTUPDATED. $prefix."_reviews_main</b>");
echo "<br><font class=\"pn-sub\">".$prefix."_reviews_main"._UPDATED."</font>";

// populate topic table
$result = $dbconn->Execute("INSERT INTO ".$prefix."_topics VALUES ( '2', 'Linux', 'linux.gif', 'Linux', '0')") or die ("<b>"._NOTUPDATED. $prefix."_topics</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_topics VALUES ( '1', 'PostNuke', 'PostNuke.gif', 'PostNuke', '0')") or die ("<b>"._NOTUPDATED. $prefix."_topics</b>");
echo "<br><font class=\"pn-sub\">".$prefix."_topics"._UPDATED."</font>";

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
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (1,'AvantGo',1,'AvantGo','News for your PDA',2,'AvantGo','1.3',0,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (2,'Downloads',1,'Downloads','Files to download',3,'Downloads','1.31',1,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (3,'FAQ',1,'FAQ','Frequently Asked Questions',4,'FAQ','1.11',1,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (4,'Members_List',1,'Members List','Information on users of this site',5,'Members_List','1.1',0,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (5,'Messages',1,'Messages','Private messages to users of this site',6,'Messages','1.0',0,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (6,'AddStory',1,'AddStory','Add a story',8,'NS-AddStory','1.0',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (7,'Admin',1,'Admin','Administration',9,'NS-Admin','0.1',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (8,'Admin_Messages',1,'Admin Messages','Banner messages',10,'NS-Admin_Messages','1.2',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (9,'Autolinks',2,'Autolinks','Automatically link keywords',11,'Autolinks','1.01',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (10,'Banners',1,'Banners','Banners',12,'NS-Banners','1.0',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (11,'Blocks',2,'Blocks','Side blocks',13,'Blocks','2.0',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (12,'Comments',1,'Comments','Comment on articles',14,'NS-Comments','1.1',1,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (13,'Ephemerids',1,'Ephemerids','Daily events',15,'NS-Ephemerids','1.2',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (14,'Groups',1,'Groups','Set up administrative groups',16,'NS-Groups','0.1',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (15,'Languages',1,'Languages','Multi-language functions',17,'NS-Languages','1.2',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (16,'MailUsers',1,'MailUsers','Mail your users',19,'NS-MailUsers','1.0',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (17,'Modules',2,'Modules','Module configuration',1,'Modules','2.0',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (18,'Permissions',2,'Permissions','Configure permissions',22,'Permissions','0.4',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (19,'Polls',1,'Polls','Polls and surveys',23,'NS-Polls','1.1',1,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (20,'Quotes',2,'Quotes','Quotes and sayings',24,'Quotes','1.3',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (21,'Referers',1,'Referers','Referers',25,'NS-Referers','1.2',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (22,'Settings',1,'Settings','Settings',26,'NS-Settings','1.2',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (23,'News',1,'News','News items',7,'News','1.3',0,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (24,'Recommend_Us',1,'Recommend Us','Recommend us to a friend',30,'Recommend_Us','1.0',0,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (25,'Reviews',1,'Reviews','Reviews',31,'Reviews','1.0',1,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (26,'Search',1,'Search','Search this site',32,'Search','1.0',0,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (27,'Sections',1,'Sections','Sections',33,'Sections','1.0',1,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (28,'Stats',1,'Stats','Site statistics',34,'Stats','1.13',0,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (29,'Submit_News',1,'Submit News','Contribute a story',35,'Submit_News','1.13',1,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (30,'Top_List',1,'Top List','Top 10 listings',38,'Top_List','1.0',1,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (31,'Topics',1,'Topics','Article topics',37,'Topics','1.0',1,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (32,'User',1,'Users','User Administration',27,'NS-User','0.2',1,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (33,'Web_Links',1,'Web Links','Links to other sites',39,'Web_Links','1.0',1,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (34,'Ratings',2,'Ratings','Ratings utility',41,'Ratings','1.1',1,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (35,'Wiki',2,'Wiki','Wiki encoding',28,'Wiki','1.0',0,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (36,'xmlrpc',2,'xmlrpc','XML-RPC utility module',42,'xmlrpc','1.1',0,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (37,'legal',1,'Legal Documents','Generic Privacy Statement and Terms of Use',43,'legal','1.0',0,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (38,'Censor',2,'Censor','Site Censorship Control',0,'Censor','1.0',1,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (39,'Credits',2,'Credits','Display Module credits, license, help and contact information',0,'Credits','1.1',0,1,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (40,'LostPassword',1,'LostPassword','Retrieve lost password of a user.',18,'NS-LostPassword','0,5',0,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (41,'Multisites',1,'Multisites','',20,'NS-Multisites','0',0,0,2)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (42,'NewUser',1,'NewUser','New User for postnuke.',21,'NS-NewUser','0,5',0,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (43,'Past_Nuke',1,'Past_Nuke','Old Post-Nuke admin compatibility',0,'NS-Past_Nuke','1.0',1,0,2)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (44,'Your_Account',1,'Your Account','User options',0,'NS-Your_Account','0.8',0,0,3)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
$result = $dbconn->Execute("INSERT INTO ".$prefix."_modules VALUES (45,'Template',2,'Template','Template for new modules',0,'Template','1.0',1,1,2)") || die("<b>"._NOTUPDATED.$prefix."_modules</b>");
echo "<br><font class=\"pn-sub\">".$prefix."_modules"._UPDATED."</font>";

// populate stats_hour table
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '0', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '1', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '2', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '3', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '4', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '5', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '6', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '7', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '8', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '9', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '10', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '11', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '12', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '13', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '14', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '15', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '16', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '17', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '18', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '19', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '20', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '21', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '22', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_hour VALUES ( '23', '0')");
echo "<br><font class=\"pn-sub\">".$prefix."_stats_hours"._UPDATED."</font>";

// populate stats_month table
$dbconn->Execute("INSERT INTO ".$prefix."_stats_month VALUES ( '1', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_month VALUES ( '2', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_month VALUES ( '3', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_month VALUES ( '4', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_month VALUES ( '5', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_month VALUES ( '6', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_month VALUES ( '7', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_month VALUES ( '8', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_month VALUES ( '9', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_month VALUES ( '10', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_month VALUES ( '11', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_month VALUES ( '12', '0')");
echo "<br><font class=\"pn-sub\">".$prefix."_stats_month"._UPDATED."</font>";

// populate stats_week table
$dbconn->Execute("INSERT INTO ".$prefix."_stats_week VALUES ( '0', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_week VALUES ( '1', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_week VALUES ( '2', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_week VALUES ( '3', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_week VALUES ( '4', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_week VALUES ( '5', '0')");
$dbconn->Execute("INSERT INTO ".$prefix."_stats_week VALUES ( '6', '0')");
echo "<br><font class=\"pn-sub\">".$prefix."_stats_week"._UPDATED."</font>";

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