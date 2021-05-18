<?php

namespace Controllers;

trait Session
{
	public function redirectIfNotAdmin()
	{
		if(!isset($_SESSION['admin']))
		{
			header('location:index.php');
			exit;
		}
	}
	 public function setAdminPage()
    {
        if(isset($_SESSION['admin']))
        {
            $_SESSION['page']='admin';
        }
    }
    public function openHour()
    {
        $modelopen= new \Models\Opening_hour();
        return $modelopen -> getOpen(); 
    }
    public function logo()
    { 
     $modelcongig= new \Models\Config();
     return $modelcongig->getContent("logo");
    }
}