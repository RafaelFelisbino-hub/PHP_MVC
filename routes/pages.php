<?php

use \App\Http\Response;
use \App\Controller\Pages;

//Pacientes
$obRouter->get('/',[
    function(){
        return new Response(200,Pages\Home::getPaciente());
    }
]);

//Cadastrar
$obRouter->post('/',[
    function($request){
        return new Response(200,Pages\Home::insertPaciente($request));
    }
]);

//Update
$obRouter->get('/home/{id_paciente}/atualizar',[
    function($request, $id_paciente){
        return new Response(200,Pages\Home::getEditPaciente($request, $id_paciente));
    }
]);

$obRouter->post('/home/{id_paciente}/atualizar',[
    function($request, $id_paciente){
        return new Response(200,Pages\Home::setEditPaciente($request, $id_paciente));
    }
]);

//delete
$obRouter->get('/home/{id_paciente}/deletar',[
    function($request, $id_paciente){
        return new Response(200,Pages\Home::getDeletePaciente($request, $id_paciente));
    }
]);

$obRouter->post('/home/{id_paciente}/deletar',[
    function($request, $id_paciente){
        return new Response(200,Pages\Home::setDeletePaciente($request, $id_paciente));
    }
]);

//Médico
$obRouter->get('/medico',[
    function(){
        return new Response(200,Pages\Medico::getMedico());
    }
]);

//Rota dinâmica
$obRouter->get('/pagina/{idPagina}/{acao}',[
    function($idPagina,$acao){
        return new Response(200,'Pagina '.$idPagina. ' - '.$acao);
    }
]);

