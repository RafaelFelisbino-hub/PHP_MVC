<?php

namespace App\Controller\Tests;

use PHPUnit\Framework\TestCase;
use \App\Controller\Convenio;
use \App\Model\Entity\Convenio as EntityConvenio;
use \Exception;

class InsercaoConvenioTest extends TestCase{

    public function testeInserirConvenio(){

        $obConvenio = new EntityConvenio;
        $obConvenio->nome_fantasia = 'Lápis azul5';
        $obConvenio->nome_empresa = 'Lápis';
        $obConvenio->cnpj = 89364391000137;
        $obConvenio->email = 'teste@teste.com';
        $obConvenio->nome_cont = 'Rafael';
        $obConvenio->telefone = 958457852;
        $obConvenio->endereco = 'Rua A';
        $obConvenio->numero = 123;
        $obConvenio->cidade = 'Contagem';
        $obConvenio->estado = 'MG';
        $obConvenio->cep = 32350040;

        $nomeFantasiaEsperado = '/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/';
        $nomeEmpresaEsperado = '/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/';
        $cnpjEsperado = is_numeric($obConvenio->cnpj);
        $emailEsperado = '/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/';
        $nomeContEsperado = '/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/';
        $telefoneEsperado = is_numeric($obConvenio->telefone);
        $enderecoEsperado = '/^[a-zA-Z0-9_ ]*$/';
        $numeroEsperado = is_numeric($obConvenio->numero);
        $cidadeEsperado = '/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/';
        $estadoEsperado = '/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/';
        $cepEsperado = is_numeric($obConvenio->cep);

        $this->assertMatchesRegularExpression($nomeFantasiaEsperado, $obConvenio->nome_fantasia);
        $this->assertMatchesRegularExpression($nomeEmpresaEsperado, $obConvenio->nome_empresa);
        $this->assertTrue($obConvenio->cnpj == $cnpjEsperado);
        $this->assertMatchesRegularExpression($emailEsperado, $obConvenio->email);
        $this->assertMatchesRegularExpression($nomeContEsperado, $obConvenio->nome_cont);
        $this->assertTrue($obConvenio->telefone == $telefoneEsperado);
        $this->assertMatchesRegularExpression($enderecoEsperado, $obConvenio->endereco);
        $this->assertTrue($obConvenio->numero == $numeroEsperado);
        $this->assertMatchesRegularExpression($cidadeEsperado, $obConvenio->cidade);
        $this->assertMatchesRegularExpression($estadoEsperado, $obConvenio->estado);
        $this->assertTrue($obConvenio->cep == $cepEsperado);
    }
}
