<?php

include_once('parts/navbar.php');
include_once('../models/Commande.php');
include_once('../controllers/CommandeController.php');

$commandeController = new CommandeController();
$orders = $commandeController->getOrdersWithProductDetails();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Administration des Commandes</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Nom_Famille</th>
                    <th>E-mail</th>
                    <th>Adresse</th>
                    <th>Telephone</th>
                    <th>Quantite</th>
                    <th>Date de création</th>
                    <th>Nom du Produit</th>
                    <th>Prix Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo $order['id']; ?></td>
                    <td><?php echo $order['nom']; ?></td>
                    <td><?php echo $order['nom_famille']; ?></td>
                    <td><?php echo $order['email']; ?></td>
                    <td><?php echo $order['adresse']; ?></td>
                    <td><?php echo $order['telephone']; ?></td>
                    <td><?php echo $order['qte_com']; ?></td>
                    <td><?php echo $order['created_at']; ?></td>
                    <td><?php echo $order['nom_produit']; ?></td>
                    <td><?php echo $order['qte_com'] * $order['price']; ?></td>
                    <td>
                        <form method="post" action="delete_order.php"> 
                            <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
