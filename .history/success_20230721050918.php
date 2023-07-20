<?php include 'inc/header.php'; ?>

<?php
$ct = new cart();
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $customer_id = Session::get('customer_id');
    // $insertOrder = $ct->insertOrder($customer_id);
    // $delCart = $ct->dell_data_cart();
    header('Location: success.php');
}
?>

<div class="container p-5">
    <div class="row justify-content-center ">
        <div class="col-md-12 " style="gap: 0.1rem">
            <div class=" text-center" role="alert">
                <?php

                $customer_id = Session::get('customer_id');
                $get_cart_order = $ct->get_cart_order($customer_id);

                if ($get_cart_order) {
                    foreach ($get_cart_order as $result) {

                    }
                }
                ?>
                <h1 class="alert-heading mb-3">Đơn hàng #
                    <?php echo $result['id'] ?>
                </h1>
                <p class="mb-0 info ">Cám ơn bạn đã chọn chúng tôi, đơn hàng của bạn đang được chuẩn bị,
                </p>
                <span class="curr-price">
                    Tổng Giá Trị
                    đơn hàng bạn đã
                    đặt:
                    <?php echo $fm->formatNumber($result['total_price']) ?>
                </span>
                <?php
                $expectedDeliveryDate = date('d/m/Y', strtotime($result['order_date'] . ' +' . mt_rand(1, 4) . ' days'));
                ?>
                <p class="text-secondary">Ngày giao hàng dự kiến:
                    <?php echo $expectedDeliveryDate; ?>
                </p>
                <a class="btn btn-flat mt-3" href="./order-detail.php">Xem ngay</a>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>