<?php

//autoloader
include "controllers/AccueilController.php";

include 'models/Database.php';
include "models/Jeux.php";


// si y as pas page ds le get
if(!isset($_GET['page']))
{
	//lancer la page d'accueil
	$controller = new Controllers\AccueilController();
	$controller -> display();
}
else
{
	//trester le param page avec le switch
}