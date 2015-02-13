<?php
require_once "conexaoDB.php";

echo "#### Executando Fixture ####\n";

$conn = conexaoDB();
print_r($conn);

# aqui era para gerar uma exceção ou warning, pois essa tabela não existe
$sql="select * from wrongtable asasas";
$stmt = $conn->prepare($sql);
$stmt->execute();



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
		html MEDIUMTEXT NOT NULL
		)
		");
	}
catch (PDOException $e)
	{
	die ( $e->getMessage() );
	}
echo " - OK\n";

echo "Inserindo dados...\n";

#####################################################
# NÃO ESTOU USANDO BIND PORQUE NÃO PRECISO,
# POIS TENHO TOTAL CONTROLE SOBRE O QUE ESTOU ESCREVENDO NA MINHA CONSULTA...
#####################################################

echo "Pagina Home";
$q=$conn->prepare("INSERT INTO pagina (rota,html) VALUES ('home','Home<br><br>The twins of Mammon quarrelled. Their warring plunged the world into a new darkness, and the beast abhorred the darkness. So it began to move swiftly, and grew more powerful, and went forth and multiplied. And the beasts brought fire and light to the darkness.')");
$q->execute();
echo " - OK\n";

echo "Pagina Empresa";
$q=$conn->prepare("INSERT INTO pagina (rota,html) VALUES ('empresa','Página Empresa<br>Ninguém assistiu ao formidável enterro de tua última quimera.')");
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



