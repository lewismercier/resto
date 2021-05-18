<?php


namespace Controllers;

class Admin extends Footer 
{
    public $open;
	public $contact;
	public $city;
	public $tel;
	public $logo;
    
    public function __construct()
	{
		parent::__construct();
		$this-> open = $this-> getHour();
		
		$this->contact = $this->getContact();
		
		$this->city = $this->getCity();
		
		$this->tel = $this -> getTel();
		$this->setAdminPage();
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