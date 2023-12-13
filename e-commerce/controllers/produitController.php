<?php
include_once(__DIR__ . '/../models/Produit.php');
include_once(__DIR__ . '/../database/config.php');
class ProduitController extends Connexion
{
    function __construct()
    {
        parent::__construct();
    }

    function insert(Produit $product)
    {
        $query = "INSERT INTO products (name, description, price, quantite, category_id, image_path) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $res = $this->pdo->prepare($query);
    
        $array = array(
            $product->getName() ?? '', // affecter un valeur par defaut si est null 
            $product->getDescription(),
            $product->getPrice(),
            $product->getQuantite(),
            $product->getCategoryID(),
            $product->getImage()
        );
        return $res->execute($array);
    }


    function getProduit($id)
    {
        $query = "SELECT * FROM products WHERE id = ?";
        $res = $this->pdo->prepare($query);
        $res->execute(array($id));
        $array = $res->fetch();
        return $array;
    }

    function delete($idProduit)
    {
        $query = "DELETE FROM products WHERE id=?";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($idProduit));
    }

    function liste()
    {
        $query = "SELECT * FROM products";
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    function modifierProduit(Produit $c)
{
    $query = "UPDATE products SET name=?, description=?, price=?, quantite=?, category_id=?, image_path=? WHERE id=?";

    $stmt = $this->pdo->prepare($query);
    $stmt->execute(array(
        $c->getName(),
        $c->getDescription(),
        $c->getPrice(),
        $c->getQuantite(),
        $c->getCategoryId(),
        $c->getImage(),
        $c->getId()
    ));

    return $stmt->rowCount();
}



    function liste_id($orderBy = '')
    {
        $query = "SELECT id, name, image_path, category_id, price, quantite FROM products " . $orderBy;
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductsByCategory($categoryId)
    {
        $query = "SELECT * FROM products WHERE category_id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$categoryId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoryName($categoryId)
    {
        $query = "SELECT name FROM categories WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$categoryId]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['name'] : null;
    }

    public function searchProductsByName($productName)
    {
        $query = "SELECT * FROM products WHERE name LIKE :name";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['name' => '%' . $productName . '%']);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>
