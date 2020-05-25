<?php include '../controlller/CategoryController.php' ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === "GET" && $_GET['categoryId'] !== NULL)  {
    $categoryController = new CategoryController();
    $categoryController->deleteCategory($_GET['categoryId']);
    return "<div class='alert alert-success'>Category Update successfully!</div>";
    header("Location:catlist.php");
} else {
    return "<div class='alert alert-warning'>Category Update not success!</div>";
}
?>