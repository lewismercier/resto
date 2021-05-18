<?php

namespace Controllers;

class Opening_hour extends Footer
{
	public $open;
	public $contact;
	public $city;
	public $tel;
	
	private $modelOpening;
	
	use Session;
  
  
      public function __construct()
  	    {
	  	    parent::__construct();
			$this-> open = $this-> getHour();
			
			$this->contact = $this->getContact();
			
			$this->city = $this->getCity();
			
			$this->tel = $this -> getTel();	
  	    	
  		  $this -> redirectIfNotAdmin();
  		  $_SESSION['page']='admin';
  		  $this -> modelOpening = new \Models\Opening_hour();
  		
  	    }
	//Declarer une variable privée pour contenir les modèles à instancier
	
	
	public function display()

	{
		//tu dois allé chercher les informations dans la base de données
		//appeler la vue pour afficher les datas ds le tableau
		// Appel ma function getOpen contenu ds la variable modelOpening
		$open = $this -> modelOpening -> getOpen();
		
		$template = "views/tabdata.phtml";
		include 'views/layout.phtml';	
	}
	
	//------------------------------------------------------------------------
	
	// FONCTION MODIF DAYS - HOURS
	
	// je recupère id passer par l index
	public function modif($id)
	{
		$recupOpening = $this -> modelOpening -> getopenbuyid($id);
		
		
		if(!empty($_POST))
		{
			
			//préparer les données pour les mettre dans la base de données
			$day = $_POST['day']; // name"day" du form
			$hour = $_POST['hour']; // name"hour" du from
			
			$this -> modelOpening -> getupdate([$day, $hour,$id]);	
			header('location: index.php?page=opening_hour');
			exit;
		}
		
		
		//appeler la vue 
		$template = "views/formDate.phtml";
		include 'views/layout.phtml';	
		
	}
	
	//------------------------------------------------------------------------
	
	// FONCTION POUR AJOUTER  DAYS - HOURS
	
	//traitement du formulaire
	public function submit()
	{
		
		if(!empty($_POST))
		{
			
			//préparer les données pour les mettre dans la base de données
			$day = $_POST['day']; // name"day" du form
			$hour = $_POST['hour']; // name"hour" du from
			$this -> modelOpening -> getinsert([$day, $hour]);
			
			header('location: index.php?page=opening_hour');
			exit;
				
		}
		
		//appeler la vue 
		$template = "views/formDate.phtml";
		include 'views/layout.phtml';	
	}
	
	
	public function deleteOpening($id)
	{
		// mettre les datas en bdd
		$this -> modelOpening -> getdelete([$id]);
	
		header('location: index.php?page=opening_hour');
		exit;
	}
}