<?php 
// $Id: bottom_links.php,v 1.1 2004/03/01 10:09:09 mbertier Exp $
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
// Copyright (C) 2001 by the PostNuke Development Team.
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
// Original Author of file: J. Cox
// Purpose of file: Bottom Links For Default PostNuke Theme
// ----------------------------------------------------------------------

/* Change these links as you wish.  They go along the bottom border */

echo '<span class="pn-sub">'
     .'<a href="'._BOTLINKURL1.'">'._BOTLINKNAME1.'</a>&nbsp;::&nbsp;'
     .'<a href="'._BOTLINKURL2.'">'._BOTLINKNAME2.'</a>&nbsp;::&nbsp;'
     .'<a href="'._BOTLINKURL3.'">'._BOTLINKNAME3.'</a>&nbsp;</span>';
?>