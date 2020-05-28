<?php include '../models/Database.php' ?>

<?php


class ProductController
{
    private Database $database;
    public function __construct()
    {
        $this->database = new Database();
    }

    public function deleteProduct($productId): void
    {
        $query = "DELETE FROM tbl_category WHERE categoryId = '$productId'";
        $this->database->delete($query);
    }

    public function showProduct()
    {
        $query = "SELECT * FROM tbl_product ORDER BY categoryId DESC";
        return $this->database->select($query);
    }

    public function updateProduct($categoryId, $categoryName)
    {
        $categoryName = mysqli_real_escape_string($this->database->link, $categoryName);
        $categoryId = mysqli_real_escape_string($this->database->link, $categoryId);

        if (empty($categoryName)) {
            return "<div class='alert alert-warning'>Category name must be not empty!</div>";
        } else {
            $query = "UPDATE tbl_category SET categoryName = '$categoryName' WHERE categoryId = '$categoryId'";
            $row = $this->database->update($query);
            if ($row) {
                return "<div class='alert alert-success'>Category Update successfully!</div>";
            } else {
                return "<div class='alert alert-warning'>Category Update not success!</div>";
            }
        }
    }

    public function findCategory($categoryId)
    {
        $query = "SELECT * FROM tbl_category WHERE categoryId = '$categoryId' LIMIT 1";
        return $this->database->select($query);
    }

    public function addProduct($categoryId,$productName,$productPrice,$productDesc,$file): ?string
    {
        //Image
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($file["productImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($file["productImage"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to uploads file
        } else {
            if (move_uploaded_file($file["productImage"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $file["productImage"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        // check empty
        if (empty($categoryId) || empty($productName) || empty($productDesc) || empty($productPrice)) {
            return "<div class='alert alert-warning'>Field name must be not empty!</div>";
        } else {
            $query = "INSERT INTO tbl_product(productName,categoryId,productDesc,price,image)
            VALUES('$productName','$categoryId','$productDesc','$productPrice','$target_file')";
            $row = $this->database->insert($query);

            if ($row !== false) {
                return "<div class='alert alert-success'>Add product success!</div>";
            } else {
                return "<div class='alert alert-warning'>Add product name failed!</div>";
            }
        }
    }
}