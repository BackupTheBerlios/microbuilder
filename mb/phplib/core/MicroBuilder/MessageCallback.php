<?php
/** Déclaration de la classe MicroBuilder_MessageCallback
 * @version    $Id: MessageCallback.php,v 1.1 2004/07/15 17:35:47 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */



/** Description de la classe.
 * @package    core
 */
class MicroBuilder_MessageCallback  {

# ---- PROPRIETES

    /** Error verbosity level
     * @var int */
    var $verbosity = 0;

# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function MicroBuilder_MessageCallback () {}


    function messageCallback( &$stack, $err ) {
        $msg = $stack->getErrorMessage( $stack, $err );
        if ( $this->verbosity == 1 ) {
            $msg .= "<br />\n";
            foreach( $err['params'] as $param => $val ) {
                $pattern = " + <strong>$param : </strong> $val<br/>\n";
                $msg .= sprintf( $pattern, $param, $val );
            }
        }
        return $msg;
    }


# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>

