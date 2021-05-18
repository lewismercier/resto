<?php

namespace Controllers;

class MealCategory
{
	private $model;
    public $open;
    use Session;
    public function __Construct()
    {
    	$this -> redirectIfNotAdmin();
  		$this->setAdminPage();
  		$this->open =  $this -> openHour(); 
    	$this->model=new \Models\MealCategory();
    	$_SESSION['class']="adcategorie";
    }
    public function display()
	{
	// ON RECUPERE LES CATEGORIE EXISTANTE POUR LES AFFICHER
	$mealCategory = $this->model->getAllCategory();
	
	$template = "MealCategory.phtml";
	include "views/layout.phtml"; 
	}
	
	
	public function submit()
	{
		//vérifier que le formulaire est complété
        if(!empty($_POST))
		{
		//préparer les données pour les mettre dans la base de données
			$name = $_POST['name'];
		
			$dish= $_POST['is_dish'];
				
			$description=$_POST['description'];

		
		
		//mettre les datas en bdd
		
			$this->model -> insertMealCategory([$name, $dish, $description]);
			header("location:index.php?page=MealCategory");
	    	exit;
		}
	
		$template = "formAddCategory.phtml";
		include "views/layout.phtml";
	}
	
	public function modify($id)
	{
		// RECUPPERATION DE LA CATEGORIE A MODIFIER
		$mealCategory = $this->model->getOneCategory($id);
		
		if(!empty($_POST))
		{
		
			$name = $_POST['name'];
		
			$dish= $_POST['is_dish'];
				
			$description=$_POST['description'];
			
		$this->model->updateMealCategory([$name,$dish,$description,$id]);
			
			//redirection header location...
			header("location:index.php?page=MealCategory");
	    	exit;
		}
		$template = "formAddCategory.phtml";
		include "views/layout.phtml";
	}
	
	public function trash($id)
	{
	
	
		$slider = $this->model->deleteMealCategory([$id]);
	
		header("location:index.php?page=MealCategory");
    	exit;
	}
}