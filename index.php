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


    <div class="container-fluid pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <h4>MOST WANTED</h4>
                    </div>
                    <div class="row">
                        <div class="underline-green"></div>
                    </div>
                    <div class="media mt-5">
                        <img src="img/belts-823257_1920-540x500.jpg" class="img-fluid mr-3" alt="media-img">
                        <div class="media-body mt-2">
                            <h5>FITT Belts</h5>
                            <h6>$3.00</h6>
                            <button class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"> Add To
                                    Cart</i></button>
                        </div>
                    </div>


                    <div class="media mt-5">
                        <img src="img/fashion-731827_1920-540x500.jpg" class="img-fluid mr-3" alt="media-img">
                        <div class="media-body mt-2">
                            <h5>magnolia dress</h5>
                            <h6>$34.00</h6>
                            <button class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"> Add To
                                    Cart</i></button>
                        </div>
                    </div>

                    <div class="media mt-5">
                        <img src="img/jeans-428614_1920-540x500.jpg" class="img-fluid mr-3" alt="media-img">
                        <div class="media-body mt-2">
                            <h5>Rocadi Jeans</h5>
                            <h6>$3.00</h6>
                            <button class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"> Add To
                                    Cart</i></button>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="row">
                        <h4>SCARFS</h4>
                    </div>
                    <div class="row">
                        <div class="underline-blue"></div>
                    </div>
                    <div class="media mt-5">
                        <img src="img/a-neckerchief-1317830_1920-540x500.jpg" class="img-fluid mr-3" alt="media-img">
                        <div class="media-body mt-2">
                            <h5>Istwic Scarf</h5>
                            <h6>$3.00</h6>
                            <button class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"> Add To
                                    Cart</i></button>
                        </div>
                    </div>


                    <div class="media mt-5">
                        <img src="img/a-neckerchief-1315912_1920-540x500.jpg" class="img-fluid mr-3" alt="media-img">
                        <div class="media-body mt-2">
                            <h5>Jennifer Scarf</h5>
                            <h6>$34.00</h6>
                            <button class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"> Add To
                                    Cart</i></button>
                        </div>
                    </div>

                    <div class="media mt-5">
                        <img src="img/a-neckerchief-1315916_1920-540x500.jpg" class="img-fluid mr-3" alt="media-img">
                        <div class="media-body mt-2">
                            <h5>Andora Scarf</h5>
                            <h6>$3.00</h6>
                            <button class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"> Add To
                                    Cart</i></button>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="row">
                        <h4>ON SALE</h4>
                    </div>
                    <div class="row">
                        <div class="underline-black"></div>
                    </div>
                    <div class="media mt-5">
                        <img src="img/woman-1484279_1920-540x500.jpg" class="img-fluid mr-3" alt="media-img">
                        <div class="media-body mt-2">
                            <h5>Marina Style</h5>
                            <h6>$3.00</h6>
                            <button class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"> Add To
                                    Cart</i></button>
                        </div>
                    </div>


                    <div class="media mt-5">
                        <img src="img/key-692199_1920-540x500.jpg" class="img-fluid mr-3" alt="media-img">
                        <div class="media-body mt-2">
                            <h5>Marina Style</h5>
                            <h6>$34.00</h6>
                            <button class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"> Add To
                                    Cart</i></button>
                        </div>
                    </div>

                    <div class="media mt-5">
                        <img src="img/cute-955782_1920-540x500.jpg" class="img-fluid mr-3" alt="media-img">
                        <div class="media-body mt-2">
                            <h5>Manago Shirt</h5>
                            <h6>$3.00</h6>
                            <button class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"> Add To
                                    Cart</i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid bg-light-gray pt-5 pb-5">
        <div class="container">
            <div class="row">
                <h4>FEATURED</h4>
            </div>
            <div class="row">
                <div class="underline"></div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <img src="img//pexels-photo-220449.jpeg" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h4>Black Shirt</h4>
                            <h6>$67.00</h6>
                            <button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To
                                Cart
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <img src="img//pexels-photo-731794.jpeg" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h4>Black Shirt</h4>
                            <h6>$67.00</h6>
                            <button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To
                                Cart
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <img src="img//pexels-photo-245931.jpeg" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h4>Black Shirt</h4>
                            <h6>$67.00</h6>
                            <button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To
                                Cart
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <img src="img//pexels-photo-220449.jpeg" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h4>Black Sgirt</h4>
                            <h6>$67.00</h6>
                            <button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To
                                Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row">
            <h4>FROM THE BLOG</h4>
        </div>
        <div class="row">
            <div class="underline"></div>
        </div>
    </div>

    <div class="container pb-5 blog">
        <div class="row">
            <div class="col-md-6">
                <div class="media mt-5">
                    <img src="img/b1.jpg" class="img-fluid mr-3" alt="media1">
                    <div class="media-body">
                        <h5>Jackets For The Soul. What…</h5>
                        <p>Lorem ipsum dolor sit amet.</p>
                        <p><i class="fa fa-user" aria-hidden="true"></i> admin. Date:12-2-1018</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="media mt-5">
                    <img src="img/b2.jpg" class="img-fluid mr-3" alt="media1">
                    <div class="media-body">
                        <h5>Long Legs? No Longer And…</h5>
                        <p>Lorem ipsum dolor sit amet.</p>
                        <p><i class="fa fa-user" aria-hidden="true"></i> admin. Date:12-2-1018</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="media mt-5">
                    <img src="img/b3.jpg" class="img-fluid mr-3" alt="media1">
                    <div class="media-body">
                        <h5>Latest Trends For Autumn Are…</h5>
                        <p>Lorem ipsum dolor sit amet.</p>
                        <p><i class="fa fa-user" aria-hidden="true"></i> admin. Date:12-2-1018</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="media mt-5">
                    <img src="img/b4.jpg" class="img-fluid mr-3" alt="media1">
                    <div class="media-body">
                        <h5>Latest Trends For Autumn Are…</h5>
                        <p>Lorem ipsum dolor sit amet.</p>
                        <p><i class="fa fa-user" aria-hidden="true"></i> admin. Date:12-2-1018</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid pt-5 pb-5 bg-light-gray">
        <div class="container">
            <div class="row">
                <h4>TREANDS</h4>
            </div>
            <div class="row">
                <div class="underline-blue"></div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <img src="img/pexels-photo-247206.jpeg" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h4>Denim Shirt</h4>
                            <h6>$67.00</h6>
                            <button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To
                                Cart
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <img src="img/pexels-photo-206454.jpeg" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h4>Denim Shirt</h4>
                            <h6>$67.00</h6>
                            <button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To
                                Cart
                            </button>
                        </div>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card">
                        <img src="img/pexels-photo-247206.jpeg" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h4>Denim Shirt</h4>
                            <h6>$67.00</h6>
                            <button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To
                                Cart
                            </button>
                        </div>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card">
                        <img src="img/pexels-photo-245931.jpeg" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h4>Denim Shirt</h4>
                            <h6>$67.00</h6>
                            <button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To
                                Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- . End Content -->

    <?php include_once('./include/footer.php') ?>