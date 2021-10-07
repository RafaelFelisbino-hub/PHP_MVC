<?php

namespace App\Model\Entity;
use \WilliamCosta\DatabaseManager\Database;

class Medico{

    public $id_medico;
    public $nome_medico;
    public $rua_medico;
    public $numero_medico;
    public $complemento_medico;
    public $bairro_medico;
    public $cep_medico;
    public $email_medico;
    public $telefone_fixo_medico;
    public $paciente_id_paciente;

    public function cadastrar(){
        $this->id_medico = (new Database('medicos'))->insert([
            'nome_medico' => $this->nome_medico,
            'rua_medico' => $this->rua_medico,
            'numero_medico' => $this->numero_medico,
            'complemento_medico' => $this->complemento_medico,
            'bairro_medico' => $this->bairro_medico,
            'cep_medico' => $this->cep_medico,
            'email_medico' => $this->email_medico,
            'telefone_fixo_medico' => $this->telefone_fixo_medico,
            'paciente_id_paciente' => $this->paciente_id_paciente
        ]);

        return true;
    }

    public function atualizar(){
        return (new Database('medicos'))->update('id_medico = '.$this->id_medico,[
            'nome_medico' => $this->nome_medico,
            'rua_medico' => $this->rua_medico,
            'numero_medico' => $this->numero_medico,
            'complemento_medico' => $this->complemento_medico,
            'bairro_medico' => $this->bairro_medico,
            'cep_medico' => $this->cep_medico,
            'email_medico' => $this->email_medico,
            'telefone_fixo_medico' => $this->telefone_fixo_medico,
            'paciente_id_paciente' => $this->paciente_id_paciente
        ]);
    }

    public function excluir(){
        return (new Database('medicos'))->delete('id_medico = '.$this->id_medico);
    }

    public static function getMedicoById($id_medico){
        return self::getMedicos('id_medico = '.$id_medico)->fetchObject(self::class);
    }

    public static function getMedicos($where = null, $order = null, $limit = null, $fields = '*'){
        return (new Database('medicos'))->select($where,$order,$limit,$fields);
    }

}