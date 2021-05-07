<?php
     
                      //CONTROLLERS
                      //reçoit la requête du visiteur
                      
namespace Controllers;

class admin{
  public function Connect(){  //si la personne se connecte,on vérifie que le formulaire existe
    
   if(isset($_POST)) 
   {
     $modelAdmin= new \Models\Admin(); // on instancie le admin dans le dossier model
     
     $Admin=$modelAdmin->getAdmin($_POST["login"]); //on obtient le login de admin
     
     
     if($Admin) 
     
     {  // si le pw est bon (post pour le formulaire)($admin pour la base de donnée, on met le nom utilisé pour le champ)
     
       if(password_verify($_POST["password"]$Admin["password"])==true)
       {
         $_SESSION['admin']=$Admin["login"];
         header("location:index.php?page-Dashboard");
         exit;
         
         
       }
       else 
       {
         $message="mauvais mot de passe";
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
}