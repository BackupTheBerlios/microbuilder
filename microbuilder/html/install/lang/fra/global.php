<?php
/** FRA strings. 
 * @version     $Id: global.php,v 1.2 2004/03/19 14:31:08 mbertier Exp $
 * @package     Installer 
 * @subpackage  Lang 
 * @license     GPL 
 * @author      See /docs/CREDITS.txt */

define('_ADMIN_EMAIL','E-mail de l\'administrateur');
define('_ADMIN_LOGIN','Identifiant de l\'administrateur');
define('_ADMIN_NAME','Nom de l\'administrateur');
define('_ADMIN_PASS','Mot de passe administrateur');
define('_ADMIN_REPEATPASS','Mot de passe administrateur (vérification)');
define('_ADMIN_URL','URL de l\'administrateur');
define('_BLOCKTITLE_ADMINMESS','Admin-Messages');
define('_BLOCKTITLE_BIGSTORY','Le récit fort du jour');
define('_BLOCKTITLE_CATMENU','Catégories');
define('_BLOCKTITLE_EPHEMERIDS','Ephémérides');
define('_BLOCKTITLE_INCOMING','Arrivages');
define('_BLOCKTITLE_LANGUAGES','Langues');
define('_BLOCKTITLE_MAINMENU','Menu Principal');
define('_BLOCKTITLE_MAINMENU_ADMIN','Administration');
define('_BLOCKTITLE_MAINMENU_ADMINALT','Administration de votre site PostNuke');
define('_BLOCKTITLE_MAINMENU_AVANTGO','AvantGo');
define('_BLOCKTITLE_MAINMENU_AVANTGOALT','Nouvelles formatées pour des assistants personnels');
define('_BLOCKTITLE_MAINMENU_DL','Téléchargements');
define('_BLOCKTITLE_MAINMENU_DLALT','Découvrez les téléchargements proposés sur le site');
define('_BLOCKTITLE_MAINMENU_FAQ','FAQ');
define('_BLOCKTITLE_MAINMENU_FAQALT','Questions fréquemment posées');
define('_BLOCKTITLE_MAINMENU_HOME','Acceuil');
define('_BLOCKTITLE_MAINMENU_HOMEALT','Retour HOME');
define('_BLOCKTITLE_MAINMENU_MLIST','Liste des Membres');
define('_BLOCKTITLE_MAINMENU_MLISTALT','Enumération des membres enregistrés sur ce site');
define('_BLOCKTITLE_MAINMENU_NEWS','Nouvelles');
define('_BLOCKTITLE_MAINMENU_NEWSALT','Nouvelles récentes sur le site');
define('_BLOCKTITLE_MAINMENU_RUS','Recommandation');
define('_BLOCKTITLE_MAINMENU_RUSALT','Recommandez ce site à un proche');
define('_BLOCKTITLE_MAINMENU_RWS','Revues');
define('_BLOCKTITLE_MAINMENU_RWSALT','Section des revues sur ce site');
define('_BLOCKTITLE_MAINMENU_SEARCH','Recherche');
define('_BLOCKTITLE_MAINMENU_SEARCHALT','Recherche sur le site');
define('_BLOCKTITLE_MAINMENU_SECTIONS','Articles & Tutoriaux');
define('_BLOCKTITLE_MAINMENU_SECTIONSALT','Autre contenu que ce site');
define('_BLOCKTITLE_MAINMENU_SNEWS','Soumettre une nouvelle');
define('_BLOCKTITLE_MAINMENU_SNEWSALT','Soumettez une information');
define('_BLOCKTITLE_MAINMENU_STATS','Statistiques');
define('_BLOCKTITLE_MAINMENU_STATSALT','Statistiques détaillé du trafic');
define('_BLOCKTITLE_MAINMENU_TLIST','Top 10');
define('_BLOCKTITLE_MAINMENU_TLISTALT','Enumération du meilleur du site');
define('_BLOCKTITLE_MAINMENU_TOPICS','Sujets');
define('_BLOCKTITLE_MAINMENU_TOPICSALT','Enumération des sujets nouveaux sur le site');
define('_BLOCKTITLE_MAINMENU_USER','Compte personnel');
define('_BLOCKTITLE_MAINMENU_USERALT','Administration de votre compte');
define('_BLOCKTITLE_MAINMENU_USEREXIT','Anonymat');
define('_BLOCKTITLE_MAINMENU_USEREXITALT','Sortie de votre compte');
define('_BLOCKTITLE_MAINMENU_WLINKS','Liens internet');
define('_BLOCKTITLE_MAINMENU_WLINKSALT','Liens vers sites exterieur');
define('_BLOCKTITLE_OTHERSTORIES','Autres récits');
define('_BLOCKTITLE_PASTART','Précédents nouvelles');
define('_BLOCKTITLE_POLL','Sondage');
define('_BLOCKTITLE_RANHEAD','Les titres en vrac');
define('_BLOCKTITLE_REMINDER','RAPPEL');
define('_BLOCKTITLE_SEARCHBOX','Boîte de recherche');
define('_BLOCKTITLE_USERBLOCK_TEXTE','Placez ici ce que vous voulez');
define('_BLOCKTITLE_USERSBLOCK','Block utilisateur');
define('_BLOCKTITLE_USERSBLOCK_TEXTE','Placez ici ce que vous voulez');
define('_BLOCKTITLE_USERSLOGIN','Boîte de connexion');
define('_BLOCKTITLE_WHOISONLINE','Qui est en ligne');
define('_BTN_CONTINUE','Continuer');
define('_BTN_FINISH','Terminer');
define('_BTN_NEXT','Suite');
define('_BTN_RECHECK','Nouvelle vérification');
define('_BTN_SET_LANGUAGE','Langue');
define('_BTN_SET_LOGIN','Identification');
define('_BTN_START','Commencer');
define('_BTN_SUBMIT','Valider');
define('_CHANGE_INFO_1','Corrigez les informations de votre base de données.');
define('_CHMOD_CHECK_1','Vérification des droits (CHMOD)');
define('_CHMOD_CHECK_2','Nous allons d\'abord vérifier que les droits d\'accès (CHMOD) permettent au script d\'écrire dans le fichier. S\'ils ne sont pas corrects le script ne pourra pas encrypter les données de votre fichier de configuration. Encrypter les données d\'accès à la base est important pour la sécurité, c\'est un des objectifs de ce script. Vous ne pourrez plus changer vos paramètres d\'administration une fois ceux-ci configurés.');
define('_CHMOD_CHECK_3','Les droits CHMOD de config.php sont à 666 -- OK, ce script peut mettre le fichier à jour');
define('_CHMOD_CHECK_4','Veuillez changer les droits CHMOD de config.php à 666 pour que le script puisse mettre à jour et encrypter vos infos de BD');
define('_CHMOD_CHECK_5','Les droits CHMOD de config-old.php sont à 666 -- OK, ce script peut mettre le fichier à jour');
define('_CHMOD_CHECK_6','Veuillez changer les droits CHMOD de config-old.php à 666 pour que le script pusse mettre à jour et encrypter vos infos de BD');
define('_CHM_CHECK_1','S\'il vous plaît entrer votre information de DB. Si vous n\'avez pas l\'accès de racine à votre DB (hosting véritable, etc), vous aurez besoin de faire votre base de données avant que vous procédez. Une bonne règle simplifiéee, si vous ne pouvez pas créer de base de données par phpMyAdmin à cause de hosting véritable, ou la sécurité sur mySQL, alors ce manuscrit ne pourra pas créer la db pour vous. Ce manuscrit fera toujours peut remplir la base de données, et fera le besoin calme être couru.<br><br>Si vous ne savez pas les valeurs pour l\'hôte de base de données, username ou le mot de passe, les partent comme leurs défauts actuels.  <br><br><b>S\'IL VOUS PLAIT LA NOTE: quelques hôtes utilisent 127.0.0.1 comme l\'hôte de base de données. Si vous recevez une erreur "incapable pour connecter à la douille de MySQL", essayez de changer à 127.0.0.1 </b><br><br>Si les problèmes persistent s\'il vous plaît contacte votre ISP qui doit pouvoir fournir l\'information pour vous. ');
define('_CONTINUE_1','Préférences de votre BD');
define('_CONTINUE_2','Vous pouvez maintenant définir votre compte admin. Si vous passez cette étape, votre compte admin sera Admin/Password (attention aux majuscules/minuscules). Il vaut mieux le définir maintenant et non plus tard.');
define('_DBHOST','Serveur hôte de la base');
define('_DBINFO','Informations sur la base de données');
define('_DBNAME','Nom de la base');
define('_DBPASS','Mot de passe de la base');
define('_DBPREFIX','Préfixe (pour le partage de tables)');
define('_DBTABLETYPE','Type de table de base de données');
define('_DBTYPE','Type de base');
define('_DBUNAME','Utilisateur de la base');
define('_DEFAULT_1','Ce script va installer la base de données PostNuke et vous assistera dans la création des variables nécessaires au démarrage. Vous allez être guidé à travers une succession d\'écrans. Chaque page correspond à une étape de l\'installation. Nous estimons que la procédure d\'installation prendra environ 10 minutes. Si vous avez le moindre soucis, n\'hésitez pas à lire nos forums pour obtenir de l\'aide.');
define('_DEFAULT_2','Licence');
define('_DEFAULT_3','Veuillez prendre connaissance de la Licence Publique Générale GNU (GPL). Bien que PostNuke soit un logiciel libre, sa distribution et sa publication sont soumises à certaines obligations.');
define('_DONE','Terminé.');
define('_FINISH_1','Générique');
define('_FINISH_2','Voici les gens qui font exister PostNuke. Prenez un peu de temps pour leur faire savoir que vous appréciez leur travail. Si vous souhaitez apparaître dans cette liste, contactez-nous pour rejoindre l\'équipe de développement. Nous sommes toujours ouvert à un peu d\'aide.');
define('_FINISH_3','L\'installation de PostNuke est maintenant terminée. Si vous rencontrez des problèmes, faites-le nous savoir. Assurez-vous d\'effacer ce script, vous n\'en aurez plus besoin.');
define('_FINISH_4','Accès à votre site PostNuke');
define('_FOOTER_1','Merci d\'utiliser PostNuke, et bienvenue dans notre communauté.');
define('_FOOTMSGTEXT','<br /><a href=http://www.postnuke.com target=_blank><img src=images/powered/postnuke.butn.gif border=0 alt=Web site powered by PostNuke hspace=10></a> <a href=http://php.weblogs.com/ADODB target=_blank><img src=images/powered/adodb2.gif alt=ADODB database library border=0 hspace=10></a><a href=http://www.php.net target=_blank><img src=images/powered/php2.gif alt=PHP Language border=0 hspace=10></a><br /><br />Tous les logotypes et marques déposées dans ce site sont la propriété de leur auteur respectif. Les commentaires sont la propriété de leurs auteurs respectifs, tout le reste de notre propre chef ©2003 <br />Ce site est généré grâce à <a href=http://www.postnuke.com target=_blank>PostNuke</a>, un système de portail internet écrit en PHP. PostNuke est un progiciel libre de droit distribué sous licence <a href=http://www.gnu.org target=_blank>GNU/GPL</a>. <br />Vous pouvez vous affilier à nos informations en utilisant le fichier <a href=backend.php>backend.php</a>');
define('_FORUM_INFO_1','Vos tables de forum sont inchangées.<br><br>Pour info, ces tables sont :');
define('_FORUM_INFO_2','Vous pouvez effacer ces tables si vous n\'avez pas l\'intention d\'utiliser les forums.<br> phpBB devrait ê;tre disponible sous forme de module sur http://mods.postnuke.com');
define('_INPUT_DATA_1','Donnés envoyées');
define('_INSTALLATION','Installation de PostNuke');
define('_INSTALL_ADMINMESSAGE_TITRE','Message de la part de votre équipe de développement de Postnuke');
define('_INSTALL_ADMINMESSAGE_TEXTE','Bienvenue dans PostNuke, la version = - Phoenix - = (0.726), <a target=_blank href=http://www.postnuke.com>PostNuke</a> est un système de gestion de contenu et de files informatives (SGC). Il est, de loin, plus sécurisé et stable que des produits concurrents et montre une utilisation aisée dans des environnements à grand volume.<br /><br />
Certaine des titres de noblesse de PostNuke sont :<br> <ul /> <li />Habillage de tous les aspects, apparence du site internet grâce aux thèmes, bénéficiant du support CSS des feuilles de style.
<li />La meilleure garantie pour afficher vos pages internet sur tous les navigateurs par agrégation du langage html 4.01 transitionnel.
<li />Une interface interactive de base et une documentation extensible permettant la création aisée de fonctionnalités étendues de modules et blocs.
</ul>
<br /><br />
PostNuke bénéficie de cette communauté très active de personnes au développement et au support par la voie de  <a target=_blank href=http://www.postnuke.com>www.postnuke.com</a> en qui concerne les anglophones et de <a target=_blank href=http://www.postnuke-france.org>www.postnuke-france.org</a> pour les francophones.<br /><br />
<b>Votre équipe de développement de Postnuke </b><br /><br />
<i>Remarque : Ce message peut-être édité dans la partie administration des messages de votre site </i>');
/*
define('_INSTALL_ADMINMESSAGE','Message de l\'équipe de développement de Postnuke','Bienvenue dans PostNuke, la version = - Phoenix - = (0.726), <a target=_blank href=http://www.postnuke.com>PostNuke</a> est un systéme de gestion de contenu et de files d\'informations (SGC). Il est de loin plus sécurisé et stable que des produits concurrents et montre une aptitude d\'utilisation aisée dans des environnements à grand volume.<br /><br />
Certaine des titres de noblesse de PostNuke sont :<ul />  <li />Habillage de tous les aspects de l\'apparence d\'un site internet grâce aux thèmes, bénéficiant du support CSS des feuilles de style
<li />La meilleure garantie d\'afficher vos pages internet sur tous les navigateurs par l\'agrégation du langage html 4.01 transitionnel
<li />Une interface interactive de base et une documentation extensible permettant la création aisée de fonctionnalités étendues de modules et blocs
</ul>
<br /><br />
PostNuke bénéficie d\'une communauté très active de personnes au développement et au support par la voie de <a target="_blank" href="http://www.postnuke.com">www.postnuke.com</a> en qui concerne les anglophones et de <a target="_blank" href="http://www.postnuke-france.org">www.postnuke-france.org</a> pour les francophones.<br /><br />
<b>Votre équipe de développement de Postnuke </b><br /><br />
<i>Remarque : Ce message peut-être édité dans l\'administration des messages de l\'administrateur </i> ');
*/
define('_INSTALL_REMINDERBLOCK','<b>Message de mise en garde de votre équipe de développement de Postnuke</b><br><br>
 <b>De grâce rappelez-vous de supprimer les fichiers suivants de votre dossier Postnuke qui se trouvant sur votre serveur FTP :</b><br><br>&middot;<b>install.php</b> fichier<br>&middot;<b>install</b> dossier<br><br><b>
 Si vous ne supprimez pas ces fichiers des utilisateurs peuvent obtenir le mot de passe de votre base de données !</b> <br /><br /><i>Remarque : Ce bloc peut-être édité à partir de la partie administration des blocs </i>');
define('_INTRANETINFO','Vous devez sélectionner l\'option "intranet" si votre site n\'utilise pas un nom pleinement qualifié pour l\'accès. Voici des exemples de noms pleinement qualifés : www.postnuke.com et foo.bar.com. Des exemples de noms de serveurs qui ne sont pas pleinement qualifiés sont foo.com, localhost, et monsite.org.org Si vous ne définissez pas correctement ce paramètre vous pourriez ne pas être capable de vous connecter sur votre site. Si, une fois l\'insatallation réalisée vous vous rendez compte que vous ê;tes incapable de vous connecter relancez l\'installation et activez l\'option "Intranet".<br>Cette option résoud également certains problèmes de session découverts avec certaines versions de PHP.');
define('_ISINTRANET','Ce site est sur un intranet ou est utilisé<br>sur un réseau local (non internet)');
define('_MAKE_DB_1','Impossible de créer la base de données.');
define('_MAKE_DB_2','a été créée.');
define('_MAKE_DB_3','Aucune base n\'a été créée.');
define('_MODIFY_FILE_1','Erreur : accès en lecture impossible sur :');
define('_MODIFY_FILE_2','Erreur : accès en écriture impossible sur :');
define('_MODIFY_FILE_3','0 ligne modifiée, aucun changement');
define('_MYPHPNUKE_1','Mise à jour à partir de MyPHPNuke 1.8.7 ?');
define('_MYPHPNUKE_2','Cliquez simplement sur le bouton <b>MyPHPNuke 1.8.7</b>');
define('_MYPHPNUKE_3','Mise à jour à partir de MyPHPNuke 1.8.8b2 ?');
define('_MYPHPNUKE_4','Cliquez simplement sur le bouton <b>MyPHPNuke 1.8.8</b>');
define('_NEWINSTALL','Nouvelle Installation');
define('_NEW_INSTALL_1','Vous avez choisi de faire une nouvelle installation. Voici les informations que vous avez fourni :');
define('_NEW_INSTALL_2','Si vous avez accès root, cochez la case <b>créer la base de données</b>. Sinon, cliquez sur Commencer.<br>Si vous n\'avez pas d\'accès root vous devez créer la base manuellement et le script ajoutera les tables pour vous');
define('_NEW_INSTALL_3','Créer la base de données');
define('_NOTMADE','Impossible de créer');
define('_NOTSELECT','Impossible de sélectionner la base.');
define('_NOTUPDATED','Impossible de modifier');
define('_PHPNUKE_1','Mise à jour à partir de PHP-Nuke 4.4 ?');
define('_PHPNUKE_10','Cliquez simplement sur le bouton <b>PHP-Nuke 5.3.1</b>');
define('_PHPNUKE_11','Mise à jour à partir de PHP-Nuke 5.4? ');
define('_PHPNUKE_12','Cliquez simplement sur le bouton <b>PHP-Nuke 5.4</b>');
define('_PHPNUKE_2','Veuillez lire la note qui suit, et appuyez sur le bouton <b>PHP-Nuke 4.4</b> pour démarrer.<br><br> Ce script laissera intactes vos tables de forum mais cetter version ne tiendra pas compte des données.<i> Un script de conversion pour ces do');
define('_PHPNUKE_3','Mise à jour à partir de PHP-Nuke 5 ?');
define('_PHPNUKE_4','Cliquez simplement sur le bouton <b>PHP-Nuke 5</b>');
define('_PHPNUKE_5','Mise à jour à partir de PHP-Nuke 5.2 ?');
define('_PHPNUKE_6','Cliquez simplement sur le bouton <b>PHP-Nuke 5.2</b>');
define('_PHPNUKE_7','Mise à jour à partir de PHP-Nuke 5.3 ?');
define('_PHPNUKE_8','Cliquez simplement sur <b>PHP-Nuke 5.3</b>');
define('_PHPNUKE_9','Mise à jour à partir de PHP-Nuke 5.3.1 ?');
define('_PHP_CHECK_1','Votre version de PHP est');
define('_PHP_CHECK_2','Vous devez au moins passer à la version 4.0.1 de PHP - <a href=\'\'http://www.php.net\'\'>http://www.php.net</a>');
define('_PHP_CHECK_3','Pas bon ! magic_quotes_gpc est désactivé.<br>Cela peut en général ê;tre contourné en utilisant un fichier .htaccess contenant la ligne :<br>php_flag magic_quotes_gpc On');
define('_PHP_CHECK_4','Pas bon ! magic_quotes_runtime est désactivé.<br>Cela peut en général ê;tre contourné en utilisant un fichier .htaccess contenant la ligne :<br>php_flag magic_quotes_runtime Off');
define('_PN6_1','Admin : Vous devrez faire une nouvelle sauvegarde des préférences de votre site à partir de la page d\'administration - AUSSITOT QUE POSSIBLE !');
define('_PN6_2','(veuillez nous excuser pour la gê;ne occasionnée)');
define('_PN6_3','ERREUR : Fichier non trouvé :');
define('_PN6_4','Conversion de l\'ancien format de blocs de boutons effectuée.');
define('_POLLDATATEXT1','...Je ne le connais pas !');
define('_POLLDATATEXT2','...La chose dont on avait besoin !');
define('_POLLDATATEXT3','...On vas le télécharger ');
define('_POLLDESCTEXT','Que pensez-vous de PostNuke ?');
define('_POSTNUKE_1','Mise à jour à partir de PostNuke .5x ?');
define('_POSTNUKE_10','Cliquez simplement sur le bouton <b>PostNuke .64</b>');
define('_POSTNUKE_11','Mise à jour à partir de PostNuke .7 ?');
define('_POSTNUKE_12','Cliquez simplement sur le bouton <b>PostNuke 7</b>');
define('_POSTNUKE_13','Validation des tables');
define('_POSTNUKE_14','Ce script va effectuer une double vérification de la structure des tables de votre base PostNuke. Exécutez chaque partie du script pour vous assurer que votre base de données est correctement installée. Cela est surtout utile p');
define('_POSTNUKE_15','Pour valider votre système de langue ?');
define('_POSTNUKE_16','Pressez sur le bouton <b>Valider</b>');
define('_POSTNUKE_17','Pour valider la structure des tables ?');
define('_POSTNUKE_18','Pressez sur le bouton <b>Valider</b>');
define('_POSTNUKE_19','Mise à jour à partir de PostNuke .72 ?');
define('_POSTNUKE_2','Cliquez simplement sur le bouton <b>PostNuke .5</b>');
define('_POSTNUKE_20','Cliquez simplement sur le bouton <b>PostNuke .72</b>');
define('_POSTNUKE_3','Mise à jour à partir de PostNuke .6 / .61 ?');
define('_POSTNUKE_4','Cliquez simplement sur le bouton <b>PostNuke .6</b>');
define('_POSTNUKE_5','Mise à jour à partir de PostNuke .62 ?');
define('_POSTNUKE_6','Cliquez simplement sur le bouton <b>PostNuke .62</b>');
define('_POSTNUKE_7','Mise à jour à partir de PostNuke .63 ?');
define('_POSTNUKE_8','Cliquez simplement sur le bouton <b>PostNuke .63</b><br>');
define('_POSTNUKE_9','Mise à jour à partir de PostNuke .64 ?');
define('_PWBADMATCH','Les mots de passe entrés ne sont pas identiques. Revenez en arrière et tapez les mots de passe à nouveau.');
define('_QUOTESCHECK_1','NS-Quotes Check');
define('_QUOTESCHECK_2','The Former NS-Quotes module has been deprecated in favor of the new Quotes module.<br> Please remove the modules/NS-Quotes directory.');
define('_REWIEWSMAINDESC','Mettez votre texte de votre compte rendu');
define('_REWIEWSMAINTITLE','Compte Rendus');
define('_SELECT_LANGUAGE_1','Sélectionnez votre langue.');
define('_SELECT_LANGUAGE_2','Langue :');
define('_SHOW_ERROR_INFO_1','Erreur d\'écriture </b> impossible de mettre à jour le fichier \'\'config.php\'\'<br/> Vous allez devoir le modifier manuellement à l\'aide d\'un éditeur de texte.<br />. Voici les changements à effectuer ');
define('_SKIPPED','Passé.');
define('_SUBMIT_1','Veuillez vérifier les informations et assurez-vous qu\'elles sont correctes.');
define('_SUBMIT_2','Vous avez entré les renseignements suivant :');
define('_SUBMIT_3','Sélectionnez <b>Nouvelle installation</b> ou <b>Mise à jour</b> pour continuer.');
define('_SUCCESS_1','Terminé');
define('_SUCCESS_2','Votre mise à niveau vers la dernière version de PostNuke est terminée.<br> N\'oubliez pas de changer votre config.php avant la première utilisation.');
define('_UPDATED',' modifiée.');
define('_UPDATING','Modification de la table :');
define('_UPGRADETAKESALONGTIME','Effectuer une mise à jour de PostNuke peut prendre un certain temps, peut-ê;tre plusieurs minutes. Quand vous choisissez une option de mise à jour, ne la cliquez qu\'une seule fois et attendez que l\'écran suivant apparaisse. Cli');
define('_UPGRADE_1','Mises à jour');
define('_UPGRADE_2','Sélectionner à partir de quel CMS vous effectuez la mise à jour.<br><br><center> Choisissez <b>PHP-Nuke</b> pour mettre à jour un système PHP-Nuke existant.<br> Choisissez <b>PostNuke</b> pour mettre à jour un syst');
?>