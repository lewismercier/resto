<?php


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
    
}