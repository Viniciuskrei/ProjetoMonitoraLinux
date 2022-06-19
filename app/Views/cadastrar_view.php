<?= $this->include('header_view', array('titulo' => $titulo )); ?>

<div id="content" class="container">
	<h3>Corpo cadastra</h3>
	<strong><?= $msg ?></strong>

	<?php if($erros != '') : ?>
		<ul style="color:red;">
			<?php foreach ($erros as $erro) : ?>
				<li><?= $erro ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<form method="post" action="<?= base_url('/usuario/cadastrar') ?>">
		<p>Nome do Usuário: <input type="text" name="nomeUsuario" required></p>
		<p>E-mail: <input type="email" name="emailUsuario" required></p>
		<p>Senha: <input type="password" name="senhaUsuario" required></p>
		<p>Categoria: <?= $comboCategorias ?></p>
		<button class="btn btn-primary" type="submit">Cadastrar Usuário</button>
		<a class="btn btn-secondary" href="<?= base_url('/') ?>">Cancelar</a>
	</form>

	<div>Adminitrador: Permissões para visualizar, editar, excluir e cadastrar usuários, além de visualizar a dashboard</div>
	<div>Analista: Apenas visualizar dashboard</div>

	<hr>
</div>

<?= $this->include('footer_view'); ?>