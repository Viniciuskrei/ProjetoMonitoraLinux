<div id="content">
	<h3>Corpo login</h3>

	<form method="post" action="<?= base_url('/autenticacao/login') ?>">
		<p>E-mail: <input type="email" name="emailUsuario" required></p>
		<p>Senha: <input type="password" name="senhaUsuario" required></p>
		<input type="submit" value="Login">
	</form>

	<hr>
</div>

<?= $this->include('footer_view'); ?>