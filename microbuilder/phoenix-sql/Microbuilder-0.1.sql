
#
# Table structure for table `nuke_blocks`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_blocks` (
  `pn_bid` int(11) unsigned NOT NULL auto_increment,
  `pn_bkey` varchar(255) NOT NULL default '',
  `pn_title` varchar(255) NOT NULL default '',
  `pn_content` text NOT NULL,
  `pn_url` varchar(254) NOT NULL default '',
  `pn_mid` int(11) unsigned NOT NULL default '0',
  `pn_position` char(1) NOT NULL default 'l',
  `pn_weight` decimal(10,1) NOT NULL default '0.0',
  `pn_active` tinyint(3) unsigned NOT NULL default '1',
  `pn_refresh` int(11) unsigned NOT NULL default '0',
  `pn_last_update` timestamp(14) NOT NULL,
  `pn_language` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`pn_bid`)
) TYPE=MyISAM AUTO_INCREMENT=17 ;

#
# Dumping data for table `nuke_blocks`
#

INSERT INTO `nuke_blocks` VALUES (1, 'menu', 'Main Menu', 'style:=1\ndisplaymodules:=0\ndisplaywaiting:=0\ncontent:=index.php|Home|Back to the home page.LINESPLITuser.php|My Account|Administer your personal account.LINESPLITadmin.php|Administration|Administer your PostNuked site.LINESPLITuser.php?module=NS-User&op=logout|Logout|Logout of your account.LINESPLIT|Modules|LINESPLIT[AvantGo]|AvantGo|Stories formatted for PDAs.LINESPLIT[Downloads]|Downloads|Find downloads listed on this website.LINESPLIT[FAQ]|FAQ|Frequently Asked QuestionsLINESPLIT[Members_List]|Members List|Listing of registered users on this site.LINESPLIT[News]|News|Latest News on this site.LINESPLIT[Recommend_Us]|Recommend Us|Recommend this website to a friend.LINESPLIT[Reviews]|Reviews|Reviews Section on this website.LINESPLIT[Search]|Search|Search our website.LINESPLIT[Sections]|Sections|Other content on this website.LINESPLIT[Stats]|Stats|Detailed traffic statistics.LINESPLIT[Submit_News]|Submit News|Submit an article.LINESPLIT[Topics]|Topics|Listing of news topics on this website.LINESPLIT[Top_List]|Top List|Top 10list.LINESPLIT[Web_Links]|Web Links|Links to other sites.', '', 0, 'l', '1.0', 1, 0, 20011122090726, '');
INSERT INTO `nuke_blocks` VALUES (2, 'menu', 'Incoming', 'style:=1\ndisplaymodules:=0\ndisplaywaiting:=1\ncontent:=', '', 0, 'l', '2.0', 1, 0, 00000000000000, '');
INSERT INTO `nuke_blocks` VALUES (3, 'online', 'Who\'s Online', '', '', 0, 'l', '3.0', 1, 0, 00000000000000, '');
INSERT INTO `nuke_blocks` VALUES (4, 'stories', 'Other Stories', 'type:=1\ntopic:=-1\ncategory:=-1\nlimit:=10', '', 0, 'r', '1.0', 1, 0, 00000000000000, '');
INSERT INTO `nuke_blocks` VALUES (5, 'user', 'Users Block', 'Put anything you want here', '', 0, 'l', '3.5', 1, 0, 00000000000000, '');
INSERT INTO `nuke_blocks` VALUES (6, 'search', 'Search Box', '', '', 0, 'l', '4.0', 0, 0, 00000000000000, '');
INSERT INTO `nuke_blocks` VALUES (7, 'ephem', 'Ephemerids', '', '', 0, 'l', '5.0', 0, 0, 00000000000000, '');
INSERT INTO `nuke_blocks` VALUES (8, 'thelang', 'Languages', '', '', 0, 'l', '6.0', 1, 0, 00000000000000, '');
INSERT INTO `nuke_blocks` VALUES (9, 'category', 'Categories Menu', '', '', 0, 'r', '1.5', 1, 0, 00000000000000, '');
INSERT INTO `nuke_blocks` VALUES (10, 'random', 'Random Headlines', '', '', 0, 'r', '2.0', 0, 0, 00000000000000, '');
INSERT INTO `nuke_blocks` VALUES (11, 'poll', 'Poll', '', '', 0, 'r', '3.0', 1, 0, 00000000000000, '');
INSERT INTO `nuke_blocks` VALUES (12, 'big', 'Today\'s Big Story', '', '', 0, 'r', '4.0', 1, 0, 00000000000000, '');
INSERT INTO `nuke_blocks` VALUES (13, 'login', 'User\'s Login', '', '', 0, 'r', '5.0', 1, 0, 00000000000000, '');
INSERT INTO `nuke_blocks` VALUES (14, 'past', 'Past Articles', '', '', 0, 'r', '6.0', 1, 0, 00000000000000, '');
INSERT INTO `nuke_blocks` VALUES (15, 'messages', 'Administration Messages', '', '', 8, 'c', '1.0', 1, 0, 00000000000000, '');
INSERT INTO `nuke_blocks` VALUES (16, 'html', 'Reminder', 'Please remember to remove the following files from your PostNuke directory<br>&middot;<b>install.php</b> file<br>&middot;<b>install</b> directory<p>If you do not remove these files then users can obtain the password to your database!<br /><br /><i>Note: This block can be edited in Administration-Blocks</i>', '', 0, 'l', '0.5', 1, 0, 00000000000000, '');
# --------------------------------------------------------

#
# Table structure for table `nuke_blocks_buttons`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_blocks_buttons` (
  `pn_id` int(11) unsigned NOT NULL auto_increment,
  `pn_bid` int(11) unsigned NOT NULL default '0',
  `pn_title` varchar(255) NOT NULL default '',
  `pn_url` varchar(254) NOT NULL default '',
  `pn_images` longtext NOT NULL,
  PRIMARY KEY  (`pn_id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_blocks_buttons`
#

# --------------------------------------------------------


#
# Table structure for table `nuke_counter`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_counter` (
  `pn_type` varchar(80) NOT NULL default '',
  `pn_var` varchar(80) NOT NULL default '',
  `pn_count` int(11) unsigned NOT NULL default '0'
) TYPE=MyISAM;

#
# Dumping data for table `nuke_counter`
#

INSERT INTO `nuke_counter` VALUES ('total', 'hits', 2);
INSERT INTO `nuke_counter` VALUES ('browser', 'Lynx', 0);
INSERT INTO `nuke_counter` VALUES ('browser', 'MSIE', 2);
INSERT INTO `nuke_counter` VALUES ('browser', 'Opera', 0);
INSERT INTO `nuke_counter` VALUES ('browser', 'Konqueror', 0);
INSERT INTO `nuke_counter` VALUES ('browser', 'Netscape', 0);
INSERT INTO `nuke_counter` VALUES ('browser', 'Bot', 0);
INSERT INTO `nuke_counter` VALUES ('browser', 'Other', 0);
INSERT INTO `nuke_counter` VALUES ('os', 'Windows', 0);
INSERT INTO `nuke_counter` VALUES ('os', 'Linux', 0);
INSERT INTO `nuke_counter` VALUES ('os', 'Mac', 2);
INSERT INTO `nuke_counter` VALUES ('os', 'FreeBSD', 0);
INSERT INTO `nuke_counter` VALUES ('os', 'SunOS', 0);
INSERT INTO `nuke_counter` VALUES ('os', 'IRIX', 0);
INSERT INTO `nuke_counter` VALUES ('os', 'BeOS', 0);
INSERT INTO `nuke_counter` VALUES ('os', 'OS/2', 0);
INSERT INTO `nuke_counter` VALUES ('os', 'AIX', 0);
INSERT INTO `nuke_counter` VALUES ('os', 'Other', 0);
# --------------------------------------------------------

#
# Table structure for table `nuke_group_membership`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_group_membership` (
  `pn_gid` int(11) NOT NULL default '0',
  `pn_uid` int(11) NOT NULL default '0'
) TYPE=MyISAM;

#
# Dumping data for table `nuke_group_membership`
#

INSERT INTO `nuke_group_membership` VALUES (1, 1);
INSERT INTO `nuke_group_membership` VALUES (2, 2);
# --------------------------------------------------------

#
# Table structure for table `nuke_group_perms`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_group_perms` (
  `pn_pid` int(11) NOT NULL auto_increment,
  `pn_gid` int(11) NOT NULL default '0',
  `pn_sequence` int(11) NOT NULL default '0',
  `pn_realm` smallint(4) NOT NULL default '0',
  `pn_component` varchar(255) NOT NULL default '',
  `pn_instance` varchar(255) NOT NULL default '',
  `pn_level` smallint(4) NOT NULL default '0',
  `pn_bond` int(2) NOT NULL default '0',
  PRIMARY KEY  (`pn_pid`)
) TYPE=MyISAM AUTO_INCREMENT=6 ;

#
# Dumping data for table `nuke_group_perms`
#

INSERT INTO `nuke_group_perms` VALUES (1, 2, 1, 0, '.*', '.*', 800, 0);
INSERT INTO `nuke_group_perms` VALUES (2, -1, 2, 0, 'Menublock::', 'Main Menu:Administration:', 0, 0);
INSERT INTO `nuke_group_perms` VALUES (3, 1, 3, 0, '.*', '.*', 300, 0);
INSERT INTO `nuke_group_perms` VALUES (4, 0, 4, 0, 'Menublock::', 'Main Menu:(My Account|Logout|Submit News):', 0, 0);
INSERT INTO `nuke_group_perms` VALUES (5, 0, 5, 0, '.*', '.*', 200, 0);
# --------------------------------------------------------

#
# Table structure for table `nuke_groups`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_groups` (
  `pn_gid` int(11) NOT NULL auto_increment,
  `pn_name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`pn_gid`)
) TYPE=MyISAM AUTO_INCREMENT=3 ;

#
# Dumping data for table `nuke_groups`
#

INSERT INTO `nuke_groups` VALUES (1, 'Users');
INSERT INTO `nuke_groups` VALUES (2, 'Admins');
# --------------------------------------------------------


#
# Table structure for table `nuke_hooks`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_hooks` (
  `pn_id` int(11) unsigned NOT NULL auto_increment,
  `pn_object` varchar(64) NOT NULL default '',
  `pn_action` varchar(64) NOT NULL default '',
  `pn_smodule` varchar(64) default NULL,
  `pn_stype` varchar(64) default NULL,
  `pn_tarea` varchar(64) NOT NULL default '',
  `pn_tmodule` varchar(64) NOT NULL default '',
  `pn_ttype` varchar(64) NOT NULL default '',
  `pn_tfunc` varchar(64) NOT NULL default '',
  PRIMARY KEY  (`pn_id`)
) TYPE=MyISAM AUTO_INCREMENT=4 ;

#
# Dumping data for table `nuke_hooks`
#

INSERT INTO `nuke_hooks` VALUES (1, 'item', 'display', NULL, NULL, 'GUI', 'Ratings', 'user', 'display');
INSERT INTO `nuke_hooks` VALUES (2, 'item', 'transform', NULL, NULL, 'API', 'Wiki', 'user', 'transform');
INSERT INTO `nuke_hooks` VALUES (3, 'item', 'transform', NULL, NULL, 'API', 'Autolinks', 'user', 'transform');
# --------------------------------------------------------


#
# Table structure for table `nuke_module_vars`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_module_vars` (
  `pn_id` int(11) unsigned NOT NULL auto_increment,
  `pn_modname` varchar(64) NOT NULL default '',
  `pn_name` varchar(64) NOT NULL default '',
  `pn_value` longtext,
  PRIMARY KEY  (`pn_id`),
  KEY `pn_modname` (`pn_modname`),
  KEY `pn_name` (`pn_name`)
) TYPE=MyISAM AUTO_INCREMENT=121 ;

#
# Dumping data for table `nuke_module_vars`
#

INSERT INTO `nuke_module_vars` VALUES (1, '/PNConfig', 'debug', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (2, '/PNConfig', 'sitename', 's:14:"Your Site Name";');
INSERT INTO `nuke_module_vars` VALUES (3, '/PNConfig', 'site_logo', 's:8:"logo.gif";');
INSERT INTO `nuke_module_vars` VALUES (4, '/PNConfig', 'slogan', 's:16:"Your slogan here";');
INSERT INTO `nuke_module_vars` VALUES (5, '/PNConfig', 'metakeywords', 's:218:"nuke, postnuke, postnuke, free, community, php, portal, opensource, open source, gpl, mysql, sql, database, web site, website, weblog, content management, contentmanagement, web content management, webcontentmanagement";');
INSERT INTO `nuke_module_vars` VALUES (6, '/PNConfig', 'dyn_keywords', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (7, '/PNConfig', 'startdate', 's:9:"06.2003";');
INSERT INTO `nuke_module_vars` VALUES (8, '/PNConfig', 'adminmail', 's:13:"none@none.com";');
INSERT INTO `nuke_module_vars` VALUES (9, '/PNConfig', 'Default_Theme', 's:8:"PostNuke";');
INSERT INTO `nuke_module_vars` VALUES (10, '/PNConfig', 'foot1', 's:933:"<br /><a href="http://www.postnuke.com" target="_blank"><img src="images/powered/postnuke.butn.gif" border="0" alt="Web site powered by PostNuke" hspace="10" /></a> <a href="http://php.weblogs.com/ADODB" target="_blank"><img src="images/powered/adodb2.gif" alt="ADODB database library" border="0" hspace="10" /></a><a href="http://www.php.net" target="_blank"><img src="images/powered/php2.gif" alt="PHP Language" border="0" hspace="10" /></a><br /><br />All logos and trademarks in this site are property of their respective owner. The comments are property of their posters, all the rest (c) 2003 by me<br />This web site was made with <a href="http://www.postnuke.com" target="_blank">PostNuke</a>, a web portal system written in PHP. PostNuke is Free Software released under the <a href="http://www.gnu.org" target="_blank">GNU/GPL license</a>.<br />You can syndicate our news using the file <a href="backend.php">backend.php</a>";');
INSERT INTO `nuke_module_vars` VALUES (11, '/PNConfig', 'commentlimit', 'i:4096;');
INSERT INTO `nuke_module_vars` VALUES (12, '/PNConfig', 'anonymous', 's:9:"Anonymous";');
INSERT INTO `nuke_module_vars` VALUES (13, '/PNConfig', 'defaultgroup', 's:5:"Users";');
INSERT INTO `nuke_module_vars` VALUES (14, '/PNConfig', 'timezone_offset', 'i:12;');
INSERT INTO `nuke_module_vars` VALUES (15, '/PNConfig', 'nobox', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (16, '/PNConfig', 'funtext', 's:1:"0";');
INSERT INTO `nuke_module_vars` VALUES (17, '/PNConfig', 'reportlevel', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (18, '/PNConfig', 'startpage', 's:4:"News";');
INSERT INTO `nuke_module_vars` VALUES (19, '/PNConfig', 'admingraphic', 's:1:"1";');
INSERT INTO `nuke_module_vars` VALUES (20, '/PNConfig', 'admart', 'i:20;');
INSERT INTO `nuke_module_vars` VALUES (21, '/PNConfig', 'backend_title', 's:21:"PostNuke Powered Site";');
INSERT INTO `nuke_module_vars` VALUES (22, '/PNConfig', 'backend_language', 's:5:"en-us";');
INSERT INTO `nuke_module_vars` VALUES (23, '/PNConfig', 'seclevel', 's:6:"Medium";');
INSERT INTO `nuke_module_vars` VALUES (24, '/PNConfig', 'secmeddays', 'i:7;');
INSERT INTO `nuke_module_vars` VALUES (25, '/PNConfig', 'secinactivemins', 'i:10;');
INSERT INTO `nuke_module_vars` VALUES (26, '/PNConfig', 'Version_Num', 's:7:"0.7.2.6";');
INSERT INTO `nuke_module_vars` VALUES (27, '/PNConfig', 'Version_ID', 's:8:"PostNuke";');
INSERT INTO `nuke_module_vars` VALUES (28, '/PNConfig', 'Version_Sub', 's:7:"Phoenix";');
INSERT INTO `nuke_module_vars` VALUES (29, '/PNConfig', 'debug_sql', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (30, '/PNConfig', 'anonpost', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (31, '/PNConfig', 'minpass', 'i:5;');
INSERT INTO `nuke_module_vars` VALUES (32, '/PNConfig', 'pollcomm', 'i:1;');
INSERT INTO `nuke_module_vars` VALUES (33, '/PNConfig', 'minage', 'i:13;');
INSERT INTO `nuke_module_vars` VALUES (34, '/PNConfig', 'top', 'i:10;');
INSERT INTO `nuke_module_vars` VALUES (35, '/PNConfig', 'storyhome', 'i:10;');
INSERT INTO `nuke_module_vars` VALUES (36, '/PNConfig', 'banners', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (37, '/PNConfig', 'myIP', 's:12:"192.168.123.254";');
INSERT INTO `nuke_module_vars` VALUES (38, '/PNConfig', 'language', 's:3:"eng";');
INSERT INTO `nuke_module_vars` VALUES (39, '/PNConfig', 'locale', 's:5:"en_US";');
INSERT INTO `nuke_module_vars` VALUES (40, '/PNConfig', 'multilingual', 'i:1;');
INSERT INTO `nuke_module_vars` VALUES (41, '/PNConfig', 'useflags', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (42, '/PNConfig', 'perpage', 'i:10;');
INSERT INTO `nuke_module_vars` VALUES (43, '/PNConfig', 'popular', 'i:500;');
INSERT INTO `nuke_module_vars` VALUES (44, '/PNConfig', 'newlinks', 'i:10;');
INSERT INTO `nuke_module_vars` VALUES (45, '/PNConfig', 'toplinks', 'i:25;');
INSERT INTO `nuke_module_vars` VALUES (46, '/PNConfig', 'linksresults', 'i:10;');
INSERT INTO `nuke_module_vars` VALUES (47, '/PNConfig', 'links_anonaddlinklock', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (48, '/PNConfig', 'anonwaitdays', 'i:1;');
INSERT INTO `nuke_module_vars` VALUES (49, '/PNConfig', 'outsidewaitdays', 'i:1;');
INSERT INTO `nuke_module_vars` VALUES (50, '/PNConfig', 'useoutsidevoting', 'i:1;');
INSERT INTO `nuke_module_vars` VALUES (51, '/PNConfig', 'anonweight', 'i:10;');
INSERT INTO `nuke_module_vars` VALUES (52, '/PNConfig', 'outsideweight', 'i:20;');
INSERT INTO `nuke_module_vars` VALUES (53, '/PNConfig', 'detailvotedecimal', 'i:2;');
INSERT INTO `nuke_module_vars` VALUES (54, '/PNConfig', 'mainvotedecimal', 'i:1;');
INSERT INTO `nuke_module_vars` VALUES (55, '/PNConfig', 'toplinkspercentrigger', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (56, '/PNConfig', 'mostpoplinkspercentrigger', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (57, '/PNConfig', 'mostpoplinks', 'i:25;');
INSERT INTO `nuke_module_vars` VALUES (58, '/PNConfig', 'featurebox', 'i:1;');
INSERT INTO `nuke_module_vars` VALUES (59, '/PNConfig', 'linkvotemin', 'i:5;');
INSERT INTO `nuke_module_vars` VALUES (60, '/PNConfig', 'blockunregmodify', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (61, '/PNConfig', 'newdownloads', 'i:10;');
INSERT INTO `nuke_module_vars` VALUES (62, '/PNConfig', 'topdownloads', 'i:25;');
INSERT INTO `nuke_module_vars` VALUES (63, '/PNConfig', 'downloadsresults', 'i:10;');
INSERT INTO `nuke_module_vars` VALUES (64, '/PNConfig', 'downloads_anonadddownloadlock', 's:0:"1";');
INSERT INTO `nuke_module_vars` VALUES (65, '/PNConfig', 'topdownloadspercentrigger', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (66, '/PNConfig', 'mostpopdownloadspercentrigger', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (67, '/PNConfig', 'mostpopdownloads', 'i:25;');
INSERT INTO `nuke_module_vars` VALUES (68, '/PNConfig', 'downloadvotemin', 'i:5;');
INSERT INTO `nuke_module_vars` VALUES (69, '/PNConfig', 'notify', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (70, '/PNConfig', 'notify_email', 's:15:"me@yoursite.com";');
INSERT INTO `nuke_module_vars` VALUES (71, '/PNConfig', 'notify_subject', 's:16:"NEWS for my site";');
INSERT INTO `nuke_module_vars` VALUES (72, '/PNConfig', 'notify_message', 's:44:"Hey! You got a new submission for your site.";');
INSERT INTO `nuke_module_vars` VALUES (73, '/PNConfig', 'notify_from', 's:9:"webmaster";');
INSERT INTO `nuke_module_vars` VALUES (74, '/PNConfig', 'moderate', 'i:1;');
INSERT INTO `nuke_module_vars` VALUES (75, '/PNConfig', 'BarScale', 'i:1;');
INSERT INTO `nuke_module_vars` VALUES (76, '/PNConfig', 'tipath', 's:14:"images/topics/";');
INSERT INTO `nuke_module_vars` VALUES (77, '/PNConfig', 'userimg', 's:11:"images/menu";');
INSERT INTO `nuke_module_vars` VALUES (78, '/PNConfig', 'usergraphic', 'i:1;');
INSERT INTO `nuke_module_vars` VALUES (79, '/PNConfig', 'topicsinrow', 'i:5;');
INSERT INTO `nuke_module_vars` VALUES (80, '/PNConfig', 'httpref', 'i:1;');
INSERT INTO `nuke_module_vars` VALUES (81, '/PNConfig', 'httprefmax', 'i:1000;');
INSERT INTO `nuke_module_vars` VALUES (83, '/PNConfig', 'reasons', 'a:11:{i:0;s:5:"As Is";i:1;s:8:"Offtopic";i:2;s:9:"Flamebait";i:3;s:5:"Troll";i:4;s:9:"Redundant";i:5;s:10:"Insightful";i:6;s:11:"Interesting";i:7;s:11:"Informative";i:8;s:5:"Funny";i:9;s:9:"Overrated";i:10;s:10:"Underrated";}');
INSERT INTO `nuke_module_vars` VALUES (84, '/PNConfig', 'AllowableHTML', 'a:83:{s:3:"!--";s:1:"2";s:1:"a";s:1:"2";s:4:"abbr";i:0;s:7:"acronym";i:0;s:7:"address";i:0;s:6:"applet";i:0;s:4:"area";i:0;s:1:"b";s:1:"1";s:4:"base";i:0;s:8:"basefont";i:0;s:3:"bdo";i:0;s:3:"big";i:0;s:10:"blockquote";i:0;s:2:"br";s:1:"1";s:6:"button";i:0;s:7:"caption";i:0;s:6:"center";i:0;s:4:"cite";i:0;s:4:"code";i:0;s:3:"col";i:0;s:8:"colgroup";i:0;s:3:"del";i:0;s:3:"dfn";i:0;s:3:"dir";i:0;s:3:"div";i:0;s:2:"dl";i:0;s:2:"dd";i:0;s:2:"dt";i:0;s:2:"em";i:0;s:5:"embed";i:0;s:8:"fieldset";i:0;s:4:"font";i:0;s:4:"form";i:0;s:2:"h1";i:0;s:2:"h2";i:0;s:2:"h3";i:0;s:2:"h4";i:0;s:2:"h5";i:0;s:2:"h6";i:0;s:2:"hr";s:1:"1";s:1:"i";s:1:"1";s:6:"iframe";i:0;s:3:"img";i:0;s:5:"input";i:0;s:3:"ins";i:0;s:3:"kbd";i:0;s:5:"label";i:0;s:6:"legend";i:0;s:2:"li";s:1:"1";s:3:"map";i:0;s:7:"marquee";i:0;s:4:"menu";i:0;s:4:"nobr";i:0;s:6:"object";i:0;s:2:"ol";s:1:"1";s:8:"optgroup";i:0;s:6:"option";i:0;s:1:"p";s:1:"1";s:5:"param";i:0;s:3:"pre";s:1:"1";s:1:"q";i:0;s:1:"s";i:0;s:4:"samp";i:0;s:6:"script";i:0;s:6:"select";i:0;s:5:"small";i:0;s:4:"span";i:0;s:6:"strike";i:0;s:6:"strong";s:1:"1";s:3:"sub";i:0;s:3:"sup";i:0;s:5:"table";s:1:"2";s:5:"tbody";i:0;s:2:"td";s:1:"2";s:8:"textarea";i:0;s:5:"tfoot";i:0;s:2:"th";s:1:"2";s:5:"thead";i:0;s:2:"tr";s:1:"2";s:2:"tt";s:1:"1";s:1:"u";i:0;s:2:"ul";s:1:"1";s:3:"var";i:0;}');
INSERT INTO `nuke_module_vars` VALUES (85, '/PNConfig', 'CensorList', 'a:14:{i:0;s:4:"fuck";i:1;s:4:"cunt";i:2;s:6:"fucker";i:3;s:7:"fucking";i:4;s:5:"pussy";i:5;s:4:"cock";i:6;s:4:"c0ck";i:7;s:3:"cum";i:8;s:4:"twat";i:9;s:4:"clit";i:10;s:5:"bitch";i:11;s:3:"fuk";i:12;s:6:"fuking";i:13;s:12:"motherfucker";}');
INSERT INTO `nuke_module_vars` VALUES (86, '/PNConfig', 'CensorMode', 'i:1;');
INSERT INTO `nuke_module_vars` VALUES (87, '/PNConfig', 'CensorReplace', 's:5:"*****";');
INSERT INTO `nuke_module_vars` VALUES (90, '/PNConfig', 'theme_change', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (91, 'Ratings', 'defaultstyle', 'outoffivestars');
INSERT INTO `nuke_module_vars` VALUES (92, 'Ratings', 'seclevel', 'medium');
INSERT INTO `nuke_module_vars` VALUES (93, '/PNConfig', 'intranet', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (94, 'Wiki', 'AllowedProtocols', 'http|https|mailto|ftp|news|gopher');
INSERT INTO `nuke_module_vars` VALUES (95, 'Wiki', 'ExtlinkNewWindow', '0');
INSERT INTO `nuke_module_vars` VALUES (97, 'Wiki', 'IntlinkNewWindow', '0');
INSERT INTO `nuke_module_vars` VALUES (98, 'Wiki', 'FieldSeparator', '');
INSERT INTO `nuke_module_vars` VALUES (99, 'Wiki', 'InlineImages', 'png|jpg|gif');
INSERT INTO `nuke_module_vars` VALUES (100, 'Blocks', 'collapseable', '1');
INSERT INTO `nuke_module_vars` VALUES (101, '/PNConfig', 'htmlentities', 's:1:"1";');
INSERT INTO `nuke_module_vars` VALUES (102, '/PNConfig', 'UseCompression', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (103, '/PNConfig', 'refereronprint', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (104, '/PNConfig', 'WYSIWYGEditor', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (105, '/PNConfig', 'storyorder', 's:1:"1";');
INSERT INTO `nuke_module_vars` VALUES (106, '/PNConfig', 'pnAntiCracker', 's:1:"1";');
INSERT INTO `nuke_module_vars` VALUES (107, '/PNConfig', 'reg_allowreg', 's:1:"1";');
INSERT INTO `nuke_module_vars` VALUES (108, '/PNConfig', 'reg_verifyemail', 's:1:"1";');
INSERT INTO `nuke_module_vars` VALUES (109, '/PNConfig', 'reg_Illegalusername', 's:87:"root adm linux webmaster admin god administrator administrador nobody anonymous anonimo"');
INSERT INTO `nuke_module_vars` VALUES (110, '/PNConfig', 'reg_noregreasons', 's:45:"Sorry, registration is disabled at this time.";');
INSERT INTO `nuke_module_vars` VALUES (111, '/PNConfig', 'reg_uniemail', 's:1:"1";');
INSERT INTO `nuke_module_vars` VALUES (116, 'Template', 'bold', 'i:0;');
INSERT INTO `nuke_module_vars` VALUES (117, 'Template', 'itemsperpage', 'i:20;');
INSERT INTO `nuke_module_vars` VALUES (118, 'Autolinks', 'itemsperpage', 'i:20;');
INSERT INTO `nuke_module_vars` VALUES (119, 'Autolinks', 'linkfirst', 'i:1;');
INSERT INTO `nuke_module_vars` VALUES (120, 'Autolinks', 'invisilinks', 'i:0;');
# --------------------------------------------------------

#
# Table structure for table `nuke_modules`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_modules` (
  `pn_id` int(11) unsigned NOT NULL auto_increment,
  `pn_name` varchar(64) NOT NULL default '',
  `pn_type` int(6) NOT NULL default '0',
  `pn_displayname` varchar(64) NOT NULL default '',
  `pn_description` varchar(255) NOT NULL default '',
  `pn_regid` int(11) unsigned NOT NULL default '0',
  `pn_directory` varchar(64) NOT NULL default '',
  `pn_version` varchar(10) NOT NULL default '0',
  `pn_admin_capable` tinyint(1) NOT NULL default '0',
  `pn_user_capable` tinyint(1) NOT NULL default '0',
  `pn_state` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`pn_id`)
) TYPE=MyISAM AUTO_INCREMENT=46 ;

#
# Dumping data for table `nuke_modules`
#

INSERT INTO `nuke_modules` VALUES (1, 'AvantGo', 1, 'AvantGo', 'News for your PDA', 2, 'AvantGo', '1.3', 0, 1, 3);
INSERT INTO `nuke_modules` VALUES (2, 'Downloads', 1, 'Downloads', 'Files to download', 3, 'Downloads', '1.31', 1, 1, 3);
INSERT INTO `nuke_modules` VALUES (3, 'FAQ', 1, 'FAQ', 'Frequently Asked Questions', 4, 'FAQ', '1.11', 1, 1, 3);
INSERT INTO `nuke_modules` VALUES (4, 'Members_List', 1, 'Members List', 'Information on users of this site', 5, 'Members_List', '1.1', 0, 1, 3);
INSERT INTO `nuke_modules` VALUES (5, 'Messages', 1, 'Messages', 'Private messages to users of this site', 6, 'Messages', '1.0', 0, 1, 3);
INSERT INTO `nuke_modules` VALUES (6, 'AddStory', 1, 'AddStory', 'Add a story', 8, 'NS-AddStory', '1.0', 1, 0, 3);
INSERT INTO `nuke_modules` VALUES (7, 'Admin', 1, 'Admin', 'Administration', 9, 'NS-Admin', '0.1', 1, 0, 3);
INSERT INTO `nuke_modules` VALUES (8, 'Admin_Messages', 1, 'Admin Messages', 'Banner messages', 10, 'NS-Admin_Messages', '1.2', 1, 0, 3);
INSERT INTO `nuke_modules` VALUES (9, 'Autolinks', 2, 'Autolinks', 'Automatically link keywords', 11, 'Autolinks', '1.01', 1, 0, 3);
INSERT INTO `nuke_modules` VALUES (10, 'Banners', 1, 'Banners', 'Banners', 12, 'NS-Banners', '1.0', 1, 0, 3);
INSERT INTO `nuke_modules` VALUES (11, 'Blocks', 2, 'Blocks', 'Side blocks', 13, 'Blocks', '2.0', 1, 0, 3);
INSERT INTO `nuke_modules` VALUES (12, 'Comments', 1, 'Comments', 'Comment on articles', 14, 'NS-Comments', '1.1', 1, 1, 3);
INSERT INTO `nuke_modules` VALUES (13, 'Ephemerids', 1, 'Ephemerids', 'Daily events', 15, 'NS-Ephemerids', '1.2', 1, 0, 3);
INSERT INTO `nuke_modules` VALUES (14, 'Groups', 1, 'Groups', 'Set up administrative groups', 16, 'NS-Groups', '0.1', 1, 0, 3);
INSERT INTO `nuke_modules` VALUES (15, 'Languages', 1, 'Languages', 'Multi-language functions', 17, 'NS-Languages', '1.2', 1, 0, 3);
INSERT INTO `nuke_modules` VALUES (16, 'MailUsers', 1, 'MailUsers', 'Mail Users Admin', 19, 'NS-MailUsers', '1.3', 1, 0, 3);
INSERT INTO `nuke_modules` VALUES (17, 'Modules', 2, 'Modules', 'Module configuration', 1, 'Modules', '2.0', 1, 0, 3);
INSERT INTO `nuke_modules` VALUES (18, 'Permissions', 2, 'Permissions', 'Configure permissions', 22, 'Permissions', '0.4', 1, 0, 3);
INSERT INTO `nuke_modules` VALUES (19, 'Polls', 1, 'Polls', 'Polls and surveys', 23, 'NS-Polls', '1.1', 1, 1, 3);
INSERT INTO `nuke_modules` VALUES (20, 'Quotes', 2, 'Quotes', 'Quotes and sayings', 24, 'Quotes', '1.3', 1, 0, 3);
INSERT INTO `nuke_modules` VALUES (21, 'Referers', 1, 'Referers', 'Referers', 25, 'NS-Referers', '1.2', 1, 0, 3);
INSERT INTO `nuke_modules` VALUES (22, 'Settings', 1, 'Settings', 'Settings', 26, 'NS-Settings', '1.2', 1, 0, 3);
INSERT INTO `nuke_modules` VALUES (23, 'News', 1, 'News', 'News items', 7, 'News', '1.3', 0, 1, 3);
INSERT INTO `nuke_modules` VALUES (24, 'Recommend_Us', 1, 'Recommend Us', 'Recommend us to a friend', 30, 'Recommend_Us', '1.0', 0, 1, 3);
INSERT INTO `nuke_modules` VALUES (25, 'Reviews', 1, 'Reviews', 'Reviews', 31, 'Reviews', '1.0', 1, 1, 3);
INSERT INTO `nuke_modules` VALUES (26, 'Search', 1, 'Search', 'Search this site', 32, 'Search', '1.0', 0, 1, 3);
INSERT INTO `nuke_modules` VALUES (27, 'Sections', 1, 'Sections', 'Sections', 33, 'Sections', '1.0', 1, 1, 3);
INSERT INTO `nuke_modules` VALUES (28, 'Stats', 1, 'Stats', 'Site statistics', 34, 'Stats', '1.13', 0, 1, 3);
INSERT INTO `nuke_modules` VALUES (29, 'Submit_News', 1, 'Submit News', 'Contribute a story', 35, 'Submit_News', '1.13', 1, 1, 3);
INSERT INTO `nuke_modules` VALUES (30, 'Top_List', 1, 'Top List', 'Top 10 listings', 38, 'Top_List', '1.0', 1, 1, 3);
INSERT INTO `nuke_modules` VALUES (31, 'Topics', 1, 'Topics', 'Article topics', 37, 'Topics', '1.0', 1, 1, 3);
INSERT INTO `nuke_modules` VALUES (32, 'User', 1, 'Users', 'User Administration', 27, 'NS-User', '0.2', 1, 1, 3);
INSERT INTO `nuke_modules` VALUES (33, 'Web_Links', 1, 'Web Links', 'Links to other sites', 39, 'Web_Links', '1.0', 1, 1, 3);
INSERT INTO `nuke_modules` VALUES (34, 'Ratings', 2, 'Ratings', 'Ratings utility', 41, 'Ratings', '1.1', 1, 1, 3);
INSERT INTO `nuke_modules` VALUES (35, 'Wiki', 2, 'Wiki', 'Wiki encoding', 28, 'Wiki', '1.0', 0, 0, 3);
INSERT INTO `nuke_modules` VALUES (36, 'xmlrpc', 2, 'xmlrpc', 'XML-RPC utility module', 42, 'xmlrpc', '1.1', 0, 0, 3);
INSERT INTO `nuke_modules` VALUES (37, 'legal', 1, 'Legal Documents', 'Generic Privacy Statement and Terms of Use', 43, 'legal', '1.0', 0, 1, 3);
INSERT INTO `nuke_modules` VALUES (38, 'Censor', 2, 'Censor', 'Site Censorship Control', 0, 'Censor', '1.0', 1, 0, 3);
INSERT INTO `nuke_modules` VALUES (39, 'Credits', 2, 'Credits', 'Display Module credits, license, help and contact information', 0, 'Credits', '1.1', 0, 1, 3);
INSERT INTO `nuke_modules` VALUES (40, 'LostPassword', 1, 'LostPassword', 'Retrieve lost password of a user.', 18, 'NS-LostPassword', '0,5', 0, 0, 3);
INSERT INTO `nuke_modules` VALUES (41, 'Multisites', 1, 'Multisites', '', 20, 'NS-Multisites', '0', 0, 0, 2);
INSERT INTO `nuke_modules` VALUES (42, 'NewUser', 1, 'NewUser', 'New User for postnuke.', 21, 'NS-NewUser', '0,5', 0, 0, 3);
INSERT INTO `nuke_modules` VALUES (43, 'Past_Nuke', 1, 'Past_Nuke', 'Old Post-Nuke admin compatibility', 0, 'NS-Past_Nuke', '1.0', 1, 0, 2);
INSERT INTO `nuke_modules` VALUES (44, 'Your_Account', 1, 'Your Account', 'User options', 0, 'NS-Your_Account', '0.8', 0, 0, 3);
INSERT INTO `nuke_modules` VALUES (45, 'Template', 2, 'Template', 'Template for new modules', 0, 'Template', '1.0', 1, 1, 2);
# --------------------------------------------------------


#
# Table structure for table `nuke_realms`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_realms` (
  `pn_rid` int(11) NOT NULL auto_increment,
  `pn_name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`pn_rid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_realms`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_referer`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_referer` (
  `pn_rid` int(11) NOT NULL auto_increment,
  `pn_url` varchar(254) NOT NULL default '',
  `pn_frequency` int(15) default NULL,
  PRIMARY KEY  (`pn_rid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_referer`
#

# --------------------------------------------------------


#
# Table structure for table `nuke_session_info`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:42 
#

CREATE TABLE `nuke_session_info` (
  `pn_sessid` varchar(32) NOT NULL default '',
  `pn_ipaddr` varchar(20) NOT NULL default '',
  `pn_firstused` int(11) NOT NULL default '0',
  `pn_lastused` int(11) NOT NULL default '0',
  `pn_uid` int(11) NOT NULL default '0',
  `pn_vars` blob,
  PRIMARY KEY  (`pn_sessid`)
) TYPE=MyISAM;

#
# Dumping data for table `nuke_session_info`
#

INSERT INTO `nuke_session_info` VALUES ('8b4b52597d41a32e89783e5103c95a9f', '80.145.92.84', 1055706107, 1055706136, 2, 0x504e535672616e647c693a313237393333323539313b504e53566c616e677c733a333a22656e67223b504e53567569647c693a323b);
# --------------------------------------------------------


#
# Table structure for table `nuke_user_data`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_user_data` (
  `pn_uda_id` int(11) NOT NULL auto_increment,
  `pn_uda_propid` int(11) NOT NULL default '0',
  `pn_uda_uid` int(11) NOT NULL default '0',
  `pn_uda_value` mediumblob NOT NULL,
  PRIMARY KEY  (`pn_uda_id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_user_data`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_user_perms`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_user_perms` (
  `pn_pid` int(11) NOT NULL auto_increment,
  `pn_uid` int(11) NOT NULL default '0',
  `pn_sequence` int(6) NOT NULL default '0',
  `pn_realm` int(4) NOT NULL default '0',
  `pn_component` varchar(255) NOT NULL default '',
  `pn_instance` varchar(255) NOT NULL default '',
  `pn_level` int(4) NOT NULL default '0',
  `pn_bond` int(2) NOT NULL default '0',
  PRIMARY KEY  (`pn_pid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_user_perms`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_user_property`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_user_property` (
  `pn_prop_id` int(11) NOT NULL auto_increment,
  `pn_prop_label` varchar(255) NOT NULL default '',
  `pn_prop_dtype` int(11) NOT NULL default '0',
  `pn_prop_length` int(11) NOT NULL default '255',
  `pn_prop_weight` int(11) NOT NULL default '0',
  `pn_prop_validation` varchar(255) default NULL,
  PRIMARY KEY  (`pn_prop_id`),
  UNIQUE KEY `pn_prop_label` (`pn_prop_label`)
) TYPE=MyISAM AUTO_INCREMENT=17 ;

#
# Dumping data for table `nuke_user_property`
#

INSERT INTO `nuke_user_property` VALUES (1, '_UREALNAME', 0, 255, 1, NULL);
INSERT INTO `nuke_user_property` VALUES (2, '_UREALEMAIL', -1, 255, 2, NULL);
INSERT INTO `nuke_user_property` VALUES (3, '_UFAKEMAIL', 0, 255, 3, NULL);
INSERT INTO `nuke_user_property` VALUES (4, '_YOURHOMEPAGE', 0, 255, 4, NULL);
INSERT INTO `nuke_user_property` VALUES (5, '_TIMEZONEOFFSET', 0, 255, 5, NULL);
INSERT INTO `nuke_user_property` VALUES (6, '_YOURAVATAR', 0, 255, 6, NULL);
INSERT INTO `nuke_user_property` VALUES (7, '_YICQ', 0, 255, 7, NULL);
INSERT INTO `nuke_user_property` VALUES (8, '_YAIM', 0, 255, 8, NULL);
INSERT INTO `nuke_user_property` VALUES (9, '_YYIM', 0, 255, 9, NULL);
INSERT INTO `nuke_user_property` VALUES (10, '_YMSNM', 0, 255, 10, NULL);
INSERT INTO `nuke_user_property` VALUES (11, '_YLOCATION', 0, 255, 11, NULL);
INSERT INTO `nuke_user_property` VALUES (12, '_YOCCUPATION', 0, 255, 12, NULL);
INSERT INTO `nuke_user_property` VALUES (13, '_YINTERESTS', 0, 255, 13, NULL);
INSERT INTO `nuke_user_property` VALUES (14, '_SIGNATURE', 0, 255, 14, NULL);
INSERT INTO `nuke_user_property` VALUES (15, '_EXTRAINFO', 0, 255, 15, NULL);
INSERT INTO `nuke_user_property` VALUES (16, '_PASSWORD', -1, 255, 16, NULL);
# --------------------------------------------------------

#
# Table structure for table `nuke_users`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_users` (
  `pn_uid` int(11) NOT NULL auto_increment,
  `pn_name` varchar(60) NOT NULL default '',
  `pn_uname` varchar(25) NOT NULL default '',
  `pn_email` varchar(60) NOT NULL default '',
  `pn_femail` varchar(60) NOT NULL default '',
  `pn_url` varchar(254) NOT NULL default '',
  `pn_user_avatar` varchar(30) default NULL,
  `pn_user_regdate` varchar(20) NOT NULL default '',
  `pn_user_icq` varchar(15) default NULL,
  `pn_user_occ` varchar(100) default NULL,
  `pn_user_from` varchar(100) default NULL,
  `pn_user_intrest` varchar(150) default NULL,
  `pn_user_sig` varchar(255) default NULL,
  `pn_user_viewemail` tinyint(2) default NULL,
  `pn_user_theme` tinyint(3) default NULL,
  `pn_user_aim` varchar(18) default NULL,
  `pn_user_yim` varchar(25) default NULL,
  `pn_user_msnm` varchar(25) default NULL,
  `pn_pass` varchar(40) NOT NULL default '',
  `pn_storynum` tinyint(4) NOT NULL default '10',
  `pn_umode` varchar(10) NOT NULL default '',
  `pn_uorder` tinyint(1) NOT NULL default '0',
  `pn_thold` tinyint(1) NOT NULL default '0',
  `pn_noscore` tinyint(1) NOT NULL default '0',
  `pn_bio` tinytext NOT NULL,
  `pn_ublockon` tinyint(1) NOT NULL default '0',
  `pn_ublock` text NOT NULL,
  `pn_theme` varchar(255) NOT NULL default '',
  `pn_commentmax` int(11) NOT NULL default '4096',
  `pn_counter` int(11) NOT NULL default '0',
  `pn_timezone_offset` float(3,1) NOT NULL default '0.0',
  PRIMARY KEY  (`pn_uid`)
) TYPE=MyISAM AUTO_INCREMENT=3 ;

#
# Dumping data for table `nuke_users`
#

INSERT INTO `nuke_users` VALUES (1, '', 'Anonymous', '', '', '', 'blank.gif', '1055706103', '', '', '', '', '', 0, 0, '', '', '', '', 10, '', 0, 0, 0, '', 0, '', '', 4096, 0, '12.0');
INSERT INTO `nuke_users` VALUES (2, 'Admin', 'Admin', 'none@none.com', '', 'http://www.postnuke.com', 'blank.gif', '1055706103', '', '', '', '', '', 0, 0, '', '', '', 'dc647eb65e6711e155375218212b3964', 10, '', 0, 0, 0, '', 0, '', '', 4096, 0, '12.0');