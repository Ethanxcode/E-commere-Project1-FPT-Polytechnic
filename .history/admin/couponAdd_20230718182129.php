<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>

<?php
$pd = new product();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertProduct = $pd->insert_product($_POST, $_FILES);
}

?>
<div class="container-fluid">
    <?php
    if (isset($insertProduct)) {
        echo $insertProduct;
    }
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm sản phẩm</h6>

        </div>
        <div class="alert alert-light" role="alert">
            <a href="./productlist.php" class="alert-link">Quay lại danh sách</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">


                <form action="" method="post" enctype="multipart/form-data">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <tr>
                            <td>
                                <label>Tên mã</label>
                            </td>
                            <td>
                                <input type="text" name="productName" placeholder="Enter Product Name..."
                                    class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Mã coupon</label>
                            </td>
                            <td>
                                <input type="text" name="productName" placeholder="Enter Product Name..."
                                    class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Giảm giá</label>
                            </td>
                            <td>
                                <input name="price" type="text" placeholder="Enter Price..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Ngày phát hành</label>
                            </td>
                            <td>
                                <input type="date" name="productName" placeholder="Enter Product Name..."
                                    class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Ngày kết thúc</label>
                            </td>
                            <td>
                                <input type="date" name="productName" placeholder="Enter Product Name..."
                                    class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tên</label>
                            </td>
                            <td>
                                <input type="date" name="productName" placeholder="Enter Product Name..."
                                    class="medium" />
                            </td>
                        </tr>


                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Description</label>
                            </td>
                            <td>
                                <textarea name="product_desc" class="tinymce"></textarea>
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