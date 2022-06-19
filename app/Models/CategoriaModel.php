<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model{
    // CARREGA OS DADOS DA TABELA CATEGORIA
    protected $table = "categoria";
    protected $primaryKey = "id";
    protected $allowedFields = ['nomeCategoria'];

    protected $returnType = 'object';

    // LISTA TODAS AS CATEGORIAS INSERIDAS NO BANCO DE DADOS
    public function listaCategorias(){
        return $this->db
                ->table($this->table)
                ->select()
                ->get()
                ->getResultObject();
    }
}