<?php
/** Déclaration de la classe Module_Action_Base
 * @version    $Id: Base.php,v 1.1 2004/07/13 02:09:48 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */



/** Action de module.
 * @package    core
 * @abstract
 */
class Module_Action_Base  {

# ---- PROPRIETES


# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function Module_Action_Base () {}

    /** Exécution de l'action. */
    function execute( $params = null ) {}


        

# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>