<?php
/** Déclaration de la classe MicroBuilder_UI
 * @version    $Id: UI.php,v 1.2 2004/07/13 02:17:53 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */



/** Cette classe permet de connaitre les éléments constitutifs de l'interface.
 * Elle est utilisée par les thèmes.
 * @package    core
 */
class MicroBuilder_UI  {

# ---- PROPRIETES



# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function MicroBuilder_UI () {}


    /** Liste des éléments de menu */
    function getNavItems() {
        $menu = array( 
                      array('title' => 'MicroNews',
                            'url'   => '/mb/www/test.php?module=MicroNews'),
                      array('title' => 'MicroText',
                            'url'   => '/mb/www/test.php?module=MicroText') );

        return $menu;
    }

    /** Lists module blocks that should be displayed.
     * Returned array looks like this : 
     *  <code>array( 'module_name' => array('block1', 'block2', 'blockn') )</code>
     *
     * @return      array
     */
    function getBlocks() {
        $blocks = array( 'MicroText' => array('AddText', 'TestErrorBlocks') );
        return $blocks;
    }


# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>