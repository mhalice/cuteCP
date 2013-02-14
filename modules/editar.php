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

	if( isset( $_GET[ 'do' ] ) )
	{
		// modulo editar senha
		if( $_GET[ 'do' ] == 'edit-pass' )
		{
			if( $_POST )
			{
				$dados = $core->request( 'POST' );
				$query = $mysql->build_query( sprintf( "select `user_pass` from `login` where `account_id`='%d'", s_var( 'account_id' ) ) );
				$query = $mysql->sql_query();
				$query = $mysql->fetch_assoc();
				$dados[ 'senha_antiga' ] = md5_pass( $dados[ 'senha_antiga' ] );
				if( $dados[ 'senha_antiga' ] != $query[ 'user_pass' ] )
					$tpl->assign( 'msg', '<div class="alert error"><b>[Troca de senha]:</b> Senha atual inválida.</div>' );
				else if( strlen( $dados[ 'nova_senha' ] ) <= 4 )
					$tpl->assign( 'msg', '<div class="alert error"><b>[Troca de senha]:</b> Sua nova senha precisa de no mínimo 5 caracteres!</div>' );
				else if( $dados[ 'senha_antiga' ] == $dados[ 'nova_senha' ] )
					$tpl->assign( 'msg', '<div class="alert error"><b>[Troca de senha]:</b> As senhas são iguais!</div>' );
				else
				{
					$dados[ 'nova_senha ' ] = $config[ 'md5_pass' ] ? md5( $dados[ 'nova_senha' ] ):$dados[ 'nova_senha' ];
					$query = $mysql->build_query( sprintf( "update `login` set `user_pass`='%s' where `account_id`='%d'", $dados[ 'nova_senha' ], s_var( 'account_id' ) ) );
					$query = $mysql->sql_query();
					$tpl->assign( 'msg', '<div class="alert success"><b>[Troca de senha]:</b> Senha trocada com sucesso!</div>' );
				}
			}
		}
		// modulo editar email
		else if( $_GET[ 'do' ] == 'edit-email' )
		{
			if( $_POST )
			{
				$dados = $core->request( 'POST' );
				$query = $mysql->build_query( sprintf( "select `email` from `login` where `email`='%s'", $dados[ 'email_novo' ] ) );
				$query = $mysql->sql_query();
				$email_exists = $mysql->num_rows();
				$query = $mysql->build_query( sprintf( "select `user_pass`,`email` from `login` where `account_id`='%d'", s_var( 'account_id' ) ) );
				$query = $mysql->sql_query();
				$query = $mysql->fetch_assoc();
				if( $dados[ 'senha_atual' ] != md5_pass( $query[ 'user_pass' ] ) )
					$tpl->assign( 'msg', '<div class="alert error"><b>[Troca de Email]:</b> Senha inválida.</div>' );
				else if( $dados[ 'email_antigo' ] != $query[ 'email' ] )
					$tpl->assign( 'msg', '<div class="alert error"><b>[Troca de Email]:</b> Email antigo inválido.</div>' );
				else if( $email_exists )
					$tpl->assign( 'msg', '<div class="alert error"><b>[Troca de Email]:</b> Esse email já está sendo utilizado.</div>' );
				else if( !filter_var( $dados[ 'email_novo' ], FILTER_VALIDATE_EMAIL ) )
					$tpl->assign( 'msg', '<div class="alert error"><b>[Troca de Email]:</b> Email novo inválido.</div>' );
				else
				{
					$query = $mysql->build_query( sprintf( "update `login` set `email`='%s' where `account_id`='%d'", $dados[ 'email_novo' ], s_var( 'account_id' ) ) );
					$query = $mysql->sql_query();
					$tpl->assign( 'msg', '<div class="alert success"><b>[Troca de Email]:</b> O seu e-mail foi alterado com sucesso!</div>' );
				}
			}
		}
		else
			Header( 'Location: index.php' );
	}
	
	$tpl->assign( 'content', 'editar-dados' );
	$tpl->draw( 'home' );

?>
