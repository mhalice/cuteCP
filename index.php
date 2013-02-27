<?php
/*
 * Este sistema web é protegido por leis internacionais 
 * e pela lei de Deus.
 *
 * Afinal de contas, só Deus sabe como essa merda funciona..
 * -------------
 * desenvolvido por eru yuuko
 */
$version = '1.2.0';
require_once('system/rain.tpl.class.php');
session_start();
if( file_exists( 'system/configuracao.php' ) )
{
	require_once('system/nucleo.php');
	require_once('system/database.php');
	require_once('system/functions.php');
	$mysql->build_mysql();
}
else // não foi instalado
{
	define( 'CP_TITLE', 'CuteCP' );
	define( 'CP_DESC', 'Instalação do Painel' );
	define( 'THEME', 'cute' );
}
// template system
$tpl = new RainTPL();
raintpl::$tpl_dir = "template/". THEME ."/";
// todas as variaveis e arquivos do sistema iniciados
DEFINE( 'IS_RUN', true );
// global vars
$tpl->assign( 'installed', file_exists( 'system/configuracao.php' ) );
$tpl->assign( 'randomize', rand(5000000,1000000000) );
$tpl->assign( 'cp_title', CP_TITLE );
$tpl->assign( 'cp_desc', CP_DESC );
$tpl->assign( 'cute_version', $version );
$tpl->assign( 'is_logged', file_exists( 'system/configuracao.php' ) ? is_logged():0 );
if( file_exists( 'system/configuracao.php' ) ) // Variaveis que só rodem se o CP estiver instalado
{
	$tpl->assign( 'port_status', array( 'login' => portstatus(PORTA_LOGIN), 'char' => portstatus(PORTA_CHAR), 'map' => portstatus(PORTA_MAP) ) );
}
// check login session
if( file_exists( 'system/configuracao.php' ) && is_logged() ) // Variaveis que só rodem se o CP estiver instalado e estiver logado
{
	$tpl->assign( 'member', array( 'account_id' => s_var( 'account_id' ), 'login' => s_var( 'login' ),	'gm_level' => s_var( 'gm_level' ) ) );
	$member = array( 'account_id' => s_var( 'account_id' ), 'login' => s_var( 'login' ),	'gm_level' => s_var( 'gm_level' ) );
}
// check if is installed
require_once( 'modules/index.php' );
?>