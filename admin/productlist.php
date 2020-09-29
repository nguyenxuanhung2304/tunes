<?php include 'inc/sidebar.php';?>
<?php include 'inc/header.php';?>
<?php include '../controllers/ProductController.php'?>
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
                                <td><?php echo $product['name'] ?></td>
                                <td><?php echo $product['price'] ?></td>
                                <td>
                                    <?php echo $product['description'] ?>
                                </td>
                                <td><img src="uploads/<?php echo $product['image'] ?>" height="100" width="100" alt=""></td>
                                <td>
                                    <?php
$categoryName = $productController->findCategory($product['id']);
        foreach ($categoryName as $item) {
            echo $item['name'];
        }
        ?>
                                </td>
                                <td><span class="text-ellipsis"></span></td>
                                <td>
                                        <button type="submit">
                                            <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')"
                                                ref="productdel.php?productId=<?php echo $product['id'] ?>"
                                                class="active styling-edit"
                                            >
                                                <i class="fa fa-times text-danger text"></i>
                                            </a>
                                        </button>
                                </td>
                                <td>
                                    <a href="productedit.php?productId=<?php echo $product['id'] ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                    <?php
}
}?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'inc/footer.php';?>