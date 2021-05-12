<?php

namespace Controllers;

class Opening_hour
{
	//Declarer une variable privée pour contenir les modèles à instancier
	private $modelOpening;
	
	
	//mon constructeur qui se lance automatiquement 
	public function __construct()
	{
		// Je vais chercher tout mes fonctions du model pour modelOpening
		$this -> modelOpening = new \Models\Opening_hour();
		
		// //si le formulaire a été soumis
		// if(!empty($_POST))
		// {
		// 	// j'appel ma function
		// 	$this -> display();
		
		// }
	}
	
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