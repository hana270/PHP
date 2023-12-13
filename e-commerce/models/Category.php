<?php

class Category
{
    private $idCategory;
    private $name;

    public function __construct($idCategory = null, $name = null)
    {
        $this->idCategory = $idCategory;
        $this->name = $name;
    }

    // Getters
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    public function getName()
    {
        return $this->name;
    }

    // Setters
    public function setIdCategory($idCategory)
    {
        $this->idCategory = $idCategory;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

}
?>
