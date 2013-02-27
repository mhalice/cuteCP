<?php
/*
 * Este sistema web é protegido por leis internacionais 
 * e pela lei de Deus.
 *
 * Afinal de contas, só Deus sabe como essa merda funciona..
 * -------------
 * desenvolvido por eru yuuko
 */
	if( !DEFINED( 'IS_RUN' ) )
		exit();
		
	$query = $mysql->build_query( 'select `char`.`account_id`,`char`.`name`,`char`.`base_level`,`char`.`job_level`,`char`.`class`,`char`.`last_map`,`login`.`'. GM_LEVEL_TABLE .'` from `char` INNER JOIN `login` ON ( `char`.`account_id`=`login`.`account_id` ) where `char`.`online`=1' );
	$query = $mysql->sql_query();
	$quantidade = $mysql->num_rows();
	if( $quantidade ) {
		while( $entry = $mysql->fetch_assoc() ) {
			$entries[] = $entry;
		}
	}
	$tpl->assign( 'allow_last_location', $config['allow_last_location'] );
	$tpl->assign( 'online_count', $quantidade );
	$tpl->assign( 'gm_table', GM_LEVEL_TABLE );
	if( $quantidade ) $tpl->assign( 'dados', $entries );
	$tpl->assign( 'content', 'quem_esta_online' );
	$tpl->draw( 'home' );
	
?>