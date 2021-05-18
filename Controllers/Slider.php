<?php

namespace Controllers;

class Slider
{
    
    private $model;
    public $open;
    use Session;
    public function __Construct()
    {
    
    	 $this -> redirectIfNotAdmin();
    	 $this->setAdminPage();
        //ON INSTANCIE LE MODEL DE LA CLASSE
    	$this->model=new \Models\Slider();
    	// ON INSTANCIE LE MODEL DES HORAIRES
    	
        $this->open =  $this->openHour();
        $_SESSION['class']="adslider";
    }
	public function display()
	{
	
	$sliders = $this-> model-> getSlider();
	$appercu=$this->model->getSlidpub();
	$template = "listSlider.phtml";
	include "views/layout.phtml";
	}
	
		//traitement du formulaire
	public function submit()
	{
		//vérifier que le formulaire est complété
        if(!empty($_POST))
		{
		//préparer les données pour les mettre dans la base de données
		$alt = $_POST['alt'];
		
		if(!empty($_POST['published']))
		   {
		        $published=1;
		   }
		    else
		    {
		        $published=0;
		    }
		$poids= intval($_POST['poids']);

		$image = "assets/img/{$_FILES['image']['name']}";
		
		//upload mon image
		move_uploaded_file($_FILES['image']['tmp_name'], $image );
		
		
		//mettre les datas en bdd
		
		$this->model-> insertSlider([$image, $alt, $poids, $published]);
		header("location:index.php?page=Slider");
	    exit;
		}
	
		$template = "formAddSlider.phtml";
		include "views/layout.phtml";
	}
	
	public function modify($id)
	{
		
		$slider = $this->model->getOneSlider($id);
		
		if(!empty($_POST))
		{
			$alt = $_POST['alt'];
		
			if(!empty($_POST['published']))
				{
		        $published=1;
				}
		    	else
				{
		        $published=0;
		    	}
			$poids= intval($_POST['poids']);
			
			if(!empty($_FILES['image']['name']))
				{
					$image = "assets/img/{$_FILES['image']['name']}";
		
					//upload mon image
					move_uploaded_file($_FILES['image']['tmp_name'], $image );	
				}
			else 
				{
					$image = $_POST["imgbdd"];
				}
			
	
			$this->model->updateSlider([$image,$alt,$poids,$published,$id]);
			
			//redirection header location...
			header("location:index.php?page=Slider");
	    	exit;
		}
		
		$template = "formAddSlider.phtml";
		include "views/layout.phtml";
	}
	
	public function trash($id)
	{
	
		
		$this->model->deleteSlider([$id]);
	
		header("location:index.php?page=Slider");
    	exit;
	}
	public function setPublished($id)
	{
		
	}
}