<?php
# NÃO É BOA PRÁTICA ESTE ARQUIVO ESTÁ DENTRO DO http_docs OU SIMILAR.
# MAS COMO ELE NÃO ESTÁ ACESSÍVEL VIA WEB, E TRATANDO DE EXERCICIO...
# ELE DEVE SER EXECUTADO E MOVIDO PARA OUTRO LOCAL.
require_once "conexaoDB.php";

echo "#### Executando Fixture ####\n";

$conn = conexaoDB();

echo "Dropando database ";
$conn->query("drop database if exists maia_education_code");
echo " - OK\n";

echo "Criando database ";
$conn->query("create database maia_education_code");
echo " - OK\n";

echo "Usando database ";
$conn->query("USE maia_education_code");
echo " - OK\n";

echo "Removendo tabela";
$conn->query("DROP TABLE IF EXISTS pagina");
echo " - OK\n";


echo "Criando tabela";
try
	{
	$conn->query("CREATE TABLE pagina
		(
		rota VARCHAR(45) NOT NULL NOT NULL,
		PRIMARY KEY(rota),
		html MEDIUMTEXT NOT NULL,
		FULLTEXT (html)
		) ENGINE=MyISAM;
		");
	}
catch (PDOException $e)
	{
	die ( $e->getMessage() );
	}
echo " - OK\n";

echo "Inserindo dados...\n";


echo "Pagina Home";
$q=$conn->prepare("INSERT INTO pagina (rota,html) VALUES ('home','Home<br>The twins of Mammon quarrelled. Their warring plunged the world into a new darkness, and the beast abhorred the darkness. So it began to move swiftly, and grew more powerful, and went forth and multiplied. And the beasts brought fire and light to the darkness.')");
$q->execute();
echo " - OK\n";

echo "Pagina Empresa";
$q=$conn->prepare("INSERT INTO pagina (rota,html) VALUES ('empresa','Empresa<br>Ninguém assistiu ao formidável enterro de tua última quimera.')");
$q->execute();
echo " - OK\n";

echo "Pagina Produtos";
$q=$conn->prepare("INSERT INTO pagina (rota,html) VALUES ('produtos','Produtos<br>.And my soul from out that shadow that lies floating on the floor... Shall be lifted—nevermore!')");
$q->execute();
echo " - OK\n";

echo "Pagina Serviços";
$q=$conn->prepare("INSERT INTO pagina (rota,html) VALUES ('servicos','Serviços<br>.We\'re living in the the darkness, we hate the day. We\'re hunting in the night, take your children away. Your blood is our pleasure, we want your soul. You will never die as a child of the night')");
$q->execute();
echo " - OK\n";


echo "#### Concluído ####\n";



