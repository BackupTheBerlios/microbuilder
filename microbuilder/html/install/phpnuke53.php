<?php 
// File: $Id: phpnuke53.php,v 1.1 2004/03/01 10:09:13 mbertier Exp $ $Name:  $
// ----------------------------------------------------------------------
// PostNuke Content Management System
// Copyright (C) 2002 by the PostNuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// LICENSE

// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.

// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.

// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Original Author of file:
// Purpose of file:
// ----------------------------------------------------------------------
mysql_query("DROP TABLE " . $prefix . "_modules");

/**
 * Update stories for the comments selection
 */
mysql_query("ALTER TABLE " . $prefix . "_stories ADD withcomm int(1) DEFAULT '0' NOT NULL AFTER alanguage");
mysql_query("ALTER TABLE " . $prefix . "_stories ADD pn_format_type int(1) UNSIGNED DEFAULT '0' NOT NULL AFTER withcomm");
mysql_query("ALTER TABLE " . $prefix . "_autonews ADD withcomm int(1) DEFAULT '0' NOT NULL AFTER alanguage");

mysql_query("ALTER TABLE " . $prefix . "_queue ADD arcd INT (1) DEFAULT '0' NOT NULL AFTER uid");
mysql_query("ALTER TABLE " . $prefix . "_users ADD timezone_offset float(3,1) DEFAULT '0.0' NOT NULL");

?>