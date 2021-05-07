<?php

namespace Controllers;

class Admin 
{
   public function Connect()
   {
       
       if (!empty($_POST["login"]))
       {
           //instanciation du modèle Admin dans la variable $modelAdmin
           $modelAdmin=new \Models\Admin();
           
           $Admin=$modelAdmin->getAdmin($_POST["login"]);
           
                if ($Admin) 
                {   
                    //vérifie le champ du form et le password dans bdd
                   if (password_verify($_POST["password"],$Admin["password"])==true)
                   {
                       //affectation le login à la session admin
                       $_SESSION['admin']=$Admin["login"];
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
            $message="login incorrect"; 
       }
        
    }    
       
    $template='Admin.phtml';
    include 'views/layout.phtml';
   
    
    }
// >>>>>>> 790186c201114fa724f468febef14ba2bba561c6
}