<?php
             //CONTROLLERS
namespace controllers;


class Menus
{
  private $model;
  public $open;
	use Session;
	 public function __construct()
  {
  		  $this -> redirectIfNotAdmin();
  		  $this->setAdminPage();
  		  $this->open =  $this -> openHour(); 
  		  $this->model = new \Models\Menus();
  		$_SESSION['class']="admenu";
  }
  public function display()
  {
  
  
  
      $menus = $this->model->getMenus();
  
      //Ajouter du menu

      $template = 'views/Menus.phtml';
      include 'views/layout.phtml';
  }
  
  public function addMenus()
  {
      $category = new \Models\MealCategory();  
      $select = $category -> getAllCategory();
    
      if(!empty($_POST))
      {
      
      	$image = "assets/img/{$_FILES['image']['name']}";
      	move_uploaded_file ($_FILES['image']['tmp_name'], $image );
	      //insérer du menu
	      
	      $this->model -> insertMenus([ $_POST['title'], $image, $_POST['alt'],
	      $_POST['price'], $_POST['id_category']]);
	   
	    	header('location:index.php?page=Menus'); 
      	exit;                         
      }   
 
     
      $template = 'views/Modifmenus.phtml';
      include 'views/layout.phtml';  
      
  }
  
     //Modifier le menu
    
     public function modifMenus($id)
  {
    
    $menus = $this->model -> getMenusById($id);
   
     if(!empty($_POST))
      {
      
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
	      //appelé la fonction insertion
	   $this->model -> updateMenus([$_POST['title'], $image, $_POST['alt'], $_POST['price'], $_POST['id_category'], $id]);
	   
	    	header('location:index.php?page=Menus'); 
      	exit;                         
      } 
    $category = new \Models\MealCategory();  
    $select = $category -> getAllCategory();
    $template = 'views/Modifmenus.phtml';
    include 'views/layout.phtml';     
  }
             //Supprimer le menu
      
      

      public function suppMenus($id)
  {
    $model = new \Models\Menus();
    $model -> deleteMenus([$id]);
  	header('location:index.php?page=Menus'); 
    exit;                         
      
    
  }
  


}