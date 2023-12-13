<?php

class Commande
{
    private $id;
    private $nom;
    private $nom_famille;
    private $email;
    private $adresse;
    private $created_at;
    private $qte_com;
    private $prix_com;
    private $total_com;
    private $product_id;
    private $telephone;

    public function __construct()
    {
       
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getNomFamille()
    {
        return $this->nom_famille;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getQteCom()
    {
        return $this->qte_com;
    }

    public function getPrixCom()
    {
        return $this->prix_com;
    }

    public function getTotalCom()
    {
        return $this->total_com;
    }

    public function getProductId()
    {
        return $this->product_id;
    }
    public function getTelephone()
    {
        return $this->telephone;
    }

    // Setters
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setNomFamille($nom_famille)
    {
        $this->nom_famille = $nom_famille;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function setQteCom($qte_com)
    {
        $this->qte_com = $qte_com;
    }

    public function setPrixCom($prix_com)
    {
        $this->prix_com = $prix_com;
    }

    public function setTotalCom($total_com)
    {
        $this->total_com = $total_com;
    }

    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }
    
}

?>
