<?php

namespace Controllers;

class Opening_hour
{
	//Declarer une variable privée pour contenir les modèles à instancier
	private $model;
    public $open;
    public function __Construct()
    {
    	/*ON TEST LA CONNEXION AVANT DE POURSUIVRE
    	SI LA CONNEXION EST BONNE ON PRECISE QUE 
    	C'EST UNE PAGE ADMIN */
    	  if(!isset($_SESSION['admin']))
        {
            header('location:index.php');
        }
        else
        {
        	$_SESSION['page']='admin';
        }
        //ON INSTANCIE LE MODEL DE LA CLASSE
    	$this->model=new \Models\Opening_hour();
    	// ON INSTANTCE LE MODEL DES HORAIRES
    	$modelopen= new \Models\Opening_hour();
        $this->open =  $modelopen -> getOpen(); 
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