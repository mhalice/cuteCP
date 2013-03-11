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
		
	if( is_logged() )
		Header( 'Location: index.php' );
	for( $i = 1; $i <= 31; $i++ )
		$dias[] = $i;
	$mes = array(
		'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
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
			$tpl->assign( 'msg', '<div class="alert error">Login e/ou senha inválidos.</div>' );
		else if( $dados[ 'senha' ] != $dados[ 'confirme_senha' ] )
			$tpl->assign( 'msg', '<div class="alert error">As senhas são diferentes!</div>' );
		else if( !filter_var($dados[ 'email' ], FILTER_VALIDATE_EMAIL) )
			$tpl->assign( 'msg', '<div class="alert error">Email inválido.</div>' );
		else
		{
			$login = addslashes( $dados[ 'login' ] );
			$senha = md5_pass( addslashes( $dados[ 'senha' ] ) );
			$email = $dados[ 'email' ];
			$level = 0;
			$sexo = $dados[ 'sexo' ];
			$ip = $_SERVER[ 'REMOTE_ADDR' ];
			$data = "{$dados[ 'ano' ]}-{$dados[ 'mes' ]}-{".(intval($dados[ 'dia' ]) + 1)."}";
			$query = $mysql->build_query( sprintf( "select * from `login` where `userid`='%s' or `email`='%s'", $login, $email ) );
			$query = $mysql->sql_query();
			$query = $mysql->num_rows();
			if( $query )
				$tpl->assign( 'msg', '<div class="alert error">Login ou Email já existente!</div>' );
			else
			{
				$query = $mysql->build_query( sprintf( "insert into `login` ( `userid`,`user_pass`,`sex`,`email`,`last_ip`,`birthdate` ) values( '%s', '%s', '%s', '%s', '%s', '%s' )", $login, $senha, $sexo, $email, $ip, $data ) );
				$query = $mysql->sql_query();
				$tpl->assign( 'msg', '<div class="alert success">Parabéns, você agora já pode logar no servidor!</div>' );
			}
		}
	}
	$tpl->assign( 'content', 'register' );
	$tpl->draw( 'home' );

?>
