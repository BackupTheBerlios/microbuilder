<?php
/** Déclaration de la classe MicroBuilder_Module_Factory
 * @version    $Id: Factory.php,v 1.3 2004/07/14 23:56:12 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */

define( "MB_NONEXISTENT_MODULE", 1 );

/** Fabrique de Modules
 * @package    core
 * @subpackage factories
 * @todo       (ttes Factory: Scanner les modules au démarrage et créer une base de registre -- voir pour les perfs (cache...)
 */
class MicroBuilder_Module_Factory  {

# ---- PROPRIETES


# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function MicroBuilder_Module_Factory () {}

    /** Fabrique de modules. 
     * @param      string      $module_name */
    function make( $module_name, $params = null ) {
        $path = MicroBuilder_Module_Factory::_getModuleClassPath( $module_name );
        if ( $path ) {
            require_once $path;
            $modclass = "Module_$module_name";
            $m =& new $modclass;
        
            return $m;
        }
    }

# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /** Renvoie le chemin vers le module.
     * @param      string      $module_name
     */
    function _getModuleClassPath( $module_name ) {
        $path = MB_CONF_PREFIX . "/phplib/modules/$module_name/$module_name.php";
        if ( ! file_exists($path) ) {
            $errstack =& PEAR_ErrorStack::singleton( 'MicroBuilder' );
            $errstack->push( MB_NONEXISTENT_MODULE,
                             'error',
                             array( 'module' => $module_name ),
                             "Requested module '$module_name' does not exist." );
            return null;
        }
        return $path;
    }

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>