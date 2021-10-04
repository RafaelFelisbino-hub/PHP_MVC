<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Medico extends Page{

    public static function getMedico(){
        $obOrganization = new Organization;

        $content =  View::render('pages/medico',[
            'name' => $obOrganization->name,
            'description' => $obOrganization->description,
            'site' => $obOrganization->site
        ]);

        return parent::getPage('Medico - sa_03_crud', $content);
    }
}