<?php include 'inc/sidebar.php';?>
<?php include 'inc/header.php';?>
<?php include '../controlller/CategoryController.php'?>
<?php
    $categoryController = new CategoryController();
    $allRecord = $categoryController->showCategory();

//    if (isset($_GET['categoryId'])){
//        $categoryController->deleteCategory($_GET['categoryId']);
//    }
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <!-- StartForeach-->
                        <?php
                        if ($allRecord){
                        $id = 0;
                        while ($row = $allRecord->fetch_assoc()){
                            $id++;
                        ?>
                        <th scope="row">
                            <?php echo $id ?>
                        </th>
                        <td>
                            <?php echo $row['categoryName'] ?>
                        </td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Edit"
                                    class="btn btn-info btn-simple btn-link">
                                <a href="catedit.php?categoryId=<?php echo $row['categoryId'] ?>">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </button>
                        </td>
                        <td class="td-actions text-right">
                            <form method="POST" action="catlist.php">
                                <button type="submit" rel="tooltip" title="Delete"
                                        class="btn btn-danger btn-simple btn-link">
                                    <a href="?categoryId=<?php echo $row['categoryId'] ?>">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php
                        }
                    }?>
                    <!-- EndForeach-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>

