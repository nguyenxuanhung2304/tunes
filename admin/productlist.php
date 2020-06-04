<?php include 'inc/sidebar.php'; ?>
<?php include 'inc/header.php'; ?>
<?php include('../controllers/ProductController.php') ?>
<?php
$productController = new ProductController();
$allProduct = $productController->showProduct();

?>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <h3>Liệt kê sản phẩm</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Mô tả</th>
                        <th>Hình sản phẩm</th>
                        <th>Danh mục</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($allProduct)) {
                        foreach ($allProduct as $product) {
                    ?>
                            <tr>
                                <td><?php echo $product['productName'] ?></td>
                                <td><?php echo $product['price'] ?></td>
                                <td>
                                    <?php echo $product['productDesc'] ?>
                                </td>
                                <td><img src="uploads/<?php echo $product['image'] ?>" height="100" width="100" alt=""></td>
                                <td>
                                    <?php
                                    $categoryName = $productController->findCategory($product['categoryId']);
                                    foreach ($categoryName as $item) {
                                        echo $item['categoryName'];
                                    }
                                    ?>
                                </td>
                                <td><span class="text-ellipsis"></span></td>
                                <td>
                                    <form action="productedit.php" method="post">
                                        <button type="submit">
                                            <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" href="productdel.php?productId=<?php echo $product['productId'] ?>" class="active styling-edit" ui-toggle-class="">
                                                <i class="fa fa-times text-danger text"></i>
                                            </a>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <a href="productedit.php?productId=<?php echo $product['productId'] ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>