<?php

namespace App\Controllers;

class IndexController extends BaseController
{
    public function index()
    {
        $servicoDeDashboard = new \App\Libraries\ServicoDeDashboard();
        
        $data['titulo'] = 'Sistema de Monitoramento Linux';
        $data['cpu'] = $servicoDeDashboard->cpu();
        $data['memoria'] = $servicoDeDashboard->memoria();
        $data['so'] = $servicoDeDashboard->infoSo();
        $data['disco'] = $servicoDeDashboard->usoDisco();

        echo view('dash_view', $data);
    }

    // DADOS DA APLICACAO
    public function sobre()
    {
        $data['titulo'] = 'Sobre o App';

        echo view('sobre_view', $data);
    }
}
