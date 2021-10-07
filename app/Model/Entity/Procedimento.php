<?php

namespace App\Model\Entity;
use \WilliamCosta\DatabaseManager\Database;

class Procedimento{

    public $id_consulta;
    public $codigo;
    public $nome;
    public $valor;
    public $genero;
    public $data_procedimento;
    public $excecao;

    public function cadastrar(){

        $this->id_consulta = (new Database('procedimento'))->insert([
            'codigo' => $this->codigo,
            'nome' => $this->nome,
            'valor' => $this->valor,
            'genero' => $this->genero,
            'excecao' => $this->excecao,
            'data_procedimento' => $this->data_procedimento
        ]);

        return true;
    }

    public function atualizar(){
        return (new Database('procedimento'))->update('id_consulta = '.$this->id_consulta,[
            'codigo' => $this->codigo,
            'nome' => $this->nome,
            'valor' => $this->valor,
            'genero' => $this->genero,
            'excecao' => $this->excecao,
            'data_procedimento' => $this->data_procedimento
        ]);
    }

    public function excluir(){
        return (new Database('procedimento'))->delete('id_consulta = '.$this->id_consulta);
    }

    public static function getProcedimentoById($id_consulta){
        return self::getProcedimentos('id_consulta = '.$id_consulta)->fetchObject(self::class);
    }

    public static function getProcedimentos($where = null, $order = null, $limit = null, $fields = '*'){
        return (new Database('procedimento'))->select($where,$order,$limit,$fields);
    }
}