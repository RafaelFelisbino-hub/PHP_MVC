<?php

namespace App\Controller\Tests;

use \App\Controller\Procedimento;
use \App\Model\Entity\Procedimento as EntityProcedimento;
use \Exception;

class TesteProcedimento{

    public function inserirProcedimento(){

        $procedimento = buildProcedimento();
        
        try {
            $procedimento->cadastrar();
            return assertTrue();
        } catch (Exception $e) {
            return $e->assertFalse();
        }
    }

    public function buildProcedimento(){

        $obProcedimento = new Procedimento;
        $obProcedimento->codigo = 123;
        $obProcedimento->nome = 'Rafael';
        $obProcedimento->valor = 456;
        $obProcedimento->genero = 'M';
        $obProcedimento->excecao = '';
        $obProcedimento->data_procedimento = '1998/12/05';

        return $obProcedimento;
    }
}
