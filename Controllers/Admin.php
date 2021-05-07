<?php

namespace Controllers;

Class admin 
{
	public function Connect ()
	{
		
		if(isset($_POST))
		{
			
			$modelAdmin = new \Models\Admin(); 
			
			$admin = $modelAdmin -> getAdmin($_POST['login']);
			
			if($admin) // si $admin existe 
			{
				// Vérifie champ du form et le password ds la bdd 
				if (password_verify($_POST["password"],$admin['password'])==true)
				{
					//  tu fais entrer le login ds la session
					$_SESSION['admin'] = $admin['login'];
					
					header("location:index.php?page=Dashboard");
					exit;
				}
				else 
				{
					$message = "Mot de passe incorrect";
				}
				
				
			}
		}
		else 
		{
			$message = "login incorrect";
		}
		
		
		
		$template = "admin.phtml"
		
		
		
		
		
		
		
		include 'views/layout.phtml';
	}
}