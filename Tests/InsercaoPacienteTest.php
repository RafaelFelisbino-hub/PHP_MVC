<?php

namespace App\Controller\Tests;

use PHPUnit\Framework\TestCase;
use \App\Controller\Home;
use \App\Model\Entity\Paciente;
use \Exception;

class InsercaoPacienteTest extends TestCase{

    public function testInserirPaciente(){

        $obPaciente = new Paciente;
        $obPaciente->nome_paciente = 'Rafael';
        $obPaciente->rua = 'Rua A';
        $obPaciente->numero = 222;
        $obPaciente->complemento = '';
        $obPaciente->bairro = 'Júlia';
        $obPaciente->cep = 32340090;
        $obPaciente->email = 'teste@teste.com';
        $obPaciente->telefone = 985459687;

        $this->assertMatchesRegularExpression('/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/', $obPaciente->nome_paciente);
        $this->assertMatchesRegularExpression('/^[a-zA-Z0-9_ ]*$/', $obPaciente->rua);
        $this->assertTrue(is_numeric($obPaciente->numero));
        $this->assertTrue(is_numeric($obPaciente->complemento) || empty($obPaciente->complemento));
        $this->assertMatchesRegularExpression('/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/', $obPaciente->bairro);
        $this->assertTrue(is_numeric($obPaciente->cep));
        $this->assertMatchesRegularExpression('/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/', $obPaciente->email);
        $this->assertTrue(is_numeric($obPaciente->telefone));
    }
}
