<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Paciente as EntityPaciente;

class Home extends Page{

    //Obter a renderização dos itens de paciente (select no banco)
    private static function getPacienteItems(){
        $itens = '';

        $results = EntityPaciente::getPacientes();

        //Renderizar o item
        while($obPaciente = $results->fetchObject(EntityPaciente::class)){
            $itens .=  View::render('pages/home/item',[
                'id_paciente' => $obPaciente->id_paciente,
                'nome_paciente' => $obPaciente->nome_paciente,
                'rua' => $obPaciente->rua,
                'numero' => $obPaciente->numero,
                'complemento' => $obPaciente->complemento,
                'bairro' => $obPaciente->bairro,
                'cep' => $obPaciente->cep,
                'email' => $obPaciente->email,
                'telefone' => $obPaciente->telefone
             ]);
        }

        return $itens;
    }

    public static function getPaciente(){
        $obPaciente = new EntityPaciente;

        $content =  View::render('pages/home',[
           'itens' => self::getPacienteItems(),
           'title' => 'Cadastrar'
        ]);

        return parent::getPage('Pacientes - sa_03_crud', $content);
    }

    //Update - mostrar dados nos campos de input
    public static function getEditPaciente($request, $id_paciente){

        $obPaciente = EntityPaciente::getPacienteById($id_paciente);
    
        $content =  View::render('pages/home/atualizar',[
            'title' => 'Atualizar',
            'nome_paciente' => $obPaciente->nome_paciente,
            'rua' => $obPaciente->rua,
            'numero' => $obPaciente->numero,
            'complemento' => $obPaciente->complemento,
            'bairro' => $obPaciente->bairro,
            'cep' => $obPaciente->cep,
            'email' => $obPaciente->email,
            'telefone' => $obPaciente->telefone
        ]);

        return parent::getPage('Pacientes - sa_03_crud', $content);
    }

    //Update no banco
    public static function setEditPaciente($request, $id_paciente){

        $obPaciente = EntityPaciente::getPacienteById($id_paciente);
    
        $postVars = $request->getPostVars();

        $obPaciente->nome_paciente = $postVars['nome_paciente'] ?? $obPaciente->nome_paciente;
        $obPaciente->rua = $postVars['rua'] ?? $obPaciente->rua;
        $obPaciente->numero = $postVars['numero'] ?? $obPaciente->numero;
        $obPaciente->complemento = $postVars['complemento'] ?? $obPaciente->complemento;
        $obPaciente->bairro = $postVars['bairro'] ?? $obPaciente->bairro;
        $obPaciente->cep = $postVars['cep'] ?? $obPaciente->cep;
        $obPaciente->email = $postVars['email'] ?? $obPaciente->email;
        $obPaciente->telefone = $postVars['telefone'] ?? $obPaciente->telefone;
        $obPaciente->atualizar();
        
       header('location: /Senai/PHP_MVC/'); 
       exit;
    }

    //Delete
    public static function getDeletePaciente($request, $id_paciente){

        $obPaciente = EntityPaciente::getPacienteById($id_paciente);
    
        $content =  View::render('pages/home/deletar',[
            'nome_paciente' => $obPaciente->nome_paciente,
            'rua' => $obPaciente->rua,
            'numero' => $obPaciente->numero,
            'complemento' => $obPaciente->complemento,
            'bairro' => $obPaciente->bairro,
            'cep' => $obPaciente->cep,
            'email' => $obPaciente->email,
            'telefone' => $obPaciente->telefone
        ]);

        return parent::getPage('Pacientes - sa_03_crud', $content);
    }

    public static function setDeletePaciente($request, $id_paciente){

        $obPaciente = EntityPaciente::getPacienteById($id_paciente);
    
        $obPaciente->excluir();
        
       header('location: /Senai/PHP_MVC/'); 
       exit;
    }


    public static function insertPaciente($request){
        //Dados do post
        $postVars = $request->getPostVars();

        //Instância de paciente
        $obPaciente = new EntityPaciente;
        $obPaciente->nome_paciente = $postVars['nome_paciente'];
        $obPaciente->rua = $postVars['rua'];
        $obPaciente->numero = $postVars['numero'];
        $obPaciente->complemento = $postVars['complemento'];
        $obPaciente->bairro = $postVars['bairro'];
        $obPaciente->cep = $postVars['cep'];
        $obPaciente->email = $postVars['email'];
        $obPaciente->telefone = $postVars['telefone'];
        $obPaciente->cadastrar();
        
        return self::getPaciente();
    }
}