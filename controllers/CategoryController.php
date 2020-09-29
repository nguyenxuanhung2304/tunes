<?php
$path = realpath(__DIR__);
include_once $path.'/../models/Database.php'
?>

<?php
class CategoryController
{
    private $database;
    public function __construct()
    {
        $this->database = new Database();
    }

    public function findProduct($id)
    {
        $query = "SELECT * FROM tbl_product WHERE product_id = '$id'";
        return $this->database->select($query);
    }

    public function deleteCategory($categoryId): void
    {
        $query = "DELETE FROM tbl_category WHERE id = '$categoryId'";
        $this->database->delete($query);
    }

    public function showCategory()
    {
        $query = "SELECT * FROM tbl_category ORDER BY id DESC";
        return $this->database->select($query);
    }

    public function updateCategory($categoryId, $categoryName)
    {
        $categoryName = mysqli_real_escape_string($this->database->link, $categoryName);
        $categoryId = mysqli_real_escape_string($this->database->link, $categoryId);

        if (empty($categoryName)) {
            return "<div class='alert alert-warning'>Category name must be not empty!</div>";
        } else {
            $query = "UPDATE tbl_category SET `name` = '$categoryName' WHERE id = '$categoryId'";
            $this->database->update($query);

            return '<script>window.location.replace("catlist.php")</script>';
        }
    }

    public function findCategory($categoryId)
    {
        $query = "SELECT * FROM tbl_category WHERE id = '$categoryId' LIMIT 1";
        return $this->database->select($query);
    }

    public function addCategory($categoryName): ?string
    {

        $categoryName = mysqli_real_escape_string($this->database->link, $categoryName);

        // check empty
        if (empty($categoryName)) {
            return "<div class='alert alert-warning'>Category name must be not empty!</div>";
        } else {
            $query = "INSERT INTO tbl_category(`name`) VALUES('$categoryName')";
            $row = $this->database->insert($query);

            if ($row !== false) {
                return "<div class='alert alert-success'>Add category name success!</div>";
            } else {
                return "<div class='alert alert-warning'>Add category name failed!</div>";
            }
        }
    }
}
?>