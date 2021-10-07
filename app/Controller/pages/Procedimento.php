<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Procedimento as EntityProcedimento;

class Procedimento extends Page{

    private static function getProcedimentoItems(){
        $itens = '';

        $results = EntityProcedimento::getProcedimentos();

        //Renderizar o item
        while($obProcedimento = $results->fetchObject(EntityProcedimento::class)){
            $itens .=  View::render('pages/procedimento/item',[
                'id_consulta' => $obProcedimento->id_consulta,
                'codigo' => $obProcedimento->codigo,
                'nome' => $obProcedimento->nome,
                'valor' => $obProcedimento->valor,
                'genero' => $obProcedimento->genero,
                'excecao' => $obProcedimento->excecao,
                'data_procedimento' => $obProcedimento->data_procedimento
             ]);
        }

        return $itens;
    }

    public static function getProcedimento(){
        $obProcedimento = new EntityProcedimento;

        $content =  View::render('pages/procedimento',[
            'itens' => self::getProcedimentoItems(),
            'title' => 'Cadastrar'
        ]);

        return parent::getPage('Procedimento - sa_03_crud', $content);
    }

    public static function getEditProcedimento($request, $id_consulta){

        $obProcedimento = EntityProcedimento::getProcedimentoById($id_consulta);
    
        $content =  View::render('pages/procedimento/atualizar',[
            'codigo' => $obProcedimento->codigo,
            'nome' => $obProcedimento->nome,
            'valor' => $obProcedimento->valor,
            'genero' => $obProcedimento->genero,
            'excecao' => $obProcedimento->excecao,
            'data_procedimento' => $obProcedimento->data_procedimento
        ]);

        return parent::getPage('Procedimento - sa_03_crud', $content);
    }

    public static function setEditProcedimento($request, $id_consulta){

        $obProcedimento = EntityProcedimento::getProcedimentoById($id_consulta);
    
        $postVars = $request->getPostVars();

        $obProcedimento->codigo = $postVars['codigo'] ?? $obProcedimento->codigo;
        $obProcedimento->nome = $postVars['nome'] ?? $obProcedimento->nome;
        $obProcedimento->valor = $postVars['valor'] ?? $obProcedimento->valor;
        $obProcedimento->genero = $postVars['genero'] ?? $obProcedimento->genero;
        $obProcedimento->excecao = $postVars['excecao'] ?? $obProcedimento->excecao;
        $obProcedimento->data_procedimento = $postVars['data_procedimento'] ?? $obProcedimento->data_procedimento;
        $obProcedimento->atualizar();
        
       header('location: /Senai/PHP_MVC/procedimento'); 
       exit;
    }

    public static function getDeleteProcedimento($request, $id_consulta){

        $obProcedimento = EntityProcedimento::getProcedimentoById($id_consulta);
    
        $content =  View::render('pages/procedimento/deletar',[
            'codigo' => $obProcedimento->codigo,
            'nome' => $obProcedimento->nome,
            'valor' => $obProcedimento->valor,
            'genero' => $obProcedimento->genero,
            'excecao' => $obProcedimento->excecao,
            'data_procedimento' => $obProcedimento->data_procedimento
        ]);

        return parent::getPage('Procedimento - sa_03_crud', $content);
    }

    public static function setDeleteProcedimento($request, $id_consulta){

        $obProcedimento = EntityProcedimento::getProcedimentoById($id_consulta);
    
        $obProcedimento->excluir();
        
       header('location: /Senai/PHP_MVC/procedimento'); 
       exit;
    }

    public static function insertProcedimento($request){
        $postVars = $request->getPostVars();

        $obProcedimento = new EntityProcedimento;
        $obProcedimento->codigo = $postVars['codigo'];
        $obProcedimento->nome = $postVars['nome'];
        $obProcedimento->valor = $postVars['valor'];
        $obProcedimento->genero = $postVars['genero'];
        $obProcedimento->excecao = $postVars['excecao'];
        $obProcedimento->data_procedimento = $postVars['data_procedimento'];
        $obProcedimento->cadastrar();
        
        return self::getProcedimento();
    }
}