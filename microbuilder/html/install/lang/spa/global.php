<?php
// LastModification: $Id: global.php,v 1.1 2004/03/01 10:09:14 mbertier Exp $ 
// ----------------------------------------------------------------------
// POSTNUKE (Content Management System)
// Copyright (C) 2001-2003 by the PostNuke Development Team.
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
// Original Author of file: Translation team
// Purpose of file: Translation files
// Translation team: Read credits in /docs/CREDITS.txt
// ----------------------------------------------------------------------

define('_ADMIN_EMAIL','Correo del Administrador');
define('_ADMIN_LOGIN','Login del Administrador');
define('_ADMIN_NAME','Nombre del Administrador');
define('_ADMIN_PASS','Contrase�a del Administrador');
define('_ADMIN_REPEATPASS','Contrase�a del Administrador (verificar)');
define('_ADMIN_URL','URL del Administrador');
// define('_BTN_CHANGEINFO','Cambiar la informaci�n');
define('_BTN_CONTINUE','Continuar');
define('_BTN_FINISH','Finalizado');
// define('_BTN_NEWINSTALL','Nueva instalaci�n');
define('_BTN_NEXT','Siguiente');
define('_BTN_RECHECK','volver a verificar');
define('_BTN_SET_LANGUAGE','Configurar Idioma');
define('_BTN_SET_LOGIN','Configurar Usuario');
define('_BTN_START','Comenzar');
define('_BTN_SUBMIT','Enviar');
// define('_BTN_UPGRADE','Actualizaci�n');
define('_CHANGE_INFO_1','Por favor, corrija la informaci�n de su base de datos.');
// define('_CHARSET','ISO-8859-15');
define('_CHM_CHECK_1','Entre por favor su informaci�n de DB. Si usted no tiene el acceso de ra�z a su DB (recibir virtual, etc), usted necesitar� hacer su base de datos antes usted avanza. Una regla emp�rica buena, si usted no puede crear las bases de datos por phpMyAdmin a causa de recibir virtual, ni la seguridad en el mySQL, entonces esta escritura no ser� capaz de crear el db para usted. Esta escritura ser� todav�a capaz de llenar la base de datos, y tranquilo necesitar� ser corrido.<br><br>Si usted no sabe los valores para el anfitri�n de la base de datos, username ni contrase�a, los salen como sus rebeld�as actuales.  <br><br><b>FAVOR DE NOTAR: Algunos reciben el uso 127.0.0.1 como el anfitri�n de base de datos. Si usted obtiene un error "incapaz de conectar al enchufe de MySQL", trata cambiante a 127.0.0.1 </b><br><br>Si los problemas persisten contacta por favor su proveedor de servicios de Internet que debe ser capaz de proporcionar la informaci�n para usted.');
define('_CHMOD_CHECK_1','Comprobaci�n de Permisos');
define('_CHMOD_CHECK_2','Lo primero que haremos ser� revisar que la configuraci�n de los permisos sea la correcta para permitir la escritura en los ficheros necesarios. Si su configuraci�n no es correcta, el script no ser� capaz de guardar los datos encriptados en su fichero config. Encriptar los datos SQL es a�adir seguridad, y eso es lo que hace este script. Usted podr� actualizar sus preferencias una vez que su sitio est� en marcha y ejecutandose.');
define('_CHMOD_CHECK_3','La configuraci�n de permisos para el archivo config.php es 666 -- correcto, este script puede escribir en el fichero');
define('_CHMOD_CHECK_4','Por favor, cambie los permisos de el archivo config.php a 666 para que este script pueda escribir y encriptar los datos de la BD (Este cambio lo puede hacer con la orden �chmod 666 config.php�)');
define('_CHMOD_CHECK_5','La configuraci�n de permisos para el archivo config-old.php es 666 -- correcto, este script puede escribir en el fichero');
define('_CHMOD_CHECK_6','Por favor, configure los permisos para el archivo config-old.php a 666 para que este script pueda escribir y encriptar los datos de la BD (Este cambio lo puede hacer con la orden �chmod 666 config-old.php)');
define('_CONTINUE_1','Configurando las Preferencias de su Base de Datos');
define('_CONTINUE_2','Usted puede ahora configurar su cuenta de Administrador. Si decide saltarse este paso de la configuraci�n, su login para su cuenta de administrador ser� Admin / Password (fijarse en el uso de may�sculas y min�sculas). Lo aconsejable es que lo configure ahora y no espere a m�s tarde.');
define('_DBHOST','Servidor de la BD');
define('_DBINFO','Informaci�n de la BD');
define('_DBNAME','Nombre de la BD');
define('_DBPASS','Contrase�a de la BD');
define('_DBPREFIX','Prefijo de las tablas (para tablas compartidas)');
define('_DBTYPE','Tipo de la BD');
define('_DBTABLETYPE', 'Tipo de Tabla)');
define('_DBUNAME','Nombre de usuario en la BD');
define('_DEFAULT_1','Este script instalar� la base de datos de PostNuke y la ayuda para configurar las variables que necesite para comenzar. Usted ser� guiado a trav�s de varias p�ginas. Cada p�gina configura una parte diferente del script. Estimamos que el proceso entero puede tardar cerca de 10 minutos. En el caso de que se atasque, por favor, visite nuestro support forums para conseguir ayuda.');
define('_DEFAULT_2','Nuestra Licencia');
define('_DEFAULT_3','Por favor, lea atentamente la licencia GNU General Public License. PostNuke est� siendo desarrollado como Software Libre, pero en la licencia se especifican ciertos requerimientos con respecto a su edici�n y distribuci�ns.');
define('_DONE','Hecho.');
define('_FINISH_1','Cr�ditos');
define('_FINISH_2','Aqu� est�n la gente y los scripts que han sacado adelante a PostNuke. Tomese algo de tiempo y hagale saber a esta gente cuanto aprecia su trabajo. Si quiere aparecer listado aqu�, contacte con nosotros y diganos que quiere participar en el equipo de desarrollo. Nosotros sienpre estamos buscando nuev@s colaboradores.');
define('_FINISH_3','Usted ha finalizado el proceso de instalaci�n de PostNuke.  Si usted encuentra alg�n problema, diganoslo. Asegurese de borrar este script. No lo volver� a necesitar otra vez.'); 
define('_FINISH_4','Ir a la p�gina inicial de su PostNuke');
define('_FOOTER_1','Gracias por instalar PostNuke. Bienvenido a nuestra comunidad.');
define('_FORUM_INFO_1','Las tablas de su foro no se han tocado.<br><br>FYI, estas tablas son:');
define('_FORUM_INFO_2','As�, usted puede borrar estas tablas si usted no quiere usar foros.<br> phpBB suele estar disponible, como m�dulo, en http://mods.postnuke.com');
define('_INPUT_DATA_1','Datos cargados');
define('_INSTALLATION','Instalaci�n de PostNuke');
define('_INTRANETINFO','Debe establecer la opci�n "intranet" si su sitio no usa un nombre de dominio completamente cualificado (Full Qualified Domain Name - FQDN). Ejemplos de nombre cualificados son www.postnuke-espanol.org y foo.bar.com. Ejemplos de sitios que no est�n completamente cualificados son foo.com, localhost y misitio.org. Si no establece esta opci�n correctamente es posible que no pueda iniciar sesi�n en su sitio. Si una vez que se ha completado la instalaci�n se encuentra con que no no puede iniciar una sesi�n entonces por favor, vuelva a ejecutar esta instalaci�n y active la opci�n de �Intranet�.<BR>Esta opci�n tambi�n puede ayudarle a resolver algunos problemas con las sesiones en algunos niveles de PHP');
define('_ISINTRANET','Este sitio es para una Intranet o para otros usos (no para Internet)');
// define('_MADE',' hecho.');
define('_MAKE_DB_1','Incapaz de crear la base de datos');
define('_MAKE_DB_2','ha sido creada.');
define('_MAKE_DB_3','No se ha creado la base de datos.');
define('_MODIFY_FILE_1','Error: incapaz de abrir para lectura:');
define('_MODIFY_FILE_2','Error: incapaz de abrir para escritura:');
define('_MODIFY_FILE_3','0 l�neas cambiadas, no hay cambios');
define('_MYPHPNUKE_1','�Actualizando desde MyPHPNuke 1.8.7?');
define('_MYPHPNUKE_2','Presione el bot�n <b>MyPHPNuke 1.8.7</b>');
define('_MYPHPNUKE_3','�Actualizando desde MyPHPNuke 1.8.8b2?');
define('_MYPHPNUKE_4','Presione el bot�n <b>MyPHPNuke 1.8.8</b>');
define('_NEWINSTALL','Nueva instalaci�n');
define('_NEW_INSTALL_1','Usted ha elegido realizar una instalaci�n nueva. Debajo est� la informaci�n que usted ha introducido.');
define('_NEW_INSTALL_2','Dos son los pasos necesarios para tener la base de datos de PostNuke funcionando. Primero se crea la base de datos y segundo, se insertan los datos iniciales.<br><br>Si tiene acceso para crear bases de datos, compruebe la casilla <b>crear base de datos</b> y este script ser� capaz de crear una base de datos vacia para usted. De lo contrario, pulse en <B>start</B>.<br>Si usted no tiene acceso como root, necesita crear primero la base de datos manualmente.<br>De esa manera, este script podr� crear y rellenar la base de datos por usted.');
define('_NEW_INSTALL_3','Crear la Base de Datos');
// define('_NEWTABLES_1','Incapaz de seleccionar la base de datos. Usted debe o crear la base de datos manualmente, o, si usted tiene acceso como root (Administrador), dejar que el script de instalaci�n lo haga por usted.');
// define('_NO','No');
define('_NOTMADE','Incapaz de hacerlo ');
define('_NOTSELECT','Incapaz de seleccionar la base de datos.');
define('_NOTUPDATED','Incapaz de actualizar ');
// define('_PERCENT','por ciento');
define('_PHP_CHECK_1','Su versi�n de PHP es ');
define('_PHP_CHECK_2','Necesita actualizar PHP, al menos, hasta la versi�n 4.0.1 - <a href=\'http://www.php.net\'>http://www.php.net</a>');
define('_PHP_CHECK_3','�Mal! magic_quotes_gpc est� Off.<br>A menudo, esto se puede corregir usando un fichero <B>.htaccess</B> que contenga esta l�nea:<br>php_flag magic_quotes_gpc On');
define('_PHP_CHECK_4','�Mal! magic_quotes_runtime est� On.<br>A menudo, esto se puede corregir usando un fichero <B>.htaccess</B> que contenga la l�nea:<br>php_flag magic_quotes_runtime Off');
define('_PHPNUKE_10','Presine el bot�n <b>PHP-Nuke 5.3.1</b>');
define('_PHPNUKE_11','�Actualizando desde PHP-Nuke 5.4?');
define('_PHPNUKE_12','Presione el bot�n <b>PHP-Nuke 5.4</b>');
define('_PHPNUKE_1','�Actualizando desde PHP-Nuke 4.4?');
define('_PHPNUKE_2','Por favor, lea la siguiente nota y presione el bot�n <b>PHP-Nuke 4.4</b> cuando se encuentre preparado.<br><br> Este script dejar� intacta su base de datos del foro, pero esta versi�n no gestiona los datos. <i>Hay un script de actualizaci�n para los datos de este foro que est� siendo probado actualmente. Puede ser localizado en cvs de pn-modules</i><br><br> Nosotros no hemos incluido PHPBB en esta versi�n, pero el script de actualizaci�n es el mismo. No destruir� ninguno se sus datos.');
define('_PHPNUKE_3','�Actualizando desde PHP-Nuke 5?');
define('_PHPNUKE_4','Presione el bot�n <b>PHP-Nuke 5</b>');
define('_PHPNUKE_5','�Actualizando desde PHP-Nuke 5.2?');
define('_PHPNUKE_6','Presione el bot�n <b>PHP-Nuke 5.2</b>');
define('_PHPNUKE_7','�Actualizando desde PHP-Nuke 5.3?');
define('_PHPNUKE_8','Presione el bot�n <b>PHP-Nuke 5.3</b>');
define('_PHPNUKE_9','�Actualizando desde PHP-Nuke 5.3.1?');
define('_PN6_1','Admin: �Usted necesitar� volver a salvar la configuraci�n de su sitio en la �Admin Page ASAP�!');
define('_PN6_2','(Nuestras disculpas por esta inconveniencia)');
define('_PN6_3','ERROR: Fichero no encontrado: ');
define('_PN6_4','Realizada la conversi�n desde el �button blocks� antiguo.');
define('_POSTNUKE_10','Presione el bot�n <b>PostNuke .64</b>');
define('_POSTNUKE_11','�Actualizando desde PostNuke .7?');
define('_POSTNUKE_12','Presione el bot�n <b>PostNuke 7</b>');
define('_POSTNUKE_13','�Actualizando desde PostNuke .71?');
// define('_POSTNUKE_13','Validando tablas');
define('_POSTNUKE_14','Presione el bot�n <b>PostNuke 71</b>');
define('_POSTNUKE_15','�Validando el idioma de su sistema?');
define('_POSTNUKE_16','Presione el bot�n <b>Validar</b>');
define('_POSTNUKE_17','�Validando la estructura de sus tablas?');
define('_POSTNUKE_18','Presione el bot�n <b>Validar</b>');
define('_POSTNUKE_19','Actualizando desde PostNuke .72?');
define('_POSTNUKE_20','Presione el bot�n <b>PostNuke 72</b>');
define('_POSTNUKE_1','�Actualizando desde PostNuke .5x?');
define('_POSTNUKE_2','Presione el bot�n <b>PostNuke .5</b>');
define('_POSTNUKE_3','�Actualizando desde PostNuke .6 / .61?');
define('_POSTNUKE_4','Presione el bot�n <b>PostNuke .6</b>');
define('_POSTNUKE_5','�Actualizando desde PostNuke .62?');
define('_POSTNUKE_6','Presione el bot�n <b>PostNuke .62</b>');
define('_POSTNUKE_7','�Actualizando desde PostNuke .63?');
define('_POSTNUKE_8','Presione el bot�n <b>PostNuke .63</b><br>');
define('_POSTNUKE_9','�Actualizando desde PostNuke .64?');
define('_PWBADMATCH', 'THa habido alg�n error y las contrase�as que ha introducido no coinciden. Vuelva atr�s y reescriba las contrase�as, asegurandose de que son las mismas.');
define('_QUOTESCHECK_1','Verificando NS-Quotes');
define('_QUOTESCHECK_2','El antiguo m�dulo NS-Quotes va a ser sustituido por el nuevo m�dulo <b>Quotes</b>.<br> Por favor, elimine el directorio <i>modules/NS-Quotes</i>.');
define('_SELECT_LANGUAGE_1','Seleccione su idioma.');
define('_SELECT_LANGUAGE_2','Idioma: ');
define('_SHOW_ERROR_INFO_1','Error de Escritura</b> incapaz de actualizar su fichero \'config.php\'<br/> Usted podr�a modificar este fichero usando un editor de textos.<br/> Aqu� est�n los cambios requeridos:');
define('_SKIPPED','Saltando.');
define('_SUBMIT_1','Por favor, revise la informaci�n y asegurese de que esta es correcta.');
define('_SUBMIT_2','Usted ha introducido la siguiente informaci�n:');
define('_SUBMIT_3','seleccione <b>Nueva Instalaci�n</b> o <b>Actualizaci�n</b> para continuar.');
define('_SUCCESS_1','Finalizado');
define('_SUCCESS_2','Su actualizaci�n a la �ltima versi�n de PostNuke ha finalizado.<br> Recuerde cambiar su configuraci�n en config.php antes de usarlo por primera vez.');
define('_UPDATED',' actualizado.');
define('_UPDATING','Actualizando las tablas: ');
define('_UPGRADE_1','Actualizaciones');
define('_UPGRADE_2','Aqu� es donde usted puede elegir desde que CMS va a actualizarse.<br><br><center> Seleccione <b>PHP-Nuke</b> para actualizar una instalaci�n ya existente.<br> Seleccione <b>PostNuke</b> para actualizar una instalaci�n de Postnuke.<br> Seleccione <b>MyPHPNuke</b> para actualizar una instalaci�n de MyPHPNuke.');
define('_UPGRADETAKESALONGTIME','Llevar a cabo una actualizaci�n a PostNuke puede puede tardar tanto un largo tiempo como solo unos minutos. Cuando seleccione una opci�n de actualizaci�n, por favor, seleccionela solamente una vez y espere a que aparezca la siguiente pantalla. Pulsando varias veces en la opci�n puede provocar que el proceso de actualizaci�n falle.');
// define('_YES', 'Si');
?>
