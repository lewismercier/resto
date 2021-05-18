<?php

namespace Controllers;

class Opening_hour extends Footer
{
	public $open;
	public $contact;
	public $city;
	public $tel;
	private $model;
	
	
	use Session;
  
  
      public function __construct()
  	    {
	  	    parent::__construct();
			$this-> open = $this-> getHour();
			
			$this->contact = $this->getContact();
			
			$this->city = $this->getCity();
			
			$this->tel = $this -> getTel();	
  	    	
  			$this -> redirectIfNotAdmin();
  			$this->setAdminPage();
  			 $this->model=new \Models\Opening_hour();
  			 $_SESSION['class']="adhour";
  		
  	    }
	public function display()

	{
		//tu dois allé chercher les informations dans la base de données
		//appeler la vue pour afficher les datas ds le tableau
		// Appel ma function getOpen contenu ds la variable modelOpening
		$open = $this -> model -> getOpen();
		
		$template = "views/tabdata.phtml";
		include 'views/layout.phtml';	
	}
	
	//------------------------------------------------------------------------
	
	// FONCTION MODIF DAYS - HOURS
	
	// je recupère id passer par l index
	public function modif($id)
	{
		$recupOpening = $this -> model -> getopenbuyid($id);
		
		
		if(!empty($_POST))
		{
			
			//préparer les données pour les mettre dans la base de données
			$day = $_POST['day']; // name"day" du form
			$hour = $_POST['hour']; // name"hour" du from
			
			$this -> model -> getupdate([$day, $hour,$id]);	
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
			$this -> model -> getinsert([$day, $hour]);
			
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
		$this -> model -> getdelete([$id]);
	
		header('location: index.php?page=opening_hour');
		exit;
	}
}