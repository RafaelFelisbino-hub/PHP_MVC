<?php

namespace App\Model\Entity;
use \WilliamCosta\DatabaseManager\Database;

class Padrao{

    public $id_funcionamento;
    public $abertura_clinica;
    public $fechamento_clinica;
    public $media_consultas;
    public $dias_funcionamento;

    public function cadastrar(){
        $this->id_funcionamento = (new Database('funcionamento'))->insert([
            'abertura_clinica' => $this->abertura_clinica,
            'fechamento_clinica' => $this->fechamento_clinica,
            'media_consultas' => $this->media_consultas,
            'dias_funcionamento' => $this->dias_funcionamento
        ]);
        
        return true;
    }

    public function atualizar(){
        return (new Database('funcionamento'))->update('id_funcionamento = '.$this->id_funcionamento,[
            'abertura_clinica' => $this->abertura_clinica,
            'fechamento_clinica' => $this->fechamento_clinica,
            'media_consultas' => $this->media_consultas,
            'dias_funcionamento' => $this->dias_funcionamento
        ]);
    }

    public function excluir(){
        return (new Database('funcionamento'))->delete('id_funcionamento = '.$this->id_funcionamento);
    }

    public static function getPadraoById($id_funcionamento){
        return self::getPadroes('id_funcionamento = '.$id_funcionamento)->fetchObject(self::class);
    }

    public static function getPadroes($where = null, $order = null, $limit = null, $fields = '*'){
        return (new Database('funcionamento'))->select($where,$order,$limit,$fields);
    }
}