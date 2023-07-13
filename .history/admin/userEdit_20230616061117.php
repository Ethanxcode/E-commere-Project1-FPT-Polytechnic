<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>

<?php
// $pd = new product();
$cs = new customer();

if (!isset($_GET['customerid']) || $_GET['customerid'] == null) {
    echo "<script>window.location ='users.php'</script>";
} else {
    $id = $_GET['customerid'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    // $updateProduct = $pd->update_product($_POST, $_FILES, $id);
    $updateCustomer = $cs->updateCustomerProfile($_POST, $id);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reset'])) {
    // $updateProduct = $pd->update_product($_POST, $_FILES, $id);
    $updateCustomer = $cs->resetCustomer($id);
}

?>
<div class="container-fluid">
    <?php
    if (isset($updateCustomer)) {
        echo $updateCustomer;
    }
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sửa thông tin</h6>
        </div>

    </div>

    <div class="card-body">
        <div class="alert alert-light" role="alert">
            <a href="./users.php" class="alert-link">Quay lại danh sách</a>
        </div>
        ';
        <div class="table-responsive">
            <?php
            $getUserById = $cs->shows_customer($id);
            if ($getUserById) {
                foreach ($getUserById as $result) {
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tr>
                                <td>
                                    <label>Họ và tên</label>
                                </td>
                                <td>
                                    <input type="text" name="fullName" value="<?php echo $result['fullName']; ?>"
                                        class="medium form-control" />
                                </td>
                            </tr>



                            <tr>
                                <td>
                                    <label>username</label>
                                </td>
                                <td>
                                    <input type="text" name="username" class="medium form-control"
                                        value="<?php echo $result['username']; ?>" ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="password">Mật khẩu</label>
                                    <p class="text-muted text-uppercase text-p-sm-1 "><span class="text-danger">Hint</span>:
                                        <span class="">Mật khẩu tương ứng với username!</span>
                                    </p>
                                </td>
                                <td>
                                    <input type="password" name="password" class="form-control"
                                        value="<?php echo $result['password']; ?>" />
                                </td>
                            </tr>

                            <tr>
                            <tr>
                                <td>
                                    <label>email</label>
                                </td>
                                <td>
                                    <input name="email" type="email" value="<?php echo $result['email']; ?>"
                                        class="medium form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Số điện thoại</label>
                                </td>
                                <td>
                                    <input type="text" name="phoneNumber" value="<?php echo $result['phoneNumber']; ?>"
                                        class="medium form-control" />
                                </td>
                            </tr>
                            <tr>
                                <!-- <td>
                                    <label>Upload Image</label>
                                </td>
                                <td>
                                    <img src="./uploads/<?php echo $result['userImage']; ?>" width="80"
                                        alt="<?php echo $result['username'] ?>">
                                    <input name="image" type="file" />
                                </td> -->
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <button class="btn btn-primary w-25" type="submit" name="update">Save</button>
                                    <button class="btn btn-danger w-25" type="submit"
                                        onclick="return confirm('Bạn chắc chắn xóa chứ ?')" name="reset">Reset</button>
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

<!-- Load TinyMCE -->
<?php include 'inc/part4.php'; ?>