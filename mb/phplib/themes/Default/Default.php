<?php
/** Déclaration de la classe Theme_Default
 * @version      $Id: Default.php,v 1.1 2004/07/13 02:00:40 mbertier Exp $
 * @author       Tristan Rivoallan <mbertier@parishq.,net>
 * @licence      GPL
 */

/** Base */
require_once 'core/MicroBuilder/Theme/Base.php';

/** MicroBuilder default theme 
 * @package       themes 
*/
class Theme_Default extends MicroBuilder_Theme_Base {

    var $__name = 'Default';


    function Theme_Default() {
        MicroBuilder_Theme_Base::MicroBuilder_Theme_Base();
        $this->__init();
    }

    /** Builds page contents */
    function build() {
        // Legend
        $this->addDiv( 'legend', $this->_buildLegend() );

        // Banner
        $this->addDiv( 'banner', $this->_buildBanner() );

        // Navigation
        $this->addDiv( 'navigation', $this->_buildNavigation() );

        // Blocks
        foreach ( $this->getBlocks() as $block ) {
            $this->addDiv( $block->__name, $block->toString(), array(array('class', 'block')) );
        }

        // Main content
        $this->addDiv( 'container', $this->getMainString() );

    }

    /** Builds navigation menu's html */
    function _buildNavigation() {
        $html = "\n<ul>\n";
        $item_pattern = "\t" . '<li><a href="%s">%s</a>' . "\n";
        foreach ( $this->getNavItems() as $item ) {
            $html .= sprintf( $item_pattern, $item['url'], $item['title'] );
        }
        $html .= "</ul>";

        return $html;
    }

    /** Builds Theme legend */
    function _buildLegend() {
        $html ='<h1>Legend: </h1>
                <p>Navigation : <div id="navigation"></div></p>
                <p>Blocks : <div class="block"></div></p>
                <p>Main : <div id="container"></div></p>
                <p>Undefined : <div></div></p>';

        return $html;
        
    }

    /** Builds page banner. */
    function _buildBanner() {
        $html = $this->_makeImg( 'banner' );
        return $html;
    }

    /** Returns IMG tag for requested image. */
    function _makeImg( $img ) {
        $pattern = '<img src="themes/'.$this->__name.'/img/'.$img.'.gif" />';
        $html = sprintf( $pattern, $img );
        return $html;
    }

    function __init() {
        $this->addStylesheet( "themes/$this->__name/css/screen.css" );
    }
    

}
?>