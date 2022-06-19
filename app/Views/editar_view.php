<?= $this->include('header_view', array('titulo' => $titulo )); ?>

<div id="content" class="container">
	<?php if(session()->has('usuario')) : ?>
		<h3>Edição de Usuário</h3>

		<form method="post" action="<?= base_url('/usuario/editar') ?>">
			<input type="hidden" name="id" value="<?= isset($usuario) ? $usuario->id : '' ?>">
			<p>Nome do Usuário: <input type="text" name="nomeUsuario" value="<?= isset($usuario) ? $usuario->nomeUsuario : '' ?>" required></p>
			<p>E-mail: <input type="email" name="emailUsuario" value="<?= isset($usuario) ? $usuario->emailUsuario : '' ?>" required></p>
			<p>Alterar senha: <input type="password" name="senhaUsuario"></p>
			<p>
				Categoria:
				<select name="idCategoria">
					<?php foreach($categorias as $categoria) : ?>
						<option value="<?= $categoria->id ?>" <?php if($usuario->idCategoria == $categoria->id) echo "selected"; ?>><?= $categoria->nomeCategoria ?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<button type="submit" class="btn btn-primary">Salvar Alterações</button>
			<a class="btn btn-secondary" href="<?= base_url('/listaUsuario') ?>">Cancelar</a>
		</form>

		<div>Adminitrador: Permissões para visualizar, editar, excluir e cadastrar usuários, além de visualizar a dashboard</div>
		<div>Analista: Apenas visualizar dashboard</div>

		<hr>
	<?php else :?>
	<?php base_url('/autenticacao'); ?>
	<?php endif; ?>
</div>

<?= $this->include('footer_view'); ?>