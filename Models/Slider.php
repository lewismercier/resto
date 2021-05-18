<?php

namespace Models;

class Slider extends Databases
{
    //faire apparaitre le slider
    public function getSlider():array
    {
        return $this->findAll
            (
            "SELECT id,src,alt,published,poids
            FROM slider"
            );
    }
    public function getSlidpub()
    {
        return $this->findAll("SELECT id, src, alt, published, poids
                            FROM slider WHERE published=1 ORDER BY poids ASC");
    }
    public function getOneSlider($id):array
    {
    return $this->findOne
        (
         "SELECT id,src,alt,published,poids
        FROM slider
        WHERE id=?",[$id]   
        );
    }
    
    
    public function insertSlider(array $data):string
    {
    return $this->insertData
        (
        "INSERT INTO slider (src, alt, poids, published)
        VALUES (?,?,?,?)",$data
        );
    }

    
    public function updateSlider(array $data):string
    {
     return $this->updateData
        (
        "UPDATE slider
        set src=?,alt=?,poids=?, published=?
        WHERE id=?",$data
        );
    }
    
    public function deleteSlider(array $data):string
    {
        return $this->deleteData
            (
            "DELETE FROM slider
            WHERE id=?",$data
            );
    }
}
