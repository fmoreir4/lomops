<!DOCTYPE html>
<?php 
	include_once 'config.php';
?>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>LOMOPs - A loja que vende tudo</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<nav class="bg-preto">
		<ul class="">
			<li><a href="index.php">Inicio</a></li>
			<li><a href="?produtos">Produtos</a></li>
			<li><a href="?listarCliente">Listar Cliente</a></li>
		</ul>
		
		<ul class="direita">
			<li><a href="?formCliente">Cadastro</a></li>
			<li><a href="?formLogin">Login</a></li>
		</ul>
	</nav>
	
	<header>
		<h1>
			LOMOPs
		</h1>
		<h3>
			A loja que vende tudo
		</h3>
	</header>
	
	<section class="container">
		<?php
			if (!empty($_GET)){
				$p = key($_GET);
				//include "page/".$p.".php";
				include "page/$p.php";
			}	
		?>
	</section>
	
	<footer class="bg-preto branco">
	</footer>
</body>
</html>


