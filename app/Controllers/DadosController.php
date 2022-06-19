<?php

namespace App\Controllers;

class DadosController extends BaseController
{
	public function index()
	{

	}

	public function obterDados(){
		$data = array();

		$servicoDeDashboard = new \App\Libraries\ServicoDeDashboard();

		$servicoDeDashboard->executaShell();

		$data['cpu'] = $servicoDeDashboard->cpu();
        $data['memoria'] = $servicoDeDashboard->memoria();
        $data['so'] = $servicoDeDashboard->infoSo();
        $data['disco'] = $servicoDeDashboard->usoDisco();

        return $this->response->setJSON($data);
	}
}