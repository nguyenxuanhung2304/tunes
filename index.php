<?php
include_once('./include/header.php');
include_once('./function/truncateStringWords.php');
?>

<?php
$allCategory = $categoryController->showCategory();
?>


<div class="container-fluid bg-light-gray">

<!-- Start if -->
<?php
if (!empty($newProduct) || !empty($allCategory)) {

    while ($category = $allCategory->fetch_assoc()) {
        $oldProduct = $productController->oldProduct($category['id']);
?>


    <div class="container pt-5">
        <div class="row">
            <h3>
                <?php echo $category['categoryName'] ?>
            </h3>
        </div>
        <div class="underline"></div>
    </div>

    <div class="container mt-5">
        <div class="row">

            <?php
         while (($product = $oldProduct->fetch_assoc() )) {
            ?>

            <div class="col-md-3">
                <div class="card">
                    <img src="admin/uploads/<?php echo $product['image'] ?>" class="card-img-top">
                    <div class="card-body">
                        <h5>
                            <?php
                            // gioi han tu hien thi
                             echo truncateStringWords($product['productName'],50);
                              ?>
                        </h5>
                        <h5>
                            <?php echo $product['price'] ?> VND
                        </h5>
                        <button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To
                            Cart
                        </button>
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