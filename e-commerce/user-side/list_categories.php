<?php
require_once('../controllers/CategoryController.php');

$controller = new CategoryController();
$categories = $controller->listCategories();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('parts/navbar.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> 
    <title>Liste des catégories</title>
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
        span{
            color:black;font-weight: 600;
        }
        h2{
            color:black;font-weight:900;margin-top: 120px;margin-bottom: 50px;margin-left: 300px;background-color: transparent;
            box-shadow: inset;
        }
        list-group{
            margin-left: 60px;
        }

    </style>
</head>
<body>

    <div class="container mt-5" style="background-color: white;">
        <h2>Liste des catégories</h2>
        <ul class="list-group">
            <?php foreach ($categories as $category): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center" style="width: 1000px;margin-left:50px;">
                    <span><?php echo $category['name']; ?></span>
                    <div class="btn-group" role="group" aria-label="Category Actions">
                        <a href="view_products.php?category_id=<?php echo $category['id']; ?>" class="btn btn-primary btn-sm">View Details</a>
                        <a href="updatecategorie.php?id=<?php echo $category['id']; ?>" class="btn btn-warning btn-sm">Update</a>
                        <a href="suppcategorie.php?id=<?php echo $category['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
