<?php
/** Module action ModuleAction_MicroNews_ReadNews declaration.
 * @version    $Id: ReadNews.php,v 1.1 2004/07/13 02:00:40 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */

/** Actions base class */
require_once 'core/MicroBuilder/Module/Action/Base.php';

/** Action description.
 * @package    modules
 * @subpackage actions
 */
class ModuleAction_MicroNews_ReadNews extends MicroBuilder_ModuleAction_Base {

# ---- DESCRIPTION
    /** Action name
     * @var string */
    var $__name = 'ReadNews';
    
    /** Action summary
     * @var string */
    var $__summary = 'Diplays latest news.';

    /** Action args
     * @var array */
    var $__args = array( 'nb_news' => 10 );

    /** Associated module name 
     * @var string */
    var $__module = 'MicroNews';

# ---- PROPRIETES



# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function ModuleAction_MicroNews_ReadNews () {}


    /** Execute action */
    function execute( $params = null ) {
        if ( $this->_checkParams( $params ) ) {
            $this->_string = 'Ze News !';
        }

        else return;
    }


    function toString() {
        return $this->_string;
    }

# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>