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
        
        //connexion admin
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
        
        //SLIDER
        case'Slider':
            $controller = new Controllers\Slider();
            $controller -> display();
            break;

        case'submit':
            $controller = new Controllers\Slider();
            $controller -> submit();
            break;
            
        case'modifySlider':
			$controller = new Controllers\Slider();
			$controller -> modify($_GET['id']);
			break;
			
		case'deleteSlider':
			$controller = new Controllers\Slider();
			$controller -> trash($_GET['id']);
			break;
            
        //CONFIG
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
        
        //CATEGORY	
		case'MealCategory':
			$controller = new Controllers\MealCategory();
			$controller -> display();
			break;
			
		case'submitCategory':
			$controller = new Controllers\MealCategory();
			$controller -> submit();
			break;
		
		case'modifyCategory':
			$controller = new Controllers\MealCategory();
			$controller -> modify($_GET['id']);
			break;
			
		case'deleteCategory':
			$controller = new Controllers\MealCategory();
			$controller -> trash($_GET['id']);
        
        //HORAIRES
		case'opening_hour':
			// renvoi ds l'autoloader le controller
			// remplace l'include
			$controller = new Controllers\Opening_hour();
			$controller -> display();
			break;	
		
		case'modifOpening':
			// renvoi ds l'autoloader le controller
			// remplace l'include
			$controller = new Controllers\Opening_hour();
			// je recupère id envoyer du form
			$controller -> modif($_GET['id']);
			break;
			
		case'deleteOpening':
			$controller = new Controllers\Opening_hour();
			$controller -> deleteOpening($_GET['id']);
			break;
			
		case'ajouterOpening':
			$controller = new Controllers\Opening_hour();
			$controller -> submit();
			break;
			
			//MENUS
			
	    case'Menus':
            $controller = new Controllers\Menus();
            $controller -> display();
            break;  
            
        case'Addmenus':
            $controller = new Controllers\Menus();
            $controller -> addMenus();
            break;
            
        case'Modifmenus':
            $controller = new Controllers\Menus();
            $controller -> modifMenus($_GET['id']);
            break;
            
        case'Suppmenus':
            $controller = new Controllers\Menus();
            $controller -> suppMenus($_GET['id']);
            break;  
        
		
	}

}