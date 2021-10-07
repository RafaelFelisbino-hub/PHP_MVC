<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Padrao as EntityPadrao;

class Padrao extends Page{

    private static function getPadraoItems(){
        $itens = '';

        $results = EntityPadrao::getPadroes();

        while($obPadrao = $results->fetchObject(EntityPadrao::class)){
            $itens .=  View::render('pages/padroes/item',[
                'id_funcionamento' => $obPadrao->id_funcionamento,
                'abertura_clinica' => $obPadrao->abertura_clinica,
                'fechamento_clinica' => $obPadrao->fechamento_clinica,
                'media_consultas' => $obPadrao->media_consultas,
                'dias_funcionamento' => $obPadrao->dias_funcionamento
             ]);
        }

        return $itens;
    }

    public static function getPadrao(){
        $obPadrao = new EntityPadrao;

        $content =  View::render('pages/padroes',[
            'itens' => self::getPadraoItems(),
            'title' => 'Cadastrar'
        ]);

        return parent::getPage('Padrões - sa_03_crud', $content);
    }

    public static function getEditPadrao($request, $id_funcionamento){

        $obPadrao = EntityPadrao::getPadraoById($id_funcionamento);
    
        $content =  View::render('pages/padroes/atualizar',[
            'title' => 'Atualizar',
            'abertura_clinica' => $obPadrao->abertura_clinica,
            'fechamento_clinica' => $obPadrao->fechamento_clinica,
            'media_consultas' => $obPadrao->media_consultas,
            'dias_funcionamento' => $obPadrao->dias_funcionamento
        ]);

        return parent::getPage('Médico - sa_03_crud', $content);
    }

    public static function setEditPadrao($request, $id_funcionamento){

        $obPadrao = EntityPadrao::getPadraoById($id_funcionamento);
    
        $postVars = $request->getPostVars();

        $obPadrao->abertura_clinica = $postVars['abertura_clinica'] ?? $obPadrao->abertura_clinica;
        $obPadrao->fechamento_clinica = $postVars['fechamento_clinica'] ?? $obPadrao->fechamento_clinica;
        $obPadrao->media_consultas = $postVars['media_consultas'] ?? $obPadrao->media_consultas;
        $obPadrao->dias_funcionamento = $postVars['dias_funcionamento'] ?? $obPadrao->dias_funcionamento;
        $obPadrao->atualizar();
        
       header('location: /Senai/PHP_MVC/padroes'); 
       exit;
    }

    public static function getDeletePadrao($request, $id_funcionamento){

        $obPadrao = EntityPadrao::getPadraoById($id_funcionamento);
    
        $content =  View::render('pages/padroes/deletar',[
            'abertura_clinica' => $obPadrao->abertura_clinica,
            'fechamento_clinica' => $obPadrao->fechamento_clinica,
            'media_consultas' => $obPadrao->media_consultas,
            'dias_funcionamento' => $obPadrao->dias_funcionamento
        ]);

        return parent::getPage('Padrões - sa_03_crud', $content);
    }

    public static function setDeletePadrao($request, $id_funcionamento){

        $obPadrao = EntityPadrao::getPadraoById($id_funcionamento);
    
        $obPadrao->excluir();
        
       header('location: /Senai/PHP_MVC/padroes'); 
       exit;
    }

    public static function insertPadrao($request){
        $postVars = $request->getPostVars();

        $obPadrao = new EntityPadrao;
        $obPadrao->abertura_clinica = $postVars['abertura_clinica'];
        $obPadrao->fechamento_clinica = $postVars['fechamento_clinica'];
        $obPadrao->media_consultas = $postVars['media_consultas'];
        $obPadrao->dias_funcionamento = $postVars['dias_funcionamento'];
        $obPadrao->cadastrar();
        
        return self::getPadrao();
    }
}