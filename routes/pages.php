<?php

use \App\Http\Response;
use \App\Controller\Pages;

//Pacientes
$obRouter->get('/',[
    function(){
        return new Response(200,Pages\Home::getPaciente());
    }
]);

//Cadastrar paciente
$obRouter->post('/',[
    function($request){
        return new Response(200,Pages\Home::insertPaciente($request));
    }
]);

//Update paciente
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

//delete paciente
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

//Cadastrar médico
$obRouter->post('/medico',[
    function($request){
        return new Response(200,Pages\Medico::insertMedico($request));
    }
]);

//Update médico
$obRouter->get('/medico/{id_medico}/atualizar',[
    function($request, $id_medico){
        return new Response(200,Pages\Medico::getEditMedico($request, $id_medico));
    }
]);

$obRouter->post('/medico/{id_medico}/atualizar',[
    function($request, $id_medico){
        return new Response(200,Pages\Medico::setEditMedico($request, $id_medico));
    }
]);

//Delete médico
$obRouter->get('/medico/{id_medico}/deletar',[
    function($request, $id_medico){
        return new Response(200,Pages\Medico::getDeleteMedico($request, $id_medico));
    }
]);

$obRouter->post('/medico/{id_medico}/deletar',[
    function($request, $id_medico){
        return new Response(200,Pages\Medico::setDeleteMedico($request, $id_medico));
    }
]);

//Rota dinâmica
$obRouter->get('/pagina/{idPagina}/{acao}',[
    function($idPagina,$acao){
        return new Response(200,'Pagina '.$idPagina. ' - '.$acao);
    }
]);

