<?php
// File: $Id: pnadmin.php,v 1.1 2004/03/01 10:08:58 mbertier Exp $
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
// Copyright (C) 2001 by the PostNuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// Based on:
// PHP-NUKE Web Portal System - http://phpnuke.org/
// Thatware - http://thatware.org/
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
// Original Author of file: Jim McDonald
// Purpose of file:  Permissions administration
// ----------------------------------------------------------------------
// MMaes, 2003-06-24: This might be a bit overdone, but it's failsafe.
if (!pnSecAuthAction(0, 'Permissions::', '::', ACCESS_ADMIN)) {
    $output = new pnHTML();
    $output->Text(_PERMISSIONSNOAUTH);
    return $output->GetOutput();
}

function permissions_admin_main()
{
    if (!pnSecAuthAction(0, 'Permissions::', '::', ACCESS_ADMIN)) {
	    $output = new pnHTML();
        $output->Text(_PERMISSIONSNOAUTH);
        return $output->GetOutput();
    }

    $output = new pnHTML();

    pnRedirect(pnModURL('permissions','admin','view',array(
    												'permtype' => 'group')));                        
    return true;
}

/**
 * view permissions
 */
function permissions_admin_view()
{
    if (!pnSecAuthAction(0, 'Permissions::', '::', ACCESS_ADMIN)) {
	    $output = new pnHTML();
        $output->Text(_PERMISSIONSNOAUTH);
        return $output->GetOutput();
    }

    $output = new pnHTML();

    // MMaes: DebugBlock
    if (!isset ($pndebug)) global $pndebug;
	if ($pndebug['debug']) {
		$do_debug = FALSE;
		if (!isset ($dbg) && $do_debug) global $dbg;
		// if (isset($dbg)) $dbg->v($var,'Variable');
	}

    // MMaes,2003-06-23: FilterView for single group
    list($permtype,
    	 $permgrp) = pnVarCleanFromInput(
    	 	'permtype',
    	 	'permgrp');

	//$ModName = pnModGetName();
	$ModName = basename( dirname( __FILE__ ) );
	$ModImgDir = "modules/$ModName/pnimages";
	$enableFilter = is_null(pnModGetVar('Permissions', 'filter')) ? 1 : pnModGetVar('Permissions', 'filter');
	$showSirenBar = is_null(pnModGetVar('Permissions', 'warnbar')) ? 1 : pnModGetVar('Permissions', 'warnbar');
	$rowview = is_null(pnModGetVar('Permissions', 'rowview')) ? '25' : pnModGetVar('Permissions', 'rowview');

    // Work out which tables to operate against, and
    // various other bits and pieces
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();
    if ($permtype == "user") {
        $permtable = $pntable['user_perms'];
        $permcolumn = &$pntable['user_perms_column'];
        $idfield = $permcolumn['uid'];
        $mlpermtype = _USERPERMS;
        $viewperms = _VIEWUSERPERMS;
        $ids = permissions_getUsersInfo();
        // MMaes,2003-06-23: For single users we don't do this, set permgrp to default.
        $permgrp = _PNPERMS_ALL;
		$permwhere = "";
    } else {
        $permtable = $pntable['group_perms'];
        $permcolumn = &$pntable['group_perms_column'];
        $idfield = $permcolumn['gid'];
        $mlpermtype = _GROUPPERMS;
        $viewperms = _VIEWGROUPPERMS;
        $ids = permissions_getGroupsInfo();

	    // MMaes,2003-06-23: View permissions applying to single group
        foreach($ids as $k => $v) {
            $idinfo[] = array('id' => $k,
                              'name' => $v);
            if ($permgrp == $k) {
            	$permgrp_shown = $v;
            }
        }
        //if (isset($dbg)) $dbg->v($ids,'Group ids');
        //if (isset($dbg)) $dbg->v((int)$permgrp,'PermGrp');
        if (!is_null($permgrp) && ($permgrp != _PNPERMS_ALL)) {
        	$permwhere = "WHERE ($idfield="._PNPERMS_ALL." OR $idfield=".pnVarPrepForStore($permgrp).")";
        	$showpartly = TRUE;
        } else {
        	$permgrp = _PNPERMS_ALL;
        	$permwhere = "";
        	$showpartly = FALSE;
        }
    }

    $query = "SELECT $permcolumn[pid],
                     $idfield,
                     $permcolumn[sequence],
                     $permcolumn[realm],
                     $permcolumn[component],
                     $permcolumn[instance],
                     $permcolumn[level],
                     $permcolumn[bond]
              FROM $permtable 
        	  $permwhere
              ORDER BY $permcolumn[sequence]";
    if (isset($dbg)) $dbg->msg($query);
    $result  = $dbconn->Execute($query);

    // Main menu
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->Text(permissions_adminmenu($permgrp));
    // Javascript
    $output->Text(permissions_javascript());

	// MMaes,2003-06-23: View single group	$output->TableRowStart();
	// $output->TableColStart();
    if ($permtype != "user") {
    	if ($enableFilter) {
		    $output->Text('<center>');
		    $output->FormStart(pnModURL('Permissions', 'admin', 'view'));
		    $output->FormHidden('permtype', $permtype);
			$output->Text(_PERM_VWSHOWONLY);
		    foreach ($idinfo as $idkey => $idval) {
		        if ($idval['id'] == $permgrp) {
		            $idinfo[$idkey]['selected'] = 1;
		        }
		    }
			$output->FormSelectMultiple('permgrp', $idinfo, 0, 1);
			$output->Text('&nbsp;&nbsp;');
		    $output->FormSubmit(_PERM_VWFILTER);
		    if ($showpartly && $showSirenBar) {
		    	// Show a clear warning-message that only partial Permission-table is shown.
		    	$output->Text('<br /><hr>');
		    	$output->Text(_PERM_WARN_FILTERACTIVE.'<img src="'.$ModImgDir.'/spacer.gif" alt="" border="0" width="50" height="1">');
		    	$output->Text('<img src="'.$ModImgDir.'/ani-siren.gif" alt="'._PERM_PARTLY.'" border="0" align="middle">');
		    	$output->Text('<img src="'.$ModImgDir.'/spacer.gif" alt="" border="0" width="50" height="1">');
		    	$output->Text(_PERM_SHOWING."<b>$permgrp_shown</b>");
		    	$output->Text('<img src="'.$ModImgDir.'/spacer.gif" alt="" border="0" width="50" height="1">');
		    	$output->Text('<img src="'.$ModImgDir.'/ani-siren.gif" alt="'._PERM_PARTLY.'" border="0" align="middle">');
		    	$output->Text('<img src="'.$ModImgDir.'/spacer.gif" alt="" border="0" width="50" height="1">'._PERM_WARN_FILTERACTIVE);
		    	$output->Text('<hr>');
		    }
	    }
	    $output->FormEnd();
	    $output->Text('</center>');
	}

    // Table
	// MMaes, 2003-06-20: Direct insert capability.
    $output->TableStart($viewperms,
                        array(	_SEQUENCE,
                        		_SEQ_ADJUST,
	// Realms not currently functional so hide the output - jgm
	//                          _REALM,
								$mlpermtype,
								'<a href="javascript:showinstanceinformation()">'._COMPONENT.'</a>',
								'<a href="javascript:showinstanceinformation()">'._INSTANCE.'</a>',
								_PERMLEVEL,
								_PERMOPS),
								1,
								'98%');

    $output->SetInputMode(_PNH_PARSEINPUT);
    
    $realms = permissions_getRealmsInfo();
    $accesslevels = accesslevelnames();
    $i=0;
    $numrows = $result->PO_RecordCount();
    if ($numrows>0) {
    $authid = pnSecGenAuthKey('Permissions');
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
	$space = $output->Text('<img src="'.$ModImgDir.'/spacer.gif" alt="" border="0" width="5" height="'.$rowview.'">');
    $rownum = 1;

    while(list($pid, $id, $sequence, $realm, $component, $instance, $level, $bond) = $result->fields) {
        $result->MoveNext();

        // Show the permission itself
        $row = array();
        $output->SetOutputMode(_PNH_RETURNOUTPUT);
        $output->SetInputMode(_PNH_VERBATIMINPUT);
        // MMaes, 2003-06-21: Put the seq-nr in for orientation when working in partial view.
		$row[] = $output->Text($sequence);
		
        $up = $output->URL(pnVarPrepForDisplay(pnModURL('Permissions',
                                     'admin',
                                     'inc',
                                     array('pid' => $pid,
                                           'permtype' => $permtype,
                                           'permgrp' => $permgrp,
                                           'authid' => $authid))),
                           '<img src="'.$ModImgDir.'/up.gif" alt="' . _UP . '" border="0" align="middle">');
        $down = $output->URL(pnVarPrepForDisplay(pnModURL('Permissions',
                                      'admin',
                                      'dec',
                                      array('pid' => $pid,
                                            'permtype' => $permtype,
                                            'permgrp' => $permgrp,
                                            'authid' => $authid))),
                             '<img src="'.$ModImgDir.'/down.gif" alt="' . _DOWN . '" border="0" align="middle">');
        switch($rownum) {
            case 1:
                $arrows = $space.$down.$space;
                break;
            case $numrows:
                $arrows = $space.$up.$space;
                break;
            default:
                $arrows = $space.$up.$space.$down.$space;
                break;
        }
        $rownum++;

        $row[] = $output->Text($arrows);
        $output->SetInputMode(_PNH_PARSEINPUT);

		// Realms not currently functional so hide the output - jgm
		// $row[] = $output->Text($realms[$realm]);
        $row[] = $output->Text($ids[$id]);
        $row[] = $output->Text($component);
        $row[] = $output->Text($instance);
        $row[] = $output->Text($accesslevels[$level]);
		// MMaes, 2003-06-20: Added authid to modify-url
		// MMaes, 2003-06-25: Changed URL to new modify-function
        $output->SetInputMode(_PNH_VERBATIMINPUT);
		// MMaes, 2003-06-20: Direct Insert Capability
        $insaft = $output->URL(pnVarPrepForDisplay(pnModURL('Permissions',
                                      'admin',
                                      'listedit',
                                      array('permtype'	=> $permtype,
                                            'permgrp'	=> $permgrp,
                                            'action'	=> 'insert',
                                      		'insseq'	=> $sequence,
                                            'authid'	=> $authid))),
                             '<img src="'.$ModImgDir.'/insert.gif" alt="' . _PERMINSBEFORE_ALTTXT . '" border="0" align="middle">');
        $edit = $output->URL(pnVarPrepForDisplay(pnModURL('Permissions',
                                      'admin',
                                      'listedit',
                                      array('chgpid'	=> $pid,
                                            'permtype'	=> $permtype,
                                            'permgrp'	=> $permgrp,
                                            'action'	=> 'modify',
                                            'authid'	=> $authid))),
                             '<img src="'.$ModImgDir.'/edit.gif" alt="' . _EDIT . '" border="0" align="middle">');
        $delete = $output->URL(pnVarPrepForDisplay(pnModURL('Permissions',
                                        'admin',
                                        'delete',
                                       array('pid'		=> $pid,
                                             'permtype'	=> $permtype,
                                             'permgrp'	=> $permgrp,
                                             'authid'	=> $authid))),
                              '<img src="'.$ModImgDir.'/delete.gif" alt="' . _DELETE . '" border="0" align="middle">');
        $options = $space.$insaft.$space.$edit.$space.$delete.$space;
        $row[] = $output->Text($options);
        $output->SetInputMode(_PNH_PARSEINPUT);

        $output->SetOutputMode(_PNH_KEEPOUTPUT);
        $output->SetInputMode(_PNH_VERBATIMINPUT);
        $output->TableAddRow($row);
        $output->SetInputMode(_PNH_PARSEINPUT);
    }
    }
    $output->TableEnd();

    return $output->GetOutput();
}

function permissions_admin_inc()
{
    // MMaes,2003-06-23: Added sec.check
    if (!pnSecAuthAction(0, 'Permissions::', '::', ACCESS_ADMIN)) {
    	$output = new pnHTML();
        $output->Text(_PERMISSIONSNOAUTH);
        return $output->GetOutput();
    }
    // Confirm authorisation code
    // MMaes,2003-06-23: Redirect to base if the AuthKey doesn't compute.
    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', _BADAUTHKEY);
        pnRedirect(pnModURL('Permissions',
                            'admin',
                            'main'));
        return true;
    }

    // Get parameters
	// MMaes,2003-06-23: View permissions applying to single group; added permgrp
    list($permtype,
    	 $pid,
    	 $permgrp) = pnVarCleanFromInput(
    	 	'permtype',
    	 	'pid',
    	 	'permgrp');

	if (!isset($permgrp) || $permgrp == '') {
		// For group-permissions, make sure we return something sensible.
		// Doesn't matter if we're looking at user-permissions...
		$permgrp = _PNPERMS_ALL;
	}
	
    // Load in API
    pnModAPILoad('Permissions', 'admin');

    // Pass to API
    if (pnModAPIFunc('Permissions',
                     'admin',
                     'inc',
                     array('type'		=> $permtype,
                           'pid'		=> $pid,
                           'permgrp'	=> $permgrp))) {
        // Success
        pnSessionSetVar('statusmsg', _PERM_INC);
    }

    // Redirect
    pnRedirect(pnModURL('Permissions',
                        'admin',
                        'view',
                        array('permtype'	=> $permtype,
                        	  'permgrp'		=> $permgrp)));

    return true;
}

/*
 * decrement a permission
 */
function permissions_admin_dec()
{
    // MMaes,2003-06-23: Added sec.check
    if (!pnSecAuthAction(0, 'Permissions::', '::', ACCESS_ADMIN)) {
    	$output = new pnHTML();
        $output->Text(_PERMISSIONSNOAUTH);
        return $output->GetOutput();
    }
    // Confirm authorisation code
    // MMaes,2003-06-23: Redirect to base if the AuthKey doesn't compute.
    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', _BADAUTHKEY);
        pnRedirect(pnModURL('Permissions',
                            'admin',
                            'main'));
        return true;
    }

    // Get parameters
	// MMaes,2003-06-23: View permissions applying to single group; added permgrp
    list($permtype,
    	 $pid,
    	 $permgrp) = pnVarCleanFromInput(
    	 	'permtype',
    	 	'pid',
    	 	'permgrp');

	if (!isset($permgrp) || $permgrp == '') {
		// For group-permissions, make sure we return something sensible.
		// This doesn't matter if we're looking at user-permissions...
		$permgrp = _PNPERMS_ALL;
	}

    // Load in API
    pnModAPILoad('Permissions', 'admin');

    // Pass to API
    if (pnModAPIFunc('Permissions',
                     'admin',
                     'dec',
                     array('type'		=> $permtype,
                           'pid'		=> $pid,
                           'permgrp'	=> $permgrp))) {
        // Success
        pnSessionSetVar('statusmsg', _PERM_DEC);
    }

    // Redirect
	// MMaes,2003-06-23: View permissions applying to single group; added permgrp
    pnRedirect(pnModURL('Permissions',
                        'admin',
                        'view',
                        array('permtype'	=> $permtype,
                        	  'permgrp'		=> $permgrp)));

    return true;
}


/**
 * Edit / Create permissions in the mainview
 */
function permissions_admin_listedit()
{
    if (!pnSecAuthAction(0, 'Permissions::', '::', ACCESS_ADMIN)) {
	    $output = new pnHTML();
        $output->Text(_PERMISSIONSNOAUTH);
        return $output->GetOutput();
    }
    // Confirm authorisation code
    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', _BADAUTHKEY);
        pnRedirect(pnModURL('Permissions',
                            'admin',
                            'main'));
        return true;
    }

    // MMaes: DebugBlock
    if (!isset ($pndebug)) global $pndebug;
	if ($pndebug['debug']) {
		$do_debug = FALSE;
		if (!isset ($dbg) && $do_debug) global $dbg;
		// if (isset($dbg)) $dbg->v($args,'Function arguments');
	}

    list($chgpid,
    	 $permtype,
    	 $permgrp,
    	 $action,
    	 $insseq) = pnVarCleanFromInput(
	 		'chgpid',
	 		'permtype',
	 		'permgrp',
	 		'action',
	 		'insseq');

	//$ModName = pnModGetName();
	$ModName = basename( dirname( __FILE__ ) );
	$ModImgDir = "modules/$ModName/pnimages";
	$showSirenBar = is_null(pnModGetVar('Permissions', 'warnbar')) ? 1 : pnModGetVar('Permissions', 'warnbar');
	$rowview = is_null(pnModGetVar('Permissions', 'rowview')) ? '25' : pnModGetVar('Permissions', 'rowview');

    $output = new pnHTML();

    // Work out which tables to operate against, and
    // various other bits and pieces
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();
    if ($permtype == "user") {
        $permtable = $pntable['user_perms'];
        $permcolumn = &$pntable['user_perms_column'];
        $idfield = $permcolumn['uid'];
        $mlpermtype = _USERPERMS;
        $viewperms = ($action == 'modify') ? _MODIFYUSERPERM : _NEWUSERPERM;
        $ids = permissions_getUsersInfo();
        foreach($ids as $k => $v) {
        	// Add all users to dropdown-list.
            $idinfo[] = array('id' => $k,
                              'name' => $v);
        }
        // MMaes,2003-06-23: For single users we don't do this, set permgrp to default.
        $permgrp = _PNPERMS_ALL;
      	$permwhere = "";
    } else {
        $permtable = $pntable['group_perms'];
        $permcolumn = &$pntable['group_perms_column'];
        $idfield = $permcolumn['gid'];
        $mlpermtype = _GROUPPERMS;
        $viewperms = ($action == 'modify') ? _MODIFYGROUPPERM : _NEWGROUPPERM;
        $ids = permissions_getGroupsInfo();

	    // MMaes,2003-06-23: View permissions applying to single group
        if (!is_null($permgrp) && ($permgrp != _PNPERMS_ALL)) {
	        foreach($ids as $k => $v) {
	            if ($permgrp == $k) {
		            $idinfo[] = array('id' => $k,
		                              'name' => $v);
	            	$permgrp_shown = $v;
	            }
	        }
        	$permwhere = "WHERE ($idfield="._PNPERMS_ALL." OR $idfield=".pnVarPrepForStore($permgrp).")";
        	$showpartly = TRUE;
        } else {
	        foreach($ids as $k => $v) {
	            $idinfo[] = array('id' => $k,
	                              'name' => $v);
	        }
        	$permgrp = _PNPERMS_ALL;
        	$permwhere = "";
        	$showpartly = FALSE;
        }
    }

    $query = "SELECT $permcolumn[pid],
                     $idfield,
                     $permcolumn[sequence],
                     $permcolumn[realm],
                     $permcolumn[component],
                     $permcolumn[instance],
                     $permcolumn[level],
                     $permcolumn[bond]
              FROM $permtable 
        	  $permwhere
              ORDER BY $permcolumn[sequence]";
    if (isset($dbg)) $dbg->msg($query);
    $result  = $dbconn->Execute($query);
    if ($result->EOF && $action != 'add') {
        pnSessionSetVar('errormsg', _PERM_LISTNONEFOUND);
        pnRedirect(pnModURL('modules', 'admin', 'main'));
        return;
    }

    // Main menu
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->Text(permissions_adminmenu($permgrp));
    // Javascript
    $output->Text(permissions_javascript());

	// MMaes,2003-06-23: View single group, show warning
    if ($permtype != "user" && $showpartly && $showSirenBar) {
    	$output->Text('<center><br /><hr>');
    	$output->Text(_PERM_WARN_FILTERACTIVE.'<img src="'.$ModImgDir.'/spacer.gif" alt="" border="0" width="50" height="1">');
    	$output->Text('<img src="'.$ModImgDir.'/ani-siren.gif" alt="'._PERM_PARTLY.'" border="0" align="middle">');
    	$output->Text('<img src="'.$ModImgDir.'/spacer.gif" alt="" border="0" width="50" height="1">');
    	$output->Text(_PERM_SHOWING."<b>$permgrp_shown</b>");
    	$output->Text('<img src="'.$ModImgDir.'/spacer.gif" alt="" border="0" width="50" height="1">');
    	$output->Text('<img src="'.$ModImgDir.'/ani-siren.gif" alt="'._PERM_PARTLY.'" border="0" align="middle">');
    	$output->Text('<img src="'.$ModImgDir.'/spacer.gif" alt="" border="0" width="50" height="1">'._PERM_WARN_FILTERACTIVE);
    	$output->Text('<hr></center>');
    }

	// ++++++++++++++++++++++++++++++++++++++++++++
    // MAINTABLE
	// ++++++++++++++++++++++++++++++++++++++++++++
    $output->TableStart($viewperms, array(	
						// Realms not currently functional so hide the output - jgm
						// _REALM,
						$mlpermtype,
						'<a href="javascript:showinstanceinformation()">'._COMPONENT,
						'<a href="javascript:showinstanceinformation()">'._INSTANCE,
						_PERMLEVEL,
						'&nbsp;'),
						1,
						'98%');

    $output->SetInputMode(_PNH_PARSEINPUT);

    $realms = permissions_getRealmsInfo();
    $accesslevels = accesslevelnames();
    $i=0;
    $numrows = $result->PO_RecordCount();
	$spacer = '<img src="'.$ModImgDir.'/spacer.gif" alt="" border="0" width="5" height="'.$rowview.'" align="middle">';
    $authid = pnSecGenAuthKey();

    while(list($pid, $id, $sequence, $realm, $component, $instance, $level, $bond) = $result->fields) {
        $result->MoveNext();

		if ($action == 'modify' && $pid == $chgpid) {
		    $output->SetInputMode(_PNH_VERBATIMINPUT);
			// Form-start
		    $output->FormStart(pnModURL('Permissions', 'admin', 'update'));
		    $output->FormHidden('authid', pnSecGenAuthKey());
		    $output->FormHidden('permtype', $permtype);
		    $output->FormHidden('permgrp', $permgrp);
		    $output->FormHidden('pid', $chgpid);
    		$output->FormHidden('realm', $realm);
			// Build the row
	        $output->SetOutputMode(_PNH_KEEPOUTPUT);
	        $output->SetInputMode(_PNH_VERBATIMINPUT);
			$row = permission_Build_InputRow(array(
									'pid'		=> $pid,
									'permtype'	=> $permtype,
									'permgrp'	=> $permgrp,
									'guid'		=> $id,
									'realm'		=> $realm,
									'component'	=> $component,
									'instance'	=> $instance,
									'level'		=> $level,
									'btnText'	=> _MODIFYPERM));
	        $output->TableAddRow($row);
		    $output->FormEnd();
	        $output->SetInputMode(_PNH_PARSEINPUT);
	        // Skip the rest, go on with next record.
	        continue;
	    }
	    // If we are the insert-position, first show an insert-row, then continue with the current record.
	    if ($action == 'insert' && $insseq == $sequence) {
		    $output->SetInputMode(_PNH_VERBATIMINPUT);
			// Form-start
		    $output->FormStart(pnModURL('Permissions', 'admin', 'create'));
		    $output->FormHidden('authid', pnSecGenAuthKey());
		    $output->FormHidden('permtype', pnVarPrepForDisplay($permtype));
		    $output->FormHidden('permgrp', $permgrp);
		    $output->FormHidden('insseq', $insseq);
			// Realms hard-coded - jgm
		    $output->FormHidden('realm', 0);
	        $output->SetOutputMode(_PNH_KEEPOUTPUT);
	        $output->SetInputMode(_PNH_VERBATIMINPUT);
			$row = permission_Build_InputRow(array(
									'permtype'	=> $permtype,
									'permgrp'	=> $permgrp,
									'btnText'	=> _NEWPERM));
	        $output->TableAddRow($row);
		    $output->FormEnd();
	        $output->SetInputMode(_PNH_PARSEINPUT);
		}
        // Show the other permissions
        $row = array();
        $output->SetOutputMode(_PNH_RETURNOUTPUT);
        // $output->SetInputMode(_PNH_VERBATIMINPUT);
		// $output->SetInputMode(_PNH_PARSEINPUT);

		// Realms not currently functional so hide the output - jgm
		//        $row[] = $output->Text($realms[$realm]);
        $output->SetInputMode(_PNH_VERBATIMINPUT);
	    $SizeField = $output->Text($spacer);
	    $SizeField .= $output->Text($ids[$id]);
        $row[] = $SizeField;
        $output->SetInputMode(_PNH_PARSEINPUT);
        $row[] = $output->Text($component);
        $row[] = $output->Text($instance);
        $row[] = $output->Text($accesslevels[$level]);
        $output->SetInputMode(_PNH_VERBATIMINPUT);
		// $options is not defined here
		// replaced with nbsp to complete table
		//$row[] = $output->Text($options);
        $row[] = $output->Text('&nbsp;');
        $output->SetInputMode(_PNH_PARSEINPUT);

        $output->SetOutputMode(_PNH_KEEPOUTPUT);
        $output->SetInputMode(_PNH_VERBATIMINPUT);
        $output->TableAddRow($row);
        $output->SetInputMode(_PNH_PARSEINPUT);
    }
    // End of rows currently in the database.
	if ($action == 'add') {
	    $output->SetInputMode(_PNH_VERBATIMINPUT);
		// Form-start
	    $output->FormStart(pnModURL('Permissions', 'admin', 'create'));
	    $output->FormHidden('authid', pnSecGenAuthKey());
	    $output->FormHidden('permtype', pnVarPrepForDisplay($permtype));
	    $output->FormHidden('permgrp', $permgrp);
	    $output->FormHidden('insseq', -1);
		// Realms hard-coded - jgm
	    $output->FormHidden('realm', 0);
        $output->SetOutputMode(_PNH_KEEPOUTPUT);
        $output->SetInputMode(_PNH_VERBATIMINPUT);
		$row = permission_Build_InputRow(array(
								'permtype'	=> $permtype,
								'permgrp'	=> $permgrp,
								'btnText'	=> _NEWPERM));
        $output->TableAddRow($row);
	    $output->FormEnd();
        $output->SetInputMode(_PNH_PARSEINPUT);
	}
	// End the main-table
	$output->TableEnd();

    return $output->GetOutput();
}

/* Build_InputRow
 * This function builds the input-row for modifying and creating permissions.
*/
function permission_Build_InputRow($args)
{
	extract($args);
    if (!isset($pid) || is_null($pid) || $pid == '') {
    	$op = 'NEW';
    	$realm = '';
    	$guid = '';
    	$component = '';
    	$instance = '';
    	$level = '';
    } else {
    	$op = 'MOD';
    }

	//$ModName = pnModGetName();
	$ModName = basename( dirname( __FILE__ ) );
	$ModImgDir = "modules/$ModName/pnimages";
    // MMaes: DebugBlock
    if (!isset ($pndebug)) global $pndebug;
	if ($pndebug['debug']) {
		$do_debug = FALSE;
		if (!isset ($dbg) && $do_debug) global $dbg;
		if (isset($dbg)) $dbg->v($args,'Function arguments');
	}

    if ($permtype == "user") {
        $ids = permissions_getUsersInfo();
        // MMaes,2003-06-23: For single users we don't do this, set permgrp to default.
        foreach($ids as $k => $v) {
        	// Add all users to dropdown-list.
            $idinfo[] = array('id' => $k,
                              'name' => $v);
        }
        $permgrp = _PNPERMS_ALL;
    } else {
        $ids = permissions_getGroupsInfo();
	    // MMaes,2003-06-23: View permissions applying to single group
	    if (!is_null($permgrp) && ($permgrp != _PNPERMS_ALL)) {
	    	$showpartly = TRUE;
	    } else {
	    	$showpartly = FALSE;
	    	$permgrp = _PNPERMS_ALL;
	    }
        foreach($ids as $k => $v) {
            if ($showpartly && $k == $permgrp) {
            	// Only add Filter-group to dropdown-list.
	            $idinfo[] = array('id' => $k,
	                              'name' => $v);
            } elseif (!$showpartly) {
            	// Add all groups to dropdown-list.
	            $idinfo[] = array('id' => $k,
	                              'name' => $v);
            }
        }
    }

	$rowedit = is_null(pnModGetVar('Permissions', 'rowedit')) ? '35' : pnModGetVar('Permissions', 'rowedit');
	$spacer = '<img src="'.$ModImgDir.'/spacer.gif" alt="" border="0" width="5" height="'.$rowedit.'" align="middle">';

    $output = new pnHTML();
	// Start the visible part of the row
    $output->SetInputMode(_PNH_PARSEINPUT);
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row = array();
	// Realm (not in use)
	// If modifying, select the current Level
    // $realms = permissions_getRealmsInfo();
    // foreach($realms as $k => $v) {
    //    $realminfo[] = array('id' => $k, 'name' => $v);
    // }
	// $row[] = $output->FormSelectMultiple('realm', $realminfo, 0, 1, $realm);

	// Group / User
	// If modifying, select the current Group/User
    foreach ($idinfo as $idkey => $idval) {
        if ($idval['id'] == $guid) {
        	// Special attention to Selected is needed due to -1,0,1,2... nature of groups
            $idinfo[$idkey]['selected'] = 1;
        }
    }
    $row[] = $output->FormSelectMultiple('id', $idinfo, 0, 1);

    // Component-textbox
    $row[] = $output->FormTextArea('component', $component, 2, 30);

    // Instance-textbox
    $row[] = $output->FormTextArea('instance', $instance, 2, 30);

	// Permission-level
	// If modifying, select the current Level
    foreach(accesslevelnames() as $k => $v) {
        $levelinfo[] = array('id' => $k, 'name' => $v);
    }
    $row[] = $output->FormSelectMultiple('level', $levelinfo, 0, 1, $level);

    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $ButtonField = $output->Text($spacer);
    $ButtonField .= $output->FormSubmit($btnText);
    $ButtonField .= $output->Text($spacer);
    $output->SetInputMode(_PNH_PARSEINPUT);
	$row[] = $ButtonField;

	return $row;
}


function permissions_admin_update()
{
    // MMaes,2003-06-23: Added sec.check
    if (!pnSecAuthAction(0, 'Permissions::', '::', ACCESS_ADMIN)) {
    	$output = new pnHTML();
        $output->Text(_PERMISSIONSNOAUTH);
        return $output->GetOutput();
    }
    // Confirm authorisation code
    // MMaes,2003-06-23: Redirect to base if the AuthKey doesn't compute.
    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', _BADAUTHKEY);
        pnRedirect(pnModURL('Permissions',
                            'admin',
                            'main'));
        return true;
    }

    // Get parameters
    list($permtype,
    	 $permgrp,
         $pid,
         $realm,
         $id,
         $component,
         $instance,
         $level) = pnVarCleanFromInput(
         	'permtype',
			'permgrp',
			'pid',
			'realm',
			'id',
			'component',
			'instance',
			'level');

	// Since we're using TextAreas, make sure no carriage-returns etc get through unnoticed.
	$warnmsg = '';
	if (ereg("[\n\r\t\x0B]",$component)) {
		$component = trim(ereg_replace("[\n\r\t\x0B]","",$component));
		$instance = trim(ereg_replace("[\n\r\t\x0B]","",$instance));
        $warnmsg .= _PERM_COMP_INPUTERR;
	}
	if (ereg("[\n\r\t\x0B]",$instance)) {
		$component = trim(ereg_replace("[\n\r\t\x0B]","",$component));
		$instance = trim(ereg_replace("[\n\r\t\x0B]","",$instance));
        $warnmsg .= _PERM_INST_INPUTERR;
	}

    // Load in API
    pnModAPILoad('Permissions', 'admin');

    // Pass to API
    if (pnModAPIFunc('Permissions',
                     'admin',
                     'update',
                     array('type'		=> $permtype,
                           'pid'		=> $pid,
                           'realm'		=> $realm,
                           'id'			=> $id,
                           'component'	=> $component,
                           'instance'	=> $instance,
                           'level'		=> $level))) {
        // Success
		if ($warnmsg == '') {
        	pnSessionSetVar('statusmsg', _PERM_UPD);
        } else {
        	pnSessionSetVar('errormsg', $warnmsg);
        }
    }

    pnRedirect(pnModURL('Permissions',
                        'admin',
                        'view',
                        array('permtype'	=> $permtype,
                        	  'permgrp'		=> $permgrp)));

    return true;
}


/*
 * create a new permission
 */
function permissions_admin_create()
{
    // MMaes,2003-06-23: Added sec.check
    if (!pnSecAuthAction(0, 'Permissions::', '::', ACCESS_ADMIN)) {
    	$output = new pnHTML();
        $output->Text(_PERMISSIONSNOAUTH);
        return $output->GetOutput();
    }
    // Confirm authorisation code
    // MMaes,2003-06-23: Redirect to base if the AuthKey doesn't compute.
    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', _BADAUTHKEY);
        pnRedirect(pnModURL('Permissions',
                            'admin',
                            'main'));
        return true;
    }

    // Get parameters
    list($permtype,
    	 $permgrp,
         $realm,
         $id,
         $component,
         $instance,
         $level,
         $insseq) = pnVarCleanFromInput(
         	'permtype',
			'permgrp',
			'realm',
			'id',
			'component',
			'instance',
			'level',
			'insseq');

	// Since we're using TextAreas, make sure no carriage-returns etc get through unnoticed.
	$warnmsg = '';
	if (ereg("[\n\r\t\x0B]",$component)) {
		$component = trim(ereg_replace("[\n\r\t\x0B]","",$component));
		$instance = trim(ereg_replace("[\n\r\t\x0B]","",$instance));
        $warnmsg .= _PERM_COMP_INPUTERR;
	}
	if (ereg("[\n\r\t\x0B]",$instance)) {
		$component = trim(ereg_replace("[\n\r\t\x0B]","",$component));
		$instance = trim(ereg_replace("[\n\r\t\x0B]","",$instance));
        $warnmsg .= _PERM_INST_INPUTERR;
	}

    // Load in API
    pnModAPILoad('Permissions', 'admin');

    // Pass to API
    if (pnModAPIFunc('Permissions',
                     'admin',
                     'create', array(
                     			'type'			=> $permtype,
								'realm'		=> $realm,
								'id'			=> $id,
								'component'	=> $component,
								'instance'		=> $instance,
								'level'		=> $level,
								'insseq'		=> $insseq))) {
        // Success
		if ($warnmsg == '') {
        	pnSessionSetVar('statusmsg', _PERM_CREATED);
        } else {
        	pnSessionSetVar('errormsg', $warnmsg);
        }
    }

    pnRedirect(pnModURL('Permissions',
                        'admin',
                        'view',
                        array('permtype'	=> $permtype,
                        	  'permgrp'		=> $permgrp)));

    return true;
}


/*
 * delete a permission
 */
function permissions_admin_delete()
{
    // MMaes,2003-06-23: Added sec.check
    if (!pnSecAuthAction(0, 'Permissions::', '::', ACCESS_ADMIN)) {
    	$output = new pnHTML();
        $output->Text(_PERMISSIONSNOAUTH);
        return $output->GetOutput();
    }
    // Confirm authorisation code
    // MMaes,2003-06-23: Redirect to base if the AuthKey doesn't compute.
    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', _BADAUTHKEY);
        pnRedirect(pnModURL('Permissions',
                            'admin',
                            'main'));
        return true;
    }

    // Get parameters
    list($permtype,
    	 $permgrp,
         $pid) = pnVarCleanFromInput(
         	'permtype',
			'permgrp',
			'pid');

    // Load in API
    pnModAPILoad('Permissions', 'admin');

    // Pass to API
    if (pnModAPIFunc('Permissions',
                     'admin',
                     'delete',
                     array('type'	=> $permtype,
                           'pid'	=> $pid))) {
        // Success
        pnSessionSetVar('statusmsg', _PERM_DEL);
    }

    pnRedirect(pnModURL('Permissions',
                        'admin',
                        'view',
                        array('permtype'	=> $permtype,
                        	  'permgrp'		=> $permgrp)));
    return true;
}


/*
 * getUsersInfo - get users information
 * Takes no parameters
 */
function permissions_getUsersInfo()
{
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $usertable = $pntable['users'];
    $usercolumn = &$pntable['users_column'];

    $query = "SELECT $usercolumn[uid],
                     $usercolumn[uname]
              FROM $usertable
              ORDER BY $usercolumn[uname]";
    $result = $dbconn->Execute($query);
    $users[_PNPERMS_ALL] = _ALLUSERS;
    $users[_PNPERMS_UNREGISTERED] = _UNREGISTEREDUSER;
    while(list($id, $name) = $result->fields) {

        $result->MoveNext();
        $users[$id] = $name;
    }
    $result->Close();

    return($users);
}

/*
 * getGroupsInfo - get groups information
 * Takes no parameters
 */
function permissions_getGroupsInfo()
{
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $grouptable = $pntable['groups'];
    $groupcolumn = &$pntable['groups_column'];

    $query = "SELECT $groupcolumn[gid],
                     $groupcolumn[name]
              FROM $grouptable
              ORDER BY $groupcolumn[name]";
    $result = $dbconn->Execute($query);
    $groups[_PNPERMS_ALL] = _ALLGROUPS;
    $groups[_PNPERMS_UNREGISTERED] = _UNREGISTEREDGROUP;
    while(list($gid, $name) = $result->fields) {
        $result->MoveNext();
        $groups[$gid] = $name;
    }
    $result->Close();

    return($groups);
}

/*
 * getRealmsInfo - get realms information
 * Takes no parameters
 */
function permissions_getRealmsInfo()
{
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $realmtable = $pntable['realms'];
    $realmcolumn = &$pntable['realms_column'];

    $query = "SELECT $realmcolumn[rid],
                     $realmcolumn[name]
              FROM $realmtable";
    $result = $dbconn->Execute($query);
    $realms[0] = _ALLREALMS;
    while(list($rid, $rname) = $result->fields) {

        $result->MoveNext();
        $realms[$rid] = $rname;
    }
    $result->Close();

    return($realms);
}

/*
 * showInstanceInformation  - Show instance information gathered
 *                            from blocks and modules
 * Takes no parameters
 */
function permissions_admin_viewinstanceinfo()
{
    // MMaes,2003-06-23: This function generates output -> added sec.check
    if (!pnSecAuthAction(0, 'Permissions::', '::', ACCESS_ADMIN)) {
    	$output = new pnHTML();
        $output->Text(_PERMISSIONSNOAUTH);
        return $output->GetOutput();
    }
    // Pretty much raw HTML here
    $output =  '<html>
                <head>
                </head>
                <body>
                <center>
                <h1>'._PERMISSIONINFO.'</h1>
                <table border="3">
                <tr>
                <th><center>
                '._REGISTEREDCOMP.'
                </center></th>
                <th><center>
                '._INSTANCETEMP.'
                </center></th>
                </tr>';

    $schemas = getinstanceschemainfo();
    ksort($schemas);
    foreach ($schemas as $k => $v) {
        $output .= '<tr>
                    <td><center>';
        $output .= $k;
        $output .= '</center></td>
                    <td><center>';
        $output .= $v;
        $output .= '</center></td>
                    </tr>';
   }
   $output .= '</table>
               </center>
               </body>
               </html>';

    echo $output;
    return true;
}


/**
 * Set configuration parameters of the module
 */
function permissions_admin_modifyconfig()
{
    if (!pnSecAuthAction(0, 'Permissions::', '::', ACCESS_ADMIN)) {
    	$output = new pnHTML();
        $output->Text(_PERMISSIONSNOAUTH);
        return $output->GetOutput();
    }
    // Confirm authorisation code
    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', _BADAUTHKEY);
        pnRedirect(pnModURL('Permissions',
                            'admin',
                            'main'));
        return true;
    }

	if (is_null(pnModGetVar('Permissions', 'filter'))) {
		pnModSetVar('Permissions', 'filter', 1);
	}
	if (is_null(pnModGetVar('Permissions', 'warnbar'))) {
		pnModSetVar('Permissions', 'warnbar', 1);
	}
	if (is_null(pnModGetVar('Permissions', 'rowview'))) {
		pnModSetVar('Permissions', 'rowview', '25');
	}
	if (is_null(pnModGetVar('Permissions', 'rowedit'))) {
		pnModSetVar('Permissions', 'rowedit', '35');
	}

	$rowsize = array();
	$rowsize[] =  array('id' => '20', 'name'=> '20');
	$rowsize[] =  array('id' => '25', 'name'=> '25');
	$rowsize[] =  array('id' => '30', 'name'=> '30');
	$rowsize[] =  array('id' => '35', 'name'=> '35');
	$rowsize[] =  array('id' => '40', 'name'=> '40');

    $output = new pnHTML();
    // Main menu
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->Text(permissions_adminmenu());
    $output->SetInputMode(_PNH_PARSEINPUT);

    $output->Title(_PERM_MODIFYCONFIG);

    $output->FormStart(pnModURL('Permissions',
								'admin',
								'updateconfig'));
    $output->FormHidden('authid', pnSecGenAuthKey());

    $output->TableStart();
	// Enable Filtering
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_PERM_ENABLEFILTER));
    $row[] = $output->FormCheckbox('filter', pnModGetVar('Permissions', 'filter'));
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    $output->Linebreak(2);

	// Show WarningBar
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_PERM_DISPLAYWARNING));
    $row[] = $output->FormCheckbox('warnbar', pnModGetVar('Permissions', 'warnbar'));
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    $output->Linebreak(2);

    // Minimal Viewing Rowheight
	$opt_selected = pnModGetVar('Permissions', 'rowview');
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_PERM_ROWHEIGHTVIEW));
    $row[] = $output->FormSelectMultiple('rowview', $rowsize, 0, 1, $opt_selected);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    $output->Linebreak(2);

    // Minimal Editing Rowheight
	$opt_selected = pnModGetVar('Permissions', 'rowedit');
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_PERM_ROWHEIGHTEDIT));
    $row[] = $output->FormSelectMultiple('rowedit', $rowsize, 0, 1, $opt_selected);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    $output->Linebreak(2);

    $output->TableEnd();
    // End form
    $output->Linebreak(2);
    $output->FormSubmit(_PERM_UPDATESETTINGS);
    $output->FormEnd();
    
    return $output->GetOutput();
}

/*
 * Save new settings
 */
function permissions_admin_updateconfig()
{
    if (!pnSecAuthAction(0, 'Permissions::', '::', ACCESS_ADMIN)) {
    	$output = new pnHTML();
        $output->Text(_PERMISSIONSNOAUTH);
        return $output->GetOutput();
    }
    // Confirm authorisation code
    // MMaes,2003-06-23: Redirect to base if the AuthKey doesn't compute.
    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', _BADAUTHKEY);
        pnRedirect(pnModURL('Permissions',
                            'admin',
                            'main'));
        return true;
    }

    list($filter,
    	 $warnbar,
    	 $rowview,
    	 $rowedit) = pnVarCleanFromInput(
    	 	'filter',
    	 	'warnbar',
    	 	'rowview',
    	 	'rowedit');

    // MMaes: DebugBlock
    if (!isset ($pndebug)) global $pndebug;
	if ($pndebug['debug']) {
		$do_debug = TRUE;
		if (!isset ($dbg) && $do_debug) global $dbg;
	}

    if (!isset($filter)) {
        $filter = 0; // FALSE
    } else {
    	$filter = 1; // TRUE
    }
    pnModSetVar('Permissions', 'filter', $filter);

    if (!isset($warnbar)) {
        $warnbar = 0; // FALSE
    } else {
        $warnbar = 1; // TRUE
    }
    pnModSetVar('Permissions', 'warnbar', $warnbar);

    if (!isset($rowview)) {
        $rowview = '25';
    }
    pnModSetVar('Permissions', 'rowview', $rowview);

    if (!isset($rowedit)) {
        $rowedit = '35';
    }
    pnModSetVar('Permissions', 'rowedit', $rowedit);

    pnRedirect(pnModURL('Permissions',
                        'admin',
                        'main'));
    return true;
}


/*
 * Generate menu fragment
 */
function permissions_adminmenu($permgrp = _PNPERMS_ALL)
{
    $output = new pnHTML();
    // MMaes,2003-06-23: Added sec.check
    if (!pnSecAuthAction(0, 'Permissions::', '::', ACCESS_ADMIN)) {
        $output->Text(_PERMISSIONSNOAUTH);
        return $output->GetOutput();
    }

    $output->Text(pnGetStatusMsg());
    $output->Linebreak(2);

    $output->TableStart(_PERMISSIONS);
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $columns = array();
    $columns[] = $output->URL(pnVarPrepForDisplay(pnModURL(	'Permissions',
										'admin',
										'listedit',
										array(	'permtype'	=> 'group',
												'permgrp'	=> $permgrp,
												'action'	=> 'add',
												'authid'	=> pnSecGenAuthKey('Permissions'))
										)), _NEWGROUPPERM);

    $columns[] = $output->URL(pnVarPrepForDisplay(pnModURL(	'Permissions',
    									'admin',
    									'view',
    									array(	'permtype' => 'group',
												'permgrp'	=> $permgrp)
    									)), _VIEWGROUPPERMS);

    $columns[] = $output->URL(pnVarPrepForDisplay(pnModURL( 'Permissions',
    									'admin',
    									'modifyconfig',
    									array('authid' => pnSecGenAuthKey('Permissions'))
    									)), _PERM_SETTINGS);

    $columns[] = $output->URL(pnVarPrepForDisplay(pnModURL('Permissions',
	                                  'admin',
	                                  'listedit',
	                                  array('permtype'	=> 'user',
	                                        'action'	=> 'add',
	                                        'authid'	=> pnSecGenAuthKey('Permissions'))
	    									)), _NEWUSERPERM);

    $columns[] = $output->URL(pnVarPrepForDisplay(pnModURL( 'Permissions',
    									'admin',
    									'view',
    									array('permtype' => 'user')
    									)), _VIEWUSERPERMS);

    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddRow($columns);
    $output->SetInputMode(_PNH_PARSEINPUT);

    $output->TableEnd();

    return $output->GetOutput();
}

/*
 * Generate Javascript fragment
 */
function permissions_javascript()
{
    $output = new pnHTML();

    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->Text('<script type="text/javascript">
                   function showinstanceinformation() {
                     window.open ("'. pnModURL('Permissions',
                                               'admin',
                                               'viewinstanceinfo') . '",
                                  "Instance_Information","toolbar=no,location=no,directories=no,status=no,scrollbars=yes,resizable=no,copyhistory=no,width=400,height=300");
                   }</script>');
    return $output->GetOutput();
}

?>