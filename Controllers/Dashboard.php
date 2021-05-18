<?php


namespace Controllers;

class Dashboard extends Footer
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
        
    }
    
}