<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <title>Liste des Produits</title>
    <style>
    body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: url('../images/up.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size:contain;
            color: white;

        }
.card {
    margin-bottom: 20px;
}

.product-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.card-body {
    height: 100px;
}

    </style>
</head>
<body>
    <?php
        include_once('parts/navbar.php');
        require_once('../controllers/ProduitController.php');
        $controller = new ProduitController();
        $res = $controller->liste_id('ORDER BY id');

        if ($res) {
            echo '<div class="container mt-5">';
            echo '<div class="row">';

            foreach ($res as $l) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card h-100">'; 
                
                echo '<h5 class="card-title text-center product-title">' . (isset($l['name']) ? htmlspecialchars($l['name']) : '') . '</h5>';
 
                echo '<img src="../images/' . htmlspecialchars($l['image_path']) . '" class="card-img-top" alt="Product Image">';
                echo '<div class="card-body">';
               
                echo '<p class="card-text"><strong>Prix :</strong> ' . (isset($l['price']) ? htmlspecialchars($l['price']) : '') . '</p>';
                echo '<p class="card-text"><strong>Quantite :</strong> ' . (isset($l['quantite']) ? htmlspecialchars($l['quantite']) : '') . '</p>';
                echo '</div>';
                echo '<div class="card-footer">';
                echo '<a href="view_details.php?id=' . htmlspecialchars($l['id']) . '" class="btn btn-primary btn-sm">View Details</a> ';
                echo '<a href="update_produit_view.php?id=' . htmlspecialchars($l['id']) . '" class="btn btn-warning btn-sm">Update</a> ';
                echo '<a href="delete.php?id=' . htmlspecialchars($l['id']) . '" class="btn btn-danger btn-sm">Delete</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }

            echo '</div>';
            echo '</div>';
        } else {
            echo "Problème lors de l'exécution de la requête.";
        }
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
