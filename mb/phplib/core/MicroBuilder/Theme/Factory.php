<?php
/** Déclaration de la classe MicroBuilder_Theme_Factory
 * @version    $Id: Factory.php,v 1.2 2004/07/13 02:17:53 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */



/** MicroBuilder_Theme factory
 * @package    core
 * @subpackage factories
 */
class MicroBuilder_Theme_Factory  {

# ---- PROPRIETES



# ---- METHODES PUBLIQUES

    /** Constructor. */
    function MicroBuilder_Theme_Factory () {}


    /** Returns Themes instances.
     * @param      string      $theme_name
     * @param      array       $params
     * @return     object      MicroBuilder_Theme
     */
    function make( $theme_name, $params = null ) {
        $path = MicroBuilder_Theme_Factory::_getThemeClassPath( $theme_name );
        
        require_once $path;
        $themeclass = "Theme_$theme_name";
        $t =& new $themeclass;
        
        return $t;
    }

# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /** Returns theme class path
     * @param      string      $theme_name
     */
    function _getThemeClassPath( $theme_name ) {
        $path = $_SERVER['DOCUMENT_ROOT'] . "/mb/phplib/themes/$theme_name/$theme_name.php";

        if ( ! file_exists($path) ) {
            $errstack =& PEAR_ErrorStack::singleton( 'MicroBuilder' );
            $errstack->push( 1, 'fatal',
                             array('theme' => $theme_name), 
                             "Requested theme '$theme_name' does not exist !" );
        }

        return $path;
    }

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>