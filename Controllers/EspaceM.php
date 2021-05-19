<?php

namespace Controllers;

class EspaceM
{
	
	private $modelUsers;
	

	
	
	
	public function __construct()
	{
		$this -> modelUsers = new \Models\EspaceM();
	}
	
	if(isset($_POST["login"] == $email["login"])
      {
            
      }
      else
      {
            $message="identifiant déjà utilisé";   
      }
      
      
	
	public function Connect()
	{
		
		if(!empty($_POST))
		{
			
			$modelUsers = new \Models\EspaceM();
            	$email = $modelUsers -> selectUsers($_POST["login"]);
            	
            	if($email==false)
            	{
            		$email = $_POST['email'];
				$pw = ($_POST['pw']) ;
				$lastname = $_POST['lastname'];
				$firstname = $_POST['firstname'];
				$phone = $_POST['phone']; 
				
				//$pass = password_hash($pw);
				$pass = password_hash($pw,PASSWORD_DEFAULT);
				
				$this -> modelUsers -> insertUsers([$email, $pass, $lastname, $firstname, $phone]);	
				header('location: index.php?page=Admin');
				exit;
				
	            	}
	            	else
	            	{
	            		$message 'identifiant déjà utilisé';
	            	}
			}
		
		
                  
		
		$template = 'views/EspaceM.phtml';
		include 'views/layout.phtml';	
	}
}

	