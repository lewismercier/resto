<?php

namespace Controllers;

class AccueilControllers
{
	private $modelOpening;
	
	public function __construct()
	{
		// Je vais chercher tout mes fonctions du model pour modelOpening
		$this -> modelOpening = new \Models\Opening_hour();
	}
	
	
	public function display()
	{
	
		
		$open = $this -> modelOpening -> getOpen(); 
		
		$template = "views/accueil.phtml";
		
		
		include 'views/layout.phtml';



	}
}