<?php
// File: $Id: pninit.php,v 1.1 2004/03/01 10:09:03 mbertier Exp $
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
// Copyright (C) 2001 by the Post-Nuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// Based on:
// PHP-NUKE Web Portal System - http://phpnuke.org/
// Thatware - http://thatware.org/
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
// Original Author of file: Xiaoyu Huang [class007]
// Purpose of file: init script for NS-User
// ----------------------------------------------------------------------

function User_init()
{
	return true;
}

function User_upgrade($oldversion)
{
    // Upgrade dependent on old version number
    switch($oldversion) {    	
    	case 0.1:
    		//Upgrade from 0.1 to 0.2
			pnConfigSetVar('reg_allowreg','1');
			pnConfigSetVar('reg_verifyemail','1');
			pnConfigSetVar('reg_Illegalusername','root adm linux webmaster admin god administrator administrador nobody anonymous anonimo');
			pnConfigSetVar('reg_noregreasons','Sorry, registration is disabled at this time.');
			pnConfigSetVar('reg_uniemail','1');
		break;
    }
    return true;
}

function User_delete()
{
	pnConfigDelVar('reg_allowreg');
	pnConfigDelVar('reg_verifyemail');
	pnConfigDelVar('reg_Illegalusername');
	pnConfigDelVar('reg_noregreasons');
	pnConfigDelVar('reg_uniemail');

    return true;	
}


?>