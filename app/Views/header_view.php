<?php $session = \Config\Services::session(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $titulo ?></title>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/estilo.css">
</head>
<body>
	<header id="header" class="container bg-dark text-white">

		<!-- VERIFICA SE HA SESSAO -->
		<?php if(session()->has('usuario')) : ?>

		icone

		<a class="btn btn-info"href="<?= base_url("/") ?>">Dashboard</a>

		 Status do sistema Operacional Linux

		<div class="dropdown btn">
			<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fa-solid fa-bars"></i>
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<!-- SE USUARIO == ADMIN -->
				<?php if($session->get('usuario')->idCategoria == 1) : ?>
					<a class="dropdown-item" href="<?= base_url("/cadastrar") ?>">Cadastro de Usuários</a>
					<a class="dropdown-item" href="<?= base_url("/listaUsuario") ?>">Editar Usuários</a>
				<?php endif; ?>
				<!-- SE ADMIN OU ANALISTA -->
				<a class="dropdown-item" href="<?= base_url("/logout") ?>">Sair</a>
				<a class="dropdown-item" href="<?= base_url("/sobre") ?>">Sobre o App</a>
			</div>
		</div>
		<?php else : ?>
			<!-- PEDE LOGIN SE NAO HOUVER SESSAO -->
			<a class="dropdown-item text-white" href="<?= base_url("/autenticacao") ?>">Login</a>
		<?php endif; ?>
	</header>
	<hr>