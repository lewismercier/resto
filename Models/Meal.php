<?php

namespace Models;

class Meal extends Databases
{
    //faire apparaitre le slider
    public function getAllMeal():array
    {
    return $this->findAll
        (
        "SELECT id,name,src,alt,id_category
        FROM meal"
        );
    }
    public function getOneMeal($id):array
    {
    return $this->findOne
        (
         "SELECT id,name,src,alt, id_category
        FROM meal
        WHERE id=?",[$id]   
        );
    }
    public function insertMeal(array $data):string
    {
    return $this->insertData
        (
        "INSERT INTO meal (name, src, alt, id_category)
        VALUES (?,?,?,?)",$data
        );
    }
    public function updateMeal(array $data):string
    {
     return $this->updateData
        (
        "UPDATE meal
        set name = ?, src=?,alt=?,id_category=?
        WHERE id=?",$data
        );
    }
    public function deleteMeal(array $data):string
    {
        return $this->deleteData
            (
            "DELETE FROM meal
            WHERE id=?",$data
            );
    }
    
    
}