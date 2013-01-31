<?php
/*
 * Este sistema web é protegido por leis internacionais 
 * e pela lei de Deus.
 *
 * Afinal de contas, só Deus sabe como essa merda funciona..
 * -------------
 * desenvolvido por eru yuuko
 */
require_once( __DIR__ .'/nucleo.php' );

class	database	{
	
	// functions
	function	build_mysql()
	{
		$sql = mysql_connect( SERVER_HOST, HOST_USER, HOST_PASS ) 
			or die(	mysql_error() );
		$sql = mysql_select_db( SERVER_DATABASE, $sql ) 
			or die(	mysql_error() );
	}
	
	function	sql_query( $query = '' )
	{
		$this->query = ( $this->has_query ) ? $this->query:$query;
		if( $this->query == '' )
			return false;
		$this->query = mysql_query( $this->query )
			or die(	mysql_error() );
		return;
	}
	
	function	build_query( $query )
	{
		$this->has_query = 1;
		$this->query = $query;
	}
	
	function	num_rows()
	{
		return mysql_num_rows( $this->query );
	}
	
	function	fetch_assoc()
	{
		return mysql_fetch_assoc( $this->query );
	}
		
}

$mysql = new database();

?>