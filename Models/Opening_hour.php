<?php

// pour dire qu on est au niveau du models
namespace Models;

class Opening_hour extends Databases

{
	public function getopenbuyid($id):array
	{
		return $this -> findOne("SELECT id, days, hours FROM opening_hour WHERE id = ?",[$id]);
	}
	
	
	public function getOpen():array
	{
		return $this -> findAll("SELECT id, days, hours FROM opening_hour");
	}
	
	// recois les arguments envoyer ds le databases $day $hour $id sous forme de tableau en 55
	public function getupdate(array $params):string // fonction qui provient du databases
	{
		// sans le WHERE il va mettre a jour toute la table - on met un WHERE pour faire une comparaison
		// j'appel ma function updateData (databases) et je lui passe ma requete
		return $this -> updateData("UPDATE opening_hour SET  days = ?, hours = ? WHERE id = ?", $params);
	} 
	
	
	public function getinsert(array $params):string
	{
		// dans un insert pas besoin de mettre id car il s'incremente tout seule
		return $this ->  insertData("INSERT INTO opening_hour (days, hours)  VALUES (?,?)", $params);
	}
	
	
	public function getdelete(array $params):string
	{
		return $this -> deleteData("DELETE FROM opening_hour WHERE id = ?", $params);
		
	}
	
}

