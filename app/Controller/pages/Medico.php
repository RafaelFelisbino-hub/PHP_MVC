<?php

namespace App\Controller\Pages;

use \App\Utils\View;

class Medico extends Page{

    public static function getMedico(){

        $content =  View::render('pages/medico',[
            
        ]);

        return parent::getPage('Medico - sa_03_crud', $content);
    }
}