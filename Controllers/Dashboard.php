<?php


namespace Controllers;

class Dashboard
{
    public function display()
    {
        $template = "views/Dashboard.phtml";
		include 'views/layout.phtml';
    }
    
}