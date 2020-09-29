<?php
$path = realpath(__DIR__);
include_once $path. '/../models/Database.php';
?>

<?php


class ProductController
{
    
    private Database $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function oldProduct($category_id)
    {
        $query = "SELECT * FROM tbl_product WHERE id = '$category_id' LIMIT 4 ";
        return $this->database->select($query);
    }

    public function deleteProduct($productId): void
    {
        $query = "DELETE FROM tbl_product WHERE id = '$productId' ";
        $this->database->delete($query) or die($this->database->error);
    }

    public function showProduct()
    {
        $query = "SELECT * FROM tbl_product ORDER BY category_id DESC";
        return $this->database->select($query);
    }

    public function updateProduct($categoryId,$productId, $productName, $price, $image)
    {
        if (empty($categoryId) || empty($productName) || empty($price) || empty($image)) {
            return "<div class='alert alert-warning'>Field must be not empty!</div>";
        } else {
            $query = "UPDATE tbl_product SET category_id = '$categoryId', `name` = '$productName',
            price = '$price', image = '$image' WHERE id = '$productId' ";
            $this->database->update($query);
            return '<script>window.location.replace("productlist.php")</script>';
        }
    }

    public function findCategory($categoryId)
    {
        $query = "SELECT * FROM tbl_category WHERE id = '$categoryId' LIMIT 1";
        return $this->database->select($query);
    }

    public function findProduct($productId)
    {
        $query = "SELECT * FROM tbl_product WHERE id = '$productId' LIMIT 1";
        return $this->database->select($query);
    }

    public function addProduct($categoryId, $productName, $productPrice, $file,$description)
    {
        //Image
        $imageName = basename($file['name']);
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($file["name"]);

        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            echo "The file " . basename($file["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        // check empty
        if (empty($categoryId) || empty($productName) || empty($productPrice) || empty($description)) {
            return "<div class='alert alert-warning'>Field name must be not empty!</div>";
        }

        $query = "INSERT INTO tbl_product(`name`,category_id,price,`image`,`description`)
        VALUES('$productName','$categoryId','$productPrice','$imageName','$description')";
        $row = $this->database->insert($query);

        if ($row !== false) {
            return "<div class='alert alert-success'>Add product success!</div>";
        }
        return "<div class='alert alert-warning'>Add product name failed!</div>";
    }
}