<?php

//autoloader
spl_autoload_register(function($class){//$class = Controllers\AccueilController      \Models\Admin
    //transformer en Controllers/AccueilController.php
    //trouver la fonction qui va remplacer le \ en / 
    include str_replace("\\","/",$class).".php";//$class = Controllers/AccueilController.php     /Models/Admin.php
});

session_start();

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
		
	}
}