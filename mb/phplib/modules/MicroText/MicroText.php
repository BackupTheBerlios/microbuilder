<?php
/** Module Module_MicroText declaration
 * @version    $Id: MicroText.php,v 1.1 2004/07/13 02:00:40 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */

/** Module base */
require_once 'core/MicroBuilder/Module/Base.php';
require_once 'core/MicroBuilder/UI.php';


/** 
 * @package    modules
 */
class Module_MicroText extends MicroBuilder_Module_Base {

# ---- DESCRIPTION

    /** Module name 
     * @var string */
    var $__name = 'MicroText';

    /** Module summary 
     * @var string */
    var $__summary = 'Micromusic.net MicroText module';


    var $__default_action = 'ListTexts';

# ---- PROPRIETES



# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function Module_MicroText () {
        MicroBuilder_Module_Base::MicroBuilder_Module_Base();
    }

    /** */
    function toString() {
        $html = "<h1>$this->__name</h1>";
        $html .= "<h2>
                   welcome to the microtext clipboard! 
                   add text or text snippets, private notes and numbers 
                   or submit content for the microbuilder book database
                  </h2>";

        $link_pattern = '<li><a href="%s" title="%s">%s</a></li>';
        $html .= "<ul>";
        foreach( $this->getAvailableTypes() as $tname => $ttitle ) {
            $html .= sprintf( $link_pattern, 
                              $this->getURI($this->__name). "&action=ListTexts&type=".$tname,
                              $ttitle, $ttitle );
        }
        $html .= "</ul>";

        $html .= $this->_getActionsOutput();
        return $html;
    }


    /** Returns available microtext types.
     * @return       array
     */
    function getAvailableTypes() {
        return array('public'  => 'public microtext',
                     'private' => 'private microtext',
                     'book'    => 'microbuilder book microtext' );
    }

# ---- ACCESSEURS / MUTATEURS

        

# ---- METHODES PRIVEES

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>