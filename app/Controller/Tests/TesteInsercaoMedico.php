<?php

namespace App\Controller\Tests;

use \App\Controller\Medico;
use \App\Model\Entity\Medico as EntityMedico;
use \Exception;

class TesteMedico{

    public function inserirMedico(){

        $medico = buildMedico();
        
        try {
            $medico->cadastrar();
            return assertTrue();
        } catch (Exception $e) {
            return $e->assertFalse();
        }
    }

    public function buildMedico(){

        $obMedico = new EntityMedico;
        $obMedico->nome_medico = 'Rafael';
        $obMedico->rua_medico = 'Rua B';
        $obMedico->numero_medico = 122;
        $obMedico->complemento_medico = '';
        $obMedico->bairro_medico = 'Glória';
        $obMedico->cep_medico = 32350090;
        $obMedico->email_medico = 'teste@teste.com';
        $obMedico->telefone_fixo_medico = 985962356;

        return $obMedico;
    }
}
