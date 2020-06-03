<?php 
include_once('./controlllers/CartController.php');
?>

<?php 
$cartController = new CartController();

if ($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['submit'] !== NULL) {
	$productId = $_POST['productId'];
	$product = $cartController->addCart($productId);
    echo "<script>window.location.replace('cart.php')</script>";
}
?>