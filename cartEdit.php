<?php 

include_once('./controlllers/CartController.php');
$cartController = new CartController();

if ($_SERVER['REQUEST_METHOD'] === "GET" && $_GET['quantity'] !== NULL) {
	$quantity = $_GET['quantity'];
	$alert = $cartController->updateQuantity($quantity, $_GET['itemId']);
    echo "<script>window.location.replace('cart.php')</script>";
}
?>