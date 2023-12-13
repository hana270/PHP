<?php
require_once('../models/Category.php');
require_once('../controllers/CategoryController.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoryName = $_POST['nomcategorie'];

    $controller = new CategoryController();
    $category = new Category();
    $category->setName($categoryName);
    $controller->insert($category);
}

header("Location: list_categories.php");

?>
