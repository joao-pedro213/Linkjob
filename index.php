<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />

	<title>LinkJob - Home</title>

	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/servico.css" />

	<style>
		.cor {
			color: white;
		}
	</style>

</head>

<body>

	<?php
	session_start();
	if (isset($_GET['sair'])) {
		$_SESSION['usuario'] = null;
	}
	?>

	<header>
		<nav class="navbar navbar-expand-sm navbar-dark">

			<a class="navbar-brand" href="index.php">LinkJob</a>

			<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="navbar-collapse collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="new-item">
						<a class="nav-link" href="index.php">Página inicial</a>
					</li>

					<li class="new-item">
						<a class="nav-link" href="index.php#two" data-page="template-one">Sobre o LinkJob</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="index.php#three" data-page="template-two">Como usar</a>
					</li>

					<li class="nav-item">
						<a class="nav-link active" href="buscarServico.php">Buscar Serviço</a>
					</li>
				</ul>

				<button class="btn btn-outline-light my-2 my-sm-0" href="login.php" id="login">Entrar</button>

			</div>
		</nav>
	</header>
	<section id="one" data-index="0" class="home">
		<main>

			<div class="presentation">
				<div class="introduction">
					<div class="intro-text">
						<h1>Encontre o que precisa</h1>
						<p>
							Facilidade e comodidade para contratar um
							serviço de qualidade e confiança!
						</p>
					</div>
				</div>
				<div class="cover">
					<img src="./img/matebook.png" alt="matebook" />
				</div>
			</div>

			<img class="big-circle" src="./img/big-eclipse.svg" alt="" />
			<img class="medium-circle" src="./img/mid-eclipse.svg" alt="" />
		</main>
	</section>
	<section id="two" data-index="1" class="template-one">
		<div class="container"><br>

			<h1 style="color: #fff">Um pouco sobre o LinkJob...</h1><br><br>

			<div class="card-deck">
				<div class="card">
					<img class="card-img-top" height="314" src="img/card-image-1.png" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Precisando de um serviço?</h5>
						<p class="card-text" align="justify">Os serviços que são divulgados em nossa plataforma são separados por categorias específicas, faciliando a busca pelo <em>job</em> ideal.</p>
					</div>
				</div>
				<div class="card">
					<img class="card-img-top" height="314" src="img/card-image-3.png" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Compartilhe um serviço</h5>
						<p class="card-text" align="justify">Apresente seus talentos de um forma simples e rápida em nosso <em>feed</em> de serviços. Você poderá receber diversos contatos em apenas alguns cliques.</p>
					</div>
				</div>
				<div class="card">
					<img class="card-img-top" height="314" src="img/pig-money.png" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">É de graça!</h5>
						<p class="card-text" align="justify">Não cobramos qualquer taxa para você que quer compartilhar ou contratar um serviço! Você negocia diretamente com os outros usuários, sem burocracia e complicações!</p>
					</div>
				</div>
			</div>

		</div>
	</section>
	<section id="three" data-index="2" class="template-two">
		<h1>Como usar</h1>

	</section>

	<footer class="page-footer font-small unique-color-dark pt-4">

		<div class="container">

			<ul class="list-unstyled list-inline text-center py-2">


				<li class="list-inline-item">
					<p style="color: #ffffff">Para dúvidas, críticas e sugestões envie um e-mail para: linkjob_team@hotmail.com</p>
				</li><br>

				<li class="list-inline-item">
					<h5 class="mb-1" style="color: #ffffff">Cadastre-se gratuitamente clicando
						<a  id="reg" href="logar.php" style="color: #ffffff; text-decoration: underline;">aqui!</a></h5>
				</li>

			</ul>

		</div>

		<div class="footer-copyright text-center py-3" style="color: #ffffff">© 2020 Copyright:
			<a href="index.php" style="color: #ffffff"> linkjob.com</a>
		</div>
	</footer>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>