<?= $this->include('header_view', array('titulo' => $titulo)); ?>

<div id="content" class="container mt-4 mb-5">
	<h3>Sobre o App</h3>

	<br>

	<h4>Objetivo:</h4>
	<p>Sistema com dashboard de status do sistema Operacional Linux.</p>

	<hr class="col-12 col-md-6">

	<h4>Telas do Sistema:</h4>
	<div>
		<p>
			<ul>
				<li>Sistema de Login</li>
				<li>Gerenciamento de Usuários (Cadastrar, Atualizar, Remover)</li>
				<li>Dashboard do Sistema</li>
				<li>Status em tempo real da utilização de CPU</li>
				<li>Status da memória utilizada</li>
				<li>Status de uso dos discos</li>
				<li>Informações do SO (distribuição, versão, arquitetura)</li>
				<li>Sistema</li>
			</ul>
		</p>
	</div>

	<hr class="col-12 col-md-6">

	<h4>Ferramentas:</h4>
	<div>
		<p>
			<ul>
				<li>Framework PHP utilizado Codeigniter 4 (<a href="https://codeigniter.com" target="_blank">https://codeigniter.com</a>)</li>
				<li>Framework CSS utilizado Bootstrap 5 (<a href="https://getbootstrap.com" target="_blank">https://getbootstrap.com</a>)</li>
				<li>Senhas criptografadas no Banco de Dados</li>
			</ul>
		</p>
	</div>
</div>

<?= $this->include('footer_view'); ?>