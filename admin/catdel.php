<?php include '../controlllers/CategoryController.php' ?>
<?php
echo 1;
if ($_SERVER['REQUEST_METHOD'] === "GET" && $_GET['categoryId'] !== NULL)  {
    echo 2;
    $categoryController = new CategoryController();
    $categoryController->deleteCategory($_GET['categoryId']);
    header('Location:catlist.php');
} else {
    echo 3;
    header("Location:catlist.php");
}
?>