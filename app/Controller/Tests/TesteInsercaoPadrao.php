<?php

namespace App\Controller\Tests;

use \App\Controller\Padrao;
use \App\Model\Entity\Padrao as EntityPadrao;
use \Exception;

class TestePadrao{

    public function inserirPadrao(){

        $padrao = buildPadrao();
        
        try {
            $padrao->cadastrar();
            return assertTrue();
        } catch (Exception $e) {
            return $e->assertFalse();
        }
    }

    public function buildPadrao(){

        $obPadrao = new EntityPadrao;
        $obPadrao->abertura_clinica = '09:00';
        $obPadrao->fechamento_clinica = '17:00';
        $obPadrao->media_consultas = '30:00';
        $obPadrao->dias_funcionamento = 5;

        return $obPadrao;
    }
}
