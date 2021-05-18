<?php
             //CONTROLLERS
namespace controllers;


class Config
{
    private $model;
    public $open;
    use Session;
    public function __Construct()
    {
       $this -> redirectIfNotAdmin();
    	 $this->setAdminPage();
        //ON INSTANCIE LE MODEL DE LA CLASSE
      $this -> model= new \Models\Config;
      	// ON INSTANTCE LE MODEL DES HORAIRES
    	 $_SESSION['class']="adconfig";
        $this->open =  $this -> openHour(); 
    }  
  public function display()
  {
  
    $config=$this->model->getConfig();
  

    $template = 'views/Config.phtml';
    include 'views/layout.phtml';
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

