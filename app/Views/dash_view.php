<?= $this->include('header_view', array('titulo' => $titulo)); ?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- GRÁFICO DE CPU -->
<script type="text/javascript">
	google.charts.load('current', {
		'packages': ['gauge']
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {

		var data = google.visualization.arrayToDataTable([
			['Label', 'Value'],
			['CPU', <?= $cpu ?>],
		]);

		var options = {
			redFrom: 90,
			redTo: 100,
			yellowFrom: 75,
			yellowTo: 90,
			minorTicks: 5
		};

		var chart = new google.visualization.Gauge(document.getElementById('cpu_div'));

		chart.draw(data, options);
	}
</script>

<!-- GRÁFICO DE MEMÓRIA -->
<script type="text/javascript">
	google.charts.load("current", {
		packages: ["corechart"]
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Memória (MB)', 'Usada', 'Disponível', 'Total', {
				role: 'annotation'
			}],
			['Memória (MB)', <?= $memoria['memUsada'] ?>, <?= $memoria['memDisponivel'] ?>, <?= $memoria['memTotal'] ?>, '']
		]);

		var options = {
			isStacked: 'percent',
			height: 300,
			legend: {
				position: 'bottom',
				maxLines: 3
			},
			hAxis: {
				minValue: 0,
				ticks: [0, .25, .5, .75, 1]
			}
		};

		var chart = new google.visualization.BarChart(document.getElementById("memoria_div"));
		chart.draw(data, options);
	}
</script>

<!-- GRÁFICO DE DISCO -->
<script type="text/javascript">
	google.charts.load("current", {
		packages: ["corechart"]
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Usado (%)', 'Total'],
			['Disco usado', <?= $disco ?>],
			['Disco livre', 100],
		]);

		var options = {
			chartArea: {
				left: '33.3%',
				top: 20,
				width: '50%',
				height: '75%'
			},
			pieHole: 0.4,
			colors: ['#FF9900', 'gray']
		};

		var chart = new google.visualization.PieChart(document.getElementById('disco_div'));
		chart.draw(data, options);
	}
</script>

<div id="content" class="container">
	<?php if (session()->has('usuario')) : ?>
		<div class="row mt-3 mb-3">
			<div class="col-12 col-md-6">
				<center>
					<h5>Dados da CPU</h5>
				</center>
				<br>
				<!-- DADOS DA CPU -->
				<div id="cpu_div" style="padding-left: 33.3%;"></div>
			</div>
			<div class="col-12 col-md-6">
				<center>
					<h5>Dados da Memória</h5>
				</center>
				<!-- DADOS DA MEMÓRIA -->
				<div id="memoria_div"></div>
			</div>
		</div>

		<br>

		<div class="row mt-3 mb-3">
			<div class="col-12 col-md-6">
				<center>
					<h5>Dados de Uso de Disco (%)</h5>
				</center>
				<!-- DADOS USO DO DISCO -->
				<div id="disco_div"></div>
			</div>
			<div class="col-12 col-md-6">
				<center>
					<h5>Dados do Sistema Operacional</h5>
				</center>
				<br>
				<!-- DADOS DO SISTEMA OPERACIONAL -->
				<div class="so">
					<span id="sistema"><?= $so['sistema'] ?></span><br>
					<span id="kernel"><?= $so['kernel'] ?></span><br>
					<span id="arquitetura"><?= $so['arquitetura'] ?></span><br>
				</div>
				<br>
				<!-- HORA DO SISTEMA -->
				<div>
					Hora do Sistema: <span id="horario">--:--:--</span>
				</div>
			</div>
		</div>

		<hr>

		<!-- DADOS DA CPU -->
		<div class="cpu">CPU: <span id="cpu"><?= $cpu ?></span></div>

		<!-- DADOS DA MEMORIA -->
		<div class="memoria">
			MEMÓRIA TOTAL: <span id="memTotal"><?= $memoria['memTotal'] ?></span> <br>
			MEMÓRIA USADA: <span id="memUsada"><?= $memoria['memUsada'] ?></span> <br>
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

<script type="text/javascript">
	function atualizaHora() {
		var exibir = document.getElementById('horario');

		var agora = new Date();
		var horario = corrigeNumero(agora.getHours()) + ':' + corrigeNumero(agora.getMinutes()) + ':' +
			corrigeNumero(agora.getSeconds());

		exibir.innerHTML = horario;
	}

	function corrigeNumero(numero) {
		if (numero < 10) {
			numero = '0' + numero;
		}

		return numero;
	}

	function obterDados() {
		$.ajax({
			method: 'GET',
			url: '<?= base_url('/dados/obterdados') ?>',
			data: null,
			success: function(retorno) {
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