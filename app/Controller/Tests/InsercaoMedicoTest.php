<?php

namespace App\Controller\Tests;

use PHPUnit\Framework\TestCase;
use \App\Controller\Medico;
use \App\Model\Entity\Medico as EntityMedico;
use \Exception;

class InsercaoMedicoTest extends TestCase{

    public function testInserirMedico(){

        $obMedico = new EntityMedico;
        $obMedico->nome_medico = 'Rafael';
        $obMedico->rua_medico = 'Rua B';
        $obMedico->numero_medico = 122;
        $obMedico->complemento_medico = '';
        $obMedico->bairro_medico = 'Glória';
        $obMedico->cep_medico = 32350090;
        $obMedico->email_medico = 'teste@teste.com';
        $obMedico->telefone_fixo_medico = 985962356;

        $this->assertMatchesRegularExpression('/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/', $obMedico->nome_medico);
        $this->assertMatchesRegularExpression('/^[a-zA-Z0-9_ ]*$/', $obMedico->rua_medico);
        $this->assertTrue(is_numeric($obMedico->numero_medico));
        $this->assertTrue(is_numeric($obMedico->complemento_medico) || empty($obMedico->complemento_medico));
        $this->assertMatchesRegularExpression('/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/', $obMedico->bairro_medico);
        $this->assertTrue(is_numeric($obMedico->cep_medico));
        $this->assertMatchesRegularExpression('/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/', $obMedico->email_medico);
        $this->assertTrue(is_numeric($obMedico->telefone_fixo_medico));
    }
}
