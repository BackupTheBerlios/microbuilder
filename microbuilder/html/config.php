<?php
/** Initialisation of configuration variables used by the installer.
 * ------------------------
 * Database & System Config
 * ------------------------
 * - dbtype:     type of database, currently only mysql
 * - dbhost:     MySQL Database Hostname
 * - dbuname:    MySQL Username
 * - dbpass:     MySQL Password
 * - dbname:     MySQL Database Name
 * - system:     0 for Unix/Linux, 1 for Windows
 * - encoded:    0 for MySQL information unenccoded
 *               1 for encoded
 *
 * @version      $Id: config.php,v 1.3 2004/03/13 00:08:41 mbertier Exp $
 * @package      Installer
 * @license      GPL
 */

# -- Default database settings
$pnconfig['dbtype'] = 'mysql';
$pnconfig['dbtabletype'] = 'MyISAM';
$pnconfig['dbhost'] = 'localhost';
$pnconfig['dbuname'] = '';
$pnconfig['dbpass'] = '';
$pnconfig['dbname'] = 'Microbuilder';
$pnconfig['system'] = '0';
$pnconfig['prefix'] = 'mb';
$pnconfig['encoded'] = '1';

// ----------------------------------------------------------------------
// For debugging (Pablo Roca)
//
// $debug - debugger windows active
//          0 = No
//          1 = Yes
//
// $debug_sql - show SQL in lens debug
//          0 = No
//          1 = Yes
// ----------------------------------------------------------------------
GLOBAL $pndebug;
$pndebug['debug']          = 0;
$pndebug['debug_sql']      = 0;
?>