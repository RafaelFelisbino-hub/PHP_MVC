<?php

namespace App\Model\Entity;
use \WilliamCosta\DatabaseManager\Database;

class Convenio{

    public $id_convenio;
    public $nome_fantasia;
    public $nome_empresa;
    public $cnpj;
    public $email;
    public $nome_cont;
    public $telefone;
    public $endereco;
    public $numero;
    public $cidade;
    public $estado;
    public $cep;

    public function cadastrar(){
        $this->id_conveio = (new Database('convenios'))->insert([
            'nome_fantasia' => $this->nome_fantasia,
            'nome_empresa' => $this->nome_empresa,
            'cnpj' => $this->cnpj,
            'email' => $this->email,
            'nome_cont' => $this->nome_cont,
            'telefone' => $this->telefone,
            'endereco' => $this->endereco,
            'numero' => $this->numero,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'cep' => $this->cep
        ]);
        return true;
    }

    public function atualizar(){
        return (new Database('convenios'))->update('id_convenio = '.$this->id_convenio,[
            'nome_fantasia' => $this->nome_fantasia,
            'nome_empresa' => $this->nome_empresa,
            'cnpj' => $this->cnpj,
            'email' => $this->email,
            'nome_cont' => $this->nome_cont,
            'telefone' => $this->telefone,
            'endereco' => $this->endereco,
            'numero' => $this->numero,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'cep' => $this->cep
        ]);
    }

    public function excluir(){
        return (new Database('convenios'))->delete('id_convenio = '.$this->id_convenio);
    }

    public static function getConvenioById($id_convenio){
        return self::getConvenios('id_convenio = '.$id_convenio)->fetchObject(self::class);
    }

    public static function getConvenios($where = null, $order = null, $limit = null, $fields = '*'){
        return (new Database('convenios'))->select($where,$order,$limit,$fields);
    }
}