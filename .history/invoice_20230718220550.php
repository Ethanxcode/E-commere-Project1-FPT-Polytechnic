<?php
include 'inc/header.php';

$login_cheack = Session::get('customer_login');
if ($login_cheack == false) {
    header('Location:login.php');
    exit();
}

$customer_id = Session::get('customer_id');

// Xử lý lưu đơn hàng khi có thông báo từ trang success.php
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $customer_id = Session::get('customer_id');
    $insertOrder = $ct->insertOrder($customer_id, $totalPrice);
    $delCart = $ct->dell_data_cart();
    header('Location:success.php');
    exit();
}
?>

<div class="container">
    <div class="row">
        <div class="col-8 col-md-12 col-sm-12">
            <div class="p-5">
                <div class="d-flex justify-content-between align-items-center mb-2 ">
                    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                </div>
                <hr class="my-4">

                <?php
                // Truy xuất thông tin đơn hàng từ bảng tbl_order_items dựa trên customer_id
                $get_order_items = $ct->get_order_items($customer_id);

                if ($get_order_items) {
                    foreach ($get_order_items as $order_item) {
                        $product_id = $order_item['product_id'];

                        // Truy xuất thông tin chi tiết của sản phẩm từ bảng tbl_product dựa trên $product_id
                        $get_product_details = $ct->get_product_details($product_id);
                        ?>

                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                            <div class="col-md-2 col-lg-2 col-xl-2">
                                <img src="./admin/uploads/<?php echo $get_product_details['image'] ?>" class="img-fluid rounded-3"
                                    alt="Cotton T-shirt">
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3 col-sm-12">
                                <h6 class="text-muted">Tên Sản phẩm</h6>
                                <h6 class="text-black mb-0">
                                    <?php echo $get_product_details['productName'] ?>
                                </h6>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3 col-sm-12">
                                <h6 class="text-muted">Giá</h6>
                                <h6 class="text-black mb-0">
                                    <?php echo $fm->formatNumber($get_product_details['price']) ?>
                                </h6>
                            </div>

                            <div class="col-md-2 col-lg-2 col-xl-2">
                                <h6 class="text-muted">Số Lượng</h6>
                                <h6 class="text-black mb-0">
                                    <?php echo $order_item['quantity'] ?>
                                </h6>
                            </div>
                        </div>

                        <hr class="my-4">

                        <?php
                    }
                } else {
                    echo "<h5>Giỏ hàng Trống</h5>";
                }
                ?>

                <div class="pt-5">
                    <h6 class="mb-0" style="text-align: end;"><a href="./cart.php" class="text-body"><i
                                class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                </div>

            </div>
        </div>
        <div class="col-4 col-md-12 col-sm-12">
            <!-- Điền thông tin khách hàng, giảm giá và tổng tiền nếu cần -->
        </div>
    </div>
</div>

<?php
include 'inc/footer.php';
?>
