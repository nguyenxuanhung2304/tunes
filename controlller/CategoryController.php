<?php
include_once '../models/Database.php';
include_once '../helpers/Format.php';
?>

<?php
class CategoryController
{
    private $database;
    private $format;
    public function __construct()
    {
        $this->database = new Database();
        $this->format = new Format();
    }

    public function create($categoryName)
    {
        //validation data
        $categoryName = $this->format->validation($categoryName);

        $categoryName = mysqli_real_escape_string($this->database->link, $categoryName);

        // check empty
        if (empty($categoryName)) {
            return "<div class='alert alert-warning'>Category name must be not empty!</div>";          
        } else {
            $query = "INSERT INTO tbl_category(categoryName) VALUES('$categoryName')";
            $row = $this->database->insert($query);

            if ($row !== false) {
                return "<div class='alert alert-success'>Add category name success!</div>";
            }else{
                return "<div class='alert alert-warning'>Add category name failed!</div>";                
            }
        }
    }
}
?>