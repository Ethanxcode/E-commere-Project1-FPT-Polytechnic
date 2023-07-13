<?php
include 'inc/header.php';

?>

<?php
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $customer_id = Session::get('customer_id');
    $insertOrder = $ct->insertOrder($customer_id);
    $delCart = $ct->dell_data_cart();
    header('Location:success.php');
}
?>
<div class="alert alert-success mb-5 align-content-center" role="alert">

    <?php
    $customer_id = Session::get('customer_id');
    $get_amount = $ct->getAmountPrice($customer_id);
    $amount = 0;
    if ($get_amount) {
        foreach ($get_amount as $result) {
            $price = $result['price'];
            $amount += $price;
        }
    }
    ?>
    <h4 class="alert-heading">Chúng Tôi Cảm Ơn Bạn Đã Mua Hàng!</h4>
    <p>Đơn hàng của bạn đang được chuẩn bị</p>

    <p class="mb-0 ">Tổng Giá Trị Tất Cả Đơn Hàng Bạn Đã Đặt :
        <?php echo $fm->formatNumber($amount) ?>
    </p><a class="text-red" href="./order-detail.php">Xem ngay</a>
</div>

<?php
include 'inc/footer.php';
?>