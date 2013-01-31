<?php
/*
 * Este sistema web é protegido por leis internacionais 
 * e pela lei de Deus.
 *
 * Afinal de contas, só Deus sabe como essa merda funciona..
 * -------------
 * desenvolvido por eru yuuko
 */

// configurações gerais
define( 'CP_TITLE', 'cuteCP' ); // titulo do painel
define( 'CP_DESC', 'Painel de Controle' ); // descrição do painel
define( 'THEME', 'cute' ); // tema

// configurações da database
define( 'SERVER_HOST', 'localhost' ); // ip do host
define( 'HOST_USER', 'root' ); // usuario do mysql
define( 'HOST_PASS', '' ); // senha do mysql
define( 'SERVER_DATABASE', 'ragnarok' ); // database do servidor

// níveis de permissão
$gm_level = array
	(
		-1 => 'Visitante',
		0 => 'Jogador',
		1 => 'Jogador VIP',
		2 => 'GM de Suporte',
		3 => 'GM Desenvolvedor',
		4 => 'GM de Eventos',
		10 => 'GM de Denúncias',
		99 => 'Administrador'
	);
	
// configurações online.php (quem esta online)
$allow_last_location = false; // Liberar para ver a última localização ?

?>