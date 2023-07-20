<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>

<?php
$coupon = new coupon();

if (!isset($_GET['couponId']) || $_GET['couponId'] == null) {
    echo "<script>window.location ='couponList.php'</script>";
} else {
    $id = $_GET['couponId'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateCoupon = $coupon->UpdateCoupon($_POST, $id);
}

?>
<div class="container-fluid">
    <?php
    if (isset($updateCoupon)) {
        echo $updateCoupon;
    }
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sửa sản phẩm</h6>
        </div>

    </div>

    <div class="card-body">
        <div class="alert alert-light" role="alert">
            <a href="./productlist.php" class="alert-link">Quay lại danh sách</a>
        </div>
        ';
        <div class="table-responsive">
            <?php
            $getCouponById = $coupon->getCouponById($id);
            if ($getCouponById) {
                foreach ($getCouponById as $result) {
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tr>
                                <td>
                                    <label>Tên coupon</label>
                                </td>
                                <td>
                                    <input type="text" name="couponCode" value="<?php echo $result['couponCode']; ?>"
                                        class="medium form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Giảm giá (%)</label>
                                </td>
                                <td>
                                    <input type="text" name="discountAmount" value="<?php echo $result['discountAmount']; ?>"
                                        class="medium form-control" />
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <label>Price</label>
                                </td>
                                <td>
                                    <input name="releaseDate" type="date" value="<?php echo $result['releaseDate']; ?>"
                                        class="medium form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Price</label>
                                </td>
                                <td>
                                    <input name="expiredDate" type="date" value="<?php echo $result['expiredDate']; ?>"
                                        class="medium form-control" />
                                </td>
                            </tr>


                            <tr>
                                <td></td>
                                <td>
                                    <button class="btn btn-primary" type="submit" name="submit">Save</button>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; padding-top: 9px;">
                                    <label>Notes</label>
                                </td>
                                <td>
                                    <textarea name="notes" class="tinymce form-control"
                                        style="resize: none;"><?php echo $result['notes']; ?></textarea>
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
<?php
if (isset($_POST['deleteSelected'])) {
    if (isset($_POST['selectedItems'])) {
        $selectedItems = $_POST['selectedItems'];
        $delete_selected_comments = $pd->delete_selected_comments($selectedItems);
    } else {
        $delete_selected_comments = '
            <div class="alert alert-warning" role="alert">
                Vui lòng chọn ít nhất một mục để xóa.
            </div>
        ';
    }
}
?>


<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<script>
    function selectAll(event) {
        event.preventDefault(); // Ngăn chặn sự kiện mặc định của nút submit
        let checkboxes = document.getElementsByName('selectedItems[]');
        checkboxes.forEach((checkbox) => {
            checkbox.checked = true;
        });
    }

    function deselectAll(event) {
        event.preventDefault(); // Ngăn chặn sự kiện mặc định của nút submit
        let checkboxes = document.getElementsByName('selectedItems[]');
        checkboxes.forEach((checkbox) => {
            checkbox.checked = false;
        });
    }
</script>
<!-- Load TinyMCE -->
<?php include 'inc/part4.php'; ?>