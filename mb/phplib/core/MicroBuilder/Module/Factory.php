<?php
/** Déclaration de la classe MicroBuilder_Module_Factory
 * @version    $Id: Factory.php,v 1.1 2004/07/13 02:09:48 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */



/** Fabrique de Modules
 * @package    core
 * @todo       (ttes Factory: Scanner les modules au démarrage et créer une base de registre -- voir pour les perfs (cache...)
 */
class MicroBuilder_Module_Factory  {

# ---- PROPRIETES
    var $_modules = array();


# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function MicroBuilder_Module_Factory () {
        
    }

    /** Fabrique de modules. 
     * @param      string      $module_name */
    function make( $module_name, $params = null ) {

        require_once MicroBuilder_Module_Factory::_getModuleClassPath( $module_name );
        $modclass = "Module_$module_name";
        $m =& new $modclass;
        
        return $m;
    }

# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /** Renvoie le chemin vers le module.
     * @param      string      $module_name
     */
    function _getModuleClassPath( $module_name ) {
        $path = "modules/$module_name/$module_name.php";
        return $path;
    }

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>