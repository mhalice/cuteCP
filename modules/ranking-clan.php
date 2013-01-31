<?php
/*
 * Este sistema web é protegido por leis internacionais 
 * e pela lei de Deus.
 *
 * Afinal de contas, só Deus sabe como essa merda funciona..
 * -------------
 * desenvolvido por eru yuuko
 */
	$query = $mysql->build_query( 'select `name`,`guild_lv`,`exp` from `guild` order by `guild_lv` desc limit 0,100' );
	$query = $mysql->sql_query();
	$quantidade = $mysql->num_rows();
	if( $quantidade ) {
		while( $entry = $mysql->fetch_assoc() ) {
			$entries[] = $entry;
		}
	}
	$tpl->assign( 'online_count', $quantidade );
	if( $quantidade ) $tpl->assign( 'dados', $entries );
	$tpl->assign( 'content', 'ranking-clan' );
	$tpl->draw( 'home' );
	
?>