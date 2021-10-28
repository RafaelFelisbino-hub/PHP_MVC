<?php

namespace App\Controller\Tests;

use PHPUnit\Framework\TestCase;
use \App\Controller\Padrao;
use \App\Model\Entity\Padrao as EntityPadrao;
use \Exception;

class InsercaoPadraoTest extends TestCase{

    public function testInserirPadrao(){

        $obPadrao = new EntityPadrao;
        $obPadrao->abertura_clinica = '09:00';
        $obPadrao->fechamento_clinica = '17:00';
        $obPadrao->media_consultas = '30:00';
        $obPadrao->dias_funcionamento = 5;

        $this->assertMatchesRegularExpression('/^[a-zA-Z0-9_\s ]*/',$obPadrao->abertura_clinica);
        $this->assertMatchesRegularExpression('/^[a-zA-Z0-9_\s ]*/',$obPadrao->fechamento_clinica);
        $this->assertMatchesRegularExpression('/^[a-zA-Z0-9_\s ]*/',$obPadrao->media_consultas);
        $this->assertTrue(is_numeric($obPadrao->dias_funcionamento));
    }
}
