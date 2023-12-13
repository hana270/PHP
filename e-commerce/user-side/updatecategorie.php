<?php
require_once('../controllers/CategoryController.php');

if (isset($_GET['id'])) {
    $categoryId = $_GET['id'];
    $categoryController = new CategoryController();
    $categoryDetails = $categoryController->getCategory($categoryId);
} else {
    header("Location: list_categories.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Update Category</title>
    <?php include_once('parts/navbar.php'); ?>
</head>
<body>

    <div class="container">
        <h2>Update Category</h2>
        <form action="updatecategorie-action.php" method="post">
            <input type="hidden" name="category_id" value="<?php echo $categoryId; ?>">
            <label>Nom de la catégorie:</label>
            <input type="text" name="nomcategorie" value="<?php echo $categoryDetails['name']; ?>" required>
            <button type="submit">Modifier</button>
        </form>
    </div>
</body>
</html>
