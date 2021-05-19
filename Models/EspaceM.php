<?php

// pour dire qu on est au niveau du models
namespace Models;

class EspaceM extends Databases
{
	public function insertUsers (array $params)
	{
		
		return $this -> insertData("INSERT INTO users (email, password, lastname, firstname, phone)  VALUES (?,?,?,?,?)", $params);
		
	}


	public function selectUsers (string $params)
	{
		
		return $this -> findOne("SELECT email, password FROM users WHERE email = ?", [$params]);
	}
	
	
	
	
}