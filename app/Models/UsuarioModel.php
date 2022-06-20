<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    // CARREGA TODOS OS CAMPOS DA TABELA USUARIO
    protected $table = "usuario";
    protected $primaryKey = "id";
    protected $allowedFields = ['nomeUsuario', 'emailUsuario', 'senhaUsuario', 'idCategoria'];

    protected $returnType = 'object';

    protected $validationRules = [
        'nomeUsuario'   => 'required|min_length[3]',
        "emailUsuario"  => "required|is_unique[usuario.emailUsuario]",
        "senhaUsuario"  => "required|min_length[8]"
    ];

    protected $validationMessages = [
        'nomeUsuario'   => [
            "required"      => "O campo nome é obrigatório",
            "min_length"    => "O campo nome deve possuir ao menos 3 caracteres"
        ],
        'emailUsuario'  => [
            'required'      => "O campo e-mail é obrigatório",
            'is_unique'     => "E-mail já cadastrado"
        ],
        "senhaUsuario"  => [
            'required'      => "O campo senha é obrigatório",
            'min_length'    => "O campo senha deve possuir ao menos 8 caracteres"
        ]
    ];

    // VERIFICA SE E-MAIL JÁ EXISTE NA BASE DE DADOS
    public function verificaEmail($email){
        return $this->db
        ->table($this->table)
        ->select("emailUsuario")
        ->where("emailUsuario", $email)
        ->get()
        ->getResultObject();
    }

    // INSERE NO BANCO TODOS OS DADOS RECEBIDOS POR POST
    public function cadastrar($post){
        return $this->db
        ->table($this->table)
        ->set("nomeUsuario", $post['nomeUsuario'])
        ->set("emailUsuario", $post['emailUsuario'])
        ->set("senhaUsuario", md5($post['senhaUsuario']))
        ->set("idCategoria", $post['idCategoria'])
        ->insert();
    }

    // LISTA TODOS OS USUARIOS DO BANCO DE DADOS
    public function listaUsuarios(){
        return $this->db
        ->table($this->table)
        ->select("$this->table.*, categoria.nomeCategoria")
        ->join("categoria", "$this->table.idCategoria = categoria.id")
        ->orderBy("id")
        ->get()
        ->getResultObject();
    }

    // BUSCA USUARIO PELO ID SELECIONADO NO CAMPO EDITAR
    public function buscaUsuarios($id){
        return $this->db
        ->table($this->table)
        ->select()
        ->where('id', $id)
        ->get()
        ->getRowObject();
    }

    // EDITA USUARIO NO BANCO DE DADOS PELO ID CARREGADO (HIDDEN)
    public function editar($post){

        if ($post['senhaUsuario'] != '') {
            return $this->db
            ->table($this->table)
            ->set("nomeUsuario", $post['nomeUsuario'])
            ->set("emailUsuario", $post['emailUsuario'])
            ->set("senhaUsuario", md5($post['senhaUsuario']))
            ->set("idCategoria", $post['idCategoria'])
            ->where('id', $post['id'])
            ->update();
        }else{
            return $this->db
            ->table($this->table)
            ->set("nomeUsuario", $post['nomeUsuario'])
            ->set("emailUsuario", $post['emailUsuario'])
            ->set("idCategoria", $post['idCategoria'])
            ->where('id', $post['id'])
            ->update();
        }

        
    }

    // EXCLUI O USUARIO DO ID SELECIONADO
    public function excluiUsuario($id){
        return $this->db
        ->table($this->table)
        ->where('id', $id)
        ->delete();
    }
}
