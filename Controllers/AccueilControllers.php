<?php

namespace Controllers;

class AccueilControllers
{
		
	public $open;
	public $logo;
	use Session;
	public function __construct()
	{
		$_SESSION['page']='site';
		$_SESSION['class']="site";
		
        $this->open =  $this->openHour();
        $this->logo= $this->logo();
       
	}
	
	public function display()
	{
		//méthode qui permet d'afficher la page d'accueil
		
		
		//appeler la vue 
		
		$template = "accueil.phtml";
		include 'views/layout.phtml';



	}
}