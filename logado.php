<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />

	<title>Linkjob - Home</title>

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" />
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/servico.css" />

	<style>
		small.help-block {
			color: #F44336 !important;
		}
	</style>
</head>

<body>

	<?php

	session_start();

	if (!isset($_SESSION['usuario'])) header("Location: index.php");

	$nome = $_SESSION['usuario']->nome;
	$email = $_SESSION['usuario']->email;
	$sexo = $_SESSION['usuario']->sexo;
	$wcm = "Bem vindo(a)";
	$pos = strpos($nome, " ");

	if ($pos > 0) {
		$nomeReduzido = substr($nome, 0, $pos);
	} else {
		$nomeReduzido = $nome;
	}

	switch ($sexo) {
		case "M":
			$wcm = "Bem vindo";
			break;

		case "F":
			$wcm = "Bem vinda";
			break;

		default:
			$wcm;
	}

	?>

	<header>
		<nav class="navbar navbar-expand-sm navbar-dark">

			<a class="navbar-brand" href="logado.php">LinkJob</a>

			<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="navbar-collapse collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">

					<li class="new-item active">
						<a class="nav-link" href="logado.php">Página inicial</a>
					</li>

					<li class="new-item">
						<a class="nav-link" href="logado.php#two" data-page="template-one">Sobre o LinkJob</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="logado.php#three" data-page="template-two">Como usar</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="buscarServico.php">Buscar Serviço</a>
					</li>

				</ul>

				<ul class="navbar-nav ml-auto my-2 my-sm-0">

					<li class="nav-item">
						<button class="btn btn-outline-light" data-toggle="modal" data-target="#frmCadserv" id="btnT">Cadastrar Serviço</button>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php echo "$wcm, $nomeReduzido"; ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#"><i class="fas fa-cogs mr-2"></i>Minha conta</a>

							<div class="dropdown-divider"></div>

							<a class="dropdown-item" href="servicos.html"><i class="fas fa-rocket mr-2"></i>Meus serviços</a>
						</div>
					</li>

					<button type="button" class="btn btn-outline-light btn-circle" onclick='if (window.confirm("Você deseja realmente sair?")) { window.location.href = "index.php?sair=true";  };' title="Sair" style="border-radius: 35px;">
						<i class="fas fa-power-off"></i>
					</button>

				</ul>
			</div>
		</nav>
	</header>

	<section id="one" data-index="0" class="home">
		<main>

			<div class="modal fade" id="frmCadserv">
				<div class="modal-dialog modal-lg modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Cadastrar um novo serviço</h5>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<div class="modal-body">

							<!-- dados cadastrados com sucesso! -->

							<?php

							if (isset($_SESSION['service-success'])) {

							?>

								<div class="alert alert-success" id="success" role="alert" align="center">
									Serviço cadastrado com sucesso!
								</div>

							<?php

							}

							unset($_SESSION['service-success']);

							?>

							<form method="POST" action="cadastroServico.php" id="myForm">
								<div class="form-row">
									<div class="form-group col-md-4">
										<label>Categoria</label>
										<select class="form-control" id="categoria" name="categoria">
											<option value="" data-default disabled selected></option>
											<option value="1">Serviços Domésticos</option>
											<option value="2">Informática</option>
											<option value="3">Artesanato</option>
											<option value="4">Gastronomia</option>
										</select>
									</div>

									<div class="form-group col-md-5">
										<label>Serviço prestado</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="fa fa-rocket"></i>
												</span>
											</div>
											<input id="nomeServico" type="text" name="nomeServico" class="form-control" placeholder="Ex: Diarista"></input>
										</div>
									</div>

									<div class="form-group col-md-3">
										<label>Valor do Serviço</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="fa fa-dollar-sign" aria-hidden="true"></i>
												</span>
											</div>
											<input id="valorServico" type="text" name="valorServico" class="form-control" placeholder="Ex: 35"></input>
										</div>
									</div>
								</div>

								<div class="form-row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Estado</label>
											<select class="form-control" id="estado" name="estado">
												<option data-default disabled selected></option>
												<option value="Minas Gerais">Minas Gerais</option>
											</select>
										</div>
									</div>
									<div class="form-group col-md-4">
										<label>Cidade</label>
										<select class="form-control" id="cidade" name="cidade">
											<option data-default disabled selected></option>
											<option value="Belo Horizonte">Belo Horizonte</option>
											<option value="Betim">Betim</option>
											<option value="Contagem">Contagem</option>
											<option value="Sábara">Sábara</option>
										</select>
									</div>

									<div class="form-group col">
										<label>Endereço</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="fa fa-map-marker-alt" aria="aria-hidden"></i>
												</span>
											</div>
											<input class="form-control" type="text" id="endereco" name="endereco" class="form-control" placeholder="Seu endereço"></input>
										</div>
									</div>
								</div>

								<div class="form-row">
									<div class="form-group col">
										<label>Descrição</label>
										<textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Digite uma breve descrição do serviço a ser prestado"></textarea>
									</div>
								</div>

								<div class="form-row">
									<div class="form-group col-md-4">
										<label>Telefone fixo</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="fa fa-phone" aria="aria-hidden"></i>
												</span>
											</div>
											<input class="form-control" type="tel" id="fixo" name="fixo" class="form-control" placeholder="Seu telefone" maxlength="10"></input>
										</div>
									</div>
									<div class="form-group col-md-4">
										<label>Celular (WhatsApp)</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="fab fa-whatsapp" aria="aria-hidden"></i>
												</span>
											</div>
											<input class="form-control" type="tel" id="celular" name="celular" class="form-control" placeholder="Seu celular"></input>
										</div>
									</div>
									<div class="form-group col">
										<label>Email de contato</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<span class="fa fa-envelope"></span>
												</span>
											</div>
											<input class="form-control" type="email" id="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Seu email"></input>
										</div>
									</div>
								</div><br>

								<div class="modal-footer">

									<button type="submit" class="btn btn-success" id="confirm">Confirmar</button>

									<button type="button" class="btn btn-outline-secondary" id="close" data-dismiss="modal">Fechar</button>

								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

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
						<p class="card-text" align="justify">Os serviços que são divulgados em nossa plataforma são separados por categorias específicas, faciliando a busca pelo prestador ideal de acordo com as suas necessidades.</p>
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
		<div class="container"><br><br>

			<h1 style="color: #585772">Como usar</h1><br><br>

			<div class="row">
				<div class="col-md-6 border-right">

					<h3 style="color: #585772">Cadastrando um serviço</h3>

					<p style="color: #585772" align="justify">Para cadastrar um serviço é muito simples. Ao efetuar login no site, basta clicar no botão que se encontra no menu principal chamado "Cadastrar Serviço", conforme a imagem abaixo.
						Ao clicar, uma nova tela é aberta e para fazer o cadastro do serviço basta preencher todos os campos solicitados.
					</p>

					<p class="text-success" align="justify">Lembre-se de disponibilizar todas as informações necessárias para divulgação do serviço prestado,
						assim, vai se tornar mais fácil clientes em potencial te encontrarem em nossa plataforma</p>

					<figure>
						<div class="zoom">
							<img class="img-responsive rounded border" width="479" height="250" src="img/Cadastro-servico-2.png" title="Botão para cadastrar um novo serviço">
						</div>
					</figure>

				</div>
				<div class="col-md-6">
					<h5 class="text-info">Demonstrando como cadastrar um novo serviço</h5><br>
					<video class="rounded border" width="540" height="432" title="Vídeo demonstrativo para cadastro de um novo serviço" controls>
						<source src="img/cadastro-servico-v.mp4" type="video/mp4">
					</video>
				</div>
			</div><br><br>

			<div class="row">
				<div class="col-md-6 border-right">

					<h3 style="color: #585772">Buscando serviços na plataforma</h3>

					<p style="color: #585772" align="justify"> Para buscar por serviços divulgados na plataforma basta clicar em "Buscar Serviço", que se encontra no menu principal, conforme a imagem abaixo.
					</p>

					<figure>
						<div class="zoom">
							<img class="img-responsive rounded border img-2" width="479" height="250" src="img/busca-servico-2.png" title="Link para página de busca de serviços">
						</div>
					</figure>

				</div>
				<div class="col-md-6">

					<h5 class="text-info">Filtrando serviços divulgados</h5>

					<p style="color: #585772" align="justify">Os serviços divulgados na plataforma são dividos por categorias.
						Você pode utilizar nossos filtros categoria, serviço prestado, estado e cidade para encontrar o prestador ideal.</p>

					<figure>
						<img class="img-responsive rounded border" width="540" height="200" src="img/busca-servico-3.png" title="Filtros de busca para serviços">
					</figure>

				</div>
			</div>
		</div>

	</section><br><br>

	<footer class="page-footer font-small unique-color-dark pt-4">

		<div class="container">

			<ul class="list-unstyled list-inline text-center py-2">


				<li class="list-inline-item">
					<p style="color: #ffffff">Para dúvidas, críticas e sugestões envie um e-mail para: linkjob_team@hotmail.com</p>
				</li><br>

				<li class="list-inline-item">
					<h5 class="mb-1" style="color: #ffffff">Com &#128153, equipe do LinkJob</h5>
				</li>

			</ul>

		</div>

		<div class="footer-copyright text-center py-3" style="color: #ffffff">© 2020 Copyright:
			<a href="index.php" style="color: #ffffff"> linkjob.com</a>
		</div>
	</footer>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.mask.min.js"></script>
	<script type="text/javascript" src="js/logado.js"></script>

</body>

</html>