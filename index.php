<?php
include_once('./include/header.php');
include_once('./function/truncateStringWords.php');
include_once('./controllers/CategoryController.php');
include_once('./controllers/ProductController.php');
include_once('./controllers/UserController.php');
?>

<?php
$categoryController = new CategoryController();
$productController = new ProductController();
$userController = new UserController();

$allCategory = $categoryController->showCategory();
?>


<div class="container-fluid bg-light-gray">

    <?php
    if (!empty($allCategory)) {

        while ($category = $allCategory->fetch_assoc()) {
            $oldProduct = $productController->oldProduct($category['id']);
    ?>
            <div class="container pt-5">
                <div class="row">
                    <h3>
                        <?php echo $category['name'] ?>
                    </h3>
                </div>
                <div class="underline"></div>
            </div>

            <div class="container mt-5">
                <div class="row">

                    <?php
                    while (($product = $oldProduct->fetch_assoc())) {
                    ?>

                        <div class="col-md-3">
                            <div class="card">
                                <img src="admin/uploads/<?php echo $product['image'] ?>" class="card-img-top">
                                <div class="card-body">
                                    <form action="cartAdd.php" method="POST">
                                        <input value="<?php echo $product['productId'] ?>" type="hidden" name="productId">
                                        <h5>
                                            <?php
                                            // gioi han tu hien thi
                                            echo truncateStringWords($product['productName'], 50);
                                            ?>
                                        </h5>
                                        <h5>
                                            <?php echo $product['price'] ?> VND
                                        </h5>
                                        <button name="submit" type="submit" class="btn btn-danger">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i> Add To
                                            Cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>
            </div>

    <?php
        }
    } ?>
    <!--end if-->


    <!-- . End Content -->

    <?php include_once('./include/footer.php') ?>