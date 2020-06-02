<?php
include '../controlllers/ProductController.php';
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['productId'] !== NULL) {
    $productController = new ProductController();
    $productController->deleteProduct($_GET['productId']);
    header("Location:productlist.php?");
} else {
    header("Location:productlist.php");
}

?>

