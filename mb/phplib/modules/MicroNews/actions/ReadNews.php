<?php
/** Module action ModuleAction_MicroNews_ReadNews declaration.
 * @version    $Id: ReadNews.php,v 1.2 2004/07/15 17:28:22 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */

/** Actions base class */
require_once 'core/MicroBuilder/Module/Action/Base.php';

/** Auth */
require_once 'core/MicroBuilder/Auth/Auth.php';

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
     *  - nb_news: number of news to display
     * @var array */
    var $__args = array( 'nb_news' => array('DEFAULT' => 10,
                                            'REGEX'   => '/^\d+$/') );

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
            $user =& MicroBuilder_Auth::getUser();
            echo $user->may->read();
            if ( ! $user->may->read($this->__module) ) {
                $this->_string = 'Permission denied';
                return;
            }

            $this->_string = 'Ze News !';
            $this->_string .= "<br />Displaying ".$params['nb_news']." news.";
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