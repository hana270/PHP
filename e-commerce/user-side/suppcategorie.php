<?php
include ('../controllers/CategoryController.php');
$categoryId = isset($_GET['id']) ? $_GET['id'] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category=new CategoryController();
    $success = $category->delete($categoryId); 

    if ($success) {
        header("Location: list_categories.php");
        exit();
    } else {
        $error_message = "Failed to delete the category.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Delete Category Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px; 
        }

        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color:black;
        }

        p {
            margin-bottom: 30px; color:black;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Delete Category Confirmation</h2>
        <p>Are you sure you want to delete this category?</p>

        <?php if (isset($error_message)) { ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php } ?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?id=' . $categoryId); ?>" method="post">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <br>
        <a href="list_categories.php" class="btn btn-secondary">Cancel</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
