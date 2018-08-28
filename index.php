
<?php
include_once 'config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>LOMOPs - A loja que vende tudo</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilo.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="index.php">Incio</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
    		<li class="nav-item">
    			<a class="nav-link" href="?produtos">Produtos</a>
      		</li>
      		<li class="nav-item">
        		<a class="nav-link" href="?listarCliente">Listar Clientes</a>
      		</li>
    	</ul>
    	<form class="form-inline my-2 my-lg-0">
      		<input class="form-control mr-sm-2" type="search" placeholder="Procurando algum produto?" aria-label="Search">
      		<button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Buscar</button>
		</form>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="?formCliente">Cadastro</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="?formLogin">Login</a>
			</li>
		</ul>
	</div>
</nav>

<header>
	<div class="center container">
		<h1>
			LOMOPs
		</h1>
		<h3>
			A loja que vende tudo
		</h3>
	</div>
</header>

<section class="container">
	<div>

		<?php
	if (!empty($_GET)) {
		$p = key($_GET);
				//include "page/".$p.".php";
	} else {
		$p = "inicio";
	}
	include "page/$p.php";
	?>

	</div>
</section>

<footer class="bg-preto branco">

</footer>

<!-- Scripst -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>


