<?php
                                   //MODELS
namespace Models;

class Menus extends Databases
{
  


public function getMenus()

{
  
  return  $this->findall("SELECT id, title, src, alt, price, id_category FROM menus");
  
  
}
public function getMenusById(int $id)
{
  
  return $this->findOne("SELECT id,title, src, alt, price, id_category FROM menus WHERE id=?",[$id]);
}

public function insertMenus(array $params):string
{
  return $this->insertData("INSERT INTO menus(title, src, alt, price, id_category) 
  VALUES(?,?,?,?,?)",$params);
}  

public function updateMenus(array $params):string

{
  return $this->updateData("UPDATE menus SET title=?, src=?, alt=?, price=?, id_category=? WHERE id=?",$params);
  
}
public function deleteMenus(array $params):string
{
   return $this->deleteData("DELETE FROM menus WHERE id=?",$params);
}

public function getCategoryById(int $id)
{
   return $this ->findAll("SELECT menus.title, meal.name FROM menus 
   INNER JOIN category ON category.id=menus.id_category
   INNER JOIN meal ON category.id=meal.id_category 
   WHERE category=?");

	
// 	avoir le nom du menu, le nom du plat quand le menu et le plat ont la même catégorie
	
	
}


}
