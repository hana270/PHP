<?php

include_once(__DIR__ . '/../database/config.php'); 
class ContactController extends Connexion {
    public function __construct() {
        parent::__construct(); 
    }


     function getMessages() {
       
            $stmt = $this->pdo->query('SELECT * FROM messages ORDER BY created_at DESC');
            $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $messages;
    }

     function submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            
            $this->saveToDatabase($name, $email, $message);

            header('Location: ?controller=contact&action=index&success=true');
            exit();
        }
    }

    function saveToDatabase($name, $email, $message) {
            $stmt = $this->pdo->prepare('INSERT INTO messages (name, email, message) VALUES (?, ?, ?)');
            $stmt->execute([$name, $email, $message]);
        
    }

    public function getallMessages() {
        $query = 'SELECT * FROM messages';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $messages;
    }
    
}










?>