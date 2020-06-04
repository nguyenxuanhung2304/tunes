<?php

include_once('./controllers/CartController.php');
$cartController = new CartController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartController->deleteItem($_POST['itemId']);
    echo "<script>window.location.replace('cart.php')</script>";
}
