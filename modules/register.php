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
	for( $i = 1; $i <= 31; $i++ )
		$dias[] = $i;
	$mes = array(
		'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Junho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
	);
	for( $i = 2013; $i >= 1960; $i-- )
		$ano[] = $i;
	$tpl->assign( 'ano', $ano );
	$tpl->assign( 'meses', $mes );
	$tpl->assign( 'dias', $dias );
	if( $_POST )
	{
		$dados = $core->request( 'POST' );
		if( strlen( $dados[ 'login' ] ) < 4 || strlen( $dados[ 'senha' ] ) < 4 )
		{
			$tpl->assign( 'msg', 'Login e/ou senha inválidos.' );
		}
		else if( $dados[ 'senha' ] != $dados[ 'confirme_senha' ] )
		{
			$tpl->assign( 'msg', 'As senhas são diferentes!' );
		}
		else
		{
			$login = addslashes( $dados[ 'login' ] );
			$senha = addslashes( $dados[ 'senha' ] );
			$email = $dados[ 'email' ];
			$level = 0;
			$ip = $_SERVER[ 'REMOTE_ADDR' ];
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
	$tpl->assign( 'content', 'register' );
	$tpl->draw( 'home' );

?>