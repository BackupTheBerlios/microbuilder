<?php
/** Déclaration de la classe MicroBuilder_Theme_Base
 * @version    $Id: Base.php,v 1.1 2004/07/13 02:09:48 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */


/***/
require_once 'HTML/Page2.php';



/** Page du site.
 * @package    core
 */
class MicroBuilder_Theme_Base extends HTML_Page2 {

# ---- PROPRIETES
    /** Corps de la page..
     * @var array */
    var $_container = array();


# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function MicroBuilder_Theme_Base () {
        HTML_Page2::HTML_Page2();
    }

    /** Ajout d'un DIV à la page.
     * @param      string      $id
     * @param      string      $contents
     */
    function addDiv( $id, $contents = '' ) {
        $html = $this->_makeDiv( $id, $contents );
        $this->addBodyContent( $html );
    }

    /** Retourne le code HTML d'un div
     */
    function _makeDiv( $id, $contents = '' ) {
        $div_pattern = '<div id="%s">%s</div>';
        $html = sprintf( $div_pattern, $id, $contents ); 

        return $html;
    }
    
    /** Ajout de contenu au corps du module.
     * @var        string      $content
     * @var        bool        $prepend      Prepend content if true
     */
    function addContent( $content = '', $prepend = false ) {
        $this->_container[] = $content;
    }
 
   /** Constitution du code HTML de la page.
    */
    function build() {}



# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES



    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>