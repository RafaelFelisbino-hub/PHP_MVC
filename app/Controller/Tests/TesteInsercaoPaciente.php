<?php

namespace App\Controller\Tests;

use \App\Controller\Home;
use \App\Model\Entity\Paciente;
use \Exception;

class TestePaciente{

    public function inserirPaciente(){

        $paciente = buildPaciente();
        
        try {
            $paciente->cadastrar();
            return assertTrue();
        } catch (Exception $e) {
            return $e->assertFalse();
        }
    }

    public function buildPaciente(){

        $obPaciente = new Paciente;
        $obPaciente->nome_paciente = 'Rafael';
        $obPaciente->rua = 'Rua A';
        $obPaciente->numero = 222;
        $obPaciente->complemento = '';
        $obPaciente->bairro = 'Júlia';
        $obPaciente->cep = 32340090;
        $obPaciente->email = 'teste@teste.com';
        $obPaciente->telefone = 985459687;

        return $obPaciente;
    }
}
