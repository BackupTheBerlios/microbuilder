<?php
/** Déclaration de la classe MicroBuilder_ErrorCallback
 * @version    $Id: ErrorCallback.php,v 1.2 2004/07/13 02:17:53 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */

require_once 'PEAR/ErrorStack.php';

/** Description de la classe.
 * @package    core
 */
class MicroBuilder_ErrorCallback  {

# ---- SLOTS
    var $_stack = null;

# ---- PROPRIETES

    

# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function MicroBuilder_ErrorCallback () {
        $this->_stack =& PEAR_ErrorStack::singleton( 'MicroBuilder' );        
    }


    /** ErrorCallback */
    function errorCallback( $err ) {
        switch  ($err['level'] ) {
        case 'fatal':
            die( $err['message'] );
            break;
        }
    }

# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>