<?php
             //CONTROLLERS
namespace Controllers;


class Config extends Footer
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
  
  $model = new \Models\Config();
  
  $config = $model->getConfig();
  

// if(!isset($_GET['id_config']))
// {
// 	header('location:index.php'); //header sert à envoyer l'utilisateur vers l'index (rooter)
// 	exit;                         //exit permet de couper l'exécution du script car la redirection aura lieu immédiatement.

// }


// $id = $_GET['id_config'];

// include 'models/config.php';


// $config = getConfigById($id);


// if(!empty($_POST['content']))
// {
// 	$content = $_POST['content'];
// 	//appelé la fonction insertion
// 	insertContent($_POST['name'], $_POST['content'],$id);
// }	
// //Recuperation du contenu
// $content = getConfigById($id);





$template = 'views/Config.phtml';
include 'views/layout.phtml';
  }
  
  public function addConfig()
  {
      $model = new \Models\Config();
      
      
    if(!empty($_POST))
      {
      
      	
	      //appelé la fonction insertion
	   $model -> insertConfig([$_POST['nom'], $_POST['contenu']]);
	   
	    	header('location:index.php?page=Config'); 
      	exit;                         
      }   
 
     
$template = 'views/Modifier.phtml';
include 'views/layout.phtml';  
      
  }
  
  public function modifConfig($id)
  {
    $model = new \Models\Config();
    $config = $model -> getConfigById($id);
    
     if(!empty($_POST))
      {
      
      	
	      //appelé la fonction insertion
	   $model -> updateConfig([$_POST['contenu'],$id]);
	   
	    	header('location:index.php?page=Config'); 
      	exit;                         
      } 
      
$template = 'views/Modifier.phtml';
include 'views/layout.phtml';  
  }
      public function suppConfig($id)
  {
    $model = new \Models\Config();
    $model -> deleteConfig([$id]);
  	header('location:index.php?page=Config'); 
    exit;                         
      
    
  }
  	
  
  
}

