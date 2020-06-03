<?php include_once 'inc/sidebar.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once '../controlllers/ProductController.php' ?>
<?php include_once '../controlllers/CategoryController.php' ?>

<?php
// Display product
$productController = new ProductController();
$categoryController = new CategoryController();

if ($_SERVER['REQUEST_METHOD'] === "GET" && $_GET['productId'] !== NULL) {
    $productEdit = $productController->findProduct($_GET['productId'])->fetch_assoc();
    $categoryId = $productEdit['categoryId'];
    $categoryEdit = $productController->findCategory($categoryId)->fetch_assoc();
}


// Edit product

if ($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['submit'] !== NULL) {
    $categoryId = $_POST['categoryId'];
    $productName = $_POST['productName'];
    $price = $_POST['productPrice'];
    $image = basename($_FILES['productImage']['name']);
    $productId = $_POST['productId'];

    $alert = $productController->updateProduct($categoryId,$productId,$productName,$price,$image);
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
                        <input type="hidden" name="productId" value="<?php echo $_GET['productId'] ?>">
                        <input value="<?php echo $productEdit['productName'] ?>" type="text" name="productName" id=""
                               class="form-control mb-2"
                               placeholder="Please enter product name" aria-describedby="helpId">
                        <select type="text" name="categoryId" id="" class="form-control mb-2"
                                placeholder="Please enter category name" aria-describedby="helpId">

                            <option value="<?php echo $categoryEdit['id'] ?>">
                                <?php echo $categoryEdit['categoryName'] ?>
                            </option>
                            
                            <?php
                            $categoryList = $categoryController->showCategory();
                            if ($categoryList) {
                                while ($category = $categoryList->fetch_assoc()) {
                                    
                                    ?>

                                    <option value="<?php echo $category['id'] ?>">
                                        <?php echo $category['categoryName'] ?>
                                    </option>

                                <?php }
                            } ?>

                        </select>
                        <input value="<?php echo $productEdit['price'] ?>" type="text" name="productPrice" id=""
                               class="form-control"
                               placeholder="Please enter price" aria-describedby="helpId">
                        <input name="productImage" type="file" class="form-control">

                        <input class="btn btn-primary mt-2" type="submit" name="submit" value="Save">
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
