<?php

<<<<<<< HEAD
// pour dire qu on est au niveau du models
namespace Models;

Class Admin extends Databases

{
	public function getadmin (string $login):array
	
	{
		
		return $this -> findOne("SELECT login, password FROM admin WHERE login=?,[$login]");
		
	}
	
	
=======

namespace Models;

class Admin extends Databases 
{
    public function getAdmin(string $login):array
    {
        return $this->findOne
(
            "SELECT login, password
            FROM admin
            WHERE login=?",[$login]
);
    }
    
>>>>>>> 790186c201114fa724f468febef14ba2bba561c6
}