<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>
<?php
$cat = new brand();
if (!isset($_GET['brandid']) || $_GET['brandid'] == null) {
    echo "<script>window.location ='brandlist.php'</script>";
} else {
    $id = $_GET['brandid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brandName = $_POST['brandName'];
    $updateBrand = $cat->update_brand($brandName, $id);
}


?>


<div class="container-fluid">
    <?php
    if (isset($updateBrand)) {
        echo $updateBrand;
    }
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sửa thương hiệu</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <?php
                $get_brand_name = $cat->getbrandbyid($id);
                if ($get_brand_name) {
                    foreach ($get_brand_name as $result) {


                        ?>
                        <form action="" method="post">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <td>
                                        <input name="brandName" value="<?php echo $result['brandName'] ?>" type="text"
                                            placeholder="Sửa danh mục sản phẩm" class="medium" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
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