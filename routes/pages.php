<?php

use \App\Http\Response;
use \App\Controller\Pages;

$obRouter->get('/',[
    function(){
        return new Response(200,Pages\Home::getHome());
    }
]);

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

