<?php

namespace App\Controllers;

class UsuarioController extends BaseController
{

	public function index(){

	}

    // FORMULARIO DE CADASTRO DE NOVOS USUARIOS
    public function formCadastra(){
        $data['titulo'] = 'Cadastro de Usuário';
        $data['acao'] = "Inserir";
        $data['msg'] = '';
        $data['erros'] = '';

        $categoriaModel = new \App\Models\CategoriaModel();
        $listaCategorias = $categoriaModel->findAll();

        helper('form');

        $arrayCategorias = [];
        foreach ($listaCategorias as $categoria){
            $arrayCategorias[$categoria->id] = $categoria->nomeCategoria;
        }

        $data['comboCategorias'] = form_dropdown('idCategoria', $arrayCategorias);

        echo view('cadastrar_view', $data);
    }

    // FUNCAO CADASTRAR
    public function cadastrar(){
        $post = $this->request->getPost();
        $usuarioModel = new \App\Models\UsuarioModel();

        return $usuarioModel->cadastrar($post);
    }

    // LISTA TODOS USUARIOS DO BANCO
    public function listaUsuario()
    {
        $data['titulo'] = 'Lista de Usuários';
        $usuarioModel = new \App\Models\UsuarioModel();
        $data['usuarios'] = $usuarioModel->listaUsuarios();

        echo view('listaUsuario_view', $data);
    }

    // EDITA USUARIO PELO SEU ID
    public function editaUsuario($id){
        $data['titulo'] = 'Editar Usuário';
        $data['acao'] = "Editar";
        $usuarioModel = new \App\Models\UsuarioModel();
        $data['usuario'] = $usuarioModel->buscaUsuarios($id);
        $categoriaModel = new \App\Models\CategoriaModel();
        $data['categorias'] = $categoriaModel->listaCategorias();

        echo view('editar_view', $data);
    }

    // FUNCAO EDITAR
    public function editar(){
        $post = $this->request->getPost();

        $usuarioModel = new \App\Models\UsuarioModel();

        return $usuarioModel->editar($post);
    }

    // EXCLUI USUARIO PELO SEU ID
    public function excluiUsuario($id){
        $usuarioModel = new \App\Models\UsuarioModel();

        return $usuarioModel->excluiUsuario($id);
    }
}
