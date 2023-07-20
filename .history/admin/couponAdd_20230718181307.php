<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>
<?php
$cat = new category();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catName = $_POST['catName'];
    $insertCat = $cat->insert_category($catName);
}

?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm danh mục</h6>
        </div>
        <div class="alert alert-light" role="alert">
            <a href="./catlist.php" class="alert-link">Quay lại danh sách</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <?php
                if (isset($insertCat)) {
                    echo $insertCat;
                }
                ?>
                <form action="catadd.php" method="post">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <td>
                                <input name="catName" type="text" placeholder="Thêm danh mục sản phẩm" class="medium" />
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
<?php include 'inc/part4.php'; ?>