<?php
/** Déclaration de la classe MicroBuilder_UI
 * @version    $Id: UI.php,v 1.1 2004/07/13 02:09:48 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */



/** Cette classe permet de connaitre les éléments constitutifs de l'interface.
 * Elle est utilisée par les thèmes.
 * @package    MicroBuilder_UI
 */
class MicroBuilder_UI  {

# ---- PROPRIETES



# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function MicroBuilder_UI () {}


    /** Liste des éléments de menu */
    function getMenuItems() {
        $menu = array( 
                      array('title' => 'Module de Test',
                            'url'   => '/mb/www/test.php?module=Test') );

        return $menu;
    }

# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>