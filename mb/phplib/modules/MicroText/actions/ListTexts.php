<?php
/** Module action ModuleAction_MicroText_ListTexts declaration.
 * @version    $Id: ListTexts.php,v 1.1 2004/07/13 02:00:40 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */

/** Actions base class */
require_once 'core/MicroBuilder/Module/Action/Base.php';

/** Action description.
 * @package    modules
 * @subpackage actions
 */
class ModuleAction_MicroText_ListTexts extends MicroBuilder_ModuleAction_Base {

# ---- DESCRIPTION
    /** Action name
     * @var string */
    var $__name = 'ListTexts';
    
    /** Action summary
     * @var string */
    var $__summary = 'Lists available microtexts';

    /** Associated module
     * @var string */
    var $__module = 'MicroText';

    /** Action args
     * @var array */
    var $__args = array( 'type' => 'public' );

# ---- PROPRIETES
    var $_string;


# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function ModuleAction_MicroText_ListTexts () {
        MicroBuilder_ModuleAction_Base::MicroBuilder_ModuleAction_Base();
    }


    /** Execute action */
    function execute( $params = null ) {
        if ( $this->_checkParams( $params ) ) {
            $this->_string = $this->_buildHtmlList( $params['type'] );
        }

        else return;
    }


    /** */
    function toString() {
        return $this->_string;
    }

# ---- ACCESSEURS / MUTATEURS
    


# ---- METHODES PRIVEES

    /** Constitution de la liste de textes demandée
     * @param      string      $type 
     * @return     string
     */
    function _buildHtmlList( $type ) {
        return "MicroText List: $type";
    }

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>