<?php
/** Déclaration de la classe MicroBuilder_Theme_Base
 * @version    $Id: Base.php,v 1.2 2004/07/13 02:17:53 mbertier Exp $
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

    /** Page blocks
     * @var array */
    var $_blocks = null;

    /** Module to display
     * @var array Mixed: either string or objects with impletmented toString method */
    var $_main = array();

    /** Nav items 
     * @var array */
    var $_navItems;

# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function MicroBuilder_Theme_Base () {
        HTML_Page2::HTML_Page2();
    }

    /** Ajout d'un DIV à la page.
     * @param      string      $id
     * @param      string      $contents
     * @param      array       tag arguments array( array('paramname' => 'paramvalue') )
     */
    function addDiv( $id, $contents = '', $args = array() ) {
        $html = $this->_makeDiv( $id, $contents, $args );
        $this->addBodyContent( $html );
    }

    /** Retourne le code HTML d'un div
     * @param      array       tag arguments array( array('paramname', 'paramvalue') )
     */
    function _makeDiv( $id, $contents = '', $args = array() ) {
        $args_string = '';
        foreach ( $args as $arg ) {
            $args_string .= $arg[0]. '="' .$arg[1]. '" ';
        }
        $div_pattern = '<div id="%s" '. $args_string. '>%s</div>';
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
    * @abstract
    */
    function build() {}



# ---- ACCESSEURS / MUTATEURS

    /** Returns page blocks
     * @return      array      Array of references to ModuleBlocks instances
     */
    function getBlocks() {
        return $this->_blocks;
    }

    /** Adds a new Block
     * @param      object MicroBuilder_Module_Block      $block
     */
    function addBlock( &$block ) {
        $this->_blocks[$block->__name] = $block;
    }

    /** Adds main contents
     * @var      object MicroBuilder_Module       Reference to the module instance.
     */
    function addToMain( $content ) {
        $this->_main[] = $content;
    }

    /** Returns main contents
     * @return    array
     */
    function getMain() {
        return $this->_main;
    }

    /** Returns main contents' string representation 
     * @return      string 
     */
    function getMainString() {
        $str = null;
        foreach ( $this->getMain() as $c ) {
            // Strings
            if ( is_string($c) ) $str .= $c;

            // Objects
            elseif ( is_object($c) && method_exists($c, 'toString') ) 
                $str .= $c->toString();

            // Ignore everything else
            else continue;
        }
        
        return $str;
    }


    /** Adds a nav items
     * @param      array      $item array( 'title' => $title, 'url' => $url )
     */
    function addNavItem( $item ) {
        $this->_navItems[] = $item;
    }

    /** Returns nav items
     * @return      array
     */
    function getNavItems() {
        return $this->_navItems;
    }

# ---- METHODES PRIVEES



    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>