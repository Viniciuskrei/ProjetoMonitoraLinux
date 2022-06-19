<?= $this->include('header_view', array('titulo' => $titulo )); ?>

<div id="content" class="container">
	<?php if(session()->has('usuario')) : ?>
		
			<h3>Corpo site</h3>

			<!-- DADOS DA CPU -->
			<div class="cpu">CPU: <?= $cpu ?></div>

			<!-- DADOS DA MEMORIA -->
			<div class="memoria">
				MEMÓRIA TOTAL: <?= $memoria['memTotal'] ?>
				MEMÓRIA USADA: <?= $memoria['memUsada'] ?>
				MEMÓRIA DISPONIVEL: <?= $memoria['memDisponivel'] ?>
			</div>

			<!-- DADOS USO DO DISCO -->
			<div class="disco">Uso do Disco: <?= $disco ?>% </div>

			<!-- DADOS DO SISTEMA OPERACIONAL -->
			<div class="so">
				Informações do SO: <br>
					Sistema: <?= $so['sistema'] ?> 
					Kernel: <?= $so['kernel'] ?> 
					Arquitetura: <?= $so['arquitetura'] ?> 
			</div>

			<hr>
		
	<?php else : ?>
		<h3>Faça Login para continuar</h3>
		<hr>
	<?php endif; ?>
</div>

<?= $this->include('footer_view'); ?>