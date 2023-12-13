<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            margin: 20px auto;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
            font-size: 16px;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .container-results {
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .table img {
            max-width: 100px;
            height: auto;
            border-radius: 8px;
        }
    </style>
    <?php include_once('parts/navbar.php'); ?>
</head>

<body>

    <form action="recherche.php" method="get" class="container">
        <div class="form-group">
            <label for="category">Rechercher par catégorie:</label>
            <select id="category" name="category" class="form-control" required>
                <?php
                require_once('../controllers/CategoryController.php');
                $categories = new CategoryController();
                $categories = $categories->getCategories();
                foreach ($categories as $category) {
                    echo "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Rechercher par catégorie</button>
    </form>

    <div class="container container-results">
        <h2>Résultats de la recherche</h2>

        <?php
        require_once('../controllers/produitController.php');

        if (isset($_GET['category'])) {
            $categoryId = $_GET['category'];

            $controller = new ProduitController();
            $results = $controller->getProductsByCategory($categoryId);

            if ($results) {
                echo "<div class='table-responsive'>";
                echo "<table class='table table-bordered'>";
                echo "<thead class='thead-dark'>";
                echo "<tr><th>ID Produit</th><th>Nom</th><th>Description</th><th>Image</th><th>Prix</th><th>Quantité en Stock</tr>";
                echo "</thead><tbody>";

                foreach ($results as $result) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($result['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($result['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($result['description']) . "</td>";
                    echo "<td><img src='../images/" . htmlspecialchars($result['image_path']) . "' alt='Image' class='img-fluid' height='120px' width='150px'></td>";
                    echo "<td>" . htmlspecialchars($result['price']) . "</td>";
                    echo "<td>" . htmlspecialchars($result['quantite']) . "</td>";
                    echo "</tr>";
                }

                echo "</tbody></table>";
                echo "</div>";
            } else {
                echo "<p>Aucun résultat trouvé pour cette catégorie.</p>";
            }
        } else {
            echo "<p>Veuillez sélectionner une catégorie.</p>";
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
