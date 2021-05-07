<?php

//autoloader
include "controllers/AccueilControlleurs.php";
include "Controllers/Admin.php"

include 'models/Databases.php';
include "models/Admin.php";


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