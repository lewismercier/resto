<?php


namespace Controllers;

class Dashboard extends Footer
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
    		  $_SESSION['class']="adash";
  	    }
    
    public function display()
    {
        $template = "views/Dashboard.phtml";
		include 'views/layout.phtml';
    }
    
}