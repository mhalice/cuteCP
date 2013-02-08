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
	
	if( !is_logged() )
		Header( 'Location: index.php' );
	
	$query = $mysql->build_query( sprintf( "select `char_id` from `char` where `account_id`='%s'", $member[ 'account_id' ] ) );
	$query = $mysql->sql_query();
	$total_chars = $mysql->num_rows();
	$query = $mysql->build_query( sprintf( "select `last_ip`, `logincount`, `lastlogin` from `login` where `account_id`='%s'", $member[ 'account_id' ] ) );
	$query = $mysql->sql_query();
	$data = $mysql->fetch_assoc();
	// assigns
	$tpl->assign( 'total_chars', $total_chars );
	$tpl->assign( 'data', $data );
	$tpl->assign( 'content', 'statistic' );
	$tpl->draw( 'home' );

?>