<?php

namespace App\Model\Entity;
use \WilliamCosta\DatabaseManager\Database;

class Especialidade{

    public $id_cadastro;
    public $nome_especialidade;

    public function cadastrar(){
        $this->id_cadastro = (new Database('tbl_especialidade'))->insert([
            'nome_especialidade' => $this->nome_especialidade
        ]);
        return true;
    }

    public function atualizar(){
        return (new Database('tbl_especialidade'))->update('id_cadastro = '.$this->id_cadastro,[
            'nome_especialidade' => $this->nome_especialidade
        ]);
    }

    public function excluir(){
        return (new Database('tbl_especialidade'))->delete('id_cadastro = '.$this->id_cadastro);
    }

    public static function getEspecialidadeById($id_cadastro){
        return self::getEspecialidades('id_cadastro = '.$id_cadastro)->fetchObject(self::class);
    }

    public static function getEspecialidades($where = null, $order = null, $limit = null, $fields = '*'){
        return (new Database('tbl_especialidade'))->select($where,$order,$limit,$fields);
    }
}