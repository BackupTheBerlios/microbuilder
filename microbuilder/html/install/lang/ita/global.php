<?php 
// File: $Id: global.php,v 1.1 2004/03/01 10:09:14 mbertier Exp $ $Name:  $
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
// Copyright (C) 2001 by the Post-Nuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// Based on:
// PHP-NUKE Web Portal System - http://phpnuke.org/
// Thatware - http://thatware.org/
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Original Author of file: Valerio Santinelli <tanis@postnuke.com>
// Purpose of file: Installer language defines for Italian language.
// Maintainer: Valerio Santinelli <tanis@postnuke.com>
// ----------------------------------------------------------------------
//
define('_ADMIN_EMAIL','Email dell\'Amministratore');
define('_ADMIN_LOGIN','Login dell\'Amministratore');
define('_ADMIN_NAME','Nome dell\'Amministratore');
define('_ADMIN_PASS','Password dell\'Amministratore');
define('_ADMIN_REPEATPASS','Password dell\'Amministratore (per verifica)');
define('_ADMIN_URL','URL dell\'Amministratore');
define('_BTN_CHANGEINFO','Modifica le informazioni');
define('_BTN_NEWINSTALL','Nuova installazione');
define('_BTN_UPGRADE','Aggiornamento');
define('_BTN_CONTINUE','Continua');
define('_BTN_FINISH','Termina');
define('_BTN_NEXT','Avanti');
define('_BTN_RECHECK','Ri-controlla');
define('_BTN_SET_LANGUAGE','Imposta la lingua');
define('_BTN_SET_LOGIN','Imposta il Login');
define('_BTN_START','Inizia');
define('_BTN_SUBMIT','Invia');
define('_CHANGE_INFO_1','Correggi le informazioni relative al database.');
define('_CHARSET','ISO-8859-1');
define('_CHMOD_CHECK_1','Controllo di CHMOD');
define('_CHMOD_CHECK_2','Come prima cosa controlleremo che i permessi siano impostati correttamente per scrivere sui files. Se le tue impostazioni non sono corrette, questo script non sarà in grado di criptare i dati del tuo file di configurazione. Il fatto di criptare i dati riguardanti il collegamento SQL serve per maggiore sicurezza. Inoltre non sarai in grado di modificare le preferenze dal pannello di controllo dell\'amministratore una volta che il sito sarà online.');
define('_CHMOD_CHECK_3','I permessi per il file config.php sono 666 -- corretti. Questo script può scrivere sul file');
define('_CHMOD_CHECK_4','Modifica i permessi del file config.php ed impostali a 666 in modo che questo script possa scrivere sul file e criptare i dati della connessione al DB (SUGGERIMENTO: utilizza \"chmod\")');
define('_CHMOD_CHECK_5','I permessi per il file config-old.php sono 666 -- corretti. Questo script può scrivere sul file');
define('_CHMOD_CHECK_6','Modifica i permessi del file config-old.php ed impostali a 666 in modo che questo script possa scrivere sul file e criptare i dati della connessione al DB (SUGGERIMENTO: utilizza \"chmod\")');
define('_CHM_CHECK_1', 'Per favore di entrare le sue informazioni di DB. Se lei non ha l\'accesso di radice al suo DB (virtuale ospita, ecc.), lei avrà bisogno di fare la sua base di dati prima che lei procede. Una regola empirica buona, se lei non può creare di basi di dati attraverso il phpMyAdmin a causa di virtuale ospitano, o la sicurezza sul mySQL, poi questo manoscritto non sarà in grado di creare il db per lei. Questo manoscritto sarà in grado di riempire tuttavia la base di dati, ed avrà tuttavia bisogno di essere corso.<br><br>Se lei non sa i valori per la base di dati , nome utente o parola d\'ordine, lascia loro come loro attuale predefinito.  <br><br><b>PER FAVORE NOTA: Alcuni ospita l\'uso 127.0.0.1 come l\'ospite di base di dati. Se lei prende un errore "incapace per collegare alla presa di MySQL", tenta cambiare a 127.0.0.1 </b><br><br>Se i problemi persistono per favore contatta il suo ISP che dovrebbe essere in grado di fornire le informazioni per lei. ');
define('_CONTINUE_1','Impostazione delle preferenze del DB');
define('_CONTINUE_2','Ora puoi creare il tuo account amministrativo. Se salti questo passaggio, i dati per il login amministrativo saranno Admin / Password (case sensitive).  E\' buona regola impostare queste informazioni adesso e non più tardi.');
define('_DBHOST','Host per il Database');
define('_DBINFO','Informazioni per il Database');
define('_DBNAME','Nome del Database');
define('_DBPASS','Password del Database');
define('_DBPREFIX','Prefisso per le tabelle (per la condivisione delle tabelle)');
define('_DBTYPE','Tipo di Database');
define('_DBUNAME','Username del Database');
define('_DEFAULT_1','Questo script installerà il database di PostNuke e ti guiderà nell\'impostazione delle variabili per l\'avvio del sistema. Verrai guidato attraverso una serie di pagine. Ogni pagina imposta parti differenti dello script. Stimiamo che l\'intero processo sarà di circa dieci minuti. Se dovessi rimanere bloccato in un qualsiasi passaggio, visita i nostri forums di supporto per trovare chi ti può aiutare.');
define('_DEFAULT_2','La nostra Licenza');
define('_DEFAULT_3','Ti preghiamo di leggere la GNU General Public License. PostNuke è un software sviluppato gratuitamente, ma ci sono certi criteri da seguire per quanto concerne la distribuzione e la modifica.');
define('_DONE','Fatto.');
define('_FINISH_1','Riconoscimenti');
define('_FINISH_2','Questi sono gli scripts e le persone che hanno creato PostNuke. Prenditi del tempo per far sapere a queste persone quanto apprezzi il loro lavoro. Se vuoi essere inserito in questa lista, contattaci per diventare parte del team di sviluppo. Siamo sempre alla ricerca di aiuto.');
define('_FINISH_3','L\'installazione di PostNuke è terminata. Se dovessi incontrare qualsiasi problema, faccelo sapere. Assicurati di avere cancellato questo script. Non ne avrai più bisogno.');
define('_FINISH_4','Vai al tuo sito di PostNuke');
define('_FOOTER_1','Grazie per aver provato PostNuke e benvenuto nella nostra comunità.');
define('_FORUM_INFO_1','Le tue tabelle del forum non sono state modificate.<br><br>Per tua informazione, le tabelle sono:');
define('_FORUM_INFO_2','Puoi quindi cancellare queste tabelle se non hai intenzione di utilizzare i forums.<br>phpBB dovrebbe essere disponibile come modulo sul sito http://mods.postnuke.com');
define('_INPUT_DATA_1','Dati inviati');
define('_INSTALLATION','Installazione di PostNuke');
define('_ISINTRANET','Questo sito è per un utilizzo come intranet o comunque per uso locale (non in internet)');
define('_INTRANETINFO','Devi impostare l\'opzione "intranet" se il tuo sito non ha un dominio per accedervi. Esempi di dominio possono essere www.postnuke.com e foo.bar.com.  Esempi di nomi di host non completi e quindi non adatti all\'uso in internet: foo.com, localhost, mysite.org  Se non imposti questo parametro correttamente, potresti non riuscire ad autenticarti nel tuo sito. Se, una volta completata l\'installazione, non dovessi riuscire ad autenticarti nel tuo sito, lancia nuovamente questo script di installazione ed abilità l\'opzionee "Intranet".<br>Questa opzione aiuta anche a risolvere alcuni problemi con le sessioni e alcune versioni di PHP.');
define('_MADE',' fatto.');
define('_MAKE_DB_1','Impossibile creare il database.');
define('_MAKE_DB_2','è stato creato.');
define('_MAKE_DB_3','Nessun database creato.');
define('_MODIFY_FILE_1','Errore: impossibile aprire il file in lettura:');
define('_MODIFY_FILE_2','Errore: impossibile aprire il file in scrittura:');
define('_MODIFY_FILE_3','0 linee modificate. Non è stato fatto nulla.');
define('_MYPHPNUKE_1','Aggiornamento da MyPHPNuke 1.8.7?');
define('_MYPHPNUKE_2','Premi il bottone <b>MyPHPNuke 1.8.7</b>');
define('_MYPHPNUKE_3','Aggiornamento da MyPHPNuke 1.8.8b2?');
define('_MYPHPNUKE_4','Premi il bottone <b>MyPHPNuke 1.8.8</b>');
define('_NEWINSTALL','Nuova installazione');
define('_NEWTABLES_1','Impossibile selezionare il database. Devi creare il database a mano, oppure avere accesso come root per fare in modo che lo script di installazione lo creai automaticamente per te.');
define('_NEW_INSTALL_1','Hai scelto di effettuare una nuova installazione. Di seguito trovi le informazioni che hai inserito.');
define('_NEW_INSTALL_2','Ci sono due passaggi da seguire per avere un database di PostNuke funzionante. Per prima cosa deve essere creato un database vuoto, e poi deve essere popolato.<br><br>Se hai accesso come root, attiva il riquadro <b>crea il database</b> e questo script creerà un database vuoto al posto tuo. Altrimenti, clicca su Inizia.<br>Se non hai accesso come root, devi prima creare il database a mano.<br>In entrambi i casi, questo script sarà poi in grado di creare le tabelle e popolarle.');
define('_NEW_INSTALL_3','Creata il Database');
define('_NO','No');
define('_NOTMADE','Impossibile creare ');
define('_NOTSELECT','Non è stato possibile selezionare il database.');
define('_NOTUPDATED','Impossibile aggiornare ');
define('_PERCENT','percentuale');
define('_PHPNUKE_1','Aggiornamento da PHP-Nuke 4.4?');
define('_PHPNUKE_2','Prima di proseguire, leggi la nota qui sotto, dopodichè premi il bottone <b>PHP-Nuke 4.4</b>.<br><br>Questo script lascerà intatto il database del tuo forum, ma non sarà in grado di riutilizzarne i dati. <i>Esiste uno script di update per questi dati, ma è in fase di test. Attualmente lo puoi trovare nel CVS sotto il modulo pn-modules</i><br><br>phpBB non è incluso in questa release, ma lo script di aggiornamento è lo stesso. I tuoi dati non verranno distrutti.');
define('_PHPNUKE_3','Aggiornamento da PHP-Nuke 5?');
define('_PHPNUKE_4','Premi il bottone <b>PHP-Nuke 5</b>');
define('_PHPNUKE_5','Aggiornamento da PHP-Nuke 5.2?');
define('_PHPNUKE_6','Premi il bottone <b>PHP-Nuke 5.2</b>');
define('_PHPNUKE_7','Aggiornamento da PHP-Nuke 5.3?');
define('_PHPNUKE_8','Premi il bottone <b>PHP-Nuke 5.3</b>');
define('_PHPNUKE_9','Aggiornamento da PHP-Nuke 5.3.1?');
define('_PHPNUKE_10','Premi il bottone <b>PHP-Nuke 5.3.1</b>');
define('_PHPNUKE_11','Aggiornamento da PHP-Nuke 5.4?');
define('_PHPNUKE_12','Premi il bottone <b>PHP-Nuke 5.4</b>');
define('_PHP_CHECK_1','La tua versione di PHP è ');
define('_PHP_CHECK_2','Devi aggiornare il PHP almeno alla versione 4.0.1 - <a href=\'http://www.php.net\'>http://www.php.net</a>');
define('_PHP_CHECK_3','Non va bene! magic_quotes_gpc è Off.<br>Questo problema si può solitamente correggere utilizzando un file .htaccess con la seguente riga:<br>php_flag magic_quotes_gpc On');
define('_PHP_CHECK_4','Non va bene! magic_quotes_runtime è On.<br>Questo problema si può solitamente correggere utilizzando un file .htaccess con la seguente riga:<br>php_flag magic_quotes_runtime Off');
define('_PN6_1','Amministratore: Dovrai ri-salvare i dati delle preferenze tuo sito nella pagina di amministrazione appena possibile!');
define('_PN6_2','(Siamo spiacenti per questo inconveniente)');
define('_PN6_3','ERRORE: File non trovato: ');
define('_PN6_4','Terminata la conversione dei blocchi dei bottoni vecchio stile.');
define('_POSTNUKE_1','Aggiornamento da PostNuke .5x?');
define('_POSTNUKE_10','Premi il bottone <b>PostNuke .64</b>');
define('_POSTNUKE_11','Aggiornamento da PostNuke .7?');
define('_POSTNUKE_12','Premi il bottone <b>PostNuke 7</b>');
define('_POSTNUKE_13','Aggiornamento da PostNuke .71?');
define('_POSTNUKE_14','Premi il bottone <b>PostNuke 71</b>');
define('_POSTNUKE_15','Vuoi validare il sistema di gestione della lingua?');
define('_POSTNUKE_16','Premi il bottone <b>Validate</b>');
define('_POSTNUKE_17','Vuoi validare la struttura delle tabelle?');
define('_POSTNUKE_18','Premi il bottone <b>Validate</b>');
define('_POSTNUKE_2','Premi il bottone <b>PostNuke .5</b>');
define('_POSTNUKE_3','Aggiornamento da PostNuke .6 / .61?');
define('_POSTNUKE_4','Premi il bottone <b>PostNuke .6</b>');
define('_POSTNUKE_5','Aggiornamento da PostNuke .62?');
define('_POSTNUKE_6','Premi il bottone <b>PostNuke .62</b>');
define('_POSTNUKE_7','Aggiornamento da PostNuke .63?');
define('_POSTNUKE_8','Premi il bottone <b>PostNuke .63</b><br>');
define('_POSTNUKE_9','Aggiornamento da PostNuke .64?');
define('_PWBADMATCH', 'Le passwords inserite non corrispondono. Torna indietro ed inseriscile di nuovo per essere sicuro che siano le stesse.');
define('_QUOTESCHECK_1','Controllo per la presenza del modulo NS-Quotes');
define('_QUOTESCHECK_2','Il modulo NS-Quotes è ormai obsoleto ed è stato rimpiazzato dal modulo Quotes.<br>Puoi quindi rimuovere la directory modules/NS-Quotes senza nessun problema.');
define('_SELECT_LANGUAGE_1','Seleziona la lingua.');
define('_SELECT_LANGUAGE_2','Lingua: ');
define('_SHOW_ERROR_INFO_1','Errore in scrittura</b>. Impossibile aggiornare il file \'config.php\'<br/> Dovrai modificare il file a mano utilizzando un editor di testo..<br/> Ecco i cambiamenti necessari:');
define('_SKIPPED','Saltato.');
define('_SUBMIT_1','Assicurati che le informazionisiano corrette.');
define('_SUBMIT_2','Hai inserito le seguenti informazioni:');
define('_SUBMIT_3','Seleziona <b>New Install</b> o <b>Upgrade</b> per continuare.');
define('_SUCCESS_1','Fine');
define('_SUCCESS_2','L\'aggiornamento all\'ultima versione di PostNuke è terminato.<br>Ricordati di modificare le impostazioni nel tuo config.php prima di utilizzarlo la prima volta.');
define('_UPDATED',' aggiornato.');
define('_UPDATING','Aggiornamento della tabella: ');
define('_UPGRADE_1','Aggiornamenti');
define('_UPGRADE_2','Qui puoi selezionare da quale CMS stai effettuando l\'aggiornamento.<br><br><center> Seleziona <b>PHP-Nuke</b> per aggiornare una precedente installazione di PHP-Nuke.<br>Seleziona <b>PostNuke</b> per aggiornare una precedente installazione di PostNuke.<br>Seleziona <b>MyPHPNuke</b> per aggiornare una precedente installazione di MyPHPNuke.');
define('_UPGRADETAKESALONGTIME','L\'aggiornamento a PostNuke può impiegare parecchio tempo. Una volta selezionato l\'aggiornamento, non cliccare più sul bottone ed attendi l\'apparizione della schermata seguente. Cliccando più volte sui bottoni di aggiornamento potrebbe interrompere il processo.');
define('_YES', 'Sì');
?>