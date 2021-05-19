<?php
             //CONTROLLERS
namespace controllers;


class Menus
{
  public function display()
  {
  
  $model = new \Models\Menus();
  
  $menus = $model->getMenus();
  
//Ajouter du menu

$template = 'views/Menus.phtml';
include 'views/layout.phtml';
  }
  
  public function addMenus()
  {
  $model = new \Models\Menus();
  $category = new \Models\MealCategory();  
  $select = $category -> getAllCategory();
  
    if(!empty($_POST))
      {
      
      	$image = "assets/img/{$_FILES['image']['name']}";
      	move_uploaded_file ($_FILES['image']['tmp_name'], $image );
	      //insérer du menu
	      
	   $model -> insertMenus([ $_POST['title'], $image, $_POST['alt'],
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
    $model = new \Models\Menus();
    $menus = $model -> getMenusById($id);
   
     if(!empty($_POST))
      {
      
      	
	      //appelé la fonction insertion
	   $model -> updateMenus([$_POST['id'], $_POST['title'], $_POST['src'], $_POST['alt'], $_POST['price'], $_POST['id_category'], $id]);
	   
	    	header('location:index.php?page=Menus'); 
      	exit;                         
      } 
      
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
  	
  	public function submit()
	{
		//préparer les données pour les mettre dans la base de données
		$title = $_POST['title'];
		$price = $_POST['price'];
		$image = $_POST['image'];
		var_dump($_FILES);
		
		/*Copie les lignes en commentaire que tu va mettre dans ta fonction
		addMenus en ligne 29. Puis dans le insert tu remplace $_POST['src'] par
		$image et tu ajoute le header (location) vers la page Menus
		$image = "assets/img/{$_FILES['image']['title']}";
		
		//upload mon image
		move_uploaded_file ($_FILES['image']['tmp_title'], $image );*/
		
		
		//mettre les datas en bdd
		$model = new \Models\Menus();
		$model -> Menus($title, $price, $image);
		
	}
  


}