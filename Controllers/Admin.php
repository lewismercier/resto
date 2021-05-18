<?php

namespace Controllers;

class Admin 
{
   public function Connect()
   {
       
       if (!empty($_POST["login"]))
       {
           //instanciation du modèle Admin dans la variable $modelAdmin
           $modelAdmin = new \Models\Admin();
           $Admin = $modelAdmin -> getAdmin($_POST["login"]);
           
            $modelUsers = new \Models\EspaceM();
            $email = $modelUsers -> selectUsers($_POST["login"]);
           
           //var_dump($Admin);
           
                  
           
                if ($Admin) 
                {   
                           if (password_verify($_POST["password"],$Admin["password"])==true)
                         {
                             //affectation le login à la session admin
                             
                             $_SESSION['admin']= $Admin["login"];
                             header("location:index.php?page=Dashboard");
                             exit;
                         }
                         else
                          {
                              $message="mot de passe incorrect";
                          }
                    
                   }
                   else
                   {
                         
                        
                         
                         
                         if($email)
                         {
                               
                               
                             if (password_verify($_POST["password"],$email["password"])==true)
                               {  
                                     var_dump($email);
                                     
                                     
                                    $_SESSION['users']= $email["login"];
                                    header("location:index.php?page=DashboardUsers");
                                    exit;
                              }
                               
                         }
                         else
                         {
                              $message="login incorrect";  
                               
                         }
                               
                  }
        
    }    
       
    $template='Admin.phtml';
    include 'views/layout.phtml';
   
    
    }
    public function deconexion()
    {
        session_destroy();
         header("location:index.php?page=Admin");
         exit;
    }
    public function Dashboard()
    {
        
       
        //Appel de notre Template dashbord
    $template='Dashboard.phtml';
    include 'views/layout.phtml';
    }
}