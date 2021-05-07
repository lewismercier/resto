<?php

namespace Models;

class Slider extends Databases
{
    
    public function getSlider():array
    {
    return $this->findAll
(
    "SELECT id, src
    FROM slider"
);
    }
    
    public function InsertSlider():array
    {
    return $this->insertData
(
    
);
    }
}
