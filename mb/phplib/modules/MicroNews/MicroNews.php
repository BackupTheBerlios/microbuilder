<?php
/** Module Module_MicroNews declaration
 * @version    $Id: MicroNews.php,v 1.1 2004/07/13 02:00:40 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */

/** Module base */
require_once 'core/MicroBuilder/Module/Base.php';

/** 
 * @package    modules
 */
class Module_MicroNews extends MicroBuilder_Module_Base {

# ---- DESCRIPTION

    /** Module name 
     * @var string */
    var $__name = 'MicroNews';

    /** Module summary 
     * @var string */
    var $__summary = 'Micromusic.net news';

    /** Default Action
     * @var string */
    var $__default_action = 'ReadNews';

# ---- PROPRIETES



# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function Module_MicroNews () {
        MicroBuilder_Module_Base::MicroBuilder_Module_Base();
    }

    function toString() {
        $html = '<h1>MicroNews</h1>';
        $html .= "<p class=\"module_abstract\">
                   In this section you'll find the newz you can't afford to miss.
                   we scan any sources and present the essential informations here.
                   it's all about digital lifestyle, music and weird stuff.
                  </p>";

        $html .= $this->_makeSearchForm();

        $html .= $this->_getActionsOutput();
        
        return $html;
    }

    /** Builds search bar html code */
    function _makeSearchForm() {
        $html_pattern = '<form name="%s" action="" method="GET">
                          <input type="text" name="searchterms" />
                          <input type="hidden" name="module" value="'.$this->__name.'" />
                          <input type="hidden" name="action" value="SearchNews" />
                          <input type="submit" value="submit" />
                         </form>';

        $html = sprintf( $html_pattern, "form-$this->__name" );
        
        return $html;        
    }

# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>