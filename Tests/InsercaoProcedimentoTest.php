<?php

namespace App\Controller\Tests;

use PHPUnit\Framework\TestCase;
use \App\Controller\Procedimento;
use \App\Model\Entity\Procedimento as EntityProcedimento;
use \Exception;

class InsercaoProcedimentoTest extends TestCase{

    public function testInserirProcedimento(){

        $obProcedimento = new EntityProcedimento;
        $obProcedimento->codigo = 123;
        $obProcedimento->nome = 'Rafael';
        $obProcedimento->valor = 456;
        $obProcedimento->genero = 'M';
        $obProcedimento->excecao = '';
        $obProcedimento->data_procedimento = '02/05/2022';

        $dataEsperada = '/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/';

        $this->assertTrue(is_numeric($obProcedimento->codigo));
        $this->assertMatchesRegularExpression('/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/', $obProcedimento->nome);
        $this->assertTrue(is_numeric($obProcedimento->valor));
        $this->assertMatchesRegularExpression('/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/', $obProcedimento->genero);
        $this->assertTrue($obProcedimento->excecao === null || isset($obProcedimento->excecao));
        $this->assertMatchesRegularExpression($dataEsperada, $obProcedimento->data_procedimento);

    }
}
