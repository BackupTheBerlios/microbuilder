<?php
/** This script creates needed tables in database at install time.
 * @version      $Id: newtables.php,v 1.5 2004/03/19 14:43:45 mbertier Exp $
 * @package      Installer
 * @license      GPL
 */

/** Execute creation of given $table.
 * @param      string     $table    Name of table (only used for display
 * @param      string     $sql      SQL script to be executed
 *
 * @return     void
 */
function dosql($table,$sql) {
   GLOBAL $dbconn;
   $result = $dbconn->Execute($sql);
   if ($result === false) {
      echo "<font class=\"pn-failed\">"._NOTMADE." ".$table."</font>";
      exit;
   }
   echo "<br><font class=\"pn-sub\">".$table." "._MADE."</font>";
}


# -- Connect to database
$dbconn = dbconnect($dbhost, $dbuname, $dbpass, $dbname, $dbtype);


# -- _blocks
$table = $prefix.'_blocks';
$sql = "
CREATE TABLE ".$prefix."_blocks (
  pn_bid int(11) unsigned NOT NULL auto_increment,
  pn_bkey varchar(255) NOT NULL default '',
  pn_title varchar(255) NOT NULL default '',
  pn_content text NOT NULL,
  pn_url varchar(254) NOT NULL default '',
  pn_mid int(11) unsigned NOT NULL default '0',
  pn_position char(1) NOT NULL default 'l',
  pn_weight decimal(10,1) NOT NULL default '0.0',
  pn_active tinyint(3) unsigned NOT NULL default '1',
  pn_refresh int(11) unsigned NOT NULL default '0',
  pn_last_update timestamp(14) NOT NULL,
  pn_language varchar(30) NOT NULL default '',
  PRIMARY KEY  (pn_bid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

# -- _blocks_buttons
$table = $prefix.'_blocks_buttons';
$sql = "
CREATE TABLE ".$prefix."_blocks_buttons (
  pn_id int(11) unsigned NOT NULL auto_increment,
  pn_bid int(11) unsigned NOT NULL default '0',
  pn_title varchar(255) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  pn_images longtext NOT NULL,
  PRIMARY KEY  (pn_id)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

# -- _group_membership
$table = $prefix.'_group_membership';
$sql = "
CREATE TABLE ".$prefix."_group_membership (
  pn_gid int(11) NOT NULL default '0',
  pn_uid int(11) NOT NULL default '0'
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

# -- _group_perms
$table = $prefix.'_group_perms';
$sql = "
CREATE TABLE ".$prefix."_group_perms (
  pn_pid int(11) NOT NULL auto_increment,
  pn_gid int(11) NOT NULL default '0',
  pn_sequence int(11) NOT NULL default '0',
  pn_realm smallint(4) NOT NULL default '0',
  pn_component varchar(255) NOT NULL default '',
  pn_instance varchar(255) NOT NULL default '',
  pn_level smallint(4) NOT NULL default '0',
  pn_bond int(2) NOT NULL default '0',
  PRIMARY KEY  (pn_pid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

# -- _groups
$table = $prefix.'_groups';
$sql = "
CREATE TABLE ".$prefix."_groups (
  pn_gid int(11) NOT NULL auto_increment,
  pn_name varchar(255) NOT NULL default '',
  PRIMARY KEY  (pn_gid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

# -- _hooks
$table = $prefix.'_hooks';
$sql = "
CREATE TABLE ".$prefix."_hooks (
  pn_id int(11) unsigned NOT NULL auto_increment,
  pn_object varchar(64) NOT NULL,
  pn_action varchar(64) NOT NULL,
  pn_smodule varchar(64),
  pn_stype varchar(64),
  pn_tarea varchar(64) NOT NULL,
  pn_tmodule varchar(64) NOT NULL,
  pn_ttype varchar(64) NOT NULL,
  pn_tfunc varchar(64) NOT NULL,
  PRIMARY KEY  (pn_id)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);


# -- _module_vars
$table = $prefix.'_module_vars';
$sql = "
CREATE TABLE ".$prefix."_module_vars (
  pn_id int(11) unsigned NOT NULL auto_increment,
  pn_modname varchar(64) NOT NULL default '',
  pn_name varchar(64) NOT NULL default '',
  pn_value longtext,
  PRIMARY KEY  (pn_id),
  KEY pn_modname (pn_modname),
  KEY pn_name (pn_name)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

# -- _modules
$table = $prefix.'_modules';
$sql = "
CREATE TABLE ".$prefix."_modules (
  pn_id int(11) unsigned NOT NULL auto_increment,
  pn_name varchar(64) NOT NULL default '',
  pn_type int(6) NOT NULL,
  pn_displayname varchar(64) NOT NULL default '',
  pn_description varchar(255) NOT NULL default '',
  pn_regid int(11) unsigned NOT NULL default '0',
  pn_directory varchar(64) NOT NULL default '',
  pn_version varchar(10) NOT NULL default '0',
  pn_admin_capable tinyint(1) NOT NULL default '0',
  pn_user_capable tinyint(1) NOT NULL default '0',
  pn_state tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (pn_id)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

# -- _realms
$table = $prefix.'_realms';
$sql = "
CREATE TABLE ".$prefix."_realms (
  pn_rid int(11) NOT NULL auto_increment,
  pn_name varchar(255) NOT NULL default '',
  PRIMARY KEY  (pn_rid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

# -- _referer
$table = $prefix.'_referer';
$sql = "
CREATE TABLE ".$prefix."_referer (
  pn_rid int(11) NOT NULL auto_increment,
  pn_url varchar(254) NOT NULL default '',
  pn_frequency int(15) default NULL,
  PRIMARY KEY  (pn_rid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

# -- _session_info
$table = $prefix.'_session_info';
$sql = "
CREATE TABLE ".$prefix."_session_info (
  pn_sessid varchar(32) NOT NULL default '',
  pn_ipaddr varchar(20) NOT NULL default '',
  pn_firstused int(11) NOT NULL default '0',
  pn_lastused int(11) NOT NULL default '0',
  pn_uid int(11) NOT NULL default '0',
  pn_vars blob,
  PRIMARY KEY  (pn_sessid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

# -- _user_data
$table = $prefix.'_user_data';
$sql = "
CREATE TABLE ".$prefix."_user_data (
  pn_uda_id int(11) NOT NULL auto_increment,
  pn_uda_propid int(11) NOT NULL default '0',
  pn_uda_uid int(11) NOT NULL default '0',
  pn_uda_value mediumblob NOT NULL,
  PRIMARY KEY  (pn_uda_id)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

# -- _user_perms
$table = $prefix.'_user_perms';
$sql = "
CREATE TABLE ".$prefix."_user_perms (
  pn_pid int(11) NOT NULL auto_increment,
  pn_uid int(11) NOT NULL default '0',
  pn_sequence int(6) NOT NULL default '0',
  pn_realm int(4) NOT NULL default '0',
  pn_component varchar(255) NOT NULL default '',
  pn_instance varchar(255) NOT NULL default '',
  pn_level int(4) NOT NULL default '0',
  pn_bond int(2) NOT NULL default '0',
  PRIMARY KEY  (pn_pid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

# -- _user_property
$table = $prefix.'_user_property';
$sql = "
CREATE TABLE ".$prefix."_user_property (
  pn_prop_id int(11) NOT NULL auto_increment,
  pn_prop_label varchar(255) NOT NULL default '',
  pn_prop_dtype int(11) NOT NULL default '0',
  pn_prop_length int(11) NOT NULL default '255',
  pn_prop_weight int(11) NOT NULL default '0',
  pn_prop_validation varchar(255) default NULL,
  PRIMARY KEY  (pn_prop_id),
  UNIQUE KEY pn_prop_label (pn_prop_label)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

# -- _users
$table = $prefix.'_users';
$sql = "
CREATE TABLE ".$prefix."_users (
  pn_uid int(11) NOT NULL auto_increment,
  pn_name varchar(60) NOT NULL default '',
  pn_uname varchar(25) NOT NULL default '',
  pn_email varchar(60) NOT NULL default '',
  pn_femail varchar(60) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  pn_user_avatar varchar(30) default NULL,
  pn_user_regdate varchar(20) NOT NULL default '',
  pn_user_icq varchar(15) default NULL,
  pn_user_occ varchar(100) default NULL,
  pn_user_from varchar(100) default NULL,
  pn_user_intrest varchar(150) default NULL,
  pn_user_sig varchar(255) default NULL,
  pn_user_viewemail tinyint(2) default NULL,
  pn_user_theme tinyint(3) default NULL,
  pn_user_aim varchar(18) default NULL,
  pn_user_yim varchar(25) default NULL,
  pn_user_msnm varchar(25) default NULL,
  pn_pass varchar(40) NOT NULL default '',
  pn_storynum tinyint(4) NOT NULL default '10',
  pn_umode varchar(10) NOT NULL default '',
  pn_uorder tinyint(1) NOT NULL default '0',
  pn_thold tinyint(1) NOT NULL default '0',
  pn_noscore tinyint(1) NOT NULL default '0',
  pn_bio tinytext NOT NULL,
  pn_ublockon tinyint(1) NOT NULL default '0',
  pn_ublock text NOT NULL,
  pn_theme varchar(255) NOT NULL default '',
  pn_commentmax int(11) NOT NULL default '4096',
  pn_counter int(11) NOT NULL default '0',
  pn_timezone_offset float(3,1) NOT NULL default '0.0',
  PRIMARY KEY  (pn_uid)
) TYPE = " . $dbtabletype . "
";
dosql($table,$sql);

?>