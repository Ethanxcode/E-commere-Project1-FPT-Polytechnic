<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>

<?php
$coupon = new coupon();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertCoupon = $coupon->insertCoupon($_POST);
}

?>
<div class="container-fluid">
    <?php
    if (isset($insertCoupon)) {
        echo $insertCoupon;
    }
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm Coupon</h6>

        </div>
        <div class="alert alert-light" role="alert">
            <a href="./couponList.php" class="alert-link">Quay lại danh sách</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">


                <form action="" method="post" enctype="multipart/form-data">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                        <tr>
                            <td>
                                <label>Mã coupon</label>
                            </td>
                            <td>
                                <input type="text" name="couponCode" placeholder="Enter Coupon Code..."
                                    class="medium form-control" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Giảm giá</label>
                            </td>
                            <td>
                                <input name="discountAmount" type="text" placeholder="Enter Percent..."
                                    class="medium form-control" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Ngày phát hành</label>
                            </td>
                            <td>
                                <input type="date" name="releaseDate" placeholder="Enter Release Date..."
                                    class="medium form-control" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Ngày kết thúc</label>
                            </td>
                            <td>
                                <input type="date" name="expiredDate" placeholder="Enter expired Date ..."
                                    class="medium form-control" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 8px;">
                                <label>Notes</label>
                            </td>
                            <td>
                                <textarea name="notes" style="resize: none;"
                                    class="tinymce p-2 form-control-plaintext"></textarea>
                            </td>
                        </tr>


                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-primary" type="submit" name="submit">Save</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Load TinyMCE -->

<!-- Load TinyMCE -->

<?php include 'inc/part4.php'; ?>