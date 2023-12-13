<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Confirmation de suppression</title>
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
        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
        }

        .btn-danger {
            margin-right: 10px;
        }
        h2{
            color:black;font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        require_once('../controllers/produitController.php');

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $idProduit = $_GET['id'];

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_delete'])) {
                $controller = new ProduitController();
                $success = $controller->delete($idProduit);

                if ($success) {
                    echo '<div class="alert alert-success" role="alert">Produit supprimé avec succès.</div>';
                    echo '<a href="afficheproduit.php" class="btn btn-primary">Retour à la liste des produits</a>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Erreur lors de la suppression du produit.</div>';
                }
            } else {

                echo "<h2>Êtes-vous sûr de vouloir supprimer ce produit ?</h2>";
                echo '<form method="post">';
                echo '<button type="submit" name="confirm_delete" class="btn btn-danger">Oui</button>';
                echo '<a href="afficheproduit.php" class="btn btn-secondary">Non</a>';
                echo '</form>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">ID du produit non spécifié.</div>';
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
