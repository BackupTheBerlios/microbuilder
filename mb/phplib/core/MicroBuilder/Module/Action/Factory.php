<?php
/** Déclaration de la classe MicroBuilder_ModuleAction_Factory
 * @version    $Id: Factory.php,v 1.3 2004/07/14 23:56:12 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */



/** Fabrique d'Actions
 * @package    core
 * @subpackage factories
 */
class MicroBuilder_ModuleAction_Factory  {

# ---- PROPRIETES

# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function MicroBuilder_ModuleAction_Factory () {
        $this->__init();
    }


    function singleton() {
        static $instance;
        if ( ! isset($instance) ) 
            $instance =& new MicroBuilder_ModuleAction_Factory;
        
        return $instance;
    }
    
    /** Fabrique d'actions
     * @param      string      $action_name */
    function make( $module_name, $action_name, $params ) {

        $path = MicroBuilder_ModuleAction_Factory::_getActionClassPath( $module_name, $action_name );        
        $errstack =& PEAR_ErrorStack::singleton( $module_name );
        if ( $errstack->hasErrors() ) {
            return;
        }

        require_once $path;

        $actname = MicroBuilder_ModuleAction_Factory::_getActionClassName( $module_name, $action_name );

        $m =& new $actname;
        
        return $m;
    }

# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /** Renvoie le chemin vers l'action.
     */
    function _getActionClassPath( $module_name, $action_name ) {
        define( "MB_NONEXISTENT_ACTION", 2);
        $path = MB_CONF_PREFIX . "/phplib/modules/$module_name/actions/$action_name.php";
        if ( ! file_exists($path) ) {
            $errstack =& PEAR_ErrorStack::singleton( $module_name );
            $errstack->push( MB_NONEXISTENT_ACTION,
                             'error',
                             array( 'module' => $module_name, 'action' => $action_name ),
                             "Unknown action '$module_name::$action_name'" );
            return null;
        }
        return $path;
    }


    /** Renvoie le nom de la classe d'action.
     */
    function _getActionClassName( $module_name, $action_name ) {
        $actname = "ModuleAction_" . $module_name. "_" .$action_name;
        return $actname;
    }

    function __init() {

    }


    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>