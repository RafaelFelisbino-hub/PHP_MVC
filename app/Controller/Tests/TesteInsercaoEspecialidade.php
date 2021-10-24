<?php

namespace App\Controller\Tests;

use \App\Controller\Especialidade;
use \App\Model\Entity\Especialidade as EntityEspecialidade;
use \Exception;

class TesteEspecialidade{

    public function inserirEspecialidade(){

        $especialidade = buildEspecialidade();
        
        try {
            $especialidade->cadastrar();
            return assertTrue();
        } catch (Exception $e) {
            return $e->assertFalse();
        }
    }

    public function buildEspecialidade(){

        $obEspecialidade = new EntityEspecialidade;
        $obEspecialidade->nome_especialidade = 'Remoção de espinha';

        return $obEspecialidade;
    }
}
