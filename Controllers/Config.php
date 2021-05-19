<?php
             //CONTROLLERS
namespace Controllers;


class Config extends Footer
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
    		  $this -> model= new \Models\Config;
    		  $_SESSION['class']="adconfig";
	      }
    
  public function display()
  {
  
    $config=$this->model->getConfig();
  

    $template = 'views/Config.phtml';
    include 'views/layout.phtml';
  }
  
  }  
  public function addConfig()
  {
      
      
    if(!empty($_POST))
      {
      
      	
	      //appelé la fonction insertion
	      $this->model -> insertConfig([$_POST['nom'], $_POST['contenu']]);
	   
	    	header('location:index.php?page=Config'); 
      	exit;                         
      }   
 
     
    $template = 'views/Modifier.phtml';
    include 'views/layout.phtml';  
      
  }
  
  public function modifConfig($id)
  {
   
    
    
     if(!empty($_POST))
      {
      
      
	      //appelé la fonction insertion
	      $this->model -> updateConfig([$_POST['contenu'],$id]);
	   
	    	header('location:index.php?page=Config'); 
      	exit;                         
      } 
      $config = $this->model -> getConfigById($id);
    $template = 'views/Modifier.phtml';
    include 'views/layout.phtml';  
  }
  public function suppConfig($id)
  {
    
    $this->model -> deleteConfig([$id]);
  	header('location:index.php?page=Config'); 
    exit;                         
      
    
  }
  	
  
  
}

