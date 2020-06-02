<?php include_once 'inc/sidebar.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once '../controlllers/ProductController.php' ?>
<?php include_once '../controlllers/CategoryController.php' ?>

<?php
// Display product
$productController = new ProductController();
$categoryController = new CategoryController();
$categoryList = $categoryController->showCategory();
$productId = '';

if ($_SERVER['REQUEST_METHOD'] === "GET" && $_GET['productId'] !== NULL) {
    $productEdit = $productController->findProduct($_GET['productId'])->fetch_assoc();
    $productId = $productEdit['productId'];
    $categoryId = $productEdit['categoryId'];
    $categoryEdit = $productController->findCategory($categoryId)->fetch_assoc();
}

// Edit product
if ($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['submit'] !== NULL) {
    $categoryId = $_POST['categoryId'];
    $productName = $_POST['productName'];
    $price = $_POST['productPrice'];
    $productDesc = $_POST['productDesc'];
    $image = basename($_FILES['productImage']['name']);

    $alert = $productController->updateProduct($categoryId,$productId,$productName,$productDesc,$price,$image);
}
?>

<div class="row justify-content-center align-content-center">
    <div class="col-lg-4 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 text-center">
                <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
                <?php
                if (isset($alert)) {
                    echo $alert;
                }
                ?>
            </div>
            <?php
            if (isset($productEdit)) {
                ?>
                <form method="POST" action="productedit.php" enctype="multipart/form-data">
                    <div class="form-group text-center">

                        <input value="<?php echo $productEdit['productName'] ?>" type="text" name="productName" id=""
                               class="form-control mb-2"
                               placeholder="Please enter product name" aria-describedby="helpId">
                        <select type="text" name="categoryId" id="" class="form-control mb-2"
                                placeholder="Please enter category name" aria-describedby="helpId">
                            <?php
                            if ($categoryList) {
                                while ($row = $categoryList->fetch_assoc()) {

                                    ?>

                                    <option value="<?php echo $row['categoryId'] ?>">
                                        <?php echo $row['categoryName'] ?>
                                    </option>

                                <?php }
                            } ?>

                        </select>
                        <input value="<?php echo $productEdit['price'] ?>" type="text" name="productPrice" id=""
                               class="form-control"
                               placeholder="Please enter price" aria-describedby="helpId">
                        <label for="">Description</label>
                        <label>
                            <textarea name="productDesc" cols="42" rows="5"></textarea>
                        </label>
                        <input name="productImage" type="file" class="form-control">

                        <input class="btn btn-primary mt-2" type="submit" name="submit" value="Save">
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
