<?php

namespace App\Libraries;

class ServicoDeDashboard
{
	// DADOS DA CPU DO COMPUTADOR
	public function cpu(){
		$arquivo = fopen('./../writable/uploads/arquivos_sistema/cpu_ps_1.txt', 'r');

		$info = array();

		while(!feof($arquivo)){
			$info[] = trim(fgets($arquivo));
		}

		//pegar dados CPU e moldar pelo formato do txt
		$dados1 = $info[1];
		$dados2 = $info[2];
		$dados3 = $info[3];
		$dados4 = $info[4];
		$dados5 = $info[5];
		$dados6 = $info[6];
		$dados7 = $info[7];
		$dados8 = $info[8];
		$dados9 = $info[9];

		$cpu = $dados1 + $dados2 + $dados3 + $dados4 + $dados5 + $dados6 + $dados7 + $dados8 + $dados9;

		fclose($arquivo);

		return $cpu;
	}

	// DADOS DA MEMÓRIA DO COMPUTADOR
	public function memoria(){
		$arquivo = fopen('./../writable/uploads/arquivos_sistema/memoria_free_1.txt', 'r');
		$memoria = array();

		$info = array();

		while(!feof($arquivo)){
			$info[] = explode('     ',trim(fgets($arquivo)));
		}

		//pegar dados memoria e moldar pelo formato do txt
		$dados1 = trim($info[1][1]); //mem total
		$dados2 = trim($info[1][2]); //mem usada
		$dados3 = trim($info[1][3]); //mem livre
		$dados4 = trim($info[1][6]); //disponivel

		$memoria['memDisponivel'] = number_format(($dados3 + $dados4)/1024, 2, '.', '');
		$memoria['memTotal'] = number_format($dados1/1024, 2, '.', '');
		$memoria['memUsada'] = number_format($dados2/1024, 2, '.', '');
		// $memoria['memDisponivel'] = $dados3 + $dados4;
		// $memoria['memTotal'] = $dados1;
		// $memoria['memUsada'] = $dados2;

		fclose($arquivo);

		return $memoria;
	}

	// DADOS DO SISTEMA OPERACIONAL DO COMPUTADOR
	public function infoSo(){
		$arquivo = fopen('./../writable/uploads/arquivos_sistema/info_so_1.txt', 'r');
		$so = array();

		$info = array();

		while(!feof($arquivo)){
			$info[] = trim(fgets($arquivo));
		}

		//pegar dados info SO e moldar pelo formato do txt
		$so['sistema'] = $info[0];
		$so['kernel'] = $info[1];
		$so['arquitetura'] = $info[2];

		fclose($arquivo);

		return $so;
	}

	// DADOS DO USO DE DISCO DO COMPUTADOR
	public function usoDisco(){
		$arquivo = fopen('./../writable/uploads/arquivos_sistema/uso_disco_1.txt', 'r');

		$info = array();

		while(!feof($arquivo)){
			$info[] = explode('   ', trim(fgets($arquivo)));
		}
		
		//pegar dados uso do disco e moldar pelo formato do txt
		$dados1 = explode('%', trim($info[1][6])); //usado 1
		$dados2 = explode('%', trim($info[2][4])); //usado 2
		$dados3 = explode('%', trim($info[3][4])); //usado 3
		$dados4 = explode('%', trim($info[4][4])); //usado 4
		$dados5 = explode('%', trim($info[5][4])); //usado 5
		$dados6 = explode('%', trim($info[6][5])); //usado 6
		$dados7 = explode('%', trim($info[7][4])); //usado 7
		$dados8 = explode('%', trim($info[8][5])); //usado 8

		$disco = $dados1[0] + $dados2[0] + $dados3[0] + $dados4[0] + $dados5[0] + $dados6[0] + $dados7[0] + $dados8[0];

		fclose($arquivo);

		return $disco;
	}

	public function executaShell(){
		exec('./../public/scripts/infocpu.sh');
		exec('./../public/scripts/infodisco.sh');
		exec('./../public/scripts/infomemoria.sh');
		exec('./../public/scripts/infoso.sh');
	}
}