<?php 
/** Functions providing multilanguage functionality to the installer.
 * @version      $Id: language.php,v 1.2 2004/03/13 01:35:01 mbertier Exp $
 * @package      Installer
 * @license      GPL
 * @author       Gregor J. Rothfuss
 */


/** Loads the required language file for the installer. 
 * @todo     Find out what is $language !
 * @todo     Find out why postnuke UI strings have to be loaded
*/
function installer_get_language() {
    global $currentlang;
    
    // English is default language
    if ( ! isset($currentlang) ) $currentlang = 'eng';

    // Loads strings for installer UI
    if (file_exists($file = "install/lang/$currentlang/global.php")) {
        @include $file;
    } elseif (file_exists($file = "install/lang/$language/global.php")) {
        @include $file;
    } 

    // Loads strings for postnuke UI (?!)
    if (file_exists($file = "language/$currentlang/global.php")) {
        @include $file;
    } elseif (file_exists($file = "language/$language/global.php")) {
        @include $file;
    } 
} 


/** Make common language selection dropdown.
 * Dropdown corresponds to contents of install/lang.
 * @author     Tim Litwiller */
function lang_dropdown() {
    global $currentlang;

    echo "<select name=\"alanguage\" class=\"pn-text\">";

    $lang = languagelist();

    // List install/lang
    $handle = opendir('install/lang');
    while ($f = readdir($handle)) {
        if (is_dir("install/lang/$f") && @$lang[$f]) {
            $langlist[$f] = $lang[$f];
        } 
    } 

    asort($langlist);

    // Generation of html code
    foreach ($langlist as $k => $v) {
        echo '<option value="' . $k . '"';

        if ($currentlang == $k) {
            echo ' selected';
        } 

        echo '>' . $v . '</option> ';
    } 
    echo "</select>";
} 


/** List of all availabe languages.
 * @return      array      Hash containing codes of all available lanquages 
 * @author      Patrick Kellum <webmaster@ctarl-ctarl.com> */
function languagelist() { 
    // All entries use ISO 639-2/T
    $lang['ara'] = _LANGUAGE_ARA; // Arabic
    $lang['bul'] = _LANGUAGE_BUL; // Bulgarian
    $lang['zho'] = _LANGUAGE_ZHO; // Chinese
    $lang['ces'] = _LANGUAGE_CES; // Czech
    $lang['hrv'] = _LANGUAGE_HRV; // Croatian HRV
    $lang['cro'] = _LANGUAGE_CRO; // Croatian  CRO
    $lang['dan'] = _LANGUAGE_DAN; // Danish
    $lang['nld'] = _LANGUAGE_NLD; // Dutch
    $lang['eng'] = _LANGUAGE_ENG; // English
    $lang['epo'] = _LANGUAGE_EPO; // Esperanto
    $lang['est'] = _LANGUAGE_EST; // Estonian
    $lang['fin'] = _LANGUAGE_FIN; // Finnish
    $lang['fra'] = _LANGUAGE_FRA; // French
    $lang['deu'] = _LANGUAGE_DEU; // German
    $lang['ell'] = _LANGUAGE_ELL; // Greek, Modern (1453-)
    $lang['heb'] = _LANGUAGE_HEB; // Hebrew
    $lang['hun'] = _LANGUAGE_HUN; // Hungarian
    $lang['isl'] = _LANGUAGE_ISL; // Icelandic
    $lang['ind'] = _LANGUAGE_IND; // Indonesian
    $lang['ita'] = _LANGUAGE_ITA; // Italian
    $lang['jpn'] = _LANGUAGE_JPN; // Japanese
    $lang['kor'] = _LANGUAGE_KOR; // Korean
    $lang['lav'] = _LANGUAGE_LAV; // Latvian
    $lang['lit'] = _LANGUAGE_LIT; // Lithuanian
    $lang['mas'] = _LANGUAGE_MAS; // Malay
    $lang['mkd'] = _LANGUAGE_MKD; // Macedonian      
    $lang['nor'] = _LANGUAGE_NOR; // Norwegian
    $lang['pol'] = _LANGUAGE_POL; // Polish
    $lang['por'] = _LANGUAGE_POR; // Portuguese
    $lang['ron'] = _LANGUAGE_RON; // Romanian
    $lang['rus'] = _LANGUAGE_RUS; // Russian
    $lang['slv'] = _LANGUAGE_SLV; // Slovenian
    $lang['spa'] = _LANGUAGE_SPA; // Spanish
    $lang['swe'] = _LANGUAGE_SWE; // Swedish
    $lang['tha'] = _LANGUAGE_THA; // Thai
    $lang['tur'] = _LANGUAGE_TUR; // Turkish
    $lang['ukr'] = _LANGUAGE_UKR; // Ukrainian
    $lang['yid'] = _LANGUAGE_YID; // Yiddish 

    // Non-ISO entries are written as x_[language name]
    $lang['x_brazilian_portuguese'] = _LANGUAGE_X_BRAZILIAN_PORTUGUESE; // Brazilian Portuguese
    $lang['x_klingon'] = _LANGUAGE_X_KLINGON; // Klingon
    $lang['x_rus_koi8r'] = _LANGUAGE_X_RUS_KOI8R; // Russian KOI8-R 
    // end of list

    return $lang;

} 

?>