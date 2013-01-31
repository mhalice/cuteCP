<?php
/*
 * Este sistema web é protegido por leis internacionais 
 * e pela lei de Deus.
 *
 * Afinal de contas, só Deus sabe como essa merda funciona..
 * -------------
 * desenvolvido por eru yuuko
 */
	if( is_logged() )
		Header( 'Location: index.php' );
		
	if( $_POST )
	{
		$dados = $core->request( 'POST' );
		if( strlen( $dados[ 'login' ] ) < 4 || strlen( $dados[ 'senha' ] ) < 4 )
		{
			$tpl->assign( 'msg', 'Login e/ou senha inválidos.' );
		}
		else
		{
			$login = addslashes( $dados[ 'login' ] );
			$senha = addslashes( $dados[ 'senha' ] );
			$query = $mysql->build_query( sprintf( "select * from `login` where `userid`='%s' and `user_pass`='%s'", $login, $senha ) );
			$query = $mysql->sql_query();
			$query = $mysql->num_rows();
			if( $query )
			{
				$query = $mysql->fetch_assoc();
				$_SESSION[ 'logged_in' ] = 1;
				$_SESSION[ 'gm_level' ] = $query[ 'level' ];
				$_SESSION[ 'login' ] = $query[ 'userid' ];
				$_SESSION[ 'senha' ] = $query[ 'user_pass' ];
				Header( 'Location: index.php' );
			}
			else
			{
				$tpl->assign( 'msg', 'Login e/ou senha inválidos.' );
			}
		}
	}
	$tpl->assign( 'content', 'login' );
	$tpl->draw( 'home' );

?>