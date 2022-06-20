<?= $this->include('header_view', array('titulo' => $titulo)); ?>

<div id="content" class="container mt-4">
	<h3>Status do Sistema Operacional Linux</h3>

	<br>

	<h4>Login</h4>

	<br>

	<form method="post" action="<?= base_url('/autenticacao/login') ?>">
		<div class="row g-3 align-items-center mb-3">
			<div class="col-12 col-md-auto">
				<label for="emailUsuario" class="col-form-label">E-mail:</label>
			</div>
			<div class="col-12 col-md-5">
				<input type="email" class="form-control" name="emailUsuario" id="emailUsuario" placeholder="email@exemplo.com" required>
			</div>
		</div>
		<div class="row g-3 align-items-center mb-3">
			<div class="col-12 col-md-auto">
				<label for="senhaUsuario" class="col-form-label">Senha:</label>
			</div>
			<div class="col-12 col-md-5">
				<input type="password" class="form-control" name="senhaUsuario" id="senhaUsuario" placeholder="********" required>
			</div>
		</div>
		
		<br>

		<button type="submit" class="btn btn-primary col-8 col-md-1">Entrar</button>
	</form>
</div>

<?= $this->include('footer_view'); ?>