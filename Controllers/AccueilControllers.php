<?php

namespace Controllers;

class AccueilControllers
{
	public function display()
	{
		//méthode qui permet d'afficher la page d'accueil
		
		// $model = new \Models\Admin();
		// $admin = $model -> getAllAdmin();
		
		
		//appeler la vue 
		
		$template = "accueil.phtml";
		include 'views/layout.phtml';



	}
}