<?php
                                   //MODELS
namespace Models;

class Config extends Databases
{
  


public function getConfig()

{
  
  return  $this->findall("SELECT id, name, content FROM config");
  
  
}
public function getConfigById(int $id)
{
  
  return $this->findOne("SELECT id, name, content FROM config WHERE id=?",[$id]);
}
public function getContent($name)
{
    return $this->findOne("SELECT id, name, content FROM config WHERE name like ?",[$name]);
}
public function insertConfig(array $params):string
{
  return $this->insertData("INSERT INTO config(name,content) 
  VALUES(?,?)",$params);
}  

public function updateConfig(array $params):string

{
  return $this->updateData("UPDATE config SET content=? WHERE id=?",$params);
  
}
public function deleteConfig(array $params):string
{
  return $this->deleteData("DELETE FROM config WHERE id=?",$params);
}

}


