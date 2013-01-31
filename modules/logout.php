<?php
/*
 * Este sistema web é protegido por leis internacionais 
 * e pela lei de Deus.
 *
 * Afinal de contas, só Deus sabe como essa merda funciona..
 * -------------
 * desenvolvido por eru yuuko
 */
	if( !is_logged() )
		Header( 'Location: index.php' );
	$tpl->assign( 'content', 'logout' );
	$tpl->draw( 'home' );
	session_destroy();

?>