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
define( 'GM_LEVEL_TABLE', 'group_id' ); // tabela que utilizada para nivel de GM (novos emuladores utilizam a tabela group_id)

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
	
// configurações 
$config = array(
	'allow_last_location' => 20, // Liberar para qual nível de GM (ou grupo) verificar a posição ?
	'md5_pass' => false // Utilizar MD5 nas senhas ?
);

?>