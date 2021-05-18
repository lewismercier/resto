<?php


namespace Controllers;

class Dashboard
{
    private $model;
    public $open;
    public function __Construct()
    {
    	/*ON TEST LA CONNEXION AVANT DE POURSUIVRE
    	SI LA CONNEXION EST BONNE ON PRECISE QUE 
    	C'EST UNE PAGE ADMIN */
    	  if(!isset($_SESSION['admin']))
        {
            header('location:index.php');
        }
        else
        {
        	$_SESSION['page']='admin';
        }
    	// ON INSTANTCE LE MODEL DES HORAIRES
    	$modelopen= new \Models\Opening_hour();
        $this->open =  $modelopen -> getOpen(); 
        $_SESSION['class']="adash";
    }
    public function display()
    {
        $template = "views/Dashboard.phtml";
		include 'views/layout.phtml';
    }
    
}