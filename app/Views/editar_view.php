<?= $this->include('header_view', array('titulo' => $titulo)); ?>

<div id="content" class="container mt-4 mb-4">
	<?php if (session()->has('usuario')) : ?>
		<h3>Edição de Usuário</h3>

		<form method="post" action="javascript:void(0)" class="mt-4" id="formEdita" enctype="multipart/form-data">
			<div class="row">
				<input type="hidden" name="id" id="id" value="<?= isset($usuario) ? $usuario->id : '' ?>">
				<div class="mb-3 col-12 col-md-6">
					<label for="nomeUsuario" class="form-label">Nome Completo</label>
					<input type="text" class="form-control" name="nomeUsuario" id="nomeUsuario" placeholder="Nome Completo" value="<?= isset($usuario) ? $usuario->nomeUsuario : '' ?>" required tabindex="1">
				</div>
				<div class="mb-3 col-12 col-md-6">
					<label for="emailUsuario" class="form-label">E-mail</label>
					<input type="email" class="form-control" name="emailUsuario" id="emailUsuario" placeholder="email@exemplo.com" value="<?= isset($usuario) ? $usuario->emailUsuario : '' ?>" required tabindex="2" readonly>
				</div>
			</div>
			<div class="row">
				<div class="mb-3 col-12 col-md-6">
					<label for="senhaUsuario" class="form-label">Nova Senha</label>
					<input type="password" class="form-control" name="senhaUsuario" id="senhaUsuario" placeholder="********" tabindex="3" aria-describedby="senhaHelp">
					<div id="senhaHelp" class="form-text">Evite utilizar senhas padrões. Ex.: 123456, Data de nascimento, etc...</div>
				</div>
				<div class="mb-3 col-12 col-md-6">
					<label for="senhaUsuarioConfirma" class="form-label">Confirme a nova senha</label>
					<input type="password" class="form-control" name="senhaUsuarioConfirma" id="senhaUsuarioConfirma" placeholder="********" tabindex="4">
				</div>
			</div>
			<div class="row g-3 align-items-center">
				<div class="col-12 col-md-1">
					<label for="idCategoria" class="form-label">Categoria</label>
				</div>
				<div class="col-12 col-md-5">
					<select name="idCategoria" id="idCategoria" class="form-select" aria-describedby="categoriaHelp">
						<option value="0" selected disabled>Selecione a categoria</option>
						<?php foreach ($categorias as $categoria) : ?>
							<option value="<?= $categoria->id ?>" <?php if ($usuario->idCategoria == $categoria->id) echo "selected"; ?>><?= $categoria->nomeCategoria ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="col-12 col-md-6">
					<span id="categoriaHelp" class="form-text">Informações sobre a categoria</span>
				</div>
			</div>

			<center class="mt-5 mb-5">
				<a href="<?= base_url('/listaUsuario') ?>" class="btn btn-secondary">Fechar</a>
				<button type="submit" class="btn btn-primary">Salvar Alterações</button>
			</center>
		</form>

		<div class="alert mt-5" id="alert" role="alert" style="display: none;">
			<center><span id="msgAlert"></span></center>
		</div>
	<?php else : ?>
		<?php base_url('/autenticacao'); ?>
	<?php endif; ?>
</div>

<script>
	$(document).ready(function(){
		var str = '';

		if ($('select option').filter(':selected').val() == '1') str += 'Administrador - Permissões para visualizar, editar, excluir e cadastrar usuários, além de visualizar a dashboard'
		else if ($('select option').filter(':selected').val() == '2') str += 'Analista - Apenas visualizar dashboard'
		else str = 'Informações sobre a categoria'

		$('#categoriaHelp').html(str);
	})

	$('select').change(function() {
		var str = '';
		$("select option:selected").each(function() {
			str += $(this).text() + " ";
		});

		if ($.trim(str) == "Administrador") str += '- Permissões para visualizar, editar, excluir e cadastrar usuários, além de visualizar a dashboard'
		else if ($.trim(str) == 'Analista') str += '- Apenas visualizar dashboard'
		else str = 'Informações sobre a categoria'

		$('#categoriaHelp').html(str);
	});

	$('#formEdita').on('submit', function() {
		var formData = new FormData(this);

		if ($('#senhaUsuario').val() != '' && $('#senhaUsuario').val().length < 8) {
			$('#msgAlert').html('Campo SENHA deve ter 8 ou mais caracteres!');
			$('#alert').removeClass('alert-success').addClass('alert-danger');
			$('#alert').fadeIn(1000);
			$('#alert').fadeOut(2000);
			$('#senhaUsuario').focus();
		} else if ($('#senhaUsuario').val() != $('#senhaUsuarioConfirma').val()) {
			$('#msgAlert').html('Senhas não coincidem!');
			$('#alert').removeClass('alert-success').addClass('alert-danger');
			$('#alert').fadeIn(1000);
			$('#alert').fadeOut(2000);
			$('#senhaUsuario').focus();
		} else if ($('select option').filter(':selected').val() == '0') {
			$('#msgAlert').html('Selecione uma CATEGORIA!');
			$('#alert').removeClass('alert-success').addClass('alert-danger');
			$('#alert').fadeIn(1000);
			$('#alert').fadeOut(2000);
			$('#idCategoria').focus();
		} else {
			$.ajax({
				type: 'POST',
				url: '<?= base_url('/usuario/editar') ?>',
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				success: function() {
					$('#msgAlert').html('Usuário editado com sucesso!');
					$('#alert').removeClass('alert-danger').addClass('alert-success');
					$('#alert').fadeIn(1000);
					$('#alert').fadeOut(2000);
					$('#senhaUsuario').val('');
					$('#senhaUsuarioConfirma').val('');
				}
			})
		}
	})
</script>

<?= $this->include('footer_view'); ?>