<?php
require_once('../controllers/ProduitController.php');
require_once('../models/Produit.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $image = $_FILES['image']['name'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $qtestock = $_POST['qt'];
    $idCategorie = $_POST['category_id'];

    $controller = new ProduitController();
    $article = new Produit($nom, $description, $prix, $qtestock, $idCategorie, $image);
    $controller->insert($article);

    $uploadPath = '../images/';  
    $imagePath = $uploadPath . $image;

    header('location:afficheproduit.php');
}
?>
