<?php

include_once('../models/Category.php');
include_once('../database/config.php');


class CategoryController extends Connexion
{
    function __construct()
    {
        parent::__construct();
    }

    function insert(Category $category)
    {
        $query = "INSERT INTO categories(name) VALUES (?)";
        $res = $this->pdo->prepare($query);

        $array = array($category->getName());
        return $res->execute($array);
    }

    function getCategory($id)
    {
        $query = "SELECT * FROM categories WHERE id = ?";
        $res = $this->pdo->prepare($query);
        $res->execute(array($id));
        $array = $res->fetch();
        return $array;
    }

    function delete($idCategory)
    {
        $query = "DELETE FROM categories WHERE id=?";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($idCategory));
    }

    public function listCategories()
    {
            $query = "SELECT * FROM categories";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
       
    }
    
    function updateCategory(Category $category)
    {
        $query = "UPDATE categories SET name = ? WHERE id = ?";
        $res = $this->pdo->prepare($query);
    
        $array = array($category->getName(), $category->getIdCategory());
        return $res->execute($array);
    }
      
    public function getCategories()
{
    $query = "SELECT id, name FROM categories";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


}
?>
