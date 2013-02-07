<?php
/*
 * Este sistema web é protegido por leis internacionais 
 * e pela lei de Deus.
 *
 * Afinal de contas, só Deus sabe como essa merda funciona..
 * -------------
 * desenvolvido por eru yuuko
 */
	$query1 = $mysql->build_query( 'select `name`,`fame` from `char` where `fame` > 0 and (`class` = 10 or `class` = 4011 or `class` = 4033 or `class` = 4058 or `class` = 4064 or `class` = 4100) order by `fame` desc limit 0,10' );
	$query1 = $mysql->sql_query();
	$quantidade_bl = $mysql->num_rows();
	if( $quantidade_bl ) {
		while( $entry1 = $mysql->fetch_assoc() ) {
			$entries1[] = $entry1;
		}
	}
	if( $quantidade_bl ) $tpl->assign( 'dados_bl', $entries1 );

	$query2 = $mysql->build_query( 'select `name`,`fame` from `char` where `fame` > 0 and (`class` = 18 or `class` = 4019 or `class` = 4041 or `class` = 4071 or `class` = 4078 or `class` = 4107) order by `fame` desc limit 0,10' );
	$query2 = $mysql->sql_query();
	$quantidade_al = $mysql->num_rows();
	if( $quantidade_al ) {
		while( $entry2 = $mysql->fetch_assoc() ) {
			$entries2[] = $entry2;
		}
	}
	if( $quantidade_al ) $tpl->assign( 'dados_al', $entries2 );

	$query3 = $mysql->build_query( 'select `name`,`fame` from `char` where `fame` > 0 and `class` = 4046 order by `fame` desc limit 0,10' );
	$query3 = $mysql->sql_query();
	$quantidade_tk = $mysql->num_rows();
	if( $quantidade_tk ) {
		while( $entry3 = $mysql->fetch_assoc() ) {
			$entries3[] = $entry3;
		}
	}
	if( $quantidade_tk ) $tpl->assign( 'dados_tk', $entries3 );	
	
	$tpl->assign( 'content', 'ranking-fama' );
	$tpl->draw( 'home' );

?>