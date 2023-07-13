<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>
<?php
$cat = new category();
if (!isset($_GET['catid']) || $_GET['catid'] == null) {
    echo "<script>window.location ='catlist.php'</script>";
} else {
    $id = $_GET['catid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catName = $_POST['catName'];
    $updateCat = $cat->update_category($catName, $id);
}


?>

<div class="container-fluid">
    <?php
    if (isset($updateCat)) {
        echo $updateCat;
    }
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sửa danh mục</h6>
        </div>
        <div class="alert alert-light" role="alert">
            <a href="./catlist.php" class="alert-link">Quay lại danh sách</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <?php
                $get_cate_name = $cat->getcatbyid($id);
                if ($get_cate_name) {
                    foreach ($get_cate_name as $result) {


                        ?>

                        <form action="" method="post">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <td>
                                        <input name="catName" value="<?php echo $result['catName'] ?>" type="text"
                                            placeholder="Sửa danh mục sản phẩm" class="medium" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" name="submit" Value="Update" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php include 'inc/part4.php'; ?>