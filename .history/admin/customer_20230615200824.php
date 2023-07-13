<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>

<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/customer.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
if (!isset($_GET['customerid']) || $_GET['customerid'] == null) {
    echo "<script>window.location ='inbox.php'</script>";
} else {
    $id = $_GET['customerid'];
}
$cs = new customer();


?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin khách hàng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">


                <?php
                $get_customer = $cs->shows_customer($id);
                if ($get_customer) {
                    foreach ($get_customer as $result) {


                        ?>

                        <form action="" method="post">
                            <table class="table border-primary table-hover " id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <td>Name</td>
                                    <td>
                                        <input name="catName" readonly="readonly" value="<?php echo $result['fullName'] ?>"
                                            type="text" class="medium form-control" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>SĐT</td>
                                    <td>
                                        <input name="catName" readonly="readonly" value="<?php echo $result['phoneNumber'] ?>"
                                            type="text" class="medium form-control" />
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