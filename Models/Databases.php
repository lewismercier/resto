<?php

namespace Models;
//classe mère de tous les models


// pour ne pas faire un new databases

abstract class Databases {
	
	// accesible aux enfants
	protected $bdd;
	
		
	public function __construct()
	{
		$this -> bdd = new \PDO('mysql:host=db.3wa.io;dbname=lewismer_resto;charset=utf8','lewismer','f5756070f558ca298f614573db43b87e');
	}
	
	public function findAll(string $req,array $params = []):array
	{
		$query = $this -> bdd -> prepare($req);
		$query -> execute($params);
		return $query -> fetchAll(\PDO::FETCH_ASSOC);
	}
	
	
	
	public function findOne(string $req,array $params = []):array
	{
		$query = $this -> bdd -> prepare($req);
		$query -> execute($params);
		return $query -> fetch(\PDO::FETCH_ASSOC);
	}
	
	
	// prend la requette
	public function insertData(string $req, array $params=[]):string
	    {
	         $query=$this->bdd->prepare($req);
	         
	         if($query->execute($params))
	         {
	             return 'success';
	         }
	         else
	         {
	             return 'error';
	         }
	    }
    
    
    
    public function updateData(string $req, array $params=[]):string
    {
         $query=$this->bdd->prepare($req);
         if($query->execute($params))
         {
             return 'success';
         }
         else
         {
             return 'error';
         }
    }
    public function deleteData(string $req, array $params=[]):string
    {
       $query=$this->bdd->prepare($req);
         if($query->execute($params))
         {
             return 'success';
         }
         else
         {
             return 'error';
         } 
    }
}
	
	
