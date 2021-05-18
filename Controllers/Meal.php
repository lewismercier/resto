<?php

namespace Controllers;

class Meal extends Footer
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
		$model = new \Models\Meal();
		$meals = $model->getAllMeal();
		
		$template = "listMeal.phtml";
		include "views/layout.phtml";
		}
	public function submit()
	{
		//appeler la méthode qui va chercher les différentes catégories
		$model = new \Models\MealCategory();
		$mealCategory = $model->getAllCategory();

		//vérifier que le formulaire est complété
        if(!empty($_POST))
		{
		 $name = $_POST['name'];
		 $image = "assets/img/{$_FILES['image']['name']}";
		
		//upload mon image
		move_uploaded_file($_FILES['image']['tmp_name'], $image );
		 
		 
		 $alt = $_POST['alt']; 
		 $idCategory = $_POST['idCategory'];
		 
		 $modelMeal = new \Models\Meal();
		 $modelMeal -> insertMeal([$name, $image, $alt, $idCategory]);
		}
	    
	    $template = "formAddMeal.phtml";
		include "views/layout.phtml";
	 }
	  
	 public function modify($id)
	{
		$model = new \Models\Meal();
		$meal = $model->getOneMeal($id);
		
		if(!empty($_POST))
		{
		    $name = $_POST['name'];
		
			if(!empty($_FILES['image']['name']))
				{
					$image = "assets/img/{$_FILES['image']['name']}";
		
					//upload mon image
					move_uploaded_file($_FILES['image']['tmp_name'], $image );	
				}
			else 
				{
					$image = $_POST["imgbdd"];
				}
				
			$alt = $_POST['alt'];
			$idCategory = $_POST['idCategory'];
	
			$meal = $model->updateMeal([$name,$image,$alt,$idCategory,$id]);
			
			//redirection header location...
			header("location:index.php?page=Meal");
	    	exit;
		}
		$modelCategory = new \Models\MealCategory();
		$mealCategory = $modelCategory->getAllCategory();
		$template = "formAddMeal.phtml";
		include "views/layout.phtml";
	} 
	public function deleteMeal($id)
	{
	
		$model = new \Models\Meal();
		$meal = $model->deleteMeal([$id]);
	
		header("location:index.php?page=Meal");
    	exit;
	}    
	
	
	
	
}
	