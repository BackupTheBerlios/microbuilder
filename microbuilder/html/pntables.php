<?php
/** Definition of table and fields names.
 * @version      $Id: pntables.php,v 1.2 2004/03/18 10:32:54 mbertier Exp $
 * @package      Installer
 * @license      GPL
 */


# -- User defined prefix
$prefix = $pnconfig['prefix'];

$pntable = array();

$blocks = $prefix . '_blocks';
$pntable['blocks'] = $blocks;
$pntable['blocks_column'] = array ('bid'         => $blocks . '.pn_bid',
                                   'bkey'        => $blocks . '.pn_bkey',
                                   'title'       => $blocks . '.pn_title',
                                   'content'     => $blocks . '.pn_content',
                                   'url'         => $blocks . '.pn_url',
                                   'mid'         => $blocks . '.pn_mid',
                                   'position'    => $blocks . '.pn_position',
                                   'weight'      => $blocks . '.pn_weight',
                                   'active'      => $blocks . '.pn_active',
                                   'refresh'     => $blocks . '.pn_refresh',
                                   'last_update' => $blocks . '.pn_last_update',
                                   'blanguage'   => $blocks . '.pn_language',
                                   'language'    => $blocks . '.pn_language');

$blocks_buttons = $prefix . '_blocks_buttons';
$pntable['blocks_buttons'] = $blocks_buttons;
$pntable['blocks_buttons_column'] = array ('id'     => $blocks_buttons . '.pn_id',
                                           'bid'    => $blocks_buttons . '.pn_bid',
                                           'title'  => $blocks_buttons . '.pn_title',
                                           'url'    => $blocks_buttons . '.pn_url',
                                           'images' => $blocks_buttons . '.pn_images');

$counter = $prefix . '_counter';
$pntable['counter'] = $counter;
$pntable['counter_column'] = array ('type'  => $counter . '.pn_type',
                                    'var'   => $counter . '.pn_var',
                                    'count' => $counter . '.pn_count');

$group_perms = $prefix . '_group_perms';
$pntable['group_perms'] = $group_perms;
$pntable['group_perms_column'] = array ('pid'       => $group_perms . '.pn_pid',
                                        'gid'       => $group_perms . '.pn_gid',
                                        'sequence'  => $group_perms . '.pn_sequence',
                                        'realm'     => $group_perms . '.pn_realm',
                                        'component' => $group_perms . '.pn_component',
                                        'instance'  => $group_perms . '.pn_instance',
                                        'level'     => $group_perms . '.pn_level',
                                        'bond'      => $group_perms . '.pn_bond');

$groups = $prefix . '_groups';
$pntable['groups'] = $groups;
$pntable['groups_column'] = array ('gid'  => $groups . '.pn_gid',
                                   'name' => $groups . '.pn_name');

$hooks = $prefix . '_hooks';
$pntable['hooks'] = $hooks;
$pntable['hooks_column'] = array ('id'        => $hooks . '.pn_id',
                                  'object'    => $hooks . '.pn_object',
                                  'action'    => $hooks . '.pn_action',
                                  'smodule'   => $hooks . '.pn_smodule',
                                  'stype'     => $hooks . '.pn_stype',
                                  'tarea'     => $hooks . '.pn_tarea',
                                  'tmodule'   => $hooks . '.pn_tmodule',
                                  'ttype'     => $hooks . '.pn_ttype',
                                  'tfunc'     => $hooks . '.pn_tfunc');

$module_vars = $prefix . '_module_vars';
$pntable['module_vars'] = $module_vars;
$pntable['module_vars_column'] = array ('id'      => $module_vars . '.pn_id',
                                        'modname' => $module_vars . '.pn_modname',
                                        'name'    => $module_vars . '.pn_name',
                                        'value'   => $module_vars . '.pn_value');

$modules = $prefix . '_modules';
$pntable['modules'] = $modules;
$pntable['modules_column'] = array ('id'            => $modules . '.pn_id',
                                    'name'          => $modules . '.pn_name',
                                    'type'          => $modules . '.pn_type',
                                    'displayname'   => $modules . '.pn_displayname',
                                    'description'   => $modules . '.pn_description',
                                    'regid'         => $modules . '.pn_regid',
                                    'directory'     => $modules . '.pn_directory',
                                    'version'       => $modules . '.pn_version',
                                    'admin_capable' => $modules . '.pn_admin_capable',
                                    'user_capable'  => $modules . '.pn_user_capable',
                                    'state'         => $modules . '.pn_state');

$realms = $prefix . '_realms';
$pntable['realms'] = $realms;
$pntable['realms_column'] = array ('rid'  => $realms . '.pn_rid',
                                   'name' => $realms . '.pn_name');

$referer = $prefix . '_referer';
$pntable['referer'] = $referer;
$pntable['referer_column'] = array ('rid'       => $referer . '.pn_rid',
                                    'url'       => $referer . '.pn_url',
                                    'frequency' => $referer . '.pn_frequency');

$session_info = $prefix . '_session_info';
$pntable['session_info'] = $session_info;
$pntable['session_info_column'] = array ('sessid'    => $session_info . '.pn_sessid',
                                         'ipaddr'    => $session_info . '.pn_ipaddr',
                                         'firstused' => $session_info . '.pn_firstused',
                                         'lastused'  => $session_info . '.pn_lastused',
                                         'uid'       => $session_info . '.pn_uid',
                                         'vars'      => $session_info . '.pn_vars');

$user_data = $prefix . '_user_data';
$pntable['user_data'] = $user_data;
$pntable['user_data_column'] = array ('uda_id'       => $user_data . '.pn_uda_id',
                                       'uda_propid'  => $user_data . '.pn_uda_propid',
                                       'uda_uid'     => $user_data . '.pn_uda_uid',
                                       'uda_value'   => $user_data . '.pn_uda_value');

$user_perms = $prefix . '_user_perms';
$pntable['user_perms'] = $user_perms;
$pntable['user_perms_column'] = array ('pid'       => $user_perms . '.pn_pid',
                                       'uid'       => $user_perms . '.pn_uid',
                                       'sequence'  => $user_perms . '.pn_sequence',
                                       'realm'     => $user_perms . '.pn_realm',
                                       'component' => $user_perms . '.pn_component',
                                       'instance'  => $user_perms . '.pn_instance',
                                       'level'     => $user_perms . '.pn_level',
                                       'bond'      => $user_perms . '.pn_bond');

$user_property = $prefix . '_user_property';
$pntable['user_property'] = $user_property;
$pntable['user_property_column'] = array ('prop_id' => $user_property . '.pn_prop_id',
                                  'prop_label'      => $user_property . '.pn_prop_label',
                                  'prop_dtype'      => $user_property . '.pn_prop_dtype',
                                  'prop_length'     => $user_property . '.pn_prop_length',
                                  'prop_weight'     => $user_property . '.pn_prop_weight',
                                  'prop_validation' => $user_property . '.pn_prop_validation'
                                  );

$users = $prefix . '_users';
$pntable['users'] = $users;
$pntable['users_column'] = array ('uid'             => $users . '.pn_uid',
                                  'name'            => $users . '.pn_name',
                                  'uname'           => $users . '.pn_uname',
                                  'email'           => $users . '.pn_email',
                                  'femail'          => $users . '.pn_femail',
                                  'url'             => $users . '.pn_url',
                                  'user_avatar'     => $users . '.pn_user_avatar',
                                  'user_regdate'    => $users . '.pn_user_regdate',
                                  'user_icq'        => $users . '.pn_user_icq',
                                  'user_occ'        => $users . '.pn_user_occ',
                                  'user_from'       => $users . '.pn_user_from',
                                  'user_intrest'    => $users . '.pn_user_intrest',
                                  'user_sig'        => $users . '.pn_user_sig',
                                  'user_viewemail'  => $users . '.pn_user_viewemail',
                                  'user_theme'      => $users . '.pn_user_theme',
                                  'user_aim'        => $users . '.pn_user_aim',
                                  'user_yim'        => $users . '.pn_user_yim',
                                  'user_msnm'       => $users . '.pn_user_msnm',
                                  'pass'            => $users . '.pn_pass',
                                  'storynum'        => $users . '.pn_storynum',
                                  'umode'           => $users . '.pn_umode',
                                  'uorder'          => $users . '.pn_uorder',
                                  'thold'           => $users . '.pn_thold',
                                  'noscore'         => $users . '.pn_noscore',
                                  'bio'             => $users . '.pn_bio',
                                  'ublockon'        => $users . '.pn_ublockon',
                                  'ublock'          => $users . '.pn_ublock',
                                  'theme'           => $users . '.pn_theme',
                                  'commentmax'      => $users . '.pn_commentmax',
                                  'counter'         => $users . '.pn_counter',
                                  'timezone_offset' => $users . '.pn_timezone_offset');


?>