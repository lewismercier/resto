<?php

// pour dire qu on est au niveau du models
namespace Models;

class Admin extends Databases
{
	public function getAdmin (string $login)
	{
		
		return $this->findOne("SELECT login, password FROM admin WHERE login=?", [$login]);
	}
	
	
}