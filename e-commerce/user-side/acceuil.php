<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
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

        .navbar {
            background-color: whitesmoke;
        }

        .jumbotron {
            background-color: rgba(0, 0, 0, 0.5); 
            padding: 20px;
            margin-top: 50px; }

        .jumbotron h1,
        .jumbotron p {
            color: black;
            font-weight: 800;
        }

        .container {
            margin-top: 20px; 
        }

        .card {
            background: rgba(255, 255, 255, 0.8);
            margin-bottom: 20px;
        }

        .card-body a {
            color: #000000; 
            text-decoration: none;
        }

        .card-body a:hover {
            color:saddlebrown; 
        }

        .contact-icons {
            text-align: center;
        }

        .contact-icons p {
            margin-bottom: 10px;
        }

        .contact-icons i {
            margin-right: 10px;
            font-size: 20px;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <?php include_once('parts/navbar.php'); ?>

    <div class="jumbotron">
        <h1 class="display-4">Bienvenue dans l'Interface d'Administration</h1>
        <p>Gérez facilement les catégories et les produits de votre boutique en ligne.</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <a href="afficheproduit.php"><h3 class="card-title">Gérer Produits</h3></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <a href="list_categories.php"><h3 class="card-title">Gérer Catégories</h3></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
