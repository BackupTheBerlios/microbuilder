<?php
/** Tables removed from original Postnuke.
 * Include it ath the end of install/newtables.php to 
 * get back to original behavior.
 *
 * @version     $Id: oldtables.php,v 1.1 2004/03/08 01:12:22 mbertier Exp $
 * @package     Oldnuke
 */

$table= $prefix.'_autolinks';
$sql = "
   CREATE TABLE ".$prefix."_autolinks (
     pn_lid int(11) NOT NULL auto_increment,
     pn_keyword varchar(100) NOT NULL default '',
     pn_title varchar(100) NOT NULL default '',
     pn_url varchar(200) NOT NULL default '',
     pn_comment varchar(200) NOT NULL default '',
     PRIMARY KEY  (pn_lid),
     UNIQUE KEY keyword (pn_keyword)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table= $prefix.'_autonews';
$sql = "
   CREATE TABLE ".$prefix."_autonews (
     pn_anid int(11) NOT NULL auto_increment,
     pn_catid int(11) NOT NULL default '0',
     pn_aid varchar(30) NOT NULL default '',
     pn_title varchar(80) NOT NULL default '',
     pn_time varchar(19) NOT NULL default '',
     pn_hometext text NOT NULL,
     pn_bodytext text NOT NULL,
     pn_topic tinyint(4) NOT NULL default '1',
     pn_informant varchar(20) NOT NULL default '',
     pn_notes text NOT NULL,
     pn_ihome tinyint(1) NOT NULL default '0',
     pn_language varchar(30) NOT NULL default '',
     pn_withcomm int(1) NOT NULL default '0',
     PRIMARY KEY  (pn_anid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_banner';
$sql = "
   CREATE TABLE ".$prefix."_banner (
     pn_bid int(11) NOT NULL auto_increment,
     pn_cid int(11) NOT NULL default '0',
     pn_type varchar(2) NOT NULL default '0',
     pn_imptotal int(11) NOT NULL default '0',
     pn_impmade int(11) NOT NULL default '0',
     pn_clicks int(11) NOT NULL default '0',
     pn_imageurl varchar(255) NOT NULL default '',
     pn_clickurl varchar(255) NOT NULL default '',
     pn_date datetime default NULL,
     PRIMARY KEY  (pn_bid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);


$table = $prefix.'_bannerclient';
$sql = "
   CREATE TABLE ".$prefix."_bannerclient (
     pn_cid int(11) NOT NULL auto_increment,
     pn_name varchar(60) NOT NULL default '',
     pn_contact varchar(60) NOT NULL default '',
     pn_email varchar(60) NOT NULL default '',
     pn_login varchar(10) NOT NULL default '',
     pn_passwd varchar(10) NOT NULL default '',
     pn_extrainfo text NOT NULL,
     PRIMARY KEY  (pn_cid)
) TYPE = " . $dbtabletype . "
";

dosql($table,$sql);

$table = $prefix.'_bannerfinish';
$sql = "
CREATE TABLE ".$prefix."_bannerfinish (
  pn_bid int(11) NOT NULL auto_increment,
  pn_cid int(11) NOT NULL default '0',
  pn_impressions int(11) NOT NULL default '0',
  pn_clicks int(11) NOT NULL default '0',
  pn_datestart datetime default NULL,
  pn_dateend datetime default NULL,
  PRIMARY KEY  (pn_bid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_quotes';
$sql = "
CREATE TABLE ".$prefix."_quotes (
    pn_qid int(10) unsigned NOT NULL auto_increment,
    pn_quote text,
    pn_author varchar(150) NOT NULL default '',
    PRIMARY KEY(pn_qid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_comments';
$sql = "
CREATE TABLE ".$prefix."_comments (
  pn_tid int(11) NOT NULL auto_increment,
  pn_pid int(11) default '0',
  pn_sid int(11) default '0',
  pn_date datetime default NULL,
  pn_name varchar(60) NOT NULL default '',
  pn_email varchar(60) default NULL,
  pn_url varchar(254) default NULL,
  pn_host_name varchar(60) default NULL,
  pn_subject varchar(85) NOT NULL default '',
  pn_comment text NOT NULL,
  pn_score tinyint(4) NOT NULL default '0',
  pn_reason tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (pn_tid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_downloads_categories';
$sql = "
CREATE TABLE ".$prefix."_downloads_categories (
  pn_cid int(11) NOT NULL auto_increment,
  pn_title varchar(50) NOT NULL default '',
  pn_description text NOT NULL,
  PRIMARY KEY  (pn_cid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_downloads_downloads';
$sql = "
CREATE TABLE ".$prefix."_downloads_downloads (
  pn_lid int(11) NOT NULL auto_increment,
  pn_cid int(11) NOT NULL default '0',
  pn_sid int(11) NOT NULL default '0',
  pn_title varchar(100) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  pn_description text NOT NULL,
  pn_date datetime default NULL,
  pn_name varchar(100) NOT NULL default '',
  pn_email varchar(100) NOT NULL default '',
  pn_hits int(11) NOT NULL default '0',
  pn_submitter varchar(60) NOT NULL default '',
  pn_ratingsummary double(6,4) NOT NULL default '0.0000',
  pn_totalvotes int(11) NOT NULL default '0',
  pn_totalcomments int(11) NOT NULL default '0',
  pn_filesize int(11) NOT NULL default '0',
  pn_version varchar(10) NOT NULL default '',
  pn_homepage varchar(200) NOT NULL default '',
  PRIMARY KEY  (pn_lid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_downloads_editorials';
$sql = "
CREATE TABLE ".$prefix."_downloads_editorials (
  pn_id int(11) NOT NULL default '0',
  pn_adminid varchar(60) NOT NULL default '',
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  pn_text text NOT NULL,
  pn_title varchar(100) NOT NULL default '',
  PRIMARY KEY  (pn_id)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_downloads_modrequest';
$sql = "
CREATE TABLE ".$prefix."_downloads_modrequest (
  pn_requestid int(11) NOT NULL auto_increment,
  pn_lid int(11) NOT NULL default '0',
  pn_cid int(11) NOT NULL default '0',
  pn_sid int(11) NOT NULL default '0',
  pn_title varchar(100) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  pn_description text NOT NULL,
  pn_modifysubmitter varchar(60) NOT NULL default '',
  pn_brokendownload int(3) NOT NULL default '0',
  pn_name varchar(100) NOT NULL default '',
  pn_email varchar(100) NOT NULL default '',
  pn_filesize int(11) NOT NULL default '0',
  pn_version varchar(10) NOT NULL default '',
  pn_homepage varchar(200) NOT NULL default '',
  PRIMARY KEY  (pn_requestid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_downloads_newdownload';
$sql = "
CREATE TABLE ".$prefix."_downloads_newdownload (
  pn_lid int(11) NOT NULL auto_increment,
  pn_cid int(11) NOT NULL default '0',
  pn_sid int(11) NOT NULL default '0',
  pn_title varchar(100) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  pn_description text NOT NULL,
  pn_name varchar(100) NOT NULL default '',
  pn_email varchar(100) NOT NULL default '',
  pn_submitter varchar(60) NOT NULL default '',
  pn_filesize int(11) NOT NULL default '0',
  pn_version varchar(10) NOT NULL default '',
  pn_homepage varchar(200) NOT NULL default '',
  PRIMARY KEY  (pn_lid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_downloads_subcategories';
$sql = "
CREATE TABLE ".$prefix."_downloads_subcategories (
  pn_sid int(11) NOT NULL auto_increment,
  pn_cid int(11) NOT NULL default '0',
  pn_title varchar(50) NOT NULL default '',
  PRIMARY KEY  (pn_sid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_downloads_votedata';
$sql = "
CREATE TABLE ".$prefix."_downloads_votedata (
  pn_id int(11) NOT NULL auto_increment,
  pn_lid int(11) NOT NULL default '0',
  pn_user varchar(60) NOT NULL default '',
  pn_rating int(11) NOT NULL default '0',
  pn_hostname varchar(60) NOT NULL default '',
  pn_comments text NOT NULL,
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (pn_id)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_ephem';
$sql = "
CREATE TABLE ".$prefix."_ephem (
  pn_eid int(11) NOT NULL auto_increment,
  pn_did tinyint(2) NOT NULL default '0',
  pn_mid tinyint(2) NOT NULL default '0',
  pn_yid int(4) NOT NULL default '0',
  pn_content text NOT NULL,
  pn_language varchar(30) NOT NULL default '',
  PRIMARY KEY  (pn_eid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_faqanswer';
$sql = "
CREATE TABLE ".$prefix."_faqanswer (
  pn_id int(6) NOT NULL auto_increment,
  pn_id_cat int(6) default NULL,
  pn_question text default NULL,
  pn_answer text,
  pn_submittedby varchar(250) NOT NULL default '',
  PRIMARY KEY  (pn_id)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_faqcategories';
$sql = "
CREATE TABLE ".$prefix."_faqcategories (
  pn_id_cat int(6) NOT NULL auto_increment,
  pn_categories varchar(255) default NULL,
  pn_language varchar(30) NOT NULL default '',
  pn_parent_id int(6) NOT NULL default '0',
  PRIMARY KEY  (pn_id_cat)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_headlines';
$sql = "
CREATE TABLE ".$prefix."_headlines (
  pn_id int(11) unsigned NOT NULL auto_increment,
  pn_sitename varchar(255) NOT NULL default '',
  pn_rssuser varchar(10) default NULL,
  pn_rsspasswd varchar(10) default NULL,
  pn_use_proxy tinyint(3) NOT NULL default '0',
  pn_rssurl varchar(255) NOT NULL default '',
  pn_maxrows tinyint(3) NOT NULL default '10',
  pn_siteurl varchar(255) NOT NULL default '',
  pn_options varchar(20) default '',
  PRIMARY KEY  (pn_id)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_links_categories';
$sql = "
CREATE TABLE ".$prefix."_links_categories (
  pn_cat_id int(11) NOT NULL auto_increment,
  pn_parent_id int(11) default NULL,
  pn_title varchar(50) NOT NULL default '',
  pn_description text NOT NULL,
  PRIMARY KEY  (pn_cat_id)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_links_editorials';
$sql = "
CREATE TABLE ".$prefix."_links_editorials (
  pn_linkid int(11) NOT NULL default '0',
  pn_adminid varchar(60) NOT NULL default '',
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  pn_text text NOT NULL,
  pn_title varchar(100) NOT NULL default '',
  PRIMARY KEY  (pn_linkid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_links_links';
$sql = "
CREATE TABLE ".$prefix."_links_links (
  pn_lid int(11) NOT NULL auto_increment,
  pn_cat_id int(11) NOT NULL default '0',
  pn_title varchar(100) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  pn_description text NOT NULL,
  pn_date datetime default NULL,
  pn_name varchar(100) NOT NULL default '',
  pn_email varchar(100) NOT NULL default '',
  pn_hits int(11) NOT NULL default '0',
  pn_submitter varchar(60) NOT NULL default '',
  pn_ratingsummary double(6,4) NOT NULL default '0.0000',
  pn_totalvotes int(11) NOT NULL default '0',
  pn_totalcomments int(11) NOT NULL default '0',
  PRIMARY KEY  (pn_lid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_links_modrequest';
$sql = "
CREATE TABLE ".$prefix."_links_modrequest (
  pn_requestid int(11) NOT NULL auto_increment,
  pn_lid int(11) NOT NULL default '0',
  pn_cat_id int(11) NOT NULL default '0',
  pn_sid int(11) NOT NULL default '0',
  pn_title varchar(100) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  pn_description text NOT NULL,
  pn_modifysubmitter varchar(60) NOT NULL default '',
  pn_brokenlink tinyint(3) NOT NULL default '0',
  PRIMARY KEY  (pn_requestid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_links_newlink';
$sql = "
CREATE TABLE ".$prefix."_links_newlink (
  pn_lid int(11) NOT NULL auto_increment,
  pn_cat_id int(11) NOT NULL default '0',
  pn_title varchar(100) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  pn_description text NOT NULL,
  pn_name varchar(100) NOT NULL default '',
  pn_email varchar(100) NOT NULL default '',
  pn_submitter varchar(60) NOT NULL default '',
  PRIMARY KEY  (pn_lid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_links_votedata';
$sql = "
CREATE TABLE ".$prefix."_links_votedata (
  pn_id int(11) NOT NULL auto_increment,
  pn_lid int(11) NOT NULL default '0',
  pn_user varchar(60) NOT NULL default '',
  pn_rating int(11) NOT NULL default '0',
  pn_hostname varchar(60) NOT NULL default '',
  pn_comments text NOT NULL,
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (pn_id)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_poll_check';
$sql = "
CREATE TABLE ".$prefix."_poll_check (
  pn_ip varchar(20) NOT NULL default '',
  pn_time varchar(14) NOT NULL default ''
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_poll_data';
$sql = "
CREATE TABLE ".$prefix."_poll_data (
  pn_pollid int(11) NOT NULL default '0',
  pn_optiontext char(50) NOT NULL default '',
  pn_optioncount int(11) NOT NULL default '0',
  pn_voteid int(11) NOT NULL default '0'
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_poll_desc';
$sql = "
CREATE TABLE ".$prefix."_poll_desc (
  pn_pollid int(11) NOT NULL auto_increment,
  pn_title varchar(100) NOT NULL default '',
  pn_timestamp int(11) NOT NULL default '0',
  pn_voters mediumint(9) NOT NULL default '0',
  pn_language varchar(30) NOT NULL default '',
  PRIMARY KEY  (pn_pollid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_pollcomments';
$sql = "
CREATE TABLE ".$prefix."_pollcomments (
  pn_tid int(11) NOT NULL auto_increment,
  pn_pid int(11) default '0',
  pn_pollid int(11) default '0',
  pn_date datetime default NULL,
  pn_name varchar(60) NOT NULL default '',
  pn_email varchar(60) default NULL,
  pn_url varchar(254) default NULL,
  pn_host_name varchar(60) default NULL,
  pn_subject varchar(60) NOT NULL default '',
  pn_comment text NOT NULL,
  pn_score tinyint(4) NOT NULL default '0',
  pn_reason tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (pn_tid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_queue';
$sql = "
CREATE TABLE ".$prefix."_queue (
  pn_qid smallint(5) unsigned NOT NULL auto_increment,
  pn_uid mediumint(9) NOT NULL default '0',
  pn_arcd tinyint(1) NOT NULL default '0',
  pn_uname varchar(40) NOT NULL default '',
  pn_subject varchar(100) NOT NULL default '',
  pn_story text,
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  pn_topic varchar(20) NOT NULL default '',
  pn_language varchar(30) NOT NULL default '',
  pn_bodytext text,
  PRIMARY KEY  (pn_qid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);


$table = $prefix.'_ratings';
$sql = "
CREATE TABLE ".$prefix."_ratings (
  pn_rid int(10) NOT NULL auto_increment,
  pn_module varchar(32) NOT NULL default '',
  pn_itemid varchar(64) NOT NULL default '',
  pn_ratingtype varchar(64) NOT NULL default '',
  pn_rating double(6,5) NOT NULL default '0.00000',
  pn_numratings int(5) NOT NULL default '1',
  PRIMARY KEY  (pn_rid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_ratingslog';
$sql = "
CREATE TABLE ".$prefix."_ratingslog (
  pn_id varchar(32) NOT NULL default '',
  pn_ratingid varchar(64) NOT NULL default '',
  pn_rating int(3) NOT NULL default '0'
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_reviews';
$sql = "
CREATE TABLE ".$prefix."_reviews (
  pn_id int(11) NOT NULL auto_increment,
  pn_date datetime NOT NULL default '0000-00-00 00:00:00',
  pn_title varchar(150) NOT NULL default '',
  pn_text text NOT NULL,
  pn_reviewer varchar(20) default NULL,
  pn_email varchar(60) default NULL,
  pn_score int(11) NOT NULL default '0',
  pn_cover varchar(100) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  pn_url_title varchar(150) NOT NULL default '',
  pn_hits int(11) NOT NULL default '0',
  pn_language varchar(30) NOT NULL default '',
  PRIMARY KEY  (pn_id)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_reviews_add';
$sql = "
CREATE TABLE ".$prefix."_reviews_add (
  pn_id int(11) NOT NULL auto_increment,
  pn_date datetime default NULL,
  pn_title varchar(150) NOT NULL default '',
  pn_text text NOT NULL,
  pn_reviewer varchar(20) NOT NULL default '',
  pn_email varchar(60) default NULL,
  pn_score int(11) NOT NULL default '0',
  pn_url varchar(254) NOT NULL default '',
  pn_url_title varchar(150) NOT NULL default '',
  pn_language varchar(30) NOT NULL default '',
  PRIMARY KEY  (pn_id)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_reviews_comments';
$sql = "
CREATE TABLE ".$prefix."_reviews_comments (
  pn_cid int(11) NOT NULL auto_increment,
  pn_rid int(11) NOT NULL default '0',
  pn_userid varchar(25) NOT NULL default '',
  pn_date datetime default NULL,
  pn_comments text,
  pn_score int(11) NOT NULL default '0',
  PRIMARY KEY  (pn_cid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_reviews_main';
$sql = "
CREATE TABLE ".$prefix."_reviews_main (
  pn_title varchar(100) default NULL,
  pn_description text
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_sections';
$sql = "
CREATE TABLE ".$prefix."_sections (
  pn_secid int(11) NOT NULL auto_increment,
  pn_secname varchar(40) NOT NULL default '',
  pn_image varchar(50) NOT NULL default '',
  PRIMARY KEY  (pn_secid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_stories';
$sql = "
CREATE TABLE ".$prefix."_stories (
  pn_sid int(11) NOT NULL auto_increment,
  pn_catid int(11) NOT NULL default '0',
  pn_aid varchar(30) NOT NULL default '',
  pn_title varchar(255) default NULL,
  pn_time datetime default NULL,
  pn_hometext text,
  pn_bodytext text NOT NULL,
  pn_comments int(11) default '0',
  pn_counter mediumint(8) unsigned default NULL,
  pn_topic tinyint(4) NOT NULL default '1',
  pn_informant varchar(20) NOT NULL default '',
  pn_notes text NOT NULL,
  pn_ihome tinyint(1) NOT NULL default '0',
  pn_themeoverride varchar(30) NOT NULL default '',
  pn_language varchar(30) NOT NULL default '',
  pn_withcomm tinyint(1) NOT NULL default '0',
  pn_format_type tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (pn_sid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_stories_cat';
$sql = "
CREATE TABLE ".$prefix."_stories_cat (
  pn_catid int(11) NOT NULL auto_increment,
  pn_title varchar(40) NOT NULL default '',
  pn_counter int(11) NOT NULL default '0',
  pn_themeoverride varchar(30) NOT NULL default '',
  PRIMARY KEY  (pn_catid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_topics';
$sql = "
CREATE TABLE ".$prefix."_topics (
  pn_topicid tinyint(4) NOT NULL auto_increment,
  pn_topicname varchar(255) default NULL,
  pn_topicimage varchar(255) default NULL,
  pn_topictext varchar(255) default NULL,
  pn_counter int(11) NOT NULL default '0',
  PRIMARY KEY  (pn_topicid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

$table = $prefix.'_userblocks';
$sql = "
CREATE TABLE ".$prefix."_userblocks (
  pn_uid int(11) NOT NULL default '0',
  pn_bid int(11) NOT NULL default '0',
  pn_active tinyint(3) NOT NULL default '1',
  pn_last_update timestamp(14) NOT NULL
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

