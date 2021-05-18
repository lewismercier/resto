<?php

namespace Controllers;

trait Session
{
	public function redirectIfNotAdmin()
	{
		if(!isset($_SESSION['admin']))
		{
			header('location:index.php');
			exit;
		}
	}
}