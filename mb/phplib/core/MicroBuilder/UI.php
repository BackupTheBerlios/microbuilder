<?php
/** D�claration de la classe MicroBuilder_UI
 * @version    $Id: UI.php,v 1.1 2004/07/13 02:09:48 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */



/** Cette classe permet de connaitre les �l�ments constitutifs de l'interface.
 * Elle est utilis�e par les th�mes.
 * @package    MicroBuilder_UI
 */
class MicroBuilder_UI  {

# ---- PROPRIETES



# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function MicroBuilder_UI () {}


    /** Liste des �l�ments de menu */
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