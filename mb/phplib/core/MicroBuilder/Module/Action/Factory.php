<?php
/** Déclaration de la classe Module_Action_Factory
 * @version    $Id: Factory.php,v 1.1 2004/07/13 02:09:48 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */



/** Fabrique d'Actions
 * @package    core
 */
class Module_Action_Factory  {

# ---- PROPRIETES
    var $_modules_dir = '/var/www/localhost/mb/phplib/modules';

    var $_registry = array();

# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function Module_Action_Factory () {
        $this->__init();
    }


    function singleton() {
        static $instance;
        if ( ! isset($instance) ) 
            $instance =& new Module_Action_Factory;
        
        return $instance;
    }
    
    /** Fabrique d'actions
     * @param      string      $action_name */
    function make( $module_name, $action_name, $params ) {

        $path = Module_Action_Factory::_getActionClassPath( $module_name, $action_name );        
        if ( $this->_errstack->hasErrors() ) return;

        require_once $path;

        $actname = Module_Action_Factory::_getActionClassName( $module_name, $action_name );

        $m =& new $actname;
        
        return $m;
    }

# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /** Renvoie le chemin vers l'action.
     */
    function _getActionClassPath( $module_name, $action_name ) {
        define( "MB_NONEXISTENT_ACTION", 2);
        $path = $_SERVER['DOCUMENT_ROOT'] . "/mb/phplib/modules/$module_name/actions/$action_name.php";
        if ( ! file_exists($path) ) {
            $this->_errstack->push( MB_NONEXISTENT_ACTION,
                                    'error',
                                    array( 'module' => $module_name, 'action' => $action_name ),
                                    "Action class declaration cannot be found at '$path'." );
            return null;
        }
        return $path;
    }


    /** Renvoie le nom de la classe d'action.
     */
    function _getActionClassName( $module_name, $action_name ) {
        $actname = $module_name. "_" .$action_name;
        return $actname;
    }

    function __init() {
        $this->_errStack =& PEAR_ErrorStack::singleton( 'MicroBuilder' );
    }


    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>