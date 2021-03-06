<?php

use \App\Http\Response;
use \App\Controller\Pages;

//PACIENTES
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

//MÉDICOS
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

//CONVÊNIOS
$obRouter->get('/convenio',[
    function(){
        return new Response(200,Pages\Convenio::getConvenio());
    }
]);

//Cadastrar convênio
$obRouter->post('/convenio',[
    function($request){
        return new Response(200,Pages\Convenio::insertConvenio($request));
    }
]);

//Update convênio
$obRouter->get('/convenio/{id_convenio}/atualizar',[
    function($request, $id_convenio){
        return new Response(200,Pages\Convenio::getEditConvenio($request, $id_convenio));
    }
]);

$obRouter->post('/convenio/{id_convenio}/atualizar',[
    function($request, $id_convenio){
        return new Response(200,Pages\Convenio::setEditConvenio($request, $id_convenio));
    }
]);

//Delete convênio
$obRouter->get('/convenio/{id_convenio}/deletar',[
    function($request, $id_convenio){
        return new Response(200,Pages\Convenio::getDeleteConvenio($request, $id_convenio));
    }
]);

$obRouter->post('/convenio/{id_convenio}/deletar',[
    function($request, $id_convenio){
        return new Response(200,Pages\Convenio::setDeleteConvenio($request, $id_convenio));
    }
]);

//ESPECIALIDADES
$obRouter->get('/especialidade',[
    function(){
        return new Response(200,Pages\Especialidade::getEspecialidade());
    }
]);

//Cadastrar especialidade
$obRouter->post('/especialidade',[
    function($request){
        return new Response(200,Pages\Especialidade::insertEspecialidade($request));
    }
]);

//Update especialidade
$obRouter->get('/especialidade/{id_cadastro}/atualizar',[
    function($request, $id_cadastro){
        return new Response(200,Pages\Especialidade::getEditEspecialidade($request, $id_cadastro));
    }
]);

$obRouter->post('/especialidade/{id_cadastro}/atualizar',[
    function($request, $id_cadastro){
        return new Response(200,Pages\Especialidade::setEditEspecialidade($request, $id_cadastro));
    }
]);

//Delete especialidade
$obRouter->get('/especialidade/{id_cadastro}/deletar',[
    function($request, $id_cadastro){
        return new Response(200,Pages\Especialidade::getDeleteEspecialidade($request, $id_cadastro));
    }
]);

$obRouter->post('/especialidade/{id_cadastro}/deletar',[
    function($request, $id_cadastro){
        return new Response(200,Pages\Especialidade::setDeleteEspecialidade($request, $id_cadastro));
    }
]);

//PROCEDIMENTOS

$obRouter->get('/procedimento',[
    function(){
        return new Response(200,Pages\Procedimento::getProcedimento());
    }
]);

//Cadastrar especialidade
$obRouter->post('/procedimento',[
    function($request){
        return new Response(200,Pages\Procedimento::insertProcedimento($request));
    }
]);

//Update especialidade
$obRouter->get('/procedimento/{id_consulta}/atualizar',[
    function($request, $id_consulta){
        return new Response(200,Pages\Procedimento::getEditProcedimento($request, $id_consulta));
    }
]);

$obRouter->post('/procedimento/{id_consulta}/atualizar',[
    function($request, $id_consulta){
        return new Response(200,Pages\Procedimento::setEditProcedimento($request, $id_consulta));
    }
]);

//Delete especialidade
$obRouter->get('/procedimento/{id_consulta}/deletar',[
    function($request, $id_consulta){
        return new Response(200,Pages\Procedimento::getDeleteProcedimento($request, $id_consulta));
    }
]);

$obRouter->post('/procedimento/{id_consulta}/deletar',[
    function($request, $id_consulta){
        return new Response(200,Pages\Procedimento::setDeleteProcedimento($request, $id_consulta));
    }
]);

//PADRÕES
$obRouter->get('/padroes',[
    function(){
        return new Response(200,Pages\Padrao::getPadrao());
    }
]);

//Cadastrar especialidade
$obRouter->post('/padroes',[
    function($request){
        return new Response(200,Pages\Padrao::insertPadrao($request));
    }
]);

//Update especialidade
$obRouter->get('/padroes/{id_funcionamento}/atualizar',[
    function($request, $id_funcionamento){
        return new Response(200,Pages\Padrao::getEditPadrao($request, $id_funcionamento));
    }
]);

$obRouter->post('/padroes/{id_funcionamento}/atualizar',[
    function($request, $id_funcionamento){
        return new Response(200,Pages\Padrao::setEditPadrao($request, $id_funcionamento));
    }
]);

//Delete especialidade
$obRouter->get('/padroes/{id_funcionamento}/deletar',[
    function($request, $id_funcionamento){
        return new Response(200,Pages\Padrao::getDeletePadrao($request, $id_funcionamento));
    }
]);

$obRouter->post('/padroes/{id_funcionamento}/deletar',[
    function($request, $id_funcionamento){
        return new Response(200,Pages\Padrao::setDeletePadrao($request, $id_funcionamento));
    }
]);

//Rota dinâmica
$obRouter->get('/especialidade/{idPagina}/{acao}',[
    function($idPagina,$acao){
        return new Response(200,'Pagina '.$idPagina. ' - '.$acao);
    }
]);

