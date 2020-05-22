<?php include_once 'inc/sidebar.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once '../controlller/CategoryController.php'; ?>

<?php
$categoryController = new CategoryController();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $categoryName = $_POST['categoryName'];
    $alert = $categoryController->create($categoryName);
}
?>

<div class="row justify-content-center align-content-center">
    <div class="col-lg-4 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 text-center">
                <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
                <?php
                if (isset($alert)) {
                    echo $alert;
                }
                ?>
            </div>
            <form method="POST" action="catadd.php">
                <div class="form-group text-center">
                    <input type="text" name="categoryName" id="" class="form-control" placeholder="Please enter category name" aria-describedby="helpId">
                    <input class="btn btn-primary mt-2" type="submit" name="" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>