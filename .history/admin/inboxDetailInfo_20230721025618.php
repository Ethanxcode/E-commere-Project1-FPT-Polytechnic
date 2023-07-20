<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/cart.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
if (!isset($_GET['customerid']) || $_GET['customerid'] == null) {
    echo "<script>window.location ='inbox.php'</script>";
} else {
    $id = $_GET['customerid'];
    $order_id = $_GET['orderid'];
}
$ct = new cart();


?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin khách hàng</h6>
        </div>
        <div class="card-body">
            <div class="alert alert-light" role="alert">
                <a href="./inbox.php" class="alert-link">Quay lại danh sách</a>
            </div>
            <div class="table-responsive">


                <?php
                $getDetailInfo = $ct->get_detail_inbox_cart($id, $order_id);
                $fm = new Format();
                if ($getDetailInfo) {
                    foreach ($getDetailInfo as $result) {

                        ?>
                        <form action="" method="post">
                            <table class="table border-primary table-hover " id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <td>Ngày đặt</td>
                                    <td>
                                        <input name="order_date" readonly="readonly"
                                            value="<?php echo $fm->formatDate($result['order_date']) ?>" type="text"
                                            class="medium form-control" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Họ và tên</td>
                                    <td>
                                        <input name="fullName" readonly="readonly" value="<?php echo $result['fullName'] ?>"
                                            type="text" class="medium form-control" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>
                                        <input name="email" readonly="readonly" value="<?php echo $result['email'] ?>"
                                            type="text" class="medium form-control" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td>
                                        <input name="phoneNumber" readonly="readonly"
                                            value="<?php echo $result['phoneNumber'] ?>" type="text"
                                            class="medium form-control" />
                                    </td>
                                </tr>

                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>
                                        <input name="address" readonly="readonly" value="<?php echo $result['address'] ?>"
                                            type="text" class="medium form-control" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tổng cộng</td>
                                    <td>
                                        <input name="total_price" readonly="readonly"
                                            value="<?php echo $fm->formatNumber($result['total_price']) ?>" type="text"
                                            class="medium form-control" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Số lượng</td>
                                    <td>
                                        <input name="quantity" readonly="readonly" value="<?php echo $result['quantity'] ?>"
                                            type="text" class="medium form-control" />
                                    </td>
                                </tr>

                                <tr>
                                    <td>Ghi chú</td>
                                    <td>
                                        <input name="notes" readonly="readonly" value="<?php echo $result['notes'] ?>"
                                            type="text" class="medium form-control"></input>
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