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
		
	// verificamos se o jogador está logado
	if( !isset( $_SESSION[ 'gm_level' ] ) )
		$_SESSION[ 'gm_level' ] = -1;
	// carregamos o template geral
	if( !isset( $_GET[ 'module' ] ) )
	{
		$tpl->assign( 'content', 'default' );
		$tpl->draw( 'home' );
	}
	else
	{
		if( $_GET[ 'module' ] == 'index' || $_GET[ 'module'] == 'home' )
		{
			$tpl->assign( 'content', 'default' );
			$tpl->draw( 'home' );
		}
		else
		{
			if( file_exists( 'modules/'. (string)$_GET[ 'module' ] .'.php' ) )
			{
				require_once 'modules/'. (string)$_GET[ 'module' ] .'.php';
			}
			else
			{
				require_once 'modules/error.php';
			}
		}
	}
?>