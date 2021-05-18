<?php

namespace Controllers;

class AccueilControllers extends Footer
//fait apparaitre les informations sur la page d'accueil du site : à destination du consommateur
{
	public $open;
	public $contact;
	public $city;
	public $tel;
	private $Slider;
	private $Config;
	public $logo;
	
	
	public function __construct()
	{
		parent::__construct();
		$this-> open = $this-> getHour();
		
		$this->contact = $this->getContact();
		
		$this->city = $this->getCity();
		
		$this->tel = $this -> getTel();
		
		$this -> Slider = new \Models\Slider();
		
		$this -> Config = new \Models\Config();
		
		$_SESSION['page']='site';
		$_SESSION['class']="site";
	}	
	
	public function display()
	{
	
		
		$pictures = $this -> Slider -> getSlider();
		
		$title = $this -> Config -> getContent("titre accueil");
		
		$text = $this -> Config -> getContent ("text accueil");
		
		$image = $this -> Config -> getContent ("imageaccueil");
		
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