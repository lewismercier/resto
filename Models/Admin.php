<?php

namespace Models;

class Admin extends Databases
{
	//les méthodes qui effectuent des requêtes SQL sur la table ADMIN
	public function getAdmin(string $login):array
	{
	
	return $this->findOne("SELECT login, password FROM admin WHERE login=? ", [$login]);
		
		
	}

	public function getGameById(int $id):array
	{
	
		return $this -> findOne("SELECT age, id ,nom_jeu, prix, date_sortie, description FROM jeux WHERE id = ?",[$id]);
	}
}