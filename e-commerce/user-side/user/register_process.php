<?php
include_once('../../controllers/userControllers.php');
include_once('../../models/User.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);


    $user = new User(null, $username, $email, $password);

 
    $userController = new UserController();
    $success = $userController->insert($user);

    if ($success) {
        header("Location: login.php");
        exit();
    } else {
        echo "Une erreur s'est produite lors de l'inscription.";
    }
}
?>