<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <title>Ajouter Produits</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            
        background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 130vh;
        }
        
        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            width: 70%;
            margin: 20px auto;
            margin-bottom: 50px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #ccc; 
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #555; 
            border-radius: 6px;
            font-size: 16px;
            background-color: #555;
            color: #fff;
        }

        input[type="file"] {
            cursor: pointer;
        }

        .custom-file-label {
            color: #ccc; 
        }

        .custom-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }

        .custom-buttons button {
            flex: 1;
            padding: 10px; 
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .custom-buttons #add-btn {
            background-color: #2196F3;
            color: white;
            margin-right: 10px;
        }

        .custom-buttons #cancel-btn {
            background-color: #FF3D00; 
            color: white;
            margin-left: 10px;
        }

        .form-heading {
            text-align: center;
            font-size: 24px;
            color: black; 
            margin-bottom: 30px;
            font-weight:900 ;
        }
    </style>
    <?php
        include_once('parts/navbar.php');
    ?>
</head>

<body>
    <form action="ajoutproduit-action.php" method="post" enctype="multipart/form-data">
        <div class="form-heading">Ajouter Produits</div>

        <label for="nom">Nom Produit:</label>
        <input type="text" class="form-control" name="nom" id="nom" required>

        <label for="image">Image:</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="image" id="image" accept="image/*" required>
            <label class="custom-file-label" for="image">choisir une photo</label>
        </div>

        <label for="description">Description:</label>
        <input type="text" class="form-control" name="description" id="description">

        <label for="prix">Prix:</label>
        <input type="text" class="form-control" name="prix" id="prix">

        <label for="qt">Quantite en Stock:</label>
        <input type="text" class="form-control" name="qt" id="qt">

        <label for="categorie">Catégorie :</label>
        <select class="form-control" name="category_id" id="categorie" required>
            <?php
                require_once('../controllers/CategoryController.php');
                $categories = new CategoryController();
                $categories = $categories->getCategories();
                foreach ($categories as $category) {
                    echo "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
                }
            ?>
        </select>

        <div class="custom-buttons">
            <button type="submit" name="submit" id="add-btn" class="btn btn-success">Ajouter</button>
            <button type="reset" id="cancel-btn" class="btn btn-danger">Annuler</button>
        </div>
    </form>
</body>

</html>
