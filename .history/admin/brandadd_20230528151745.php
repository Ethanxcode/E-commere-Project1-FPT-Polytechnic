<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>
<?php include '../classes/brand.php'; ?>
<?php
$brand = new brand();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brandName = $_POST['brandName'];
    $insertBrand = $brand->insert_brand($brandName);
}

?>
<div class="container-fluid">
    <?php
    if (isset($insertBrand)) {
        echo $insertBrand;
    }
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm thương hiệu</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <form action="brandadd.php" method="post">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <td>
                                <input name="brandName" type="text" placeholder="Thêm thương hiệu sản phẩm" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php include 'inc/part4.php'; ?>