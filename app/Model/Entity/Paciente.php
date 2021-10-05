<?php

namespace App\Model\Entity;
use \WilliamCosta\DatabaseManager\Database;

class Paciente{

    public $id_paciente;
    public $nome_paciente;
    public $rua;
    public $numero;
    public $complemento;
    public $bairro;
    public $cep;
    public $email;
    public $telefone;

    public function cadastrar(){

        //Insere Paciente no banco de dados
        $this->id_paciente = (new Database('tbl_paciente'))->insert([
            'nome_paciente' => $this->nome_paciente,
            'rua' => $this->rua,
            'numero' => $this->numero,
            'complemento' => $this->complemento,
            'bairro' => $this->bairro,
            'cep' => $this->cep,
            'email' => $this->email,
            'telefone' => $this->telefone
        ]);
        
        //Sucesso
        return true;
    }

    public function atualizar(){

        //Atualiza Paciente no banco de dados
        return (new Database('tbl_paciente'))->update('id_paciente = '.$this->id_paciente,[
            'nome_paciente' => $this->nome_paciente,
            'rua' => $this->rua,
            'numero' => $this->numero,
            'complemento' => $this->complemento,
            'bairro' => $this->bairro,
            'cep' => $this->cep,
            'email' => $this->email,
            'telefone' => $this->telefone
        ]);
    }

    public function excluir(){
        //Deleta Paciente no banco de dados
        return (new Database('tbl_paciente'))->delete('id_paciente = '.$this->id_paciente);
    }

    public static function getPacienteById($id_paciente){
        return self::getPacientes('id_paciente = '.$id_paciente)->fetchObject(self::class);
    }

    //Retornar os pacientes
    public static function getPacientes($where = null, $order = null, $limit = null, $fields = '*'){
        return (new Database('tbl_paciente'))->select($where,$order,$limit,$fields);
    }
}