<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    // CARREGA TODOS OS DADOS DA TABELA USUARIO
    protected $table = "usuario";
    protected $primaryKey = "id";
    protected $allowedFields = ['nomeUsuario', 'emailUsuario', 'senhaUsuario', 'idCategoria'];

    // PROCURA EMAIL E SENHA INFORMADOS
    public function login($post){
    	
    	$login = $this->db
                ->table($this->table)
                ->select()
                ->where('emailUsuario', $post['emailUsuario'])
                ->where('senhaUsuario', md5($post['senhaUsuario']))
                ->get()
                ->getRowObject();

    	if($login == ''){
    		echo "<script>alert('Usuario ou senha incorreto')</script>";
    	}else{
    		return $login;
    	}
    }
}