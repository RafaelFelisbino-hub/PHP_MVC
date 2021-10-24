<?php

namespace App\Controller\Tests;

use \App\Controller\Convenio;
use \App\Model\Entity\Convenio as EntityConvenio;
use \Exception;

class TesteConvenio{

    public function inserirConvenio(){

        $convenio = buildConvenio();
        
        try {
            $convenio->cadastrar();
            return assertTrue();
        } catch (Exception $e) {
            return $e->assertFalse();
        }
    }

    public function buildConvenio(){

        $obConvenio = new EntityConvenio;
        $obConvenio->nome_fantasia = 'Lápis azul';
        $obConvenio->nome_empresa = 'Lápis LTDA';
        $obConvenio->cnpj = 06842320000175;
        $obConvenio->email = 'teste@teste.com';
        $obConvenio->nome_cont = 'Rafael';
        $obConvenio->telefone = 985472514;
        $obConvenio->endereco = 'Rua C';
        $obConvenio->numero = 585;
        $obConvenio->cidade = 'Belo Horizonte';
        $obConvenio->estado = 'MG';
        $obConvenio->cep = 32340210;

        return $obConvenio;
    }
}
