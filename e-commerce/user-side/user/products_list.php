<?php
include_once('../../controllers/produitController.php');
$produitController = new ProduitController();

$products = [];
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $products = $produitController->searchProductsByName($searchTerm);
} else {

    $products = $produitController->liste();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page du Shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('../../images/up.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
            background-attachment: fixed; 
            margin: 0; 
        }

        .card {
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out; 
            height: 100%; 
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            transform: scale(1.05); 
        }

        .card-title {
            color: #333;
        }

        .card-text {
            color: #555; 
        }

        .button-container {
            margin-top: auto;
            text-align: center;
            padding: 10px;
        }

        .btn-motivating {
            background-color: #ff6f61; 
            color: #fff;
        }
        .search-bar {
            margin-bottom: 20px;
            text-align: center;
        }

        .search-bar input {
            width: 60%;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .search-bar button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-bar button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php include('navbaruser.php'); ?>
    <div class="container mt-3 search-bar">
        <form action="products_list.php" method="get">
            <input type="text" name="search" placeholder="Rechercher par nom de produit">
            <button type="submit">Rechercher</button>
        </form>
    </div>
    <div class="container mt-5">
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="../../images/<?php echo $product['image_path']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['name']; ?></h5>
                            <p class="card-text">Prix: <?php echo $product['price']; ?> €</p>
                        </div>

                        <div class="button-container">
                            <a href="login.php?id=<?php echo $product['id']; ?>" class="btn btn-primary btn-motivating">Commander</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>