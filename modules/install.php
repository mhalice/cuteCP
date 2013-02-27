<?php
/*
 * Este sistema web é protegido por leis internacionais 
 * e pela lei de Deus.
 *
 * Afinal de contas, só Deus sabe como essa merda funciona..
 * -------------
 * desenvolvido por eru yuuko
 */
	if( !DEFINED( 'IS_RUN' ) || file_exists( 'system/configuracao.php' ) )
		exit();
	
	require_once 'system/nucleo.php';
		
	if( $_POST )
	{
		$dados = $core->request( 'POST' );
		$try = @mysql_connect( $dados[ 'ip_do_host' ], $dados[ 'mysql_user' ], $dados[ 'mysql_pass' ] )
			or die( "Oops! Aparentemente você digitou dados incorretos para conexão com o mysql. <a href=\"?module=install\">Tentar novamente.</a>" );
		$file = '<?php
/*
 * Este sistema web é protegido por leis internacionais 
 * e pela lei de Deus.
 *
 * Afinal de contas, só Deus sabe como essa merda funciona..
 * -------------
 * desenvolvido por eru yuuko
 */

// configurações gerais
define( "CP_TITLE", "'. $dados[ 'titulo_do_painel' ] .'" ); // titulo do painel
define( "CP_DESC", "Painel de Controle" ); // descrição do painel
define( "THEME", "'. $dados[ 'template' ] .'" ); // tema
define( "GM_LEVEL_TABLE", "'. $dados[ 'gm_table' ] .'" ); // tabela que utilizada para nivel de GM (novos emuladores utilizam a tabela group_id)

// configurações da database
define( "SERVER_HOST", "'. $dados[ 'ip_do_host' ] .'" ); // ip do host
define( "HOST_USER", "'. $dados[ 'mysql_user' ] .'" ); // usuario do mysql
define( "HOST_PASS", "'. $dados[ 'mysql_pass' ] .'" ); // senha do mysql
define( "SERVER_DATABASE", "'. $dados[ 'mysql_database' ] .'" ); // database do servidor

// configuração das portas
define( "PORTA_LOGIN", "'. $dados[ 'porta_login' ] .'" ); // porta do login-server
define( "PORTA_CHAR", "'. $dados[ 'porta_char' ] .'" ); // porta do char-server
define( "PORTA_MAP", "'. $dados[ 'porta_map' ] .'" ); // porta do map-server

// níveis de permissão
$gm_level = array
	(
		-1 => "Visitante",
		0 => "Jogador",
		1 => "Jogador VIP",
		2 => "GM de Suporte",
		3 => "GM Desenvolvedor",
		4 => "GM de Eventos",
		10 => "GM de Denúncias",
		99 => "Administrador"
	);
	
// configurações 
$config = array(
	"allow_last_location" => 2, // Liberar para qual grupo de GM (ou nível) verificar a posição ?
	"md5_pass" => false // Utilizar MD5 nas senhas ?
);		
?>';
	
			$try = fopen ("system/configuracao.php", "w");
			if( !$try )
				$tpl->assign( 'msg', '<div class="alert error">Não foi possível criar o arquivo de configuração, verifique as permissões da pasta.</div>' );
			else {
				fwrite( $try, $file );
				fclose($try);
				header( 'Location: ?module=home' );
			}
				
	}
	$tpl->assign( 'content', 'install' );
	$tpl->draw( 'home' );

?>