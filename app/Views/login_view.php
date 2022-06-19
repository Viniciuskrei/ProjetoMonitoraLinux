<?= $this->include('header_view', array('titulo' => $titulo)); ?>

<div id="content" class="container">
	<h3>Corpo login</h3>

	<form method="post" action="<?= base_url('/autenticacao/login') ?>">
		<p>E-mail: <input type="email" name="emailUsuario" required></p>
		<p>Senha: <input type="password" name="senhaUsuario" required></p>
		<button type="submit" class="btn btn-primary">Login</button>
	</form>

	<hr>
</div>

<?= $this->include('footer_view'); ?>