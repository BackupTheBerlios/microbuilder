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
define('_ADMIN_LOGIN','Usuário do administrador');
define('_ADMIN_NAME','Nome do administrador');
define('_ADMIN_PASS','Senha do administrador');
define('_ADMIN_REPEATPASS','Verifique senha do administrador');
define('_ADMIN_URL','Admin URL');
define('_BTN_CHANGEINFO','Modificar Informação');
define('_BTN_NEWINSTALL','Nova Instalação');
define('_BTN_UPGRADE','Atualização');
define('_BTN_CONTINUE','Continuar');
define('_BTN_FINISH','Finalizar');
define('_BTN_NEXT','Prosseguir');
define('_BTN_RECHECK','Verificar novamente');
define('_BTN_SET_LANGUAGE','Selecione o idioma');
define('_BTN_SET_LOGIN','Definir Login');
define('_BTN_START','Iniciar');
define('_BTN_SUBMIT','Enviar');
define('_CHANGE_INFO_1',' Por favor corrija as informações sobre o seu banco de dados.');
define('_CHARSET','ISO-8859-1');
define('_CHMOD_CHECK_1','Verificando atributos de acesso aos arquivos de configuração (CHMOD)');
define('_CHMOD_CHECK_2','Primeiro precisamos verificar se os seus valores CHMOD estão corretos para que o script possa modificar os arquivos necessários.  Se os valores não estiverem corretos, este script não poderá encriptar o seus dados no seu arquivo de configuração.  Encriptação de dados SQL é uma adição de segurança efetuado por este script. Você não poderá atualizar as suas preferências de administrador uma vez que o seu site esteja em produção.');
define('_CHMOD_CHECK_3','Valor CHMOD para o config.php é 666 -- correto, o script tem acesso de modificação ao arquivo');
define('_CHMOD_CHECK_4','Por favor atribua o valor CHMOD 666 ao config.php para que o script possa modificar e encriptar o banco de dados');
define('_CHMOD_CHECK_5','Valor CHMOD para o config-old.php é 666 -- correto, o script tem acesso de modificação ao arquivo');
define('_CHMOD_CHECK_6','Por favor atribua o valor CHMOD 666 ao config-old.php para que o script possa modificar e encriptar o banco de dados');
define('_CHM_CHECK_1','Por favor entre com as informações do seu banco de dados.  Se você não tem acesso root ao seu banco de dados (hosting virtual, etc), você deverá criar o seu banco de dados antes de prosseguir. Como regra básica, se você não pode criar um banco de dados utilizando o phpMyAdmin pelo fato de estar utilizando hosting virtual, ou por motivos de segurança do mySQL, então este script não poderá criar o banco de dados para você.  No entanto, este script ainda precisa ser executado para preencher o banco de dados.');
define('_CONTINUE_1','Definindo suas preferências do banco de dados');
define('_CONTINUE_2','Você agora pode configurar uma conta administrativa. Se você saltar esta parte da configuração, o seu login para a conta administrativa será Admin / Password (case sensitive).  É recomendável que você configure a conta administrativa agora, e não espere para mais tarde.');
define('_DBHOST','Servidor do banco de dados (host)');
define('_DBINFO','Informações sobre o banco de dados');
define('_DBNAME','Nome do banco de dados (name)');
define('_DBPASS','Senha do banco de dados (password)');
define('_DBPREFIX','Prefixo da tabela (necessário apenas para compartilhamento de tabelas)');
define('_DBTYPE','Tipo de banco de dados');
define('_DBUNAME','Nome de usuário do banco de dados (username)');
define('_DEFAULT_1','Este script instalará o banco de dados PostNuke e lhe ajudará a definir as variáveis necessárias para começar. Você será encaminhado a diversas páginas. Cada página efetuará diferentes porções do script. Estimamos que todo o processo levará aproximadamente dez minutos. Se você tiver dúvidas em qualquer momento, por favor visite nossos forums de suporte para obter ajuda.');
define('_DEFAULT_2','Nossa licença');
define('_DEFAULT_3','Por favor leia com atenção a licensa GNU General Public License. PostNuke é desevolvido como software livre, mas existem certos requerimentos para distribuição e modificação.');
define('_DONE','Finalizado.');
define('_FINISH_1','Créditos');
define('_FINISH_2','Estes são os scripts e as pessoas que fazem com que o PostNuke siga adiante. Tome seu tempo e permita que estas pessoas saibam o quanto você aprecia o trabalho deles. Se você deseja ser listado aqui, entre em contato com a gente para mais informações sobre como fazer parte do time de desenvolvimento. Nós sempre estamos aceitando ajuda.');
define('_FINISH_3','A instalação do PostNuke terminou. Se você encontrou algum problema, por favor informe-nos.  Assegure-se de remover este script. Você não precisará dele novamente.');
define('_FINISH_4','Ir ao seu site PostNuke');
define('_FOOTER_1','Obrigado por utilizar o PostNuke e seja bem vindo a nossa comunidade.');
define('_FORUM_INFO_1','Suas tabelas para forums não foram modificadas.<br><br>Para sua informação, estas tabelas são as seguintes:');
define('_FORUM_INFO_2','Portanto, você pode remover estas tabelas se você não deseja utilizar forums.');
define('_INPUT_DATA_1','Dados enviados');
define('_INSTALLATION','Instalação do Postnuke');
define('_ISINTRANET','Este site é para uma intranet ou para outro uso local (inacessível pela internet)');
define('_INTRANETINFO','Você deverá selecionar a opção "intranet" acima se o seu site não utiliza um endereço de internet totalmente qualificado para acesso.  Exemplos de nomes totalmente qualificados são www.postnuke.com e foo.bar.com.  Exemplos de nomes que não são qualificados totalmente são foo.com, localhost, e mysite.org  Se você não atribuir este parametro corretamente, poderá acontecer que você não possa entrar no seu site. Se acontecer que uma vez que a instalação tenha terminado você não pode entrar no site, por favor execute a instalação novamente e abilite a opção "Intranet".<br>Este opção também ajuda a resolver um problema de sessões encontrado em alguns níveis de PHP.');
define('_MADE','feito.');
define('_MAKE_DB_1','Não foi possível criar o novo banco de dados');
define('_MAKE_DB_2','foi criado com sucesso.');
define('_MAKE_DB_3','Não foi necessário criar um novo banco de dados.');
define('_MODIFY_FILE_1','Ocorreu um erro, pois não foi possível abrir o seguinte arquivo para leitura:');
define('_MODIFY_FILE_2','Ocorreu um erro, pois não foi possível abrir o seguinte arquivo para gravação:');
define('_MODIFY_FILE_3','0 linhas modificadas, nada ocorreu');
define('_MYPHPNUKE_1','Atualizando o MyPHPNuke 1.8.7?');
define('_MYPHPNUKE_2','Pressione o botão <b>MyPHPNuke 1.8.7</b>');
define('_MYPHPNUKE_3','Atualizando o MyPHPNuke 1.8.8b2?');
define('_MYPHPNUKE_4','Pressione o botão <b>MyPHPNuke 1.8.8</b>');
define('_NEWTABLES_1','Não foi possível selecionar o banco de dados. Ou você precisa criar o seu banco de dados manualmente ou se você tem acesso root, deixe este script fazê-lo para você.');
define('_NEW_INSTALL_1','Você optou por realizar uma nova instalação. Segue abaixo as informações que você indicou.');
define('_NEW_INSTALL_2','Se você tem acesso root, selecione a opção <b>criar o banco de dados</b>. De outra forma, simplesmente clique no botão iniciar.<br>Se você não tem acesso root você deve criar o banco de dados manualmente e este script adicionará as tabelas necessárias para você.');
define('_NEW_INSTALL_3','Criar o banco de dados');
define('_NOTMADE','Não foi possível criar ');
define('_NO','Não');
define('_NOTSELECT','Não foi possível selecionar o banco de dados.');
define('_NOTUPDATED','Não foi possível atualizar ');
define('_PHPNUKE_1','Atualizando o PHP-Nuke 4.4?');
define('_PHPNUKE_2','Por favor, leia a seguinte nota, e pressione o botão <b>PHP-Nuke 4.4</b> ao terminar.<br><br> Este script deixará os dados do seu banco de dados de forums intactos, mas esta versão não irá gerenciar os dados.<i> Há um script de upgrade para os dados de forums que está sendo testado. No momento este se encontra no CVS pn-modules</i><br><br> Nós não temos o PHPBB incluído neste lançamento, mas o script de upgrade é o mesmo. O script não destruirá nehum dos seus dados.');
define('_PHPNUKE_3','Atualizando o PHP-Nuke 5?');
define('_PHPNUKE_4','Pressione o botão <b>PHP-Nuke 5</b>');
define('_PHPNUKE_5','Atualizando o PHP-Nuke 5.2?');
define('_PHPNUKE_6','Pressione o botão <b>PHP-Nuke 5.2</b>');
define('_PHPNUKE_7','Atualizando o PHP-Nuke 5.3?');
define('_PHPNUKE_8','Pressione o botão <b>PHP-Nuke 5.3</b>');
define('_PHPNUKE_9','Atualizando o PHP-Nuke 5.3.1?');
define('_PHPNUKE_10','Pressione o botão <b>PHP-Nuke 5.3.1</b>');
define('_PHPNUKE_11','Atualizando o PHP-Nuke 5.4?');
define('_PHPNUKE_12','Pressione o botão <b>PHP-Nuke 5.4</b>');
define('_PHP_CHECK_1','A versão do PHP de seu servidor:');
define('_PHP_CHECK_2','Você deve atualizar o PHP como mínimo para a versão 4.0.1 - <a href=\'http://www.php.net\'>http://www.php.net</a>');
define('_PHP_CHECK_3','Isto não é bom! magic_quotes_gpc está desligado (Off).<br>Isto normalmente pode ser repadado utilizando um arquivo .htaccess com a seguinte linha:<br>php_flag magic_quotes_gpc On');
define('_PHP_CHECK_4','Isto não é bom! magic_quotes_runtime está ligado (On).<br>Isto normalmente pode ser repadado utilizando um arquivo .htaccess com a seguinte linha:<br>php_flag magic_quotes_runtime Off');
define('_PN6_1','Admin: Você deverá gravar novamente as preferências do seu Website na página de administração o antes possível!');
define('_PN6_2','(lamentamos por ainda não termos automatizado essa tarefa)');
define('_PN6_3','Ocorreu um erro, pois o seguinte arquivo não foi encontrado: ');
define('_PN6_4','Finalizada a converção \"old-style button blocks\".');
define('_POSTNUKE_1','Atualizando o PostNuke .5x?');
define('_POSTNUKE_10','Pressione o botão <b>PostNuke .64</b>');
define('_POSTNUKE_11','Atualizando o PostNuke .7?');
define('_POSTNUKE_12','Pressione o botão <b>Upgrade 7</b>');
define('_POSTNUKE_13','Atualizando o PostNuke .71?');
define('_POSTNUKE_14','Pressione o botão <b>PostNuke .71</b>');
define('_POSTNUKE_16','Pressione o botão <b>Validate</b>');
define('_POSTNUKE_17','Validar a sua estrutura de tabela?');
define('_POSTNUKE_18','Pressione o botão <b>Validate</b>');

define('_POSTNUKE_19','Atualizando o PostNuke .72?');
define('_POSTNUKE_20','Pressione o botão <b>PostNuke .72</b>');

define('_POSTNUKE_2','Pressione o botão <b>PostNuke .5</b>');
define('_POSTNUKE_3','Atualizando o PostNuke .6 / .61?');
define('_POSTNUKE_4','Pressione o botão <b>PostNuke .6</b>');
define('_POSTNUKE_5','Atualizando o PostNuke .62?');
define('_POSTNUKE_6','Pressione o botão <b>PostNuke .62</b>');
define('_POSTNUKE_7','Atualizando o PostNuke .63?');
define('_POSTNUKE_8','Pressione o botão <b>PostNuke .63</b><br>');
define('_POSTNUKE_9','Atualizando o PostNuke .64?');
define('_PWBADMATCH','As senhas de acesso fornecidas não confirmam.  Por favor volte para a página anterior e verifique que as senhas fornecidas.');
define('_SELECT_LANGUAGE_1','Selecione o seu idioma.');
define('_SELECT_LANGUAGE_2','Idioma: ');
define('_SHOW_ERROR_INFO_1','Ocorreu um erro de gravação, pois </b>não foi possível atualizar o arquivo \'config.php\'<br> Você deverá modificar este arquivo manualmente utilizando um editor de texto.<br> Segue as modificações necessárias:');
define('_SKIPPED','Ignorado.');
define('_SUBMIT_1','Por favor, confirma que a informação seja correta.');
define('_SUBMIT_2','Você forneceu a seguinte informação:');
define('_SUBMIT_3','Selecione <b>Nova Instalação</b> ou <b>Atualização</b> para continuar.');
define('_SUCCESS_1','Finalizado');
define('_SUCCESS_2','A sua atualização para a última versão do PostNuke terminou.<br> Lembre-se de modificar as preferências do seu config.php antes de utilizar-lo pela primeira vez.');
define('_UPDATED',' atualizada.');
define('_UPDATING','Atualizando a tabela: ');
define('_UPGRADETAKESALONGTIME','Prosseguir com um upgrade do PostNuke pode demorar vários minutos.  Ao selecionar uma opção de upgrade por favor selecione a opção somente uma vez, e espere pela próxima tela.  Clicar sobre uma opção de upgrade diversas vezes poderá causar uma falha no processo de atualização');
define('_UPGRADE_1','Atualizações');
define('_UPGRADE_2','Aqui você pode selecionar que sistema CMS você deseja atualizar.<br><br><center> Selecione <b>PHP-Nuke</b> para atualizar uma instalação PHP-Nuke existente.<br> Selecione <b>PostNuke</b> para atualizar uma instalação PostNuke existente.<br> Selecione <b>MyPHPNuke</b> para atualizar uma instalação MyPHPNuke existente.');
define('_YES', 'Sim');
?>