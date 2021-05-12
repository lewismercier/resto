<?php

namespace Models;

class MealCategory extends Databases
{
    //faire apparaître les catégories 
    public function getAllCategory():array
    {
    return $this->findAll
    (
        "SELECT id,name,is_dish,description
        FROM category"
        );
    }
    
     public function getOneCategory($id):array
    {
    return $this->findOne
        (
         "SELECT id,name,is_dish,description
        FROM category
        WHERE id=?",[$id]   
        );
    }
    
     public function insertMealCategory(array $data):string
    {
    return $this->insertData
        (
        "INSERT INTO category (name, is_dish, description)
        VALUES (?,?,?)",$data
        );
    }
    
    public function updateMealCategory(array $data):string
    {
     return $this->updateData
        (
        "UPDATE category
        set name=?,is_dish=?,description=?
        WHERE id=?",$data
        );
    }
    
    public function deleteMealCategory(array $data):string
    {
        return $this->deleteData
            (
            "DELETE FROM category
            WHERE id=?",$data
            );
    }

}