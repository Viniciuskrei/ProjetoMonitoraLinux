<?= $this->include('header_view', array('titulo' => $titulo )); ?>

<div id="content" class="container">
	<h3>Sobre mim</h3>
	<h4>Objetivo:</h4>
	Sistema com dashboard de status do sistema Operacional Linux <br>
	
	<div class="grid">
		<h4>Telas do Sistema:</h4>
		<div>
			• Sistema de Login <br>
			• Gerenciamento de Usuários (Cadastrar, Atualizar, Remover) <br>
			• Dashboard do Sistema <br>
			• Status em tempo real da utilização de CPU <br>
			• Status da memória utilizada <br>
			• Status de uso dos discos <br>
			• Informações do SO (distribuição, versão, arquitetura)
		</div>
		<h4>Ferramentas:</h4>
		<div>
			• Utilizado o Framework Codeigniter 4 (https://codeigniter.com/) <br>
			• Utilizar no Front end o Bootstrap 5 (https://getbootstrap.com/) <br>
			• Criptografada a senha dos usuários no banco de dados
		</div>
	</div>
	<hr>
</div>

<?= $this->include('footer_view'); ?>