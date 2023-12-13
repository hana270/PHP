<?php
include_once('../controllers/ProduitController.php');
include_once('../models/Produit.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantite = $_POST['quantite'];
    $category_id = $_POST['category_id'];

    $controller = new ProduitController();
    $previousProduct = $controller->getProduit($id); 
    $imagePath = $previousProduct['image_path'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = '../images/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $imagePath = $uploadDir . basename($_FILES['image']['name']);
        $moveResult = move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    }
    $controller = new ProduitController();
    $produit = new Produit($name, $description, $price, $quantite, $category_id, $imagePath);
    $produit->setIdProduit($id);

    $success = $controller->modifierProduit($produit);

    if ($success) {
        header('location:afficheproduit.php');
    } else {
        echo "Erreur lors de la mise à jour du produit.";
    }
} else {
    echo "Invalid request.";
}
?>
