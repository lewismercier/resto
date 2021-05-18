<?php

namespace Controllers;

abstract class Footer
{
    
    private $modelOpening;
    protected $Config;
    
    public function __construct()
	{
		
		$this -> modelOpening = new \Models\Opening_hour();
		
		$this -> Config = new \Models\Config();

	}
	
	public function getHour()
	{
	  
	    return $this -> modelOpening -> getOpen();
	}
	
	public function getContact()
	{
	    return $this -> Config -> getContent ("contact");
	}

	public function getCity()
	{
	    return $this -> Config -> getContent ("City");
	}
	
    public function getTel()
    {
        return $this -> Config -> getContent ("telephone");
    }
	
	
}