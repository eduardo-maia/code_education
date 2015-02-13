<?php
function get_page($conexao,$page)
{
$sql="SELECT html FROM pagina WHERE rota=:rota";
$stmt = $conexao->prepare($sql);
$stmt->bindValue("rota",$page);
$stmt->execute();
$html = $stmt->fetch(PDO::FETCH_ASSOC);
return $html['html'];
};

function verifica_rota()
{
$rota = parse_url("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );

$path = substr($rota['path'],1,strlen($rota['path']));

if ($path == "")
	{
	return "home";
	}

$allowed_pages = array ("home"=>1,"empresa"=>1,"produtos"=>1,"servicos"=>1,"contato"=>1);
if ( !isset($allowed_pages[$path]) && substr($path,0,7) != "search")
	{
	http_response_code(404);
	echo "P&aacute;gina $path n&atilde;o encontrada.";
	exit;
	}

return $path;
}


$page = verifica_rota();
?>

<html>
	<head>
		<title>Code Education</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/theme.css">
	</head>

	<body>

	<script src="js/jquery-2.1.3.min.js"></script>

	<div class="navbar navbar-inverse navbar-static-top">

		<div class="container">

			<a href="#" class="navbar-brand">PHP + bootstrap</a>

			<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<div class="collapse navbar-collapse navHeaderCollapse">
				<ul class="nav navbar-nav navbar-right">
					<li <?php if ($page=='home') echo 'class="active"';?>><a href="/">Home</a></li>
					<li <?php if ($page=='empresa') echo 'class="active"';?>><a href="/empresa">Empresa</a></li>
					<li <?php if ($page=='produtos') echo 'class="active"';?>><a href="/produtos">Produtos</a></li>
					<li <?php if ($page=='servicos') echo 'class="active"';?>><a href="/servicos">Servi&ccedil;os</a></li>
					<li <?php if ($page=='contato') echo 'class="active"';?>><a href="/contato">Contato</a></li>
				</ul>

			</div>

		</div>

	</div>



<!-- HERE COMES THE PAGE CONTENT
	<div class="container">
		<div class="jumbotron">
			<div style='text-align:center;font-size:12pt'>
				<php
				require_once($page . ".php");
				?>
			</div>
		</div>
	</div>
END PAGE CONTENT -->

	<div class="container">
		<div class="jumbotron">
			<div style='text-align:center;font-size:12pt'>

				<?php
				require_once("database/conexaoDB.php");
				$conexao = conexaoDB();
				
				$sql="use maia_education_code";
				$conexao->query($sql);
				
				if ($page != "search")
					{
					print get_page($conexao,$page);
					}
				else
					{
					if (isset($_GET["for"]) && $_GET["for"]!="")
						{
						$string=$_GET["for"];
						
						# Isso é boa prática: indexar o banco, e usar o index nas buscas
						$sql="SELECT rota,html FROM pagina WHERE match(html) against (:string) ";
						$stmt = $conexao->prepare($sql);
						$stmt->bindValue("string",$string);
						$stmt->execute();
						$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
						
						if (sizeof($records)==0)
							{
							echo "<div align='center'>Nenhum resultado encontrado</div>";
							}
						else
							{
							foreach ($records as $record)
								{
								$record['html'] = str_replace($string,"<b>$string</b>", $record['html']);
								echo "<div align=left><a style=color:black; href=" . $record['rota'] . ">" . $record['html'] . "</a></div><br>";
								}
							}
						}
					else
						{
						print get_page($conexao,"home");
						}
					}

				?>
				
				<!-- BUSCA -->
				<br><br>
				
				<form method=get action=/search>
				<div align="center">
					Busca: 
					<input name=for type=type=text value="<?php echo $string?>">
					<input type=submit value=Buscar>
				</div>
				<div align="center">
						Estou usando match against, ent&atilde;o buscar por "a" n&atilde;o vai trazer resultados. Experimente: "nevermore" ou "darkness".
				</form>
			</div>
		</div>
	</div>



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