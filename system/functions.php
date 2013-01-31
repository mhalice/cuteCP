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
		22   => 'Cônjuge',
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

		4023 => 'Aprendiz Bebê',
		4024 => 'Espadachim Bebê',
		4025 => 'Mago Bebê',
		4026 => 'Arqueiro Bebê',
		4027 => 'Noviço Bebê',
		4028 => 'Mecador Bebê',
		4029 => 'Gatuno Bebê',
		4030 => 'Cavaleiro Bebê',
		4031 => 'Sacerdote Bebê',
		4032 => 'Bruxo Bebê',
		4033 => 'Ferreiro Bebê',
		4034 => 'Caçador Bebê',
		4035 => 'Mercenário Bebê',
		//4036 => 'Baby Knight (Mounted)',
		4037 => 'Templário Bebê',
		4038 => 'Monge Bebê',
		4039 => 'Sábio Bebê',
		4040 => 'Arruaceiro Bebê',
		4041 => 'Alquimista Bebê',
		4042 => 'Bardo Bebê',
		4043 => 'Odalisca Bebê',
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
		4057 => 'Arce-Bispo',
		4058 => 'Mecânico',
		4059 => 'Sicário',
		4060 => 'Cavaleiro Rúnico T.',
		4061 => 'Arcano T.',
		4062 => 'Sentinela T.',
		4063 => 'Arce-Bispo T.',
		4064 => 'Mecânico T.',
		4065 => 'Sicário T.',
		4066 => 'Guarda Real',
		4067 => 'Feiticeiro',
		4068 => 'Trovador',
		4069 => 'Musa',
		4070 => 'Shura',
		4071 => 'Bioquímico',
		4072 => 'Renegado',
		4073 => 'Guarda Real T.',
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

		//4096 => 'Baby Rune Knight',
		//4097 => 'Baby Warlock',
		//4098 => 'Baby Ranger',
		//4099 => 'Baby Arch Bishop',
		//4100 => 'Baby Mechanic',
		//4101 => 'Baby Guillotine Cross',
		//4102 => 'Baby Royal Guard',
		//4103 => 'Baby Sorceror',
		//4104 => 'Baby Minstrel',
		//4105 => 'Baby Wanderer',
		//4106 => 'Baby Sura',
		//4107 => 'Baby Genetic',
		//4108 => 'Baby Shadow Chaser'
	);
	
	return isset( $joblist[ $jobid ] ) ? $joblist[ $jobid ]:'Desconhecido';
}

function	s_var( $name )
{
	return isset($_SESSSION[$name]) ? $_SESSION[$name]:'Variavel desconhecida';
}
?>