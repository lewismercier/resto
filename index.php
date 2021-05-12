<?php

//autoloader
spl_autoload_register(function($class){//$class = Controllers\AccueilController      \Models\Admin
    //transformer en Controllers/AccueilController.php
    //trouver la fonction qui va remplacer le \ en / 
    include str_replace("\\","/",$class).".php";//$class = Controllers/AccueilController.php     /Models/Admin.php
});





session_start();
/*

include "Controllers/AccueilControllers.php";
include "Controllers/Admin.php";

include 'Models/Databases.php';
include "Models/Admin.php";*/


// si y as pas page ds le get
if(!isset($_GET['page']))
{
	//lancer la page d'accueil
	$controller = new Controllers\AccueilController();
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
	}
}