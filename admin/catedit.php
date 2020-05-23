
<?php include_once 'inc/sidebar.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once '../controlller/CategoryController.php'; ?>

<?php
//Get id record cần edit
$categoryController = new CategoryController();
if (!isset($categoryId) && $_GET['categoryId'] === NULL){
    echo "<script>
            window.location('catlist.php');
          </script>";
}else{
    $id = $_GET['categoryId'];
}

//update
if ($_SERVER["REQUEST_METHOD"] === 'POST'){
    $categoryName = $_POST["categoryName"];
    $updateCategory = $categoryController->updateCategory($id,$categoryName);
}



?>

<div class="row justify-content-center align-content-center">
    <div class="col-lg-4 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 text-center">
                <h6 class="m-0 font-weight-bold text-primary">Edit Category</h6>
                <?php
                if (isset($updateCategory)) {
                    echo $updateCategory;
                }
                ?>
            </div>
            <?php
            $row = $categoryController->findCategory($id);
            if($row){
                while($editRowName = $row->fetch_assoc()){ ?>

            <form method="POST" action="">
                <div class="form-group text-center">
                    <input type="text" name="categoryName" id="" class="form-control" aria-describedby="helpId" value="<?php echo $editRowName['categoryName']  ?>">
                    <input class="btn btn-primary mt-2" type="submit" name="" value="Edit">
                </div>
            </form>

            <?php }
            }?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
