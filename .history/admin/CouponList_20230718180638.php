<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>
<!-- <?php
// $brand = new brand();

// if (isset($_GET['delid'])) {
//     $id = $_GET['delid'];
//     $delBrand = $brand->delete_brand($id);
// }


// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $brandName = $_POST['brandName'];
//     $insertBrand = $brand->insert_brand($brandName);
// }

?> -->
<div class="container-fluid">
    <?php
    if (isset($delBrand)) {
        echo $delBrand;
    }
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách mã giảm giá</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">


                <table class="table border-primary table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Serial No.</th>
                            <th>Tên mã giảm</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $show_brand = $brand->show_brand();
                        if ($show_brand) {
                            $i = 0;
                            foreach ($show_brand as $result) {
                                $i++;


                                ?>
                                <tr class="odd gradeX">
                                    <td>
                                        <?php echo $i; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['brandName']; ?>
                                    </td>
                                    <td><button type="button" class="btn btn-primary"><a class="text-white"
                                                href="brandedit.php?brandid=<?php echo $result['brandId'] ?>">Sửa</a></button>
                                        <button type="button" class="btn btn-danger"><a class="text-white"
                                                onclick="return confirm('Bạn chắc chắn xóa chứ ?')"
                                                href="?delid=<?php echo $result['brandId'] ?>">Xóa</a></button>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>

<?php include 'inc/part4.php'; ?>