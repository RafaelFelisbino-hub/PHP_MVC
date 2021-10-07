<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Medico as EntityMedico;

class Medico extends Page{

    private static function getMedicoItems(){
        $itens = '';

        $results = EntityMedico::getMedicos();

        while($obMedico = $results->fetchObject(EntityMedico::class)){
            $itens .=  View::render('pages/medico/item',[
                'id_medico' => $obMedico->id_medico,
                'nome_medico' => $obMedico->nome_medico,
                'rua_medico' => $obMedico->rua_medico,
                'numero_medico' => $obMedico->numero_medico,
                'complemento_medico' => $obMedico->complemento_medico,
                'bairro_medico' => $obMedico->bairro_medico,
                'cep_medico' => $obMedico->cep_medico,
                'email_medico' => $obMedico->email_medico,
                'telefone_fixo_medico' => $obMedico->telefone_fixo_medico
             ]);
        }

        return $itens;
    }

    public static function getMedico(){
        $obMedico = new EntityMedico;

        $content =  View::render('pages/medico',[
            'itens' => self::getMedicoItems(),
            'title' => 'Cadastrar'
        ]);

        return parent::getPage('Medico - sa_03_crud', $content);
    }

    public static function getEditMedico($request, $id_medico){

        $obMedico = EntityMedico::getMedicoById($id_medico);
    
        $content =  View::render('pages/medico/atualizar',[
            'title' => 'Atualizar',
            'nome_medico' => $obMedico->nome_medico,
            'rua_medico' => $obMedico->rua_medico,
            'numero_medico' => $obMedico->numero_medico,
            'complemento_medico' => $obMedico->complemento_medico,
            'bairro_medico' => $obMedico->bairro_medico,
            'cep_medico' => $obMedico->cep_medico,
            'email_medico' => $obMedico->email_medico,
            'telefone_fixo_medico' => $obMedico->telefone_fixo_medico
        ]);

        return parent::getPage('Médico - sa_03_crud', $content);
    }

    public static function setEditMedico($request, $id_medico){

        $obMedico = EntityMedico::getMedicoById($id_medico);
    
        $postVars = $request->getPostVars();

        $obMedico->nome_medico = $postVars['nome_medico'] ?? $obMedico->nome_medico;
        $obMedico->rua_medico = $postVars['rua_medico'] ?? $obMedico->rua_medico;
        $obMedico->numero_medico = $postVars['numero_medico'] ?? $obMedico->numero_medico;
        $obMedico->complemento_medico = $postVars['complemento_medico'] ?? $obMedico->complemento_medico;
        $obMedico->bairro_medico = $postVars['bairro_medico'] ?? $obMedico->bairro_medico;
        $obMedico->cep_medico = $postVars['cep_medico'] ?? $obMedico->cep_medico;
        $obMedico->email_medico = $postVars['email_medico'] ?? $obMedico->email_medico;
        $obMedico->telefone_fixo_medico = $postVars['telefone_medico'] ?? $obMedico->telefone_fixo_medico;
        $obMedico->atualizar();
        
       header('location: /Senai/PHP_MVC/medico'); 
       exit;
    }

    public static function getDeleteMedico($request, $id_medico){

        $obMedico = EntityMedico::getMedicoById($id_medico);
    
        $content =  View::render('pages/medico/deletar',[
            'nome_medico' => $obMedico->nome_medico,
            'rua_medico' => $obMedico->rua_medico,
            'numero_medico' => $obMedico->numero_medico,
            'complemento_medico' => $obMedico->complemento_medico,
            'bairro_medico' => $obMedico->bairro_medico,
            'cep_medico' => $obMedico->cep_medico,
            'email_medico' => $obMedico->email_medico,
            'telefone_fixo_medico' => $obMedico->telefone_fixo_medico
        ]);

        return parent::getPage('Médico - sa_03_crud', $content);
    }

    public static function setDeleteMedico($request, $id_medico){

        $obMedico = EntityMedico::getMedicoById($id_medico);
    
        $obMedico->excluir();
        
       header('location: /Senai/PHP_MVC/medico'); 
       exit;
    }

    public static function insertMedico($request){
        $postVars = $request->getPostVars();

        $obMedico = new EntityMedico;
        $obMedico->nome_medico = $postVars['nome_medico'];
        $obMedico->rua_medico = $postVars['rua_medico'];
        $obMedico->numero_medico = $postVars['numero_medico'];
        $obMedico->complemento_medico = $postVars['complemento_medico'];
        $obMedico->bairro_medico = $postVars['bairro_medico'];
        $obMedico->cep_medico = $postVars['cep_medico'];
        $obMedico->email_medico = $postVars['email_medico'];
        $obMedico->telefone_fixo_medico = $postVars['telefone_fixo_medico'];
        $obMedico->cadastrar();
        
        return self::getMedico();
    }
}