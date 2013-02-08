<?php
/*
 * Este sistema web é protegido por leis internacionais 
 * e pela lei de Deus.
 *
 * Afinal de contas, só Deus sabe como essa merda funciona..
 * -------------
 * desenvolvido por eru yuuko
 */
require_once('nucleo.php');
require_once('database.php');
require_once('configuracao.php');

function	is_logged(){
	return isset( $_SESSION[ 'logged_in'] );
}

function	getjobname( $jobid ){
	// tradução da joblist por schrwaizer
	$joblist = array(
		0    => 'Aprendiz',
		1    => 'Espadachim',
		2    => 'Mago',
		3    => 'Arqueiro',
		4    => 'Noviço',
		5    => 'Mercador',
		6    => 'Gatuno',
		7    => 'Cavaleiro',
		8    => 'Sacerdote',
		9    => 'Bruxo',
		10   => 'Ferreiro',
		11   => 'Caçador',
		12   => 'Mercenário',
		//13   => 'Knight (Mounted)',
		14   => 'Templário',
		15   => 'Monge',
		16   => 'Sábio',
		17   => 'Arruaceiro',
		18   => 'Alquimista',
		19   => 'Bardo',
		20   => 'Odalisca',
		//21   => 'Crusader (Mounted)',
		22   => 'Casamento',
		23   => 'Super Aprendiz',
		24   => 'Justiceiro',
		25   => 'Ninja',
		26   => 'Roupa de Natal',
		27   => 'Roupa de Verão',

		4001 => 'Aprendiz T.',
		4002 => 'Espadachim T.',
		4003 => 'Mago T.',
		4004 => 'Arqueiro T.',
		4005 => 'Noviço T.',
		4006 => 'Mercador T.',
		4007 => 'Gatuno T.',
		4008 => 'Lorde',
		4009 => 'Sumo-Sacerdote',
		4010 => 'Arquimago',
		4011 => 'Mestre-Ferreiro',
		4012 => 'Atirador de Elite',
		4013 => 'Algoz',
		//4014 => 'Lord Knight (Mounted)',
		4015 => 'Paladino',
		4016 => 'Mestre',
		4017 => 'Professor',
		4018 => 'Desordeiro',
		4019 => 'Criador',
		4020 => 'Menestrel',
		4021 => 'Cigana',
		//4022 => 'Paladin (Mounted)',

		4023 => 'Mini Aprendiz',
		4024 => 'Mini Espadachim',
		4025 => 'Mini Mago',
		4026 => 'Mini Arqueiro',
		4027 => 'Mini Noviço',
		4028 => 'Mini Mecador',
		4029 => 'Mini Gatuno',
		4030 => 'Mini Cavaleiro',
		4031 => 'Mini Sacerdote',
		4032 => 'Mini Bruxo',
		4033 => 'Mini Ferreiro',
		4034 => 'Mini Caçador',
		4035 => 'Mini Mercenário',
		//4036 => 'Baby Knight (Mounted)',
		4037 => 'Mini Templário',
		4038 => 'Mini Monge',
		4039 => 'Mini Sábio',
		4040 => 'Mini Arruaceiro',
		4041 => 'Mini Alquimista',
		4042 => 'Mini Bardo',
		4043 => 'Mini Odalisca',
		//4044 => 'Baby Crusader (Mounted)',
		4045 => 'Super Bebê',

		4046 => 'Taekwon',
		4047 => 'Mestre Taekwon',
		//4048 => 'Star Gladiator (Flying)',
		4049 => 'Espiritualista',

		//4050 => 'Jiang Shi',
		//4051 => 'Death Knight',
		//4052 => 'Dark Collector',

		4054 => 'Cavaleiro Rúnico',
		4055 => 'Arcano',
		4056 => 'Sentinela',
		4057 => 'Arcebispo',
		4058 => 'Mecânico',
		4059 => 'Sicário',
		4060 => 'Cavaleiro Rúnico T.',
		4061 => 'Arcano T.',
		4062 => 'Sentinela T.',
		4063 => 'Arcebispo T.',
		4064 => 'Mecânico T.',
		4065 => 'Sicário T.',
		4066 => 'Guardião Real',
		4067 => 'Feiticeiro',
		4068 => 'Trovador',
		4069 => 'Musa',
		4070 => 'Shura',
		4071 => 'Bioquímico',
		4072 => 'Renegado',
		4073 => 'Guardião Real T.',
		4074 => 'Feiticeiro T.',
		4075 => 'Trovador T.',
		4076 => 'Musa T.',
		4077 => 'Shura T.',
		4078 => 'Bioquímico T.',
		4079 => 'Renegado T.',

		//4080 => 'Rune Knight (Mounted)',
		//4081 => 'Rune Knight+ (Mounted)',
		//4082 => 'Royal Guard (Mounted)',
		//4083 => 'Royal Guard+ (Mounted)',
		//4084 => 'Ranger (Mounted)',
		//4085 => 'Ranger+ (Mounted)',
		//4086 => 'Mechanic (Magic Gear)',
		//4087 => 'Mechanic+ (Magic Gear)',

		4096 => 'Mini Cavaleiro Rúnico',
		4097 => 'Mini Arcano',
		4098 => 'Mini Sentinela',
		4099 => 'Mini Arcebispo',
		4100 => 'Mini Mecânico',
		4101 => 'Mini Sicário',
		4102 => 'Mini Guardião Real',
		4103 => 'Mini Feiticeiro',
		4104 => 'Mini Trovador',
		4105 => 'Mini Musa',
		4106 => 'Mini Shura',
		4107 => 'Mini Bioquímico',
		4108 => 'Mini Renegado'
	);
	
	return isset( $joblist[ $jobid ] ) ? $joblist[ $jobid ]:'Desconhecido';
}

function	s_var( $name )
{
	return isset($_SESSION[$name]) ? $_SESSION[$name]:'Variavel desconhecida';
}

function	md5_pass( $val )
{
	global $config;
	return $config[ 'md5_pass' ] ? md5( $val ): $val;
}

?>