<?php

class Produit
{
    private $id;
    private $name;
    private $description;
    private $price;
    private $quantite;
    private $category_id;
    private $image_path;

    public function __construct($name, $description, $price, $quantite, $category_id, $image_path)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->quantite = $quantite;
        $this->category_id = $category_id;
        $this->image_path = $image_path;
    }

        // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImage()
    {
        return $this->image_path;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getQuantite()
    {
        return $this->quantite;
    }


    // Setters
    public function setIdProduit($id)
    {
        $this->id = $id;
    }

    public function setNomProduit($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setImage($image)
    {
        $this->image_path = $image;
    }

    public function setPrix($price)
    {
        $this->price = $price;
    }

    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }
    public function setCategoryId($category_id)
    {
        $this->category_id= $category_id;
    }
    

    public function getCategoryID()
    {
        return $this->category_id;
    }

    
}
?>
