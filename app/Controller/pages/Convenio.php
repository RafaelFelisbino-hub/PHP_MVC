<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Convenio as EntityConvenio;

class Convenio extends Page{

    private static function getConvenioItems(){
        $itens = '';

        $results = EntityConvenio::getConvenios();

        //Renderizar o item
        while($obConvenio = $results->fetchObject(EntityConvenio::class)){
            $itens .=  View::render('pages/convenio/item',[
                'id_convenio' => $obConvenio->id_convenio,
                'nome_fantasia' => $obConvenio->nome_fantasia,
                'nome_empresa' => $obConvenio->nome_empresa,
                'cnpj' => $obConvenio->cnpj,
                'email' => $obConvenio->email,
                'nome_cont' => $obConvenio->nome_cont,
                'telefone' => $obConvenio->telefone,
                'endereco' => $obConvenio->endereco,
                'numero' => $obConvenio->numero,
                'cidade' => $obConvenio->cidade,
                'estado' => $obConvenio->estado,
                'cep' => $obConvenio->cep
             ]);
        }

        return $itens;
    }

    public static function getConvenio(){
        $obConvenio = new EntityConvenio;

        $content =  View::render('pages/convenio',[
            'itens' => self::getConvenioItems(),
            'title' => 'Cadastrar'
        ]);

        return parent::getPage('Convênio - sa_03_crud', $content);
    }

    public static function getEditConvenio($request, $id_convenio){

        $obConvenio = EntityConvenio::getConvenioById($id_convenio);
    
        $content =  View::render('pages/convenio/atualizar',[
            'nome_fantasia' => $obConvenio->nome_fantasia,
            'nome_empresa' => $obConvenio->nome_empresa,
            'cnpj' => $obConvenio->cnpj,
            'email' => $obConvenio->email,
            'nome_cont' => $obConvenio->nome_cont,
            'telefone' => $obConvenio->telefone,
            'endereco' => $obConvenio->endereco,
            'numero' => $obConvenio->numero,
            'cidade' => $obConvenio->cidade,
            'estado' => $obConvenio->estado,
            'cep' => $obConvenio->cep
        ]);

        return parent::getPage('Convênio - sa_03_crud', $content);
    }

    public static function setEditConvenio($request, $id_convenio){

        $obConvenio = EntityConvenio::getConvenioById($id_convenio);
    
        $postVars = $request->getPostVars();

        $obConvenio->nome_fantasia = $postVars['nome_fantasia'] ?? $obConvenio->nome_fantasia;
        $obConvenio->nome_empresa = $postVars['nome_empresa'] ?? $obConvenio->nome_empresa;
        $obConvenio->cnpj = $postVars['cnpj'] ?? $obConvenio->cnpj;
        $obConvenio->email = $postVars['email'] ?? $obConvenio->email;
        $obConvenio->nome_cont = $postVars['nome_cont'] ?? $obConvenio->nome_cont;
        $obConvenio->telefone = $postVars['telefone'] ?? $obConvenio->telefone;
        $obConvenio->endereco = $postVars['endereco'] ?? $obConvenio->endereco;
        $obConvenio->numero = $postVars['numero'] ?? $obConvenio->numero;
        $obConvenio->cidade = $postVars['cidade'] ?? $obConvenio->cidade;
        $obConvenio->estado = $postVars['estado'] ?? $obConvenio->estado;
        $obConvenio->cep = $postVars['cep'] ?? $obConvenio->cep;
        $obConvenio->atualizar();
        
       header('location: /Senai/PHP_MVC/convenio'); 
       exit;
    }

    public static function getDeleteConvenio($request, $id_convenio){

        $obConvenio = EntityConvenio::getConvenioById($id_convenio);
    
        $content =  View::render('pages/convenio/deletar',[
            'nome_fantasia' => $obConvenio->nome_fantasia,
            'nome_empresa' => $obConvenio->nome_empresa,
            'cnpj' => $obConvenio->cnpj,
            'email' => $obConvenio->email,
            'nome_cont' => $obConvenio->nome_cont,
            'telefone' => $obConvenio->telefone,
            'endereco' => $obConvenio->endereco,
            'numero' => $obConvenio->numero,
            'cidade' => $obConvenio->cidade,
            'estado' => $obConvenio->estado,
            'cep' => $obConvenio->cep
        ]);

        return parent::getPage('Convênio - sa_03_crud', $content);
    }

    public static function setDeleteConvenio($request, $id_convenio){

        $obConvenio = EntityConvenio::getConvenioById($id_convenio);
    
        $obConvenio->excluir();
        
       header('location: /Senai/PHP_MVC/convenio'); 
       exit;
    }

    public static function insertConvenio($request){
        //Dados do post
        $postVars = $request->getPostVars();

        //Instância de paciente
        $obConvenio = new EntityConvenio;
        $obConvenio->nome_fantasia = $postVars['nome_fantasia'];
        $obConvenio->nome_empresa = $postVars['nome_empresa'];
        $obConvenio->cnpj = $postVars['cnpj'];
        $obConvenio->email = $postVars['email'];
        $obConvenio->nome_cont = $postVars['nome_cont'];
        $obConvenio->telefone = $postVars['telefone'];
        $obConvenio->endereco = $postVars['endereco'];
        $obConvenio->numero = $postVars['numero'];
        $obConvenio->cidade = $postVars['cidade'];
        $obConvenio->estado = $postVars['estado'];
        $obConvenio->cep = $postVars['cep'];
        $obConvenio->cadastrar();
        
        return self::getConvenio();
    }
}