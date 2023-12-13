<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <title>Détails du Produit</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px; 
        }

        h1 {
            color: #333;
        }

        .product-details {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 10px;
        }

        button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php
        include_once('parts/navbar.php');
        require_once('../controllers/produitController.php');

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $idProduit = $_GET['id'];

            $controller = new ProduitController();
            $produit = $controller->getProduit($idProduit);

            if ($produit) {
                echo "<div class='product-details'>";
                echo "<h1>Détails du Produit</h1>";
                echo "<p><strong>ID:</strong> " . htmlspecialchars($produit['id']) . "</p>";
                echo "<p><strong>Nom:</strong> " . htmlspecialchars($produit['name']) . "</p>";
                echo "<p><strong>Description:</strong> " . htmlspecialchars($produit['description']) . "</p>";
                $categoryName = $controller->getCategoryName($produit['category_id']);
                echo "<p><strong>Catégorie:</strong> " . htmlspecialchars($categoryName) . "</p>";
                if (!empty($produit['image_path'])) {
                    echo '<img src="../images/' . htmlspecialchars($produit['image_path']) . '" class="card-img-top" alt="Product Image">';
                }
                
                echo "<p><strong>Prix:</strong> " . htmlspecialchars($produit['price']) . "</p>";
                echo "<p><strong>Quantité en Stock:</strong> " . htmlspecialchars($produit['quantite']) . "</p>";
                echo "<button class='btn btn-primary'><a href='afficheproduit.php' style='color: white; text-decoration: none;'>Retour</a></button>";
                echo "</div>";
            } else {
                echo "<p class='text-danger'>Produit non trouvé.</p>";
            }
        } else {
            echo "<p class='text-danger'>ID du produit non valide.</p>";
        }
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
