<?php
/** Déclaration de la classe MicroBuilder_ModuleBlock_Factory
 * @version    $Id: Factory.php,v 1.3 2004/07/15 17:28:22 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */



/** Fabrique de Blocks
 * @package    core
 * @subpackage factories
 */
class MicroBuilder_ModuleBlock_Factory  {

# ---- PROPRIETES


# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function MicroBuilder_ModuleBlock_Factory () {}

    /** Fabrique de modules. 
     * @param      string      $module_name
     * @param      string      $block_name
     * @param      array       $params
     */
    function make( $module_name, $block_name, $params = null ) {
        $path = MicroBuilder_ModuleBlock_Factory::_getBlockClassPath( $module_name, $block_name );
        if ( $path ) {
            require_once $path;
            $modclass = "ModuleBlock_" . $module_name. "_" . $block_name;
            $m =& new $modclass;
        
            return $m;
        }

        else return null;
    }

    /** Special fabric for core blocks 
     * @param      string      $block_name
     */
    function makeCoreBlock( $block_name ) {
        $path = "core/MicroBuilder/Module/Block/ErrorBlock.php";
        require_once $path;
        $block =& new MicroBuilder_ErrorBlock;
        return $block;
    }
    

# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /** Renvoie le chemin vers le block.
     * @param      string      $module_name
     * @param      string      $block_name
     */
    function _getBlockClassPath( $module_name, $block_name ) {
        $path = MB_CONF_PREFIX . "/phplib/modules/$module_name/blocks/$block_name.php";
        if ( ! file_exists($path) ) {
            $errstack =& PEAR_ErrorStack::singleton( 'MicroBuilder' );
            $errstack->push( MB_NONEXISTENT_BLOCK,
                             'error',
                             array( 'block'  => $block_name,
                                    'module' => $module_name )
                              ); 
            return null;
        }
        return $path;
    }

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>