<?= $this->include('header_view', array('titulo' => $titulo )); ?>

<div id="content" class="container">
	<?php if(session()->has('usuario')) : ?>
		
			<h3>Corpo site</h3>

			<!-- DADOS DA CPU -->
			<div class="cpu">CPU: <span id="cpu"><?= $cpu ?></span></div>

			<!-- DADOS DA MEMORIA -->
			<div class="memoria">
				MEMÓRIA TOTAL: <span id="memTotal"><?= $memoria['memTotal'] ?></span>
				MEMÓRIA USADA: <span id="memUsada"><?= $memoria['memUsada'] ?></span>
				MEMÓRIA DISPONIVEL: <span id="memDisponivel"><?= $memoria['memDisponivel'] ?></span>
			</div>

			<!-- DADOS USO DO DISCO -->
			<div class="disco">Uso do Disco: <span id="disco"><?= $disco ?></span>%</div>

			<!-- DADOS DO SISTEMA OPERACIONAL -->
			<div class="so">
				Informações do SO: <br>
					Sistema: <span id="sistema"><?= $so['sistema'] ?></span>
					Kernel: <span id="kernel"><?= $so['kernel'] ?></span>
					Arquitetura: <span id="arquitetura"><?= $so['arquitetura'] ?></span>
			</div>

			<!-- HORA DO SISTEMA -->
			<div>
				Hora do Sistema: <span id="horario">--:--:--</span>
			</div>

			<hr>
		
	<?php else : ?>
		<h3>Faça Login para continuar</h3>
		<hr>
	<?php endif; ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
	function atualizaHora(){
		var exibir = document.getElementById('horario');
		
		var agora = new Date();
		var horario = corrigeNumero(agora.getHours()) + ':' + corrigeNumero(agora.getMinutes()) + ':' +
					  corrigeNumero(agora.getSeconds());

		exibir.innerHTML = horario;
	}

	function corrigeNumero(numero){
		if(numero < 10){
			numero = '0' + numero;
		}

		return numero;
	}

	function obterDados(){
		$.ajax({
			method: 'GET',
			url: '<?= base_url('/dados/obterdados') ?>',
			data: null,
			success: function(retorno){
				$('#cpu').html(retorno.cpu);
				$('#memTotal').html(retorno.memoria.memTotal);
				$('#memUsada').html(retorno.memoria.memUsada);
				$('#memDisponivel').html(retorno.memoria.memDisponivel);
				$('#disco').html(retorno.disco);
				$('#sistema').html(retorno.so.sistema);
				$('#kernel').html(retorno.so.kernel);
				$('#arquitetura').html(retorno.so.arquitetura);
			}
		})
	}

	setInterval(atualizaHora, 1000);
	setInterval(obterDados, 1000);

</script>

<?= $this->include('footer_view'); ?>