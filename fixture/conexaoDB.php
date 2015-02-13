<?php

function conexaoDB()
{
print "To aqui 1\n";
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
		
		print "vai retornar\n";
		
		return new \PDO("mysql:host={$host};dbhame={$dbname}", $user,$password);
		}
	catch (PDOException $e) 
		{
		echo $e->getMessage() . "\n";
		echo $e->getTraceAsString() . "\n";
		}
}