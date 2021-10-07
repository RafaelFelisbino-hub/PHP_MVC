<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Especialidade as EntityEspecialidade;

class Especialidade extends Page{

    private static function getEspecialidadeItems(){
        $itens = '';

        $results = EntityEspecialidade::getEspecialidades();

        //Renderizar o item
        while($obEspecialidade = $results->fetchObject(EntityEspecialidade::class)){
            $itens .=  View::render('pages/especialidade/item',[
                'id_cadastro' => $obEspecialidade->id_cadastro,
                'nome_especialidade' => $obEspecialidade->nome_especialidade
             ]);
        }

        return $itens;
    }

    public static function getEspecialidade(){
        $obEspecialidade = new EntityEspecialidade;

        $content =  View::render('pages/especialidade',[
            'itens' => self::getEspecialidadeItems(),
            'title' => 'Cadastrar'
        ]);

        return parent::getPage('Especialidade - sa_03_crud', $content);
    }

    public static function getEditEspecialidade($request, $id_cadastro){

        $obEspecialidade = EntityEspecialidade::getEspecialidadeById($id_cadastro);
    
        $content =  View::render('pages/especialidade/atualizar',[
            'nome_especialidade' => $obEspecialidade->nome_especialidade
        ]);

        return parent::getPage('Especialidade - sa_03_crud', $content);
    }

    public static function setEditEspecialidade($request, $id_cadastro){

        $obEspecialidade = EntityEspecialidade::getEspecialidadeById($id_cadastro);
    
        $postVars = $request->getPostVars();

        $obEspecialidade->nome_especialidade = $postVars['nome_especialidade'] ?? $obEspecialidade->nome_especialidade;
        $obEspecialidade->atualizar();
        
       header('location: /Senai/PHP_MVC/especialidade'); 
       exit;
    }

    public static function getDeleteEspecialidade($request, $id_cadastro){

        $obEspecialidade = EntityEspecialidade::getEspecialidadeById($id_cadastro);
    
        $content =  View::render('pages/especialidade/deletar',[
            'nome_especialidade' => $obEspecialidade->nome_especialidade
        ]);

        return parent::getPage('Especialidade - sa_03_crud', $content);
    }

    public static function setDeleteEspecialidade($request, $id_cadastro){

        $obEspecialidade = EntityEspecialidade::getEspecialidadeById($id_cadastro);
    
        $obEspecialidade->excluir();
        
       header('location: /Senai/PHP_MVC/especialidade'); 
       exit;
    }

    public static function insertEspecialidade($request){
        $postVars = $request->getPostVars();

        $obEspecialidade = new EntityEspecialidade;
        $obEspecialidade->nome_especialidade = $postVars['nome_especialidade'];
        $obEspecialidade->cadastrar();
        
        return self::getEspecialidade();
    }
}