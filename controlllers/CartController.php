<?php
$path = realpath(__DIR__);
include_once $path . '/../models/Database.php';
include_once $path . '/../controlllers/ProductController.php';
?>

<?php


class CartController
{
    private Database $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function addCart($productId)
    {
        $sessionId = session_id();
        $productController = new ProductController();
        $product = $productController->findProduct($productId)->fetch_assoc();
        $price = $product['price'];
        $quantity = 1;
        $image = $product['image'];
        $productName = $product['productName'];
        $productId = $product['productId'];

        $query = "INSERT INTO tbl_cart(productId,sessionId,productName,price,quantity,image) VALUES
        ('$productId','$sessionId','$productName','$price','$quantity','$image')";

        $result = $this->database->insert($query);

        if($result){
            return "<div class='alert alert-success'>Add product to cart success!</div>";
        }
            return "<div class='alert alert-danger'>Add product to cart failed!</div>";
    }

    public function showCart()
    {
        $query = "SELECT * FROM tbl_cart";
        return $this->database->select($query);
    }

    public function updateQuantity($quantity,$id)
    {
        $query = "UPDATE tbl_cart SET quantity = '$quantity' WHERE id = '$id'";
        $result = $this->database->insert($query);
        
        if ($result) {
            return '<div class"alert alert-success">Update the quantity success!</div>';
        }
            return '<div class"alert alert-danger">Update the quantity failed!</div>';
    }

    public function deleteItem($id)
    {
        $query = "DELETE FROM tbl_cart WHERE id = '$id'";
        $this->database->delete($query);
    }
}
