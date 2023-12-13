<?php
require_once('../models/Category.php');
require_once('../controllers/CategoryController.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoryId = $_POST['category_id'];
    $categoryName = $_POST['nomcategorie'];

    $controller = new CategoryController();
    $category = new Category();
    $category->setIdCategory($categoryId);
    $category->setName($categoryName);

    $controller->updateCategory($category);
}

header("Location: list_categories.php");


?>