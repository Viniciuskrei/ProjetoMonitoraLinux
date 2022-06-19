<?php

namespace App\Controllers;

class LoginController extends BaseController
{

	public function index(){
		echo view('login_view');
	}    

    // LOGIN COM TITULO UNICO BEM VINDO
    public function login(){
        $post = $this->request->getPost();
        $session = \Config\Services::session();
        $data['titulo'] = 'Bem Vindo!';

        $loginModel = new \App\Models\LoginModel();
        $servicoDeDashboard = new \App\Libraries\ServicoDeDashboard();

        $data['cpu'] = $servicoDeDashboard->cpu();
        $data['memoria'] = $servicoDeDashboard->memoria();
        $data['so'] = $servicoDeDashboard->infoSo();
        $data['disco'] = $servicoDeDashboard->usoDisco();

        $session->set('usuario', $loginModel->login($post));

        return view('dash_view', $data);
    }

    // LOGOUT DESTRUINDO A SESSAO (TERÁ QUE LOGAR NOVAMENTE)
    public function logout(){
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}