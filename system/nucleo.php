<?php
/*
 * Este sistema web é protegido por leis internacionais 
 * e pela lei de Deus.
 *
 * Afinal de contas, só Deus sabe como essa merda funciona..
 * -------------
 * desenvolvido por eru yuuko
 */

class	nucleo	{
	
	// configuracoes do core
	var $system_dir = __DIR__;
	
	// functions
	function	get_system_dir()
	{
		return $this->system_dir.'/';
	}
	
	function	request( $type )
	{
		if( $type == 'POST' )
			return $_POST;
		else if( $type == 'GET' )
			return $_GET;
		else
			return 0;
	}
		
}

$core = new nucleo();

?>