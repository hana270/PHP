<?php

include_once('../../models/Commande.php');
include_once('../../controllers/CommandeController.php');

$productId = isset($_GET['id']) ? $_GET['id'] : null;

$confirmationMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $commande = new Commande();

  
    $commande->setNom($_POST['nom']);
    $commande->setNomFamille($_POST['nom_famille']);
    $commande->setEmail($_POST['email']);
    $commande->setAdresse($_POST['adresse']);
    $commande->setQteCom($_POST['qte_com']);
    $commande->setTelephone($_POST['telephone']);


    $commande->setCreatedAt(date('Y-m-d H:i:s')); 
    $commande->setPrixCom(0);
    $commande->setTotalCom(0); 
    $commande->setProductId($productId); 
$commande->setTelephone($_POST['telephone']);
   
    $commandeController = new CommandeController();
    $commandeController->insert($commande);
    $confirmationMessage = 'Merci pour votre commande!';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Commande</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .butt{
margin-left: 1000px;color: black;background-color: black;
border-radius: 6px;background-size: cover;font-size: large;
        }
        .butt:hover{
            color: black;
            background-color: white;
        }
        .butt:focus{
            color:blueviolet;
            background-color: white;
            size: 20px;
        }

    </style>
</head>
<body>
          


    <div class="container mt-3">
        <?php if (!empty($confirmationMessage)) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $confirmationMessage; ?>
            </div>
        <?php endif; ?>
        <button class="butt"> 
        <a  href="logout.php" style="color:brown;font-weight: 600;">Déconnexion</a>
    </button> 
        <h2>Formulaire de Commande</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?id=' . $productId); ?>" method="post">
            <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
            
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Donner Votre Nom" required>
        </div>

        <div class="form-group">
            <label for="nom_famille">Nom de famille:</label>
            <input type="text" class="form-control" id="nom_famille" name="nom_famille" placeholder="Votre Nom du Famille" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Donner Votre Adresse Email" required>
        </div>
        <div class="form-group">
    <label for="telephone">Téléphone:</label>
    <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Entrez votre numéro de téléphone" required>
</div>
        <div class="form-group">
            <label for="adresse">Adresse:</label>
            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Entrez Votre Adresse " required>
        </div>
        <div class="form-group">
            <label for="qte_com">Quantite:</label>
            <input type="Number" class="form-control" id="qte_com" name="qte_com" placeholder="Donner la quantite" required>
        </div>
            <button type="submit" class="btn btn-success">Valider la Commande</button>
  
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
