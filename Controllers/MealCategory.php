<?php

namespace Controllers;

class MealCategory extends Footer
{
	public $open;
	public $contact;
	public $city;
	public $tel;
	
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
  	    }
    public function display()
	{
	$model = new \Models\MealCategory();
	$mealCategory = $model->getAllCategory();
	
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
		$modelMealCategory = new \Models\MealCategory();
		$modelMealCategory -> insertMealCategory([$name, $dish, $description]);
		}
	
		$template = "formAddCategory.phtml";
		include "views/layout.phtml";
	}
	
	public function modify($id)
	{
		$model = new \Models\MealCategory();
		$mealCategory = $model->getOneCategory($id);
		
		if(!empty($_POST))
		{
		
			$name = $_POST['name'];
		
			$dish= $_POST['is_dish'];
				
			$description=$_POST['description'];
			
		$model->updateMealCategory([$name,$dish,$description,$id]);
			
			//redirection header location...
			header("location:index.php?page=MealCategory");
	    	exit;
		}
		$template = "formAddCategory.phtml";
		include "views/layout.phtml";
	}
	
	public function trash($id)
	{
	
		$model = new \Models\MealCategory();
		$slider = $model->deleteMealCategory([$id]);
	
		header("location:index.php?page=MealCategory");
    	exit;
	}
}