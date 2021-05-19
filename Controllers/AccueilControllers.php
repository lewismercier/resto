<?php

// affichage des horaires sur l'index

namespace Controllers;

class AccueilControllers extends Footer
//fait apparaitre les informations sur la page d'accueil du site : à destination du consommateur
{
	public $open;
	public $contact;
	public $city;
	public $tel;
	private $Slider;
	
	public $logo;
	use Session;
	
	public function __construct()
	{
		parent::__construct();
		$this-> open = $this-> getHour();
		
		$this->contact = $this->getContact();
		
		$this->city = $this->getCity();
		
		$this->tel = $this -> getTel();
		
		$this -> Slider = new \Models\Slider();
		
		$this->logo= $this->logo();
		
		$_SESSION['page']='site';
		$_SESSION['class']="site";
	}	
	
	public function display()
	{
	
		$config= new \Models\Config();
		$pictures = $this -> Slider -> getSlider();
		
		$title = $config-> getContent("titre accueil");
		
		$text = $config-> getContent ("text accueil");
		
		$image = $config-> getContent ("imageaccueil");
		
		$template = "views/accueil.phtml";
		include 'views/layout.phtml';

	}
	
	public function about()
	{
		$template = "views/about.phtml";
		include 'views/layout.phtml';	
	}
	
	public function menus()
	{
		$template = "views/menus.phtml";
		include 'views/layout.phtml';	
	}
	
	public function contact()
	{
		$template = "views/contact.phtml";
		include 'views/layout.phtml';	
	}
}