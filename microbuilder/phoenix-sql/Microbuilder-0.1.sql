# phpMyAdmin SQL Dump
# version 2.5.3-rc2
# http://www.phpmyadmin.net
#
# Host: localhost
# Generation Time: Mar 19, 2004 at 11:49 AM
# Server version: 4.0.14
# PHP Version: 4.3.4
# 
# Database : `Microbuilder`
# 

# --------------------------------------------------------

#
# Table structure for table `mb_blocks`
#
# Creation: Mar 19, 2004 at 11:41 AM
# Last update: Mar 19, 2004 at 11:45 AM
#

CREATE TABLE `mb_blocks` (
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
) TYPE=MyISAM AUTO_INCREMENT=14 ;

# --------------------------------------------------------

#
# Table structure for table `mb_blocks_buttons`
#
# Creation: Mar 19, 2004 at 11:41 AM
# Last update: Mar 19, 2004 at 11:41 AM
#

CREATE TABLE `mb_blocks_buttons` (
  `pn_id` int(11) unsigned NOT NULL auto_increment,
  `pn_bid` int(11) unsigned NOT NULL default '0',
  `pn_title` varchar(255) NOT NULL default '',
  `pn_url` varchar(254) NOT NULL default '',
  `pn_images` longtext NOT NULL,
  PRIMARY KEY  (`pn_id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

# --------------------------------------------------------

#
# Table structure for table `mb_group_membership`
#
# Creation: Mar 19, 2004 at 11:41 AM
# Last update: Mar 19, 2004 at 11:45 AM
#

CREATE TABLE `mb_group_membership` (
  `pn_gid` int(11) NOT NULL default '0',
  `pn_uid` int(11) NOT NULL default '0'
) TYPE=MyISAM;

# --------------------------------------------------------

#
# Table structure for table `mb_group_perms`
#
# Creation: Mar 19, 2004 at 11:41 AM
# Last update: Mar 19, 2004 at 11:45 AM
#

CREATE TABLE `mb_group_perms` (
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

# --------------------------------------------------------

#
# Table structure for table `mb_groups`
#
# Creation: Mar 19, 2004 at 11:41 AM
# Last update: Mar 19, 2004 at 11:45 AM
#

CREATE TABLE `mb_groups` (
  `pn_gid` int(11) NOT NULL auto_increment,
  `pn_name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`pn_gid`)
) TYPE=MyISAM AUTO_INCREMENT=3 ;

# --------------------------------------------------------

#
# Table structure for table `mb_hooks`
#
# Creation: Mar 19, 2004 at 11:41 AM
# Last update: Mar 19, 2004 at 11:45 AM
#

CREATE TABLE `mb_hooks` (
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

# --------------------------------------------------------

#
# Table structure for table `mb_module_vars`
#
# Creation: Mar 19, 2004 at 11:41 AM
# Last update: Mar 19, 2004 at 11:45 AM
#

CREATE TABLE `mb_module_vars` (
  `pn_id` int(11) unsigned NOT NULL auto_increment,
  `pn_modname` varchar(64) NOT NULL default '',
  `pn_name` varchar(64) NOT NULL default '',
  `pn_value` longtext,
  PRIMARY KEY  (`pn_id`),
  KEY `pn_modname` (`pn_modname`),
  KEY `pn_name` (`pn_name`)
) TYPE=MyISAM AUTO_INCREMENT=118 ;

# --------------------------------------------------------

#
# Table structure for table `mb_modules`
#
# Creation: Mar 19, 2004 at 11:41 AM
# Last update: Mar 19, 2004 at 11:45 AM
#

CREATE TABLE `mb_modules` (
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

# --------------------------------------------------------

#
# Table structure for table `mb_realms`
#
# Creation: Mar 19, 2004 at 11:41 AM
# Last update: Mar 19, 2004 at 11:41 AM
#

CREATE TABLE `mb_realms` (
  `pn_rid` int(11) NOT NULL auto_increment,
  `pn_name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`pn_rid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

# --------------------------------------------------------

#
# Table structure for table `mb_referer`
#
# Creation: Mar 19, 2004 at 11:41 AM
# Last update: Mar 19, 2004 at 11:41 AM
#

CREATE TABLE `mb_referer` (
  `pn_rid` int(11) NOT NULL auto_increment,
  `pn_url` varchar(254) NOT NULL default '',
  `pn_frequency` int(15) default NULL,
  PRIMARY KEY  (`pn_rid`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

# --------------------------------------------------------

#
# Table structure for table `mb_session_info`
#
# Creation: Mar 19, 2004 at 11:41 AM
# Last update: Mar 19, 2004 at 11:47 AM
#

CREATE TABLE `mb_session_info` (
  `pn_sessid` varchar(32) NOT NULL default '',
  `pn_ipaddr` varchar(20) NOT NULL default '',
  `pn_firstused` int(11) NOT NULL default '0',
  `pn_lastused` int(11) NOT NULL default '0',
  `pn_uid` int(11) NOT NULL default '0',
  `pn_vars` blob,
  PRIMARY KEY  (`pn_sessid`)
) TYPE=MyISAM;

# --------------------------------------------------------

#
# Table structure for table `mb_user_data`
#
# Creation: Mar 19, 2004 at 11:41 AM
# Last update: Mar 19, 2004 at 11:41 AM
#

CREATE TABLE `mb_user_data` (
  `pn_uda_id` int(11) NOT NULL auto_increment,
  `pn_uda_propid` int(11) NOT NULL default '0',
  `pn_uda_uid` int(11) NOT NULL default '0',
  `pn_uda_value` mediumblob NOT NULL,
  PRIMARY KEY  (`pn_uda_id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

# --------------------------------------------------------

#
# Table structure for table `mb_user_perms`
#
# Creation: Mar 19, 2004 at 11:41 AM
# Last update: Mar 19, 2004 at 11:41 AM
#

CREATE TABLE `mb_user_perms` (
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

# --------------------------------------------------------

#
# Table structure for table `mb_user_property`
#
# Creation: Mar 19, 2004 at 11:41 AM
# Last update: Mar 19, 2004 at 11:45 AM
#

CREATE TABLE `mb_user_property` (
  `pn_prop_id` int(11) NOT NULL auto_increment,
  `pn_prop_label` varchar(255) NOT NULL default '',
  `pn_prop_dtype` int(11) NOT NULL default '0',
  `pn_prop_length` int(11) NOT NULL default '255',
  `pn_prop_weight` int(11) NOT NULL default '0',
  `pn_prop_validation` varchar(255) default NULL,
  PRIMARY KEY  (`pn_prop_id`),
  UNIQUE KEY `pn_prop_label` (`pn_prop_label`)
) TYPE=MyISAM AUTO_INCREMENT=17 ;

# --------------------------------------------------------

#
# Table structure for table `mb_users`
#
# Creation: Mar 19, 2004 at 11:41 AM
# Last update: Mar 19, 2004 at 11:45 AM
#

CREATE TABLE `mb_users` (
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
    