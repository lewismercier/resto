<?php

//autoloader
spl_autoload_register(function($class){//$class = Controllers\AccueilController      \Models\Admin
    //transformer en Controllers/AccueilController.php
    //trouver la fonction qui va remplacer le \ en / 
    include str_replace("\\","/",$class).".php";//$class = Controllers/AccueilController.php     /Models/Admin.php
});




session_start();

/*
si pas de autoloader 
include "Controllers/AccueilControllers.php";
include "Controllers/Admin.php";

include 'Models/Databases.php';
include "Models/Admin.php";*/


// si y as pas page ds le get
if(!isset($_GET['page']))
{
    //lancer la page d'accueil
    $controller = new Controllers\AccueilControllers();
    $controller -> display();
}
else
{
    //tester le param page avec le switch
    switch ($_GET['page'])
    {
        case'Admin':
            $controller = new Controllers\Admin();
            $controller -> connect();
            break;
        case'deco':
			$controller = new Controllers\Admin();
			$controller -> deconexion();
			break;
		case'Dashboard':
			$controller = new Controllers\Admin();
			$controller -> Dashboard();
			break;
        case'Slider':
            $controller = new Controllers\Slider();
            $controller -> display();
            break;

        case'submit':
            $controller = new Controllers\Slider();
            $controller -> submit();
            break;
            
        case'Config':
            $controller = new Controllers\Config();
            $controller -> display();
            break;  
            
        case'Ajouter':
            $controller = new Controllers\Config();
            $controller -> addConfig();
            break;
            
        case'modifier':
            $controller = new Controllers\Config();
            $controller -> modifConfig($_GET['id']);
            break;
            
        case'supprimer':
            $controller = new Controllers\Config();
            $controller -> suppConfig($_GET['id']);
            break;  
            
}
}