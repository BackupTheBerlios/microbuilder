<?php
// $Id: pntables.php,v 1.1 2004/03/01 10:09:00 mbertier Exp $
// ----------------------------------------------------------------------
// PostNuke Content Management System
// Copyright (C) 2001 by the PostNuke Development Team.
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
// but WIthOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Original Author of file: adam_baum
// Purpose of file:  Table information for quotes module
// ----------------------------------------------------------------------

function quotes_pntables()
{
    // Initialise table array
    $pntable = array();

    // Name for quotes database entities
    $quotes = pnConfigGetVar('prefix') . '_quotes';

    // Table name
    $pntable['quotes'] = $quotes;

    // Column names
    $pntable['quotes_column'] = array('qid' => $quotes . '.pn_qid',
                                      'quote' => $quotes . '.pn_quote',
                                      'author' => $quotes . '.pn_author');
    // Return table information
    return $pntable;
}
?>