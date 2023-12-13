<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/MyWork/e-commerce/models/Commande.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/MyWork/e-commerce/controllers/CommandeController.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/MyWork/e-commerce/database/Config.php');

class CommandeController extends Connexion{
    function __construct()
    {
        parent::__construct();
    }


    function insert(Commande $commande)
    {

        $productInfo = $this->getProductInfo($commande->getProductId());
    
        if ($productInfo) {
         
            $commande->setPrixCom($productInfo['price']);
            $commande->setTotalCom($productInfo['price'] * $commande->getQteCom());
            $query = "INSERT INTO commande (nom, nom_famille, email, adresse, qte_com, created_at, prix_com, total_com, product_id,telephone) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
            $res = $this->pdo->prepare($query);
    
            $array = array(
                $commande->getNom(),
                $commande->getNomFamille(),
                $commande->getEmail(),
                $commande->getAdresse(),
                $commande->getQteCom(),
                $commande->getCreatedAt(),
                $commande->getPrixCom(),
                $commande->getTotalCom(),
                $commande->getProductId(),
                $commande->getTelephone()
            );
    
            return $res->execute($array);
        } else {
   
            echo "Erreur: Informations du produit introuvables.";
            exit();
        }
    }
    function getProductInfo($productId)
{
    $query = "SELECT price FROM products WHERE id = ?";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$productId]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}
    



    function liste()
    {
        $query = "SELECT * FROM commande";
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

function getProductId($commandeId){
    $query = "SELECT product_id FROM commande WHERE id = ?";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$commandeId]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result ? $result['product_id'] : null;
}

function getOrderDetails($orderId, $productId)
{

    $query = "SELECT c.*, p.name AS nom_produit
              FROM commande c
              JOIN products p ON c.product_id = p.id
              WHERE c.id = ? AND c.product_id = ?";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$orderId, $productId]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        return false;
    }

    return $result;
}
function getOrdersWithProductDetails()
{
    $query = "SELECT c.*, p.name AS nom_produit, p.price
              FROM commande c
              JOIN products p ON c.product_id = p.id";
    $res = $this->pdo->prepare($query);
    $res->execute();
    return $res->fetchAll(PDO::FETCH_ASSOC);
}


function deleteOrder($orderId)
{
    $query = "DELETE FROM commande WHERE id = ?";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$orderId]);
}





}


?>
