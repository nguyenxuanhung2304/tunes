<?php include_once 'inc/sidebar.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once '../controlllers/ProductController.php'?>
<?php include_once '../controlllers/CategoryController.php'?>

<?php
$productController = new ProductController();
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])) {
    $categoryId = $_POST['categoryId'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productDesc = $_POST['productDesc'];
    $alert = $productController->addProduct($categoryId,$productName,$productDesc,$productPrice,$_FILES);
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
            <form method="POST" action="productadd.php" enctype="multipart/form-data">
                <div class="form-group text-center">

                    <input type="text" name="productName" id="" class="form-control mb-2" placeholder="Please enter product name" aria-describedby="helpId">
                    <select type="text" name="categoryId" id="" class="form-control mb-2" placeholder="Please enter category name" aria-describedby="helpId">
                        <option>Select Category</option>

                        <?php
                        $categoryController = new CategoryController();
                        $categoryList = $categoryController->showCategory();
                        if ($categoryList){
                            while($row = $categoryList->fetch_assoc()){

                            ?>

                        <option value="<?php echo $row['categoryId'] ?>">
                            <?php echo $row['categoryName'] ?>
                        </option>

                        <?php }
                        }?>

                    </select>
                    <input type="text" name="productPrice" id="" class="form-control" placeholder="Please enter price" aria-describedby="helpId">
                    <label for="">Description</label>
                    <textarea name="productDesc" cols="42" rows="5"></textarea>
                    <input name="productImage" type="file"x class="form-control">
                    
                    <input class="btn btn-primary mt-2" type="submit" name="submit" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>