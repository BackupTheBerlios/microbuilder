<?php
/** Déclaration de la classe MicroBuilder_Theme_Factory
 * @version    $Id: Factory.php,v 1.1 2004/07/13 02:09:48 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */



/** Description de la classe.
 * @package    core
 */
class MicroBuilder_Theme_Factory  {

# ---- PROPRIETES



# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function MicroBuilder_Theme_Factory () {
        $this->_errStack =& PEAR_ErrorStack::singleton( 'MicroBuilder' );
    }


    /** Fabrique de thèmes. 
     * @param      string      $theme_name
     * @param      array       $params
     * @return     object      MicroBuilder_Theme
     */
    function make( $theme_name, $params = null ) {
        $path = MicroBuilder_Theme_Factory::_getThemeClassPath( $theme_name );

        if ( $this->_errstack->hasErrors() ) return null;
        
        else {
            
            require_once $path;
            $themeclass = "Theme_$theme_name";
            $t =& new $themeclass;
            
            return $t;
        }
    }

# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /** Renvoie le chemin vers le theme.
     */
    function _getThemeClassPath( $theme_name ) {
        $path = $_SERVER['DOCUMENT_ROOT'] . "/mb/phplib/themes/$theme_name/$theme_name.php";

        if ( ! file_exists($path) ) {

            $this->_errstack->push( 1, 'error',
                                    array('theme' => $theme_name), 
                                    "Requested theme '$theme_name' does not exist !" );
            return null;
        }

        return $path;
    }

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>