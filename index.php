<?php
$page="home"; # default value
if (@$_GET['page'])
	{
	$page=$_GET['page'];
	}
?>

<html>
	<head>
		<title>Code Education</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/theme.css">
	
	<script language="JavaScript">
		function validate(f)
		{
			if (document.getElementById('nome').value =='' || document.getElementById('assunto').value =='' || document.getElementById('email').value =='' || document.getElementById('mensagem').value =='')
				{
				alert("Preencha todos os dados antes de processeguir");
				return false;
				}
			return true;
		}
	</script>
	
	</head>

	<body>
	
	<script src="js/jquery-2.1.3.min.js"></script>

	<div class="navbar navbar-inverse navbar-static-top">
	
		<div class="container">
			
			<a href="#" class="navbar-brand">Bootstrap + PHP example</a>
			
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			
			<div class="collapse navbar-collapse navHeaderCollapse">
				<ul class="nav navbar-nav navbar-right">
					<li <?php if ($page=='home') echo 'class="active"';?>><a href="?page=home">Home</a></li>
					<li <?php if ($page=='empresa') echo 'class="active"';?>><a href="?page=empresa">Empresa</a></li>
					<li <?php if ($page=='produtos') echo 'class="active"';?>><a href="?page=produtos">Produtos</a></li>
					<li <?php if ($page=='servicos') echo 'class="active"';?>><a href="?page=servicos">Servi&ccedil;os</a></li>
					<li <?php if ($page=='contato') echo 'class="active"';?>><a href="?page=contato">Contato</a></li>
				</ul>
					
			</div>
			
		</div>
	
	</div>
	
	
	
	<!-- HERE COMES THE PAGE CONTENT -->
	<div class="container">
		<div class="jumbotron">
			<div style='text-align:center;font-size:12pt'>
				<?php
				
				switch ($page)
					{
					case "home":
						echo "Home page";
						break;
					case "empresa":
						echo "Pagina empresa";
						break;
					case "produtos":
						echo "Pagina de produtos";
						break;
					case "servicos":
						echo "Pagina de servicos";
						break;
					case "contato":
				?>
				<form method=post onSubmit="return validate();">
					Nome: <input type=text name=nome id=nome>
					<br>
					Assunto: <input type=text name=assunto id=assunto>
					<br>
					Email: <input type=text name=email id=email>
					<br>
					Mensagem: <input type=text name=mensagem id=mensagem>
					<input type=submit class="btn btn-default" value="Enviar">
				</form>
				
				<?php
				
						if ( @$_POST['nome'] && @$_POST['assunto'] && @$_POST['email'] && @$_POST['mensagem'] )
							{
							echo "<p>Dados enviados com sucesso, abaixo seguem os dados que voce enviou:</p>";
							echo "<p>Nome = " . $_POST['nome'] . "</p>";
							echo "<p>Assunto = " . $_POST['assunto'] . "</p>";
							echo "<p>Email = " . $_POST['email'] . "</p>";
							echo "<p>Mensagem = " . $_POST['mensagem'] . "</p>";
							}
						break;
					default:
						echo "Pagina nao encontrada";
						break;
					}
				
				?>
			</div>
		</div>
	</div>
	<!-- END PAGE CONTENT -->
	
	
	<script src="js/bootstrap.min.js"></script>

	<div class="navbar navbar-default navbar-fixed-bottom">
		<div class="container">
			<p class="navbar-text pull-left">Todos os direitos reservados - 
				<?php
				date_default_timezone_set("America/Sao_Paulo");
				echo date("Y");
				?></p>
			<a href="http://sites.code.education/home-code/" class="navbar-btn btn-danger btn pull-right">Go to real Code Education website</a>
		</div>
	</div>
</body>
</html>