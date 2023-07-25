<?php
include 'inc/header.php';


?>
<?php
$login_check = Session::get('customer_login');
if (!$login_check) {
    header('Location: login.php');
    exit; // It's a good practice to add an exit after redirection
}

?>
<?php
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $customer_id = Session::get('customer_id');
    $insertOrder = $ct->insertOrder($customer_id, $totalPrice, $notes, $address, $discountValue);
    header('Location:success.php');
}
if (isset($_GET['cartId'])) {
    $cartId = $_GET['cartId'];
    $delcart = $ct->delete_product_cart($cartId);
}

?>



<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="p-5">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Sản Phẩm</h1>
                    <h6 class="mb-0" style="color: green;"></h6>
                </div>
                <hr class="my-4">
                <?php
                if (isset($delcart)) {
                    echo $delcart;
                }
                $customer_id = Session::get('customer_id');
                $get_cart_order = $ct->get_cart_orders($customer_id);
                $slSp = 0;
                if ($get_cart_order) {
                    foreach ($get_cart_order as $result) {
                        $slSp++;

                        ?>

                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                            <!-- <div
                                class="col-md-12  col-lg-12 col-xl-1 col-sm-12 align-items-center d-flex justify-content-center">
                                <img src="./admin/uploads/<?php echo $result['image'] ?>" class="img-fluid rounded-3"
                                    alt="Cotton T-shirt">
                            </div> -->
                            <div class="col-md-12 col-lg-2 col-xl-2 col-sm-12 text-center">
                                <h6 class="text-muted">Mã hóa đơn</h6>
                                <h6 class="text-black mb-0">
                                    #
                                    <?php echo $result['id'] ?>
                                </h6>
                            </div>
                            <div class="col-md-12 col-lg-2 col-xl-2 col-sm-12 text-center">
                                <h6 class="text-muted">Tổng giá</h6>
                                <h6 class="text-black mb-0">
                                    <?php echo $fm->formatNumber($result['total_price']) ?>

                                </h6>
                            </div>
                            <div class="col-md-12 col-lg-2 col-xl-2 col-sm-12 text-center">
                                <h6 class="text-muted">Ngày đặt hàng </h6>
                                <h6 class="text-black mb-0">
                                    <?php echo $result['order_date'] ?>
                                </h6>
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-4 col-sm-12 text-center">
                                <h6 class="text-muted">notes </h6>
                                <h6 class="text-black mb-0">
                                    <?php echo $result['notes'] ? $result['notes'] : 'Không...' ?>

                                </h6>
                            </div>



                            <div class="col-md-12 col-lg-3 col-xl-2 col-sm-12 text-center">
                                <h6 class="text-muted">Trạng thái</h6>

                                <?php
                                if ($result['status'] == 0) {
                                    echo '<a href="./invoice.php?orderid=' . $result['id'] . '"><h6 class="text-danger mb-0 alert alert-danger">Đang chờ xử lý</h6></a>';
                                } elseif ($result['status'] == 1) {
                                    echo '<h6 class="text-warning mb-0 alert alert-warning">Đang giao hàng</h6>';
                                    ?>

                                    <?php
                                } else if ($result['status'] == 2) {

                                    echo '<a href="./invoice.php?orderid=' . $result['id'] . '">
                                        <h6 class="text-success alert alert-success mb-0">Đã Nhận</h6>
                                    </a>';
                                    ?>
                                        <?php
                                }
                                 } else {

                                    echo '<a href="./invoice.php?orderid=' . $result['id'] . '">
                                        <h6 class="text-success alert alert-success mb-0">Đã Nhận</h6>
                                    </a>';
                                    ?>
                                        <?php
                                }
                                ?>

                            </div>

                        </div>

                        <hr class="my-4">
                        <?php

                    }
                }
                if ($slSp == 0) {
                    echo "<h5>Bạn chưa đặt sản phẩm nào</h5>";
                }
                ?>



                <div class="pt-5">
                    <h6 class="mb-0"><a href="./products.php" class="text-body"><i
                                class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                </div>
            </div>
        </div>

    </div>




    <?php
    include 'inc/footer.php';
    ?>