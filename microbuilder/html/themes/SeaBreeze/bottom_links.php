<?php
// File: $Id: bottom_links.php,v 1.1 2004/03/01 10:09:11 mbertier Exp $ $Name:  $
// ----------------------------------------------------------------------
// PostNuke Content Management System
// Copyright (C) 2002 by the PostNuke Development Team.
// http://www.postnuke.com/
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
// Original Author of file:
// Purpose of file:
// ----------------------------------------------------------------------
/**
 * Change these links as you wish.  
 * They go along the bottom border 
 */
global $page;

echo '<span class="pn-sub"><a href="'._BOTTOMLINKURL1.'">'._BOTTOMLINKNAME1.'</a>&nbsp;::&nbsp;'
    .'<a href="'._BOTTOMLINKURL2.'">'._BOTTOMLINKNAME2.'</a></span>';

?>