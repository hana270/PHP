<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Update Produit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <?php
    require_once('../controllers/ProduitController.php');
    require_once('../controllers/CategoryController.php');
    include_once("../database/config.php");
    include_once("../models/Produit.php");

    $produitModel = new ProduitController();
    $categoryController = new CategoryController();

    $produit = $produitModel->getProduit($_GET['id']);
    $categories = $categoryController->getCategories();
    $selectedCategory = $produit['category_id'];
    ?>

    <form action="update_produit_action.php" method="post" enctype="multipart/form-data">
        <h3 style="margin-left:400px;">Mise a jour de Produit </h3>
        <input type="hidden" name="id" value="<?php echo $produit['id']; ?>">
        
        <div class="form-group">
            <label for="name">Nom Produit:</label>
         <input type="text" class="form-control" name="name" value="<?php echo $produit['name']; ?>">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" name="description" value="<?php echo $produit['description']; ?>">
        </div>

        <div class="form-group">
    <label for="image">Image:</label>
    <?php if ($produit['image_path']) : ?>
        <img src="<?php echo '../images/' . htmlspecialchars($produit['image_path']); ?>" alt="Product Image" class="img-thumbnail mt-2" style="max-width: 200px; max-height: 200px;">
    <?php endif; ?>
    <input type="file" class="form-control-file" name="image" id="image" accept="image/*">
</div>


        <div class="form-group">
            <label for="price">Prix:</label>
            <input type="text" class="form-control" name="price" value="<?php echo $produit['price']; ?>">
        </div>

        <div class="form-group">
            <label for="quantite">Quantité en Stock:</label>
            <input type="text" class="form-control" name="quantite" value="<?php echo $produit['quantite']; ?>">
        </div>

        <div class="form-group">
            <label for="category_id">Catégorie :</label>
            <select class="form-control" name="category_id">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['id']; ?>" <?php echo ($category['id'] == $selectedCategory) ? 'selected' : ''; ?>>
                        <?php echo $category['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Mettre à Jour</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
