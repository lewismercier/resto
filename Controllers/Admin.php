<?php


namespace Controllers;

class Admin 
{
    public $open;
    public $logo;
    use Session;
     public function __Construct()
    {
        $this->open=$this->openHour();
        $this->logo= $this->logo();
        $_SESSION['page']='admin';
        $_SESSION['class']="adconnect";
    }
   public function Connect()
   {
       
        if(isset( $_SESSION['admin']))
        {
            header("location:index.php?page=Dashboard");
        }
        else
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
                            $_SESSION['page']='admin';
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
    }
    public function deconexion()
    {
        session_destroy();
         header("location:index.php");
         exit;
    }
}