<?php include_once 'inc/sidebar.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once '../controlller/CategoryController.php'; ?>

<?php
$categoryController = new CategoryController();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $categoryName = $_POST['categoryName'];
    $alert = $categoryController->addCategory($categoryName);
}
?>

<div class="row justify-content-center align-content-center">
    <div class="col-lg-4 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 text-center">
                <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>
                <?php
                if (isset($alert)) {
                    echo $alert;
                }
                ?>
            </div>
            <form method="POST" action="catadd.php">
                <div class="form-group text-center">
                                        
                    <input type="text" name="productName" id="" class="form-control mb-2" placeholder="Please enter product name" aria-describedby="helpId">
                    <select type="text" name="categoryName" id="" class="form-control mb-2" placeholder="Please enter category name" aria-describedby="helpId">
                        <option>Select Category</option>
                        <option value="1">Điện thoại - Máy tính bảng</option>
                    </select>
                    <input type="text" name="productName" id="" class="form-control" placeholder="Please enter price" aria-describedby="helpId">
                    <input type="file" class="form-control">
                    
                    <input class="btn btn-primary mt-2" type="submit" name="" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>