<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password']) )
	{
	$q="select count(*) AS existe FROM user where username=:username AND password=:password";
	$stmt = $conexao->prepare($q);
	$stmt->bindValue("username",$_POST['username']);
	$stmt->bindValue("password", getPasswordHash($_POST['password']) );
	$stmt->execute();
	$existe=$stmt->fetch(PDO::FETCH_ASSOC);
	if ($existe['existe'] == 1)
		{
		$_SESSION['username']=$_POST['username'];
		}
	}

if ( !isset($_SESSION['username']) )
	{
	print "<form method=post>Username: <input type=text NAME=username SIZE=20><br>Password: <input type=password name=password><br><input type=submit></form>";
	exit;
	}

$rota = verifica_rota();
if ($rota == "admin")
	{
	$q="select rota FROM pagina ORDER BY rota";
	$stmt = $conexao->prepare($q);
	$stmt->execute();
	$paginas = $stmt->fetchAll(PDO::FETCH_ASSOC);

	print "<p>Selecione a rota a ser editada:</p>";	
	foreach ($paginas as $pagina)
		{
		echo "<p><a href='admin/" . $pagina['rota'] . "'>" . $pagina['rota'] . "</a></p>";
		}
	}

else
	{
	$page = substr($rota,6,strlen($rota) - 6);

	if ( isset($_POST['novohtml']) )
		{
		$q="UPDATE pagina SET html=:html WHERE rota=:page";
		$stmt = $conexao->prepare($q);
		$stmt->bindValue("page",$page);
		$stmt->bindValue("html", $_POST['novohtml']);
		$stmt->execute();
		print "<p>Sslvo com sucesso!</p>";
		}

	$q="select rota,html FROM pagina WHERE rota=:page";
	$stmt = $conexao->prepare($q);
	$stmt->bindValue("page",$page);
	$stmt->execute();
	$paginas = $stmt->fetchAll(PDO::FETCH_ASSOC);

	echo "<script src='//cdn.ckeditor.com/4.4.7/standard/ckeditor.js'></script>";

	echo "<form method=post>";
	foreach ($paginas as $pagina)
		{
		echo "<p>Rota: " . $pagina['rota'] . "<br><textarea class=ckeditor rows=3 cols=80 name=novohtml>" . $pagina['html'] . "</textarea></p>";
		}
	echo "<input type=submit></form><a href=/admin>Back to admin</a>";
	}
?>

