<?php

// pour dire qu on est au niveau du models
namespace Models;

Class Admin extends Databases

{
	public function getadmin (string $login):array
	
	{
		
		return $this -> findOne("SELECT login, password FROM admin WHERE login=?,[$login]");
		
	}
	
	
}