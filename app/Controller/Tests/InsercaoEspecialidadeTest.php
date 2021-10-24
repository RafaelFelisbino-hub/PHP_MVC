<?php

namespace App\Controller\Tests;

use PHPUnit\Framework\TestCase;
use \App\Controller\Especialidade;
use \App\Model\Entity\Especialidade as EntityEspecialidade;
use \Exception;

class InsercaoEspecialidadeTest extends TestCase{

    public function testInserirEspecialidade(){

        $obEspecialidade = new EntityEspecialidade;
        $obEspecialidade->nome_especialidade = 'teste';
        
        $esperado = 'teste';

        $this->assertTrue($obEspecialidade->nome_especialidade != null);
        $this->assertTrue(strlen($obEspecialidade->nome_especialidade) > 4);
        $this->assertTrue(!is_numeric($obEspecialidade->nome_especialidade));
        $this->assertTrue(!preg_match('/\W|_/', $obEspecialidade->nome_especialidade));
        $this->assertSame($obEspecialidade->nome_especialidade, $esperado);
    }
}
