<?php // File: $Id: global.php,v 1.1 2004/03/01 10:09:14 mbertier Exp $ $Name:  $
//
// Original Author of file: Gregor J. Rothfuss
// Purpose of file: Installer language defines.
//
//
// please post comments regarding german translation at
// http://www.pncommunity.de
// last changes: 2003/06/30 larsneo
//

define('_VERSION_WARNING','Offizielle PostNuke Distributionen sind bei <a href="http://download.postnuke.com/" target="_blank">postnuke.com</a>verfügbar.<br>Service und Support zu PostNuke in deutscher Sprache unter <a href="http://www.post-nuke.net/" target="_blank">post-nuke.net</a>.');

define("_INSTALL_REMINDERBLOCK","Bitte daran denken<br>&middot;<b>install.php</b> (Datei)<br>&middot;<b>install</b> (Verzeichnis)<br />aus dem PostNuke Verzeichnis zu löschen.<br />Ansonsten können die Verbindungsdaten zur Datenbank von Unbefugten eingesehen werden!<br /><br /><i>Anmerkung: Dieser Block kann in Administration-Blöcke bearbeitet werden.</i>");

define("_INSTALL_ADMINMESSAGE_TITLE","PostNuke, =-Phoenix-= Release (0.726)");

define("_INSTALL_ADMINMESSAGE_TEXTE","PostNuke ist ein Content Management System (CMS) das Inhalte von Design und Technik trennt. Die Inhalte einer Internetpräsenz (zum Beispiel Artikel, Links, Downloads, FAQs, Bildergalerien, Foren etc.) können dabei direkt via Browser verwaltet werden. Durch die klare Aufgliederung in Form, Funktion, Inhalt und Gestaltung hilft PostNuke, die Kosten und den Aufwand beim Betrieb einer Website zu reduzieren.<br /><br />
PostNuke ist modular aufgebaut - die zentralen Funktionen (Benutzermanagement, Berechtigungssystem, API) werden vom sogenannten Core übernommen, der Leistungsumfang kann darüberhinaus individuell angepasst und nahezu beliebig erweitert werden.<br /><br />
<b>Das deutsche Sprachpaket sowie Support und Dokumentation zu PostNuke gibt es bei <a href=\"http://www.post-nuke.net\" target=\"_blank\">post-nuke.net</a>.</b><br /><br />
<i>Anmerkung: Diese Meldung kann in Administration-Admin Nachrichten bearbeitet werden.</i>");

define('_FOOTMSGTEXT','<br /><a href="http://www.post-nuke.net" target="_blank"><img src="images/powered/postnuke.butn.gif" border="0" alt="Website powered by PostNuke" hspace="10" /></a> <a href="http://php.weblogs.com/ADODB" target="_blank"><img src="images/powered/adodb2.gif" alt="ADODB database library" border="0" hspace="10" /></a><a href="http://www.php.net" target="_blank"><img src="images/powered/php2.gif" alt="PHP Language" border="0" hspace="10" /></a><br /><br /><a href="modules.php?op=modload&amp;name=legal&amp;file=index">Allgemeine Nutzungsbedingungen</a> | <a href="modules.php?op=modload&amp;name=legal&amp;file=privacy">Datenschutzhinweis</a> | <a href="index.php?module=Credits">Credits</a><br />Diese WebSite wurde mit <a href="http://www.post-nuke.net" target="_blank">PostNuke</a> erstellt - PostNuke ist als freie Software unter der <a href="http://www.gnu.org" target="_blank">GNU/GPL Lizenz</a> erhältlich.<br />RSS-News-Syndikation über <a href="backend.php">backend.php</a><br /><i>Anmerkung: Diese Meldung kann in Administration-Einstellungen bearbeitet werden.</i>                                                  ');

define('_BLOCKTITLE_INCOMING','wartend'); 
define('_BLOCKTITLE_WHOISONLINE','Online'); 
define('_BLOCKTITLE_OTHERSTORIES','weitere Beiträge'); 
define('_BLOCKTITLE_USERSBLOCK','Benutzer-Block'); 
define('_BLOCKTITLE_SEARCHBOX','Such-Block'); 
define('_BLOCKTITLE_EPHEMERIDS','Ephemeriden'); 
define('_BLOCKTITLE_LANGUAGES','Sprachen'); 
define('_BLOCKTITLE_CATMENU','Kategorien'); 
define('_BLOCKTITLE_RANHEAD','zufällige Beiträge'); 
define('_BLOCKTITLE_POLL','Umfrage'); 
define('_BLOCKTITLE_BIGSTORY','heutiger Top-Beitrag'); 
define('_BLOCKTITLE_USERSLOGIN','Anmeldung'); 
define('_BLOCKTITLE_PASTART','ältere Beiträge'); 
define('_BLOCKTITLE_ADMINMESS','Admin-Nachrichten'); 
define('_BLOCKTITLE_REMINDER','WICHTIG'); 
define('_BLOCKTITLE_USERSBLOCK_TEXTE','frei konfigurierbar'); 

define('_POLLDESCTEXT','PostNuke...'); 
define('_POLLDATATEXT1','...was ist das?'); 
define('_POLLDATATEXT2','...ist das, was ich brauchte!'); 
define('_POLLDATATEXT3','...benutze ich schon lange!'); 

define('_REWIEWSMAINTITLE','Rezensionen'); 
define('_REWIEWSMAINDESC','Beschreibung der Rezensionen'); 

define('_BLOCKTITLE_MAINMENU','Hauptmenü');
define('_BLOCKTITLE_MAINMENU_ADMIN','Administration');
define('_BLOCKTITLE_MAINMENU_ADMINALT','Administration der Website');
define('_BLOCKTITLE_MAINMENU_AVANTGO','AvantGo');
define('_BLOCKTITLE_MAINMENU_AVANTGOALT','für PDA formatierte Beiträge');
define('_BLOCKTITLE_MAINMENU_DL','Downloads');
define('_BLOCKTITLE_MAINMENU_DLALT','Download-Bereich');
define('_BLOCKTITLE_MAINMENU_FAQ','FAQ');
define('_BLOCKTITLE_MAINMENU_FAQALT','häufig gestellte Fragen');
define('_BLOCKTITLE_MAINMENU_HOME','Home');
define('_BLOCKTITLE_MAINMENU_HOMEALT','zurück zur Homepage');
define('_BLOCKTITLE_MAINMENU_MLIST','Mitglieder');
define('_BLOCKTITLE_MAINMENU_MLISTALT','Mitgliederliste der Website');
define('_BLOCKTITLE_MAINMENU_NEWS','Beiträge');
define('_BLOCKTITLE_MAINMENU_NEWSALT','Beiträge auf der Website');
define('_BLOCKTITLE_MAINMENU_RUS','Weiterempfehlen');
define('_BLOCKTITLE_MAINMENU_RUSALT','diese Seite weiterempfehlen');
define('_BLOCKTITLE_MAINMENU_RWS','Rezensionen');
define('_BLOCKTITLE_MAINMENU_RWSALT','Rezensions-Bereich');
define('_BLOCKTITLE_MAINMENU_SEARCH','Suche');
define('_BLOCKTITLE_MAINMENU_SEARCHALT','Suche auf dieser Seite');
define('_BLOCKTITLE_MAINMENU_SECTIONS','Sektionen');
define('_BLOCKTITLE_MAINMENU_SECTIONSALT','Sektions-Bereich');
define('_BLOCKTITLE_MAINMENU_SNEWS','Beiträge einreichen');
define('_BLOCKTITLE_MAINMENU_SNEWSALT','Beiträge zur Veröffentlichung einreichen');
define('_BLOCKTITLE_MAINMENU_STATS','Statistiken');
define('_BLOCKTITLE_MAINMENU_STATSALT','Abrufstatistiken der Seite');
define('_BLOCKTITLE_MAINMENU_TLIST','Top-Liste');
define('_BLOCKTITLE_MAINMENU_TLISTALT','Top-Liste der Seite');
define('_BLOCKTITLE_MAINMENU_TOPICS','Themen');
define('_BLOCKTITLE_MAINMENU_TOPICSALT','Aufstellung der Themen');
define('_BLOCKTITLE_MAINMENU_USER','Einstellungen');
define('_BLOCKTITLE_MAINMENU_USERALT','individuelle Einstellungen');
define('_BLOCKTITLE_MAINMENU_USEREXIT','Abmeldung');
define('_BLOCKTITLE_MAINMENU_USEREXITALT','Abmeldung von dieser Seite');
define('_BLOCKTITLE_MAINMENU_WLINKS','Weblinks');
define('_BLOCKTITLE_MAINMENU_WLINKSALT','Weblinks-Bereich');


define("_ADMIN_EMAIL","Admin-E-Mail");
define("_ADMIN_LOGIN","Admin-Login");
define("_ADMIN_NAME","Admin-Name");
define("_ADMIN_PASS","Admin-Passwort");
define("_ADMIN_REPEATPASS","Admin-Passwort (wiederholen)");
define("_ADMIN_URL","Admin-URL");
define('_BTN_CHANGEINFO','Info ändern');
define('_BTN_NEWINSTALL','Neue Installation');
define('_BTN_UPGRADE','Upgrade');
define("_BTN_CONTINUE","fortfahren");
define("_BTN_FINISH","beenden");
define("_BTN_NEXT","weiter");
define("_BTN_RECHECK","nochmals prüfen");
define("_BTN_SET_LANGUAGE","Sprache setzen");
define("_BTN_SET_LOGIN","Login setzen");
define("_BTN_START","Start");
define("_BTN_SUBMIT","abschicken");
define("_CHANGE_INFO_1","Bitte die Datenbank-Information korrigieren");
define("_CHARSET","ISO-8859-1");
define("_CHMOD_CHECK_1","CHMOD-Überprüfung");
define("_CHMOD_CHECK_2","Es wird zuerst überprüft, ob die Schreibrechte (CHMOD) von config.php und config-old.php korrekt gesetzt sind, ansonsten wird dieses Skript nicht in der Lage sein, die Datenbank-Informationen zu verschlüsseln.<br />Die Verschlüsselung der Datenbank-Informationen ist eine zusätzliche Sicherheit.");
define("_CHMOD_CHECK_3","Schreibrechte (CHMOD) für config.php sind 666 - korrekt, das Skript kann in die Datei schreiben.");
define("_CHMOD_CHECK_4","Bitte die Schreibrechte (CHMOD) für config.php auf 666 setzen, damit das Skript in die Datei schreiben kann.");
define("_CHMOD_CHECK_5","Schreibrechte (CHMOD) für config-old.php sind 666 - korrekt, das Skript kann in die Datei schreiben.");
define("_CHMOD_CHECK_6","Bitte die Schreibrechte (CHMOD) für config-old.php auf 666 setzen, damit das Skript in die Datei schreiben kann.");
define("_CHM_CHECK_1", "Bitte die Datenbank-Informationen eingeben.<br />Falls kein Root-Zugriff auf MySQL besteht, können keine neuen Datenbanken angelegt werden - in diesem Fall die Datenbank angeben, in die das Skript die erforderlichen Tabellen anlegen soll.");
define("_CONTINUE_1","Datenbankeinstellungen setzen");
define("_CONTINUE_2","<br />Jetzt sollte der Administrator-Account individuell eingerichtet werden - ansonsten ist der Benutzername <b>Admin</b> und das Passwort <b>Password</b> (Achtung Gross/Kleinschreibung beachten).<br /><b>Eine individuelle Einstellung ist aus Sicherheitsgründen dringend empfohlen!</b>");
define("_DBHOST","Datenbank-Server");
define("_DBINFO","Datenbank-Informationen<br />");
define("_DBNAME","Name der Datenbank");
define("_DBPASS","Passwort des Datenbank-Benutzers");
define("_DBPREFIX","Tabellenpräfix (für Table-Sharing)");
define("_DBTYPE","Datenbank");
define("_DBTABLETYPE","Datenbank-Tabellen-Typ");
define("_DBUNAME","Name des Datenbank-Benutzers");
define("_DEFAULT_1","Dieses Skript wird die PostNuke Datenbank installieren und helfen, alle notwendigen Grundeinstellungen vorzunehmen.<br />Es wird nun Schritt für Schritt durch die Installation geführt, der geschätzte Zeitaufwand beträgt rund 10 Minuten.<br />Bei Problemen während der Installation bitte an den PostNuke Support (http://www.post-nuke.net) wenden.");
define("_DEFAULT_2","Lizenz:<br />");
define("_DEFAULT_3","Bitte die GNU General Public License durchlesen.<br /> PostNuke wird als freie Software entwickelt, aber es gibt bestimmte Bedingungen für die Distribution und Veränderungen.");
define("_DONE","Fertig.");
define("_FINISH_1","Danksagungen");
define("_FINISH_2","<br />Das sind die Skripte und Personen, welche PostNuke ausmachen - wir freuen uns über jede Art von Feedback unserer Benutzer.<br />Wir können immer Hilfe gebrauchen - wer hier gelistet werden möchte, sollte uns einfach kontaktieren.");
define("_FINISH_3","<b>Die Installation ist nun abgeschlossen.<br /><br />Deutschsprachiger Support und Dokumentation zu PostNuke unter <a href=\"http://www.post-nuke.net\" target=_blank>http://www.post-nuke.net</a><br /><br /><font color=\"#990000\">Die Installations-Skripte (install.php sowie der /install-Ordner) werden nun nicht mehr benötigt und sollten gelöscht werden.</font></b>");
define("_FINISH_4","Zur neu eingerichteten PostNuke-Seite");
define("_FOOTER_1","Willkommen in der PostNuke-Gemeinschaft und Danke für die Wahl von PostNuke als Content Management System!");
define("_FORUM_INFO_1","Die Forum Tabellen sind unverändert.<br />Es handelt sich um folgende Tabellen:");
define("_FORUM_INFO_2","Diese Tabellen können gelöscht werden, wenn kein Forum verwendet werden soll. Bei http://mods.postnuke.com findet man eine grosse Anzahl an Forum-Modulen.");
define("_INPUT_DATA_1","Daten gespeichert");
define("_INSTALLATION","PostNuke-Installation");
define("_ISINTRANET","Installation im Intranet?");
define('_INTRANETINFO','Die "Intranet"-Option muss nur bei Installationen ohne "vollqualifizierten" Domainnamen angewählt werden. Beispiele für "qualifizierte" Domainnamen sind www.postnuke.com und foo.bar.com, aber auch z.B. 127.0.0.1 - Beispiele für "unqualifizierte" Domainnamen sind foo.com, localhost und mysite.org. Wenn dieser Parameter nicht richtig gesetzt wird, ist unter Umständen kein Login möglich!<p>');
define("_MADE"," angelegt.");
define("_MAKE_DB_1","Die Datenbank konnte nicht angelegt werden.");
define("_MAKE_DB_2","wurde angelegt.");
define("_MAKE_DB_3","Keine Datenbank angelegt.<br />");
define("_MODIFY_FILE_1","Fehler beim Lesezugriff auf Datei:");
define("_MODIFY_FILE_2","Fehler beim Schreibzugriff auf Datei:");
define("_MODIFY_FILE_3","0 Zeilen geändert.");
define("_MYPHPNUKE_1","Upgrade von MyPHPNuke 1.8.7?");
define("_MYPHPNUKE_2","<b>MyPHPNuke 1.8.7</b> anklicken.");
define("_MYPHPNUKE_3","Upgrade von MyPHPNuke 1.8.8b2?");
define("_MYPHPNUKE_4","<b>MyPHPNuke 1.8.8</b> anklicken.");
define("_NEWTABLES_1","Datenbank konnte nicht ausgewählt werden. Die Datenbank muss entweder manuell angelegt werden oder kann - falls Root-Zugriff besteht - durch das Skript angelegt werden.");
define("_NEWINSTALL","Neuinstallation");
define("_NEW_INSTALL_1","<br />Es wurde <b>Neuinstallation</b> gewählt.<br /> Bitte die folgenden Informationen überprüfen.");
define("_NEW_INSTALL_2","Hinweis: <b>neue Datenbank anlegen</b> nur anwählen, falls Root-Zugriff auf MySQL besteht -<br />andernfalls wird das Skript die Tabellen in der angebenen Datenbank anlegen.");
define("_NEW_INSTALL_3","neue Datenbank anlegen");
define('_NO','Nein');
define("_NOTMADE","Es konnte nicht angelegt werden: ");
define("_NOTSELECT","Datenbank konnte nicht ausgewählt werden.");
define("_NOTUPDATED","Es konnte nicht aktualisiert werden: ");
define("_PHPNUKE_1","Upgrade von PHP-Nuke 4.4?");
define("_PHPNUKE_2","Bitte die folgende Anmerkung lesen und auf <b>PHP-Nuke 4.4</b> klicken.<br /><br />Die bestehende Forum-Installation kann nicht automatisch übernommen werden, da phpBB nicht im Standard-Core enthalten ist und bleibt bei der Installation unverändert.<i>Es gibt ein (ungetestes) Upgrade-Skript im pn-modules-CVS-tree.</i>");
define("_PHPNUKE_3","Upgrade von PHP-Nuke 5?");
define("_PHPNUKE_4","<b>PHP-Nuke 5</b> anklicken.");
define("_PHPNUKE_5","Upgrade von PHP-Nuke 5.2?");
define("_PHPNUKE_6","<b>PHP-Nuke 5.2</b> anklicken.");
define("_PHPNUKE_7","Upgrade von PHP-Nuke 5.3?");
define("_PHPNUKE_8","<b>PHP-Nuke 5.3</b> anklicken.");
define('_PHPNUKE_9','Upgrade von PHP-Nuke 5.3.1?');
define('_PHPNUKE_10','<b>PHP-Nuke 5.3.1</b> anklicken.');
define('_PHPNUKE_11','Upgrade von PHP-Nuke 5.4?');
define('_PHPNUKE_12','<b>PHP-Nuke 5.4</b> anklicken.');
define("_PHP_CHECK_1","Die PHP Version ist ");
define("_PHP_CHECK_2","PHP muss mindestens auf die Version 4.0.1 von <a href=\"http://www.php.net\">http://www.php.net</a> aktualisiert werden.");
define("_PHP_CHECK_3","Achtung! magic_quotes_gpc ist Off.<br />Dies kann in vielen Fällen durch eine .htaccess mit folgendem Inhalt korrigiert werden:<br />php_flag magic_quotes_gpc On<p>");
define("_PHP_CHECK_4","Achtung! magic_quotes_runtime ist On.<br />Dies kann in vielen Fällen durch eine .htaccess mit folgendem Inhalt korrigiert werden:<br />php_flag magic_quotes_runtime Off<p>");
define("_PN6_1","Memo für den Admin: Bitte die allgemeinen Einstellungen in der Administration nach der Installation überprüfen!");
define("_PN6_2","(Wir entschuldigen uns für diese Unannehmlichkeiten.)");
define("_PN6_3","Fehler: Datei nicht gefunden: ");
define("_PN6_4","Konvertierung der old-style-Blocks abgeschlossen.");
define("_POSTNUKE_1","Upgrade von PostNuke .5x?");
define("_POSTNUKE_10","<b>PostNuke .64</b> anklicken.");
define("_POSTNUKE_11","Upgrade von PostNuke .7?");
define("_POSTNUKE_12","<b>Upgrade .7</b> anklicken.");
define("_POSTNUKE_13","Upgrade von PostNuke .71?");
define("_POSTNUKE_14","<b>Upgrade .71</b> anklicken.");
define('_POSTNUKE_15','Sprache bestätigen?');
define("_POSTNUKE_16","<b>Validate</b> anklicken.");
define("_POSTNUKE_17","Tabellen-Struktur validieren?");
define("_POSTNUKE_18","<b>Validate</b> anklicken.");
define('_POSTNUKE_19','Upgrade von PostNuke .72?');
define('_POSTNUKE_20','<b>PostNuke .72</b> anklicken');
define("_POSTNUKE_2","b>PostNuke .5</b> anklicken.");
define("_POSTNUKE_3","Upgrade von PostNuke .6 / .61?");
define("_POSTNUKE_4","<b>PostNuke .6</b> anklicken.");
define("_POSTNUKE_5","Upgrade von PostNuke .62?");
define("_POSTNUKE_6","<b>PostNuke .62</b> anklicken.");
define("_POSTNUKE_7","Upgrade von PostNuke .63?");
define("_POSTNUKE_8","<b>PostNuke .63</b> anklicken.<br />");
define("_POSTNUKE_9","Upgrade von PostNuke .64?");
define('_PWBADMATCH', 'Die eingegebenen Passwörter stimmen nicht überein, bitte zurückgehen und die Passworte erneut eingeben.');
define("_SELECT_LANGUAGE_1","Sprache wählen<br />(bei Problemen an dieser Stelle in der php.ini kontrollieren ob register_global = on ist)");
define("_SELECT_LANGUAGE_2","Sprache: ");
define("_SHOW_ERROR_INFO_1","Schreibfehler</b> \"config.php\" konnte nicht geschrieben werden.<br />Folgende Änderungen müssen dort noch eingetragen werden:");
define("_SKIPPED","übersprungen.");
define("_SUBMIT_1","Bitte die folgenden Informationen auf Korrektheit überprüfen.");
define("_SUBMIT_2","<b>Folgenden Informationen wurden eingegeben:</b>");
define("_SUBMIT_3","<br /><b>Neue Installation</b> oder <b>Upgrade</b> wählen bzw. mit <b>Info ändern</b> die Angaben korrigieren.");
define("_SUCCESS_1","Beendet.");
define("_SUCCESS_2","Das Upgrade auf die neueste PostNuke Version ist beendet.<br />Bitte daran denken, die Einstellungen der config.php vor der ersten Benutzung zu ändern.");
define("_UPDATED"," aktualisiert.");
define("_UPDATING","Aktualisierung Tabelle: ");
define("_UPGRADE_1","Upgrades");
define("_UPGRADE_2","Hier wird das System, von welchem aktualisiert werden soll, ausgewählt.<br /><br /><center><b>PHP-Nuke</b> wählen, um eine bestehende PHP-Nuke Installation zu upgraden.<br /><b>PostNuke</b> wählen, um eine bestehende PostNuke Installation zu upgraden.<br /><b>MyPHPNuke</b> wählen, um eine bestehende MyPHPNuke Installation zu upgraden.");
define("_UPGRADETAKESALONGTIME", "Je nach Umfang des bisherigen Datenbestandes kann das Upgrade eine recht lange Zeit benötigen! Bitte die entsprechende Option nur einmal auswählen und warten bis die nächste Anzeige erscheint, mehrfaches Klicken kann den Upgrade-Prozess zum Scheitern bringen.");
define('_YES', 'Ja');

define('_QUOTESCHECK_1','NS-Quotes Überprüfung');
define('_QUOTESCHECK_2','Das alte NS-Quotes-Modul wurde gegen das neue Quotes-Modul ausgetauscht.<br>Bitte das Verzeichnis modules/NS-Quotes entfernen.');
define('_PERCENT','Prozent');
?>