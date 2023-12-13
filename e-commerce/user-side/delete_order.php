<?php

include_once('../controllers/CommandeController.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['order_id'])) {
        $orderController = new CommandeController();
        $orderController->deleteOrder($_POST['order_id']);
        header('Location: admin_orders.php');
        exit();
    }
}
?>