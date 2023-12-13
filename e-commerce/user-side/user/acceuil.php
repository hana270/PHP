<?php
include('navbaruser.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            position: relative;
        }

        .container-fluid {
            position: relative;
            height: 100vh;
            background: url('../../images/gr.jpg') center center / cover no-repeat fixed;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .welcome-text {
            text-align: center;
        }

        .welcome-text h2 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .welcome-text p {
            font-size: 1.5em;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="overlay"></div>
        <div class="welcome-text">
            <p>DECOUVREZ VOTRE NOUVELLE PASSION</p>
            <h2>Produits de maquillage à base minérale</h2>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
