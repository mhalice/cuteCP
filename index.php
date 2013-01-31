<?php
/*
 * Este sistema web é protegido por leis internacionais 
 * e pela lei de Deus.
 *
 * Afinal de contas, só Deus sabe como essa merda funciona..
 * -------------
 * desenvolvido por eru yuuko
 */
$version = '1.0.0 Beta';
require_once('system/nucleo.php');
require_once('system/database.php');
require_once('system/functions.php');
require_once('system/rain.tpl.class.php');
session_start();
$mysql->build_mysql();
// template system
$tpl = new RainTPL();
raintpl::$tpl_dir = "template/". THEME ."/";
// global vars
$tpl->assign( 'randomize', rand(5000000,1000000000) );
$tpl->assign( 'cp_title', CP_TITLE );
$tpl->assign( 'cp_desc', CP_DESC );
$tpl->assign( 'cute_version', $version );
$tpl->assign( 'is_logged', is_logged() );
require_once( 'modules/index.php' );
?>