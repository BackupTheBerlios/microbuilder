#
# Table structure for table `nuke_autolinks`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_autolinks` (
  `pn_lid` int(11) NOT NULL auto_increment,
  `pn_keyword` varchar(100) NOT NULL default '',
  `pn_title` varchar(100) NOT NULL default '',
  `pn_url` varchar(200) NOT NULL default '',
  `pn_comment` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`pn_lid`),
  UNIQUE KEY `keyword` (`pn_keyword`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_autolinks`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_autonews`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_autonews` (
  `pn_anid` int(11) NOT NULL auto_increment,
  `pn_catid` int(11) NOT NULL default '0',
  `pn_aid` varchar(30) NOT NULL default '',
  `pn_title` varchar(80) NOT NULL default '',
  `pn_time` varchar(19) NOT NULL default '',
  `pn_hometext` text NOT NULL,
  `pn_bodytext` text NOT NULL,
  `pn_topic` tinyint(4) NOT NULL default '1',
  `pn_informant` varchar(20) NOT NULL default '',
  `pn_notes` text NOT NULL,
  `pn_ihome` tinyint(1) NOT NULL default '0',
  `pn_language` varchar(30) NOT NULL default '',
  `pn_withcomm` int(1) NOT NULL default '0',
  PRIMARY KEY  (`pn_anid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_autonews`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_banner`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_banner` (
  `pn_bid` int(11) NOT NULL auto_increment,
  `pn_cid` int(11) NOT NULL default '0',
  `pn_type` char(2) NOT NULL default '0',
  `pn_imptotal` int(11) NOT NULL default '0',
  `pn_impmade` int(11) NOT NULL default '0',
  `pn_clicks` int(11) NOT NULL default '0',
  `pn_imageurl` varchar(255) NOT NULL default '',
  `pn_clickurl` varchar(255) NOT NULL default '',
  `pn_date` datetime default NULL,
  PRIMARY KEY  (`pn_bid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_banner`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_bannerclient`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_bannerclient` (
  `pn_cid` int(11) NOT NULL auto_increment,
  `pn_name` varchar(60) NOT NULL default '',
  `pn_contact` varchar(60) NOT NULL default '',
  `pn_email` varchar(60) NOT NULL default '',
  `pn_login` varchar(10) NOT NULL default '',
  `pn_passwd` varchar(10) NOT NULL default '',
  `pn_extrainfo` text NOT NULL,
  PRIMARY KEY  (`pn_cid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_bannerclient`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_bannerfinish`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_bannerfinish` (
  `pn_bid` int(11) NOT NULL auto_increment,
  `pn_cid` int(11) NOT NULL default '0',
  `pn_impressions` int(11) NOT NULL default '0',
  `pn_clicks` int(11) NOT NULL default '0',
  `pn_datestart` datetime default NULL,
  `pn_dateend` datetime default NULL,
  PRIMARY KEY  (`pn_bid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_bannerfinish`
#

# --------------------------------------------------------

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
# Table structure for table `nuke_comments`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_comments` (
  `pn_tid` int(11) NOT NULL auto_increment,
  `pn_pid` int(11) default '0',
  `pn_sid` int(11) default '0',
  `pn_date` datetime default NULL,
  `pn_name` varchar(60) NOT NULL default '',
  `pn_email` varchar(60) default NULL,
  `pn_url` varchar(254) default NULL,
  `pn_host_name` varchar(60) default NULL,
  `pn_subject` varchar(85) NOT NULL default '',
  `pn_comment` text NOT NULL,
  `pn_score` tinyint(4) NOT NULL default '0',
  `pn_reason` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`pn_tid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_comments`
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
# Table structure for table `nuke_downloads_categories`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_downloads_categories` (
  `pn_cid` int(11) NOT NULL auto_increment,
  `pn_title` varchar(50) NOT NULL default '',
  `pn_description` text NOT NULL,
  PRIMARY KEY  (`pn_cid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_downloads_categories`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_downloads_downloads`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_downloads_downloads` (
  `pn_lid` int(11) NOT NULL auto_increment,
  `pn_cid` int(11) NOT NULL default '0',
  `pn_sid` int(11) NOT NULL default '0',
  `pn_title` varchar(100) NOT NULL default '',
  `pn_url` varchar(254) NOT NULL default '',
  `pn_description` text NOT NULL,
  `pn_date` datetime default NULL,
  `pn_name` varchar(100) NOT NULL default '',
  `pn_email` varchar(100) NOT NULL default '',
  `pn_hits` int(11) NOT NULL default '0',
  `pn_submitter` varchar(60) NOT NULL default '',
  `pn_ratingsummary` double(6,4) NOT NULL default '0.0000',
  `pn_totalvotes` int(11) NOT NULL default '0',
  `pn_totalcomments` int(11) NOT NULL default '0',
  `pn_filesize` int(11) NOT NULL default '0',
  `pn_version` varchar(10) NOT NULL default '',
  `pn_homepage` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`pn_lid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_downloads_downloads`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_downloads_editorials`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_downloads_editorials` (
  `pn_id` int(11) NOT NULL default '0',
  `pn_adminid` varchar(60) NOT NULL default '',
  `pn_timestamp` datetime NOT NULL default '0000-00-00 00:00:00',
  `pn_text` text NOT NULL,
  `pn_title` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`pn_id`)
) TYPE=MyISAM;

#
# Dumping data for table `nuke_downloads_editorials`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_downloads_modrequest`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_downloads_modrequest` (
  `pn_requestid` int(11) NOT NULL auto_increment,
  `pn_lid` int(11) NOT NULL default '0',
  `pn_cid` int(11) NOT NULL default '0',
  `pn_sid` int(11) NOT NULL default '0',
  `pn_title` varchar(100) NOT NULL default '',
  `pn_url` varchar(254) NOT NULL default '',
  `pn_description` text NOT NULL,
  `pn_modifysubmitter` varchar(60) NOT NULL default '',
  `pn_brokendownload` int(3) NOT NULL default '0',
  `pn_name` varchar(100) NOT NULL default '',
  `pn_email` varchar(100) NOT NULL default '',
  `pn_filesize` int(11) NOT NULL default '0',
  `pn_version` varchar(10) NOT NULL default '',
  `pn_homepage` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`pn_requestid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_downloads_modrequest`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_downloads_newdownload`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_downloads_newdownload` (
  `pn_lid` int(11) NOT NULL auto_increment,
  `pn_cid` int(11) NOT NULL default '0',
  `pn_sid` int(11) NOT NULL default '0',
  `pn_title` varchar(100) NOT NULL default '',
  `pn_url` varchar(254) NOT NULL default '',
  `pn_description` text NOT NULL,
  `pn_name` varchar(100) NOT NULL default '',
  `pn_email` varchar(100) NOT NULL default '',
  `pn_submitter` varchar(60) NOT NULL default '',
  `pn_filesize` int(11) NOT NULL default '0',
  `pn_version` varchar(10) NOT NULL default '',
  `pn_homepage` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`pn_lid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_downloads_newdownload`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_downloads_subcategories`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_downloads_subcategories` (
  `pn_sid` int(11) NOT NULL auto_increment,
  `pn_cid` int(11) NOT NULL default '0',
  `pn_title` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`pn_sid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_downloads_subcategories`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_downloads_votedata`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_downloads_votedata` (
  `pn_id` int(11) NOT NULL auto_increment,
  `pn_lid` int(11) NOT NULL default '0',
  `pn_user` varchar(60) NOT NULL default '',
  `pn_rating` int(11) NOT NULL default '0',
  `pn_hostname` varchar(60) NOT NULL default '',
  `pn_comments` text NOT NULL,
  `pn_timestamp` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`pn_id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_downloads_votedata`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_ephem`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_ephem` (
  `pn_eid` int(11) NOT NULL auto_increment,
  `pn_did` tinyint(2) NOT NULL default '0',
  `pn_mid` tinyint(2) NOT NULL default '0',
  `pn_yid` int(4) NOT NULL default '0',
  `pn_content` text NOT NULL,
  `pn_language` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`pn_eid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_ephem`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_faqanswer`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_faqanswer` (
  `pn_id` int(6) NOT NULL auto_increment,
  `pn_id_cat` int(6) default NULL,
  `pn_question` text,
  `pn_answer` text,
  `pn_submittedby` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`pn_id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_faqanswer`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_faqcategories`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_faqcategories` (
  `pn_id_cat` int(6) NOT NULL auto_increment,
  `pn_categories` varchar(255) default NULL,
  `pn_language` varchar(30) NOT NULL default '',
  `pn_parent_id` int(6) NOT NULL default '0',
  PRIMARY KEY  (`pn_id_cat`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_faqcategories`
#

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
# Table structure for table `nuke_headlines`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_headlines` (
  `pn_id` int(11) unsigned NOT NULL auto_increment,
  `pn_sitename` varchar(255) NOT NULL default '',
  `pn_rssuser` varchar(10) default NULL,
  `pn_rsspasswd` varchar(10) default NULL,
  `pn_use_proxy` tinyint(3) NOT NULL default '0',
  `pn_rssurl` varchar(255) NOT NULL default '',
  `pn_maxrows` tinyint(3) NOT NULL default '10',
  `pn_siteurl` varchar(255) NOT NULL default '',
  `pn_options` varchar(20) default '',
  PRIMARY KEY  (`pn_id`)
) TYPE=MyISAM AUTO_INCREMENT=53 ;

#
# Dumping data for table `nuke_headlines`
#

INSERT INTO `nuke_headlines` VALUES (1, 'PostNuke', NULL, NULL, 0, 'http://postnuke.com/backend.php', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (2, 'LinuxCentral', NULL, NULL, 0, 'http://linuxcentral.com/backend/lcnew.rdf', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (3, 'Slashdot', NULL, NULL, 0, 'http://slashdot.org/slashdot.rdf', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (4, 'NewsForge', NULL, NULL, 0, 'http://www.newsforge.com/newsforge.rdf', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (5, 'PHPBuilder', NULL, NULL, 0, 'http://phpbuilder.com/rss_feed.php', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (6, 'Linux.com', NULL, NULL, 0, 'http://linux.com/mrn/front_page.rss', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (7, 'Freshmeat', NULL, NULL, 0, 'http://freshmeat.net/backend/fm.rdf', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (9, 'LinuxWeeklyNews', NULL, NULL, 0, 'http://lwn.net/headlines/rss', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (11, 'Segfault', NULL, NULL, 0, 'http://segfault.org/stories.xml', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (13, 'KDE', NULL, NULL, 0, 'http://www.kde.org/news/kdenews.rdf', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (14, 'Perl.com', NULL, NULL, 0, 'http://www.perl.com/pace/perlnews.rdf', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (17, 'MozillaNewsBot', NULL, NULL, 0, 'http://www.mozilla.org/newsbot/newsbot.rdf', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (21, 'SciFi-News', NULL, NULL, 0, 'http://www.technopagan.org/sf-news/rdf.php', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (26, 'DrDobbsTechNetCast', NULL, NULL, 0, 'http://www.technetcast.com/tnc_headlines.rdf', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (27, 'RivaExtreme', NULL, NULL, 0, 'http://rivaextreme.com/ssi/rivaextreme.rdf.cdf', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (29, 'PBSOnline', NULL, NULL, 0, 'http://cgi.pbs.org/cgi-registry/featuresrdf.pl', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (30, 'Listology', NULL, NULL, 0, 'http://listology.com/recent.rdf', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (33, 'exoScience', NULL, NULL, 0, 'http://www.exosci.com/exosci.rdf', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (39, 'DailyDaemonNews', NULL, NULL, 0, 'http://daily.daemonnews.org/ddn.rdf.php3', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (40, 'PerlMonks', NULL, NULL, 0, 'http://www.perlmonks.org/headlines.rdf', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (42, 'BSDToday', NULL, NULL, 0, 'http://www.bsdtoday.com/backend/bt.rdf', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (45, 'HotWired', NULL, NULL, 0, 'http://www.hotwired.com/webmonkey/meta/headlines.rdf', 10, '', '');
INSERT INTO `nuke_headlines` VALUES (52, 'SolarisCentral', NULL, NULL, 0, 'http://www.SolarisCentral.org/news/SolarisCentral.rdf', 10, '', '');
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
# Table structure for table `nuke_languages_constant`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_languages_constant` (
  `pn_constant` varchar(32) NOT NULL default '',
  `pn_file` varchar(64) NOT NULL default '',
  PRIMARY KEY  (`pn_constant`)
) TYPE=MyISAM;

#
# Dumping data for table `nuke_languages_constant`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_languages_file`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_languages_file` (
  `pn_target` varchar(64) NOT NULL default '',
  `pn_source` varchar(64) NOT NULL default '',
  PRIMARY KEY  (`pn_target`,`pn_source`),
  UNIQUE KEY `source` (`pn_source`)
) TYPE=MyISAM;

#
# Dumping data for table `nuke_languages_file`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_languages_translation`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_languages_translation` (
  `pn_language` varchar(32) NOT NULL default '',
  `pn_constant` varchar(32) NOT NULL default '',
  `pn_translation` longblob NOT NULL,
  `pn_level` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`pn_constant`,`pn_language`)
) TYPE=MyISAM;

#
# Dumping data for table `nuke_languages_translation`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_links_categories`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_links_categories` (
  `pn_cat_id` int(11) NOT NULL auto_increment,
  `pn_parent_id` int(11) default NULL,
  `pn_title` varchar(50) NOT NULL default '',
  `pn_description` text NOT NULL,
  PRIMARY KEY  (`pn_cat_id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_links_categories`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_links_editorials`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_links_editorials` (
  `pn_linkid` int(11) NOT NULL default '0',
  `pn_adminid` varchar(60) NOT NULL default '',
  `pn_timestamp` datetime NOT NULL default '0000-00-00 00:00:00',
  `pn_text` text NOT NULL,
  `pn_title` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`pn_linkid`)
) TYPE=MyISAM;

#
# Dumping data for table `nuke_links_editorials`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_links_links`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_links_links` (
  `pn_lid` int(11) NOT NULL auto_increment,
  `pn_cat_id` int(11) NOT NULL default '0',
  `pn_title` varchar(100) NOT NULL default '',
  `pn_url` varchar(254) NOT NULL default '',
  `pn_description` text NOT NULL,
  `pn_date` datetime default NULL,
  `pn_name` varchar(100) NOT NULL default '',
  `pn_email` varchar(100) NOT NULL default '',
  `pn_hits` int(11) NOT NULL default '0',
  `pn_submitter` varchar(60) NOT NULL default '',
  `pn_ratingsummary` double(6,4) NOT NULL default '0.0000',
  `pn_totalvotes` int(11) NOT NULL default '0',
  `pn_totalcomments` int(11) NOT NULL default '0',
  PRIMARY KEY  (`pn_lid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_links_links`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_links_modrequest`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_links_modrequest` (
  `pn_requestid` int(11) NOT NULL auto_increment,
  `pn_lid` int(11) NOT NULL default '0',
  `pn_cat_id` int(11) NOT NULL default '0',
  `pn_sid` int(11) NOT NULL default '0',
  `pn_title` varchar(100) NOT NULL default '',
  `pn_url` varchar(254) NOT NULL default '',
  `pn_description` text NOT NULL,
  `pn_modifysubmitter` varchar(60) NOT NULL default '',
  `pn_brokenlink` tinyint(3) NOT NULL default '0',
  PRIMARY KEY  (`pn_requestid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_links_modrequest`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_links_newlink`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_links_newlink` (
  `pn_lid` int(11) NOT NULL auto_increment,
  `pn_cat_id` int(11) NOT NULL default '0',
  `pn_title` varchar(100) NOT NULL default '',
  `pn_url` varchar(254) NOT NULL default '',
  `pn_description` text NOT NULL,
  `pn_name` varchar(100) NOT NULL default '',
  `pn_email` varchar(100) NOT NULL default '',
  `pn_submitter` varchar(60) NOT NULL default '',
  PRIMARY KEY  (`pn_lid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_links_newlink`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_links_votedata`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_links_votedata` (
  `pn_id` int(11) NOT NULL auto_increment,
  `pn_lid` int(11) NOT NULL default '0',
  `pn_user` varchar(60) NOT NULL default '',
  `pn_rating` int(11) NOT NULL default '0',
  `pn_hostname` varchar(60) NOT NULL default '',
  `pn_comments` text NOT NULL,
  `pn_timestamp` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`pn_id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_links_votedata`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_message`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_message` (
  `pn_mid` int(11) NOT NULL auto_increment,
  `pn_title` varchar(100) NOT NULL default '',
  `pn_content` text NOT NULL,
  `pn_date` varchar(14) NOT NULL default '',
  `pn_expire` mediumint(7) NOT NULL default '0',
  `pn_active` tinyint(4) NOT NULL default '1',
  `pn_view` tinyint(1) NOT NULL default '1',
  `pn_language` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`pn_mid`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

#
# Dumping data for table `nuke_message`
#

INSERT INTO `nuke_message` VALUES (1, 'Welcome to PostNuke, the =-Phoenix-= release (0.726)', '<a target="_blank" href="http://www.postnuke.com">PostNuke</a> is a weblog/Content Management System (CMS). It is far more secure and stable than competing products, and able to work in high-volume environments with ease. \n<br />\n<br />\nSome of the highlights of PostNuke are\n<ul />\n<li /> Customisation of all aspects of the website\'s appearance through themes, including CSS support \n<li /> The ability to specify items as being suitable for either a single or all languages  \n<li /> The best guarantee of displaying your webpages on all browsers due to HTML 4.01 transitional compliance  \n<li /> A standard API and extensive documentation to allow for easy creation of extended functionality through modules and blocks  \n</ul>\n<br />\n<br />\nPostNuke has a very active developer and support community at <a target="_blank" href="http://www.postnuke.com">www.postnuke.com</a>.\n<br />\n<br />\nWe hope you will enjoy using PostNuke.\n<br />\n<br />\n<b>Your PostNuke development team </b><br /><br /><i>Note: This message can be edited in Administration-Admin Messages</i>', '993373194', 0, 1, 1, '');
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
INSERT INTO `nuke_module_vars` VALUES (98, 'Wiki', 'FieldSeparator', 'Ÿ');
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
# Table structure for table `nuke_poll_check`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_poll_check` (
  `pn_ip` varchar(20) NOT NULL default '',
  `pn_time` varchar(14) NOT NULL default ''
) TYPE=MyISAM;

#
# Dumping data for table `nuke_poll_check`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_poll_data`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_poll_data` (
  `pn_pollid` int(11) NOT NULL default '0',
  `pn_optiontext` char(50) NOT NULL default '',
  `pn_optioncount` int(11) NOT NULL default '0',
  `pn_voteid` int(11) NOT NULL default '0'
) TYPE=MyISAM;

#
# Dumping data for table `nuke_poll_data`
#

INSERT INTO `nuke_poll_data` VALUES (2, '', 0, 12);
INSERT INTO `nuke_poll_data` VALUES (2, '', 0, 11);
INSERT INTO `nuke_poll_data` VALUES (2, '', 0, 10);
INSERT INTO `nuke_poll_data` VALUES (2, '', 0, 9);
INSERT INTO `nuke_poll_data` VALUES (2, '', 0, 8);
INSERT INTO `nuke_poll_data` VALUES (2, '', 0, 7);
INSERT INTO `nuke_poll_data` VALUES (2, '', 0, 6);
INSERT INTO `nuke_poll_data` VALUES (2, '', 0, 5);
INSERT INTO `nuke_poll_data` VALUES (2, '', 0, 4);
INSERT INTO `nuke_poll_data` VALUES (2, 'What is PostNuke?', 0, 3);
INSERT INTO `nuke_poll_data` VALUES (2, 'It is what was needed.', 0, 2);
INSERT INTO `nuke_poll_data` VALUES (2, 'Think? I use it!', 0, 1);
# --------------------------------------------------------

#
# Table structure for table `nuke_poll_desc`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_poll_desc` (
  `pn_pollid` int(11) NOT NULL auto_increment,
  `pn_title` varchar(100) NOT NULL default '',
  `pn_timestamp` int(11) NOT NULL default '0',
  `pn_voters` mediumint(9) NOT NULL default '0',
  `pn_language` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`pn_pollid`)
) TYPE=MyISAM AUTO_INCREMENT=3 ;

#
# Dumping data for table `nuke_poll_desc`
#

INSERT INTO `nuke_poll_desc` VALUES (2, 'What do you think of PostNuke?', 995385085, 0, '');
# --------------------------------------------------------

#
# Table structure for table `nuke_pollcomments`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_pollcomments` (
  `pn_tid` int(11) NOT NULL auto_increment,
  `pn_pid` int(11) default '0',
  `pn_pollid` int(11) default '0',
  `pn_date` datetime default NULL,
  `pn_name` varchar(60) NOT NULL default '',
  `pn_email` varchar(60) default NULL,
  `pn_url` varchar(254) default NULL,
  `pn_host_name` varchar(60) default NULL,
  `pn_subject` varchar(60) NOT NULL default '',
  `pn_comment` text NOT NULL,
  `pn_score` tinyint(4) NOT NULL default '0',
  `pn_reason` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`pn_tid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_pollcomments`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_priv_msgs`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_priv_msgs` (
  `pn_msg_id` int(11) NOT NULL auto_increment,
  `pn_msg_image` varchar(100) default NULL,
  `pn_subject` varchar(100) default NULL,
  `pn_from_userid` int(11) NOT NULL default '0',
  `pn_to_userid` int(11) NOT NULL default '0',
  `pn_msg_time` varchar(20) default NULL,
  `pn_msg_text` text,
  `pn_read_msg` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`pn_msg_id`),
  KEY `pn_to_userid` (`pn_to_userid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_priv_msgs`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_queue`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_queue` (
  `pn_qid` smallint(5) unsigned NOT NULL auto_increment,
  `pn_uid` mediumint(9) NOT NULL default '0',
  `pn_arcd` tinyint(1) NOT NULL default '0',
  `pn_uname` varchar(40) NOT NULL default '',
  `pn_subject` varchar(100) NOT NULL default '',
  `pn_story` text,
  `pn_timestamp` datetime NOT NULL default '0000-00-00 00:00:00',
  `pn_topic` varchar(20) NOT NULL default '',
  `pn_language` varchar(30) NOT NULL default '',
  `pn_bodytext` text,
  PRIMARY KEY  (`pn_qid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_queue`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_quotes`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_quotes` (
  `pn_qid` int(10) unsigned NOT NULL auto_increment,
  `pn_quote` text,
  `pn_author` varchar(150) NOT NULL default '',
  PRIMARY KEY  (`pn_qid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_quotes`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_ratings`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_ratings` (
  `pn_rid` int(10) NOT NULL auto_increment,
  `pn_module` varchar(32) NOT NULL default '',
  `pn_itemid` varchar(64) NOT NULL default '',
  `pn_ratingtype` varchar(64) NOT NULL default '',
  `pn_rating` double(7,5) NOT NULL default '0.00000',
  `pn_numratings` int(5) NOT NULL default '1',
  PRIMARY KEY  (`pn_rid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_ratings`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_ratingslog`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_ratingslog` (
  `pn_id` varchar(32) NOT NULL default '',
  `pn_ratingid` varchar(64) NOT NULL default '',
  `pn_rating` int(3) NOT NULL default '0'
) TYPE=MyISAM;

#
# Dumping data for table `nuke_ratingslog`
#

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
# Table structure for table `nuke_related`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_related` (
  `pn_rid` int(11) NOT NULL auto_increment,
  `pn_tid` int(11) NOT NULL default '0',
  `pn_name` varchar(30) NOT NULL default '',
  `pn_url` varchar(254) NOT NULL default '',
  PRIMARY KEY  (`pn_rid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_related`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_reviews`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_reviews` (
  `pn_id` int(11) NOT NULL auto_increment,
  `pn_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `pn_title` varchar(150) NOT NULL default '',
  `pn_text` text NOT NULL,
  `pn_reviewer` varchar(20) default NULL,
  `pn_email` varchar(60) default NULL,
  `pn_score` int(11) NOT NULL default '0',
  `pn_cover` varchar(100) NOT NULL default '',
  `pn_url` varchar(254) NOT NULL default '',
  `pn_url_title` varchar(150) NOT NULL default '',
  `pn_hits` int(11) NOT NULL default '0',
  `pn_language` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`pn_id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_reviews`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_reviews_add`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_reviews_add` (
  `pn_id` int(11) NOT NULL auto_increment,
  `pn_date` datetime default NULL,
  `pn_title` varchar(150) NOT NULL default '',
  `pn_text` text NOT NULL,
  `pn_reviewer` varchar(20) NOT NULL default '',
  `pn_email` varchar(60) default NULL,
  `pn_score` int(11) NOT NULL default '0',
  `pn_url` varchar(254) NOT NULL default '',
  `pn_url_title` varchar(150) NOT NULL default '',
  `pn_language` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`pn_id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_reviews_add`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_reviews_comments`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_reviews_comments` (
  `pn_cid` int(11) NOT NULL auto_increment,
  `pn_rid` int(11) NOT NULL default '0',
  `pn_userid` varchar(25) NOT NULL default '',
  `pn_date` datetime default NULL,
  `pn_comments` text,
  `pn_score` int(11) NOT NULL default '0',
  PRIMARY KEY  (`pn_cid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_reviews_comments`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_reviews_main`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_reviews_main` (
  `pn_title` varchar(100) default NULL,
  `pn_description` text
) TYPE=MyISAM;

#
# Dumping data for table `nuke_reviews_main`
#

INSERT INTO `nuke_reviews_main` VALUES ('Reviews Section Title', 'Reviews Section Long Description');
# --------------------------------------------------------

#
# Table structure for table `nuke_seccont`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_seccont` (
  `pn_artid` int(11) NOT NULL auto_increment,
  `pn_secid` int(11) NOT NULL default '0',
  `pn_title` text NOT NULL,
  `pn_content` text NOT NULL,
  `pn_counter` int(11) NOT NULL default '0',
  `pn_language` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`pn_artid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_seccont`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_sections`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_sections` (
  `pn_secid` int(11) NOT NULL auto_increment,
  `pn_secname` varchar(40) NOT NULL default '',
  `pn_image` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`pn_secid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_sections`
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
# Table structure for table `nuke_stats_date`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_stats_date` (
  `pn_date` varchar(80) NOT NULL default '',
  `pn_hits` int(11) unsigned NOT NULL default '0'
) TYPE=MyISAM;

#
# Dumping data for table `nuke_stats_date`
#

INSERT INTO `nuke_stats_date` VALUES ('15062003', 2);
# --------------------------------------------------------

#
# Table structure for table `nuke_stats_hour`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_stats_hour` (
  `pn_hour` tinyint(2) unsigned NOT NULL default '0',
  `pn_hits` int(11) unsigned NOT NULL default '0'
) TYPE=MyISAM;

#
# Dumping data for table `nuke_stats_hour`
#

INSERT INTO `nuke_stats_hour` VALUES (0, 0);
INSERT INTO `nuke_stats_hour` VALUES (1, 0);
INSERT INTO `nuke_stats_hour` VALUES (2, 0);
INSERT INTO `nuke_stats_hour` VALUES (3, 0);
INSERT INTO `nuke_stats_hour` VALUES (4, 0);
INSERT INTO `nuke_stats_hour` VALUES (5, 0);
INSERT INTO `nuke_stats_hour` VALUES (6, 0);
INSERT INTO `nuke_stats_hour` VALUES (7, 0);
INSERT INTO `nuke_stats_hour` VALUES (8, 0);
INSERT INTO `nuke_stats_hour` VALUES (9, 0);
INSERT INTO `nuke_stats_hour` VALUES (10, 0);
INSERT INTO `nuke_stats_hour` VALUES (11, 0);
INSERT INTO `nuke_stats_hour` VALUES (12, 0);
INSERT INTO `nuke_stats_hour` VALUES (13, 0);
INSERT INTO `nuke_stats_hour` VALUES (14, 0);
INSERT INTO `nuke_stats_hour` VALUES (15, 0);
INSERT INTO `nuke_stats_hour` VALUES (16, 0);
INSERT INTO `nuke_stats_hour` VALUES (17, 0);
INSERT INTO `nuke_stats_hour` VALUES (18, 0);
INSERT INTO `nuke_stats_hour` VALUES (19, 0);
INSERT INTO `nuke_stats_hour` VALUES (20, 0);
INSERT INTO `nuke_stats_hour` VALUES (21, 2);
INSERT INTO `nuke_stats_hour` VALUES (22, 0);
INSERT INTO `nuke_stats_hour` VALUES (23, 0);
# --------------------------------------------------------

#
# Table structure for table `nuke_stats_month`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_stats_month` (
  `pn_month` tinyint(2) unsigned NOT NULL default '0',
  `pn_hits` int(11) unsigned NOT NULL default '0'
) TYPE=MyISAM;

#
# Dumping data for table `nuke_stats_month`
#

INSERT INTO `nuke_stats_month` VALUES (1, 0);
INSERT INTO `nuke_stats_month` VALUES (2, 0);
INSERT INTO `nuke_stats_month` VALUES (3, 0);
INSERT INTO `nuke_stats_month` VALUES (4, 0);
INSERT INTO `nuke_stats_month` VALUES (5, 0);
INSERT INTO `nuke_stats_month` VALUES (6, 2);
INSERT INTO `nuke_stats_month` VALUES (7, 0);
INSERT INTO `nuke_stats_month` VALUES (8, 0);
INSERT INTO `nuke_stats_month` VALUES (9, 0);
INSERT INTO `nuke_stats_month` VALUES (10, 0);
INSERT INTO `nuke_stats_month` VALUES (11, 0);
INSERT INTO `nuke_stats_month` VALUES (12, 0);
# --------------------------------------------------------

#
# Table structure for table `nuke_stats_week`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_stats_week` (
  `pn_weekday` tinyint(1) unsigned NOT NULL default '0',
  `pn_hits` int(11) unsigned NOT NULL default '0'
) TYPE=MyISAM;

#
# Dumping data for table `nuke_stats_week`
#

INSERT INTO `nuke_stats_week` VALUES (0, 2);
INSERT INTO `nuke_stats_week` VALUES (1, 0);
INSERT INTO `nuke_stats_week` VALUES (2, 0);
INSERT INTO `nuke_stats_week` VALUES (3, 0);
INSERT INTO `nuke_stats_week` VALUES (4, 0);
INSERT INTO `nuke_stats_week` VALUES (5, 0);
INSERT INTO `nuke_stats_week` VALUES (6, 0);
# --------------------------------------------------------

#
# Table structure for table `nuke_stories`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_stories` (
  `pn_sid` int(11) NOT NULL auto_increment,
  `pn_catid` int(11) NOT NULL default '0',
  `pn_aid` varchar(30) NOT NULL default '',
  `pn_title` varchar(255) default NULL,
  `pn_time` datetime default NULL,
  `pn_hometext` text,
  `pn_bodytext` text NOT NULL,
  `pn_comments` int(11) default '0',
  `pn_counter` mediumint(8) unsigned default NULL,
  `pn_topic` tinyint(4) NOT NULL default '1',
  `pn_informant` varchar(20) NOT NULL default '',
  `pn_notes` text NOT NULL,
  `pn_ihome` tinyint(1) NOT NULL default '0',
  `pn_themeoverride` varchar(30) NOT NULL default '',
  `pn_language` varchar(30) NOT NULL default '',
  `pn_withcomm` tinyint(1) NOT NULL default '0',
  `pn_format_type` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`pn_sid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_stories`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_stories_cat`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_stories_cat` (
  `pn_catid` int(11) NOT NULL auto_increment,
  `pn_title` varchar(40) NOT NULL default '',
  `pn_counter` int(11) NOT NULL default '0',
  `pn_themeoverride` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`pn_catid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

#
# Dumping data for table `nuke_stories_cat`
#

# --------------------------------------------------------

#
# Table structure for table `nuke_topics`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:41 
#

CREATE TABLE `nuke_topics` (
  `pn_topicid` tinyint(4) NOT NULL auto_increment,
  `pn_topicname` varchar(255) default NULL,
  `pn_topicimage` varchar(255) default NULL,
  `pn_topictext` varchar(255) default NULL,
  `pn_counter` int(11) NOT NULL default '0',
  PRIMARY KEY  (`pn_topicid`)
) TYPE=MyISAM AUTO_INCREMENT=3 ;

#
# Dumping data for table `nuke_topics`
#

INSERT INTO `nuke_topics` VALUES (2, 'Linux', 'linux.gif', 'Linux', 0);
INSERT INTO `nuke_topics` VALUES (1, 'PostNuke', 'PostNuke.gif', 'PostNuke', 0);
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
# Table structure for table `nuke_userblocks`
#
# Creation: Jun 15, 2003 at 09:41 
# Last update: Jun 15, 2003 at 09:42 
#

CREATE TABLE `nuke_userblocks` (
  `pn_uid` int(11) NOT NULL default '0',
  `pn_bid` int(11) NOT NULL default '0',
  `pn_active` tinyint(3) NOT NULL default '1',
  `pn_last_update` timestamp(14) NOT NULL
) TYPE=MyISAM;

#
# Dumping data for table `nuke_userblocks`
#

INSERT INTO `nuke_userblocks` VALUES (2, 16, 1, 20030615214201);
INSERT INTO `nuke_userblocks` VALUES (2, 1, 1, 20030615214201);
INSERT INTO `nuke_userblocks` VALUES (2, 3, 1, 20030615214201);
INSERT INTO `nuke_userblocks` VALUES (2, 8, 1, 20030615214201);
INSERT INTO `nuke_userblocks` VALUES (2, 15, 1, 20030615214201);
INSERT INTO `nuke_userblocks` VALUES (2, 11, 1, 20030615214201);
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