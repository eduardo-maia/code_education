<?php

function conexaoDB()
{
	try
		{
		$config = include "config.php";
		
		if ( !isset($config['db']) ) 
			{
			print "throw\n";
			throw new \InvalidArgumentException("Configuracao do banco nao existe");
			}		
		
		$host=(isset($config['db']['host'])) ? $config['db']['host'] : null;
		$dbname=(isset($config['db']['dbname'])) ? $config['db']['dbname'] : null;
		$user=(isset($config['db']['user'])) ? $config['db']['user'] : null;
		$password=(isset($config['db']['password'])) ? $config['db']['password'] : null;

		return new \PDO("mysql:host={$host};dbhame={$dbname}", $user,$password, array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
		}
	catch (PDOException $e) 
		{
		echo $e->getMessage() . "\n";
		echo $e->getTraceAsString() . "\n";
		}
}


function getPasswordHash($password)
{
return password_hash($password, PASSWORD_DEFAULT, [	'salt' => '1234567890123456789012' ]);
}