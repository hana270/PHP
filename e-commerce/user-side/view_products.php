<?php
require_once('../controllers/produitController.php');

if (isset($_GET['category_id'])) {
    $categoryId = $_GET['category_id'];
    $productController = new ProduitController();
    $products = $productController->getProductsByCategory($categoryId);
    $categoryName = $productController->getCategoryName($categoryId);
} else {

    header("Location: list_categories.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Products in <?php echo $categoryName; ?></title>
    <?php include_once('parts/navbar.php'); ?>
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-4">Products in <?php echo $categoryName; ?></h2>
        <ul class="list-group">
    <?php foreach ($products as $product): ?>
        <a href="view_details.php?id=<?php echo $product['id']; ?>" class="list-group-item list-group-item-action">
            <?php echo $product['name']; ?>
        </a>
    <?php endforeach; ?>
</ul>

        <button class="btn btn-primary mt-3"><a href="list_categories.php" class="text-white">Retour</a></button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
