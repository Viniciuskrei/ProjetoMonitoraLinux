<?php $session = \Config\Services::session(); ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $titulo ?></title>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url('css/estilo.css') ?>">

	<!-- Bootstrap JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
	<!-- FIM Bootstrap JS -->
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="<?= base_url("/") ?>">
				<img src="<?= base_url('img/linux.png') ?>" alt="Pinguim do Linux - Freepik (https://www.flaticon.com/free-icons/linux)" class="bg-white" width="30" height="30">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<!-- VERIFICA SE HA SESSAO -->
				<?php if (session()->has('usuario')) : ?>
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="<?= base_url("/") ?>">Início</a>
						</li>
					</ul>

					<div style="color: white; margin-right:50%; transform: translateX(50%)"><a class="dropdown-item" href="<?= base_url("/") ?>">Status do Sistema Operacional Linux</a></div>

					<div class="d-flex">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fa-solid fa-bars"></i>
								</a>
								<ul class="dropdown-menu dropdown-menu-dark dropdown-menu-lg-end" aria-labelledby="navbarDropdown">
									<!-- SE USUARIO == ADMIN -->
									<?php if ($session->get('usuario')->idCategoria == 1) : ?>
										<li><a class="dropdown-item" href="<?= base_url("/cadastrar") ?>">Cadastro de Usuários</a></li>
										<li><a class="dropdown-item" href="<?= base_url("/listaUsuario") ?>">Editar Usuários</a></li>				
										<hr class="dropdown-divider">
									<?php endif; ?>
									<!-- SE ADMIN OU ANALISTA -->
									<li><a class="dropdown-item" href="<?= base_url("/sobre") ?>">Sobre</a></li>
									<li><a class="dropdown-item" href="<?= base_url("/logout") ?>">Sair</a></li>
								</ul>
							</li>
						</ul>
					</div>
				<?php else : ?>
					<!-- PEDE LOGIN SE NAO HOUVER SESSAO -->
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="<?= base_url("/autenticacao") ?>">Login</a>
						</li>
					</ul>
				<?php endif; ?>
			</div>
	</nav>