<?= $this->include('header_view', array('titulo' => $titulo )); ?>

	<?php if(session()->has('usuario')) : ?>
		<div id="content">
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
		</div>
	<?php else : ?>
		<div></div>
	<?php endif; ?>

<?= $this->include('footer_view'); ?>