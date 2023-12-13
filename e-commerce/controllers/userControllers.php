<?php

include_once('../../database/config.php');
include_once(__DIR__ . '/../models/User.php');




class UserController extends Connexion
{
    function __construct()
    {
        parent::__construct();
    }

    function insert(User $user)
    {
        $query = "INSERT INTO users (username,email, password) 
                  VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($query);

        $array = array(
            $user->getUsername(),
            $user->getEmail(),
            $user->getPassword()
        );

        return $stmt->execute($array);
    }


    function authenticate($username, $password) {
        $query = "SELECT * FROM users WHERE username = ?";
        
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && password_verify($password, $user['password'])) {
            return new User($user['id'], $user['username'], $user['email'], $user['password']);
        } else {
            return null;
        }
    }
    
    function getUserById($userId) {
        
        $database = new Connexion();
        $db = $database->getPDO();
    
        $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
   



}
?>
