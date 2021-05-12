<?php

namespace Controllers;

class Slider
{
    
	public function display()
	{
	$model = new \Models\Slider();
	$sliders = $model->getSlider();
	
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
		$modelSlider = new \Models\Slider();
		$modelSlider -> insertSlider([$image, $alt, $poids, $published]);
		}
	
		$template = "formAddSlider.phtml";
		include "views/layout.phtml";
	}
	
	public function modify($id)
	{
		$model = new \Models\Slider();
		$slider = $model->getOneSlider($id);
		
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
			
	
			$slider = $model->updateSlider([$image,$alt,$poids,$published,$id]);
			
			//redirection header location...
			header("location:index.php?page=Slider");
	    	exit;
		}
		
		$template = "formAddSlider.phtml";
		include "views/layout.phtml";
	}
	
	public function trash($id)
	{
	
		$model = new \Models\Slider();
		$slider = $model->deleteSlider([$id]);
	
		header("location:index.php?page=Slider");
    	exit;
	}
}