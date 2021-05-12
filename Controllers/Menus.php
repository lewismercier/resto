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
      
      
    if(!empty($_POST))
      {
      
      	
	      //insérer du menu
	      
	   $model -> insertMenus([$_POST['id'], $_POST['title'], $_POST['src'], $_POST['alt'],
	    $_POST['price'], $_POST['id_category']]);
	   
	    	header('location:index.php?page=Menus'); 
      	exit;                         
      }   
 
     
$template = 'views/Menus.phtml';
include 'views/layout.phtml';  
      
  }
  
     //Modifier le menu
    
     public function modifMenus($id)
  {
    $model = new \Models\Menus();
    $config = $model -> getMenusById($id);
    
     if(!empty($_POST))
      {
      
      	
	      //appelé la fonction insertion
	   $model -> updateMenus([$_POST['id'], $_POST['title'], $_POST['src'], $_POST['alt'], $_POST['price'], $_POST['id_category'], $id]);
	   
	    	header('location:index.php?page=Config'); 
      	exit;                         
      } 
      
      
      
             //Supprimer le menu
      
      
$template = 'views/Menus.phtml';
include 'views/layout.phtml';  
  }
      public function suppMenus($id)
  {
    $model = new \Models\Menus();
    $model -> deleteMenus([$id]);
  	header('location:index.php?page=Menus'); 
    exit;                         
      
    
  }
  	
  
  
}

