<?php // $Id: global.php,v 1.1 2004/03/01 10:09:15 mbertier Exp $ $Name:  $
// ----------------------------------------------------------------------
// Original Author of file: Gregor J. Rothfuss
// Purpose of file: Installer language defines.
// ----------------------------------------------------------------------
// Author of Brazilian Portuguese version: Pedro Innecco
// Corretions/additions by:
// Pedro Innecco
// Valdemar Biondo Junior
// ----------------------------------------------------------------------
//
define('_ADMIN_EMAIL','Email do administrador');
define('_ADMIN_LOGIN','Usu�rio do administrador');
define('_ADMIN_NAME','Nome do administrador');
define('_ADMIN_PASS','Senha do administrador');
define('_ADMIN_REPEATPASS','Verifique senha do administrador');
define('_ADMIN_URL','Admin URL');
define('_BTN_CHANGEINFO','Modificar Informa��o');
define('_BTN_NEWINSTALL','Nova Instala��o');
define('_BTN_UPGRADE','Atualiza��o');
define('_BTN_CONTINUE','Continuar');
define('_BTN_FINISH','Finalizar');
define('_BTN_NEXT','Prosseguir');
define('_BTN_RECHECK','Verificar novamente');
define('_BTN_SET_LANGUAGE','Selecione o idioma');
define('_BTN_SET_LOGIN','Definir Login');
define('_BTN_START','Iniciar');
define('_BTN_SUBMIT','Enviar');
define('_CHANGE_INFO_1',' Por favor corrija as informa��es sobre o seu banco de dados.');
define('_CHARSET','ISO-8859-1');
define('_CHMOD_CHECK_1','Verificando atributos de acesso aos arquivos de configura��o (CHMOD)');
define('_CHMOD_CHECK_2','Primeiro precisamos verificar se os seus valores CHMOD est�o corretos para que o script possa modificar os arquivos necess�rios.  Se os valores n�o estiverem corretos, este script n�o poder� encriptar o seus dados no seu arquivo de configura��o.  Encripta��o de dados SQL � uma adi��o de seguran�a efetuado por este script. Voc� n�o poder� atualizar as suas prefer�ncias de administrador uma vez que o seu site esteja em produ��o.');
define('_CHMOD_CHECK_3','Valor CHMOD para o config.php � 666 -- correto, o script tem acesso de modifica��o ao arquivo');
define('_CHMOD_CHECK_4','Por favor atribua o valor CHMOD 666 ao config.php para que o script possa modificar e encriptar o banco de dados');
define('_CHMOD_CHECK_5','Valor CHMOD para o config-old.php � 666 -- correto, o script tem acesso de modifica��o ao arquivo');
define('_CHMOD_CHECK_6','Por favor atribua o valor CHMOD 666 ao config-old.php para que o script possa modificar e encriptar o banco de dados');
define('_CHM_CHECK_1','Por favor entre com as informa��es do seu banco de dados.  Se voc� n�o tem acesso root ao seu banco de dados (hosting virtual, etc), voc� dever� criar o seu banco de dados antes de prosseguir. Como regra b�sica, se voc� n�o pode criar um banco de dados utilizando o phpMyAdmin pelo fato de estar utilizando hosting virtual, ou por motivos de seguran�a do mySQL, ent�o este script n�o poder� criar o banco de dados para voc�.  No entanto, este script ainda precisa ser executado para preencher o banco de dados.');
define('_CONTINUE_1','Definindo suas prefer�ncias do banco de dados');
define('_CONTINUE_2','Voc� agora pode configurar uma conta administrativa. Se voc� saltar esta parte da configura��o, o seu login para a conta administrativa ser� Admin / Password (case sensitive).  � recomend�vel que voc� configure a conta administrativa agora, e n�o espere para mais tarde.');
define('_DBHOST','Servidor do banco de dados (host)');
define('_DBINFO','Informa��es sobre o banco de dados');
define('_DBNAME','Nome do banco de dados (name)');
define('_DBPASS','Senha do banco de dados (password)');
define('_DBPREFIX','Prefixo da tabela (necess�rio apenas para compartilhamento de tabelas)');
define('_DBTYPE','Tipo de banco de dados');
define('_DBUNAME','Nome de usu�rio do banco de dados (username)');
define('_DEFAULT_1','Este script instalar� o banco de dados PostNuke e lhe ajudar� a definir as vari�veis necess�rias para come�ar. Voc� ser� encaminhado a diversas p�ginas. Cada p�gina efetuar� diferentes por��es do script. Estimamos que todo o processo levar� aproximadamente dez minutos. Se voc� tiver d�vidas em qualquer momento, por favor visite nossos forums de suporte para obter ajuda.');
define('_DEFAULT_2','Nossa licen�a');
define('_DEFAULT_3','Por favor leia com aten��o a licensa GNU General Public License. PostNuke � desevolvido como software livre, mas existem certos requerimentos para distribui��o e modifica��o.');
define('_DONE','Finalizado.');
define('_FINISH_1','Cr�ditos');
define('_FINISH_2','Estes s�o os scripts e as pessoas que fazem com que o PostNuke siga adiante. Tome seu tempo e permita que estas pessoas saibam o quanto voc� aprecia o trabalho deles. Se voc� deseja ser listado aqui, entre em contato com a gente para mais informa��es sobre como fazer parte do time de desenvolvimento. N�s sempre estamos aceitando ajuda.');
define('_FINISH_3','A instala��o do PostNuke terminou. Se voc� encontrou algum problema, por favor informe-nos.  Assegure-se de remover este script. Voc� n�o precisar� dele novamente.');
define('_FINISH_4','Ir ao seu site PostNuke');
define('_FOOTER_1','Obrigado por utilizar o PostNuke e seja bem vindo a nossa comunidade.');
define('_FORUM_INFO_1','Suas tabelas para forums n�o foram modificadas.<br><br>Para sua informa��o, estas tabelas s�o as seguintes:');
define('_FORUM_INFO_2','Portanto, voc� pode remover estas tabelas se voc� n�o deseja utilizar forums.');
define('_INPUT_DATA_1','Dados enviados');
define('_INSTALLATION','Instala��o do Postnuke');
define('_ISINTRANET','Este site � para uma intranet ou para outro uso local (inacess�vel pela internet)');
define('_INTRANETINFO','Voc� dever� selecionar a op��o "intranet" acima se o seu site n�o utiliza um endere�o de internet totalmente qualificado para acesso.  Exemplos de nomes totalmente qualificados s�o www.postnuke.com e foo.bar.com.  Exemplos de nomes que n�o s�o qualificados totalmente s�o foo.com, localhost, e mysite.org  Se voc� n�o atribuir este parametro corretamente, poder� acontecer que voc� n�o possa entrar no seu site. Se acontecer que uma vez que a instala��o tenha terminado voc� n�o pode entrar no site, por favor execute a instala��o novamente e abilite a op��o "Intranet".<br>Este op��o tamb�m ajuda a resolver um problema de sess�es encontrado em alguns n�veis de PHP.');
define('_MADE','feito.');
define('_MAKE_DB_1','N�o foi poss�vel criar o novo banco de dados');
define('_MAKE_DB_2','foi criado com sucesso.');
define('_MAKE_DB_3','N�o foi necess�rio criar um novo banco de dados.');
define('_MODIFY_FILE_1','Ocorreu um erro, pois n�o foi poss�vel abrir o seguinte arquivo para leitura:');
define('_MODIFY_FILE_2','Ocorreu um erro, pois n�o foi poss�vel abrir o seguinte arquivo para grava��o:');
define('_MODIFY_FILE_3','0 linhas modificadas, nada ocorreu');
define('_MYPHPNUKE_1','Atualizando o MyPHPNuke 1.8.7?');
define('_MYPHPNUKE_2','Pressione o bot�o <b>MyPHPNuke 1.8.7</b>');
define('_MYPHPNUKE_3','Atualizando o MyPHPNuke 1.8.8b2?');
define('_MYPHPNUKE_4','Pressione o bot�o <b>MyPHPNuke 1.8.8</b>');
define('_NEWTABLES_1','N�o foi poss�vel selecionar o banco de dados. Ou voc� precisa criar o seu banco de dados manualmente ou se voc� tem acesso root, deixe este script faz�-lo para voc�.');
define('_NEW_INSTALL_1','Voc� optou por realizar uma nova instala��o. Segue abaixo as informa��es que voc� indicou.');
define('_NEW_INSTALL_2','Se voc� tem acesso root, selecione a op��o <b>criar o banco de dados</b>. De outra forma, simplesmente clique no bot�o iniciar.<br>Se voc� n�o tem acesso root voc� deve criar o banco de dados manualmente e este script adicionar� as tabelas necess�rias para voc�.');
define('_NEW_INSTALL_3','Criar o banco de dados');
define('_NOTMADE','N�o foi poss�vel criar ');
define('_NO','N�o');
define('_NOTSELECT','N�o foi poss�vel selecionar o banco de dados.');
define('_NOTUPDATED','N�o foi poss�vel atualizar ');
define('_PHPNUKE_1','Atualizando o PHP-Nuke 4.4?');
define('_PHPNUKE_2','Por favor, leia a seguinte nota, e pressione o bot�o <b>PHP-Nuke 4.4</b> ao terminar.<br><br> Este script deixar� os dados do seu banco de dados de forums intactos, mas esta vers�o n�o ir� gerenciar os dados.<i> H� um script de upgrade para os dados de forums que est� sendo testado. No momento este se encontra no CVS pn-modules</i><br><br> N�s n�o temos o PHPBB inclu�do neste lan�amento, mas o script de upgrade � o mesmo. O script n�o destruir� nehum dos seus dados.');
define('_PHPNUKE_3','Atualizando o PHP-Nuke 5?');
define('_PHPNUKE_4','Pressione o bot�o <b>PHP-Nuke 5</b>');
define('_PHPNUKE_5','Atualizando o PHP-Nuke 5.2?');
define('_PHPNUKE_6','Pressione o bot�o <b>PHP-Nuke 5.2</b>');
define('_PHPNUKE_7','Atualizando o PHP-Nuke 5.3?');
define('_PHPNUKE_8','Pressione o bot�o <b>PHP-Nuke 5.3</b>');
define('_PHPNUKE_9','Atualizando o PHP-Nuke 5.3.1?');
define('_PHPNUKE_10','Pressione o bot�o <b>PHP-Nuke 5.3.1</b>');
define('_PHPNUKE_11','Atualizando o PHP-Nuke 5.4?');
define('_PHPNUKE_12','Pressione o bot�o <b>PHP-Nuke 5.4</b>');
define('_PHP_CHECK_1','A vers�o do PHP de seu servidor:');
define('_PHP_CHECK_2','Voc� deve atualizar o PHP como m�nimo para a vers�o 4.0.1 - <a href=\'http://www.php.net\'>http://www.php.net</a>');
define('_PHP_CHECK_3','Isto n�o � bom! magic_quotes_gpc est� desligado (Off).<br>Isto normalmente pode ser repadado utilizando um arquivo .htaccess com a seguinte linha:<br>php_flag magic_quotes_gpc On');
define('_PHP_CHECK_4','Isto n�o � bom! magic_quotes_runtime est� ligado (On).<br>Isto normalmente pode ser repadado utilizando um arquivo .htaccess com a seguinte linha:<br>php_flag magic_quotes_runtime Off');
define('_PN6_1','Admin: Voc� dever� gravar novamente as prefer�ncias do seu Website na p�gina de administra��o o antes poss�vel!');
define('_PN6_2','(lamentamos por ainda n�o termos automatizado essa tarefa)');
define('_PN6_3','Ocorreu um erro, pois o seguinte arquivo n�o foi encontrado: ');
define('_PN6_4','Finalizada a conver��o \"old-style button blocks\".');
define('_POSTNUKE_1','Atualizando o PostNuke .5x?');
define('_POSTNUKE_10','Pressione o bot�o <b>PostNuke .64</b>');
define('_POSTNUKE_11','Atualizando o PostNuke .7?');
define('_POSTNUKE_12','Pressione o bot�o <b>Upgrade 7</b>');
define('_POSTNUKE_13','Atualizando o PostNuke .71?');
define('_POSTNUKE_14','Pressione o bot�o <b>PostNuke .71</b>');
define('_POSTNUKE_16','Pressione o bot�o <b>Validate</b>');
define('_POSTNUKE_17','Validar a sua estrutura de tabela?');
define('_POSTNUKE_18','Pressione o bot�o <b>Validate</b>');

define('_POSTNUKE_19','Atualizando o PostNuke .72?');
define('_POSTNUKE_20','Pressione o bot�o <b>PostNuke .72</b>');

define('_POSTNUKE_2','Pressione o bot�o <b>PostNuke .5</b>');
define('_POSTNUKE_3','Atualizando o PostNuke .6 / .61?');
define('_POSTNUKE_4','Pressione o bot�o <b>PostNuke .6</b>');
define('_POSTNUKE_5','Atualizando o PostNuke .62?');
define('_POSTNUKE_6','Pressione o bot�o <b>PostNuke .62</b>');
define('_POSTNUKE_7','Atualizando o PostNuke .63?');
define('_POSTNUKE_8','Pressione o bot�o <b>PostNuke .63</b><br>');
define('_POSTNUKE_9','Atualizando o PostNuke .64?');
define('_PWBADMATCH','As senhas de acesso fornecidas n�o confirmam.  Por favor volte para a p�gina anterior e verifique que as senhas fornecidas.');
define('_SELECT_LANGUAGE_1','Selecione o seu idioma.');
define('_SELECT_LANGUAGE_2','Idioma: ');
define('_SHOW_ERROR_INFO_1','Ocorreu um erro de grava��o, pois </b>n�o foi poss�vel atualizar o arquivo \'config.php\'<br> Voc� dever� modificar este arquivo manualmente utilizando um editor de texto.<br> Segue as modifica��es necess�rias:');
define('_SKIPPED','Ignorado.');
define('_SUBMIT_1','Por favor, confirma que a informa��o seja correta.');
define('_SUBMIT_2','Voc� forneceu a seguinte informa��o:');
define('_SUBMIT_3','Selecione <b>Nova Instala��o</b> ou <b>Atualiza��o</b> para continuar.');
define('_SUCCESS_1','Finalizado');
define('_SUCCESS_2','A sua atualiza��o para a �ltima vers�o do PostNuke terminou.<br> Lembre-se de modificar as prefer�ncias do seu config.php antes de utilizar-lo pela primeira vez.');
define('_UPDATED',' atualizada.');
define('_UPDATING','Atualizando a tabela: ');
define('_UPGRADETAKESALONGTIME','Prosseguir com um upgrade do PostNuke pode demorar v�rios minutos.  Ao selecionar uma op��o de upgrade por favor selecione a op��o somente uma vez, e espere pela pr�xima tela.  Clicar sobre uma op��o de upgrade diversas vezes poder� causar uma falha no processo de atualiza��o');
define('_UPGRADE_1','Atualiza��es');
define('_UPGRADE_2','Aqui voc� pode selecionar que sistema CMS voc� deseja atualizar.<br><br><center> Selecione <b>PHP-Nuke</b> para atualizar uma instala��o PHP-Nuke existente.<br> Selecione <b>PostNuke</b> para atualizar uma instala��o PostNuke existente.<br> Selecione <b>MyPHPNuke</b> para atualizar uma instala��o MyPHPNuke existente.');
define('_YES', 'Sim');
?>