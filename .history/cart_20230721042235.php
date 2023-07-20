<?php
include 'inc/header.php';
?>
<?php
if (isset($_GET['cartId'])) {
    $cartId = $_GET['cartId'];
    $delcart = $ct->delete_product_cart($cartId);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quantity = $_POST['quantity'];
    $cartId = $_POST['cartId'];
    $update_quantity_cart = $ct->update_quantity_cart($quantity, $cartId);
}

if (isset($_POST['couponCode']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $couponCode = $_POST['couponCode'];
    $currentTime = date('Y-m-d H:i:s'); // Thời gian hiện tại

    // Gọi phương thức kiểm tra mã giảm giá từ lớp xử lý dữ liệu (ví dụ: $ct)
    $couponResult = $ct->checkCoupon($couponCode, $currentTime);

    // if ($couponResult['isValid']) {
    //     // Mã giảm giá hợp lệ
    //     $discountAmount = $couponResult['discountAmount'];

    //     // Thực hiện các xử lý khác khi mã giảm giá hợp lệ

    //     // Hiển thị thông báo thành công
    //     echo '<div class="alert alert-success" role="alert">Mã giảm giá đã được áp dụng.</div>';
    // } else {
    //     // Mã giảm giá không hợp lệ
    //     $errorMessage = $couponResult['errorMessage'];
    //     // Hiển thị thông báo lỗi
    //     echo '<div class="alert alert-danger" role="alert">' . $errorMessage . ' bạn có muốn tiếp tục đến trang đặt hàng? <a href="/offline.php">Tiếp tục</a></a></div>';
    // }
}
?>






<section class="h-100 h-custom" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                        <h6 class="mb-0" style="color: green;">
                                            <?php
                                            if (isset($update_quantity_cart)) {
                                                echo $update_quantity_cart;
                                            }
                                            if (isset($delcart)) {
                                                echo $delcart;
                                            }
                                            ?>
                                        </h6>
                                    </div>
                                    <hr class="my-4">
                                    <?php
                                    $get_product_cart = $ct->get_product_cart();
                                    $tongSp = 0;
                                    $slSp = 0;
                                    $shippingFee = 20000;
                                    $gia = 0;
                                    if ($get_product_cart) {

                                        foreach ($get_product_cart as $result) {
                                            $slSp++;
                                            $gia = $result['price'] * $result['quantity'];
                                            $tongSp += $gia;


                                            ?>

                                            <div class="row mb-4 d-flex justify-content-between align-items-center ">
                                                <div class="col-md-2 col-lg-2 col-xl-2 col-sm-12">
                                                    <img src="./admin/uploads/<?php echo $result['image'] ?>"
                                                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                </div>
                                                <div class="col-md-4 col-lg-3 col-xl-3 col-sm-12">
                                                    <h6 class="text-muted">Tên Sản phẩm</h6>
                                                    <h6 class="text-black mb-0">
                                                        <?php echo $result['productName'] ?>
                                                    </h6>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-2 col-sm-12">
                                                    <h6 class="text-muted">Giá</h6>
                                                    <h6 class="text-black mb-0">
                                                        <?php echo $fm->formatNumber($result['price']) ?>
                                                    </h6>
                                                </div>

                                                <div class="col-md-2 col-lg-2 col-xl-2 col-sm-12">
                                                    <h6 class="text-muted">Số lượng</h6>
                                                    <form class="d-flex w-75" method="post">
                                                        <input value="<?php echo $result['cartId']; ?>" type="hidden"
                                                            name="cartId">
                                                        <input id="" min="0" name="quantity"
                                                            value="<?php echo $result['quantity'] ?>" type="number"
                                                            class="form-control form-control-sm d-flex align-items-end" />
                                                        <button class=" btn-link border-0 bg-transparent px-1" type="submit">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                    </form>
                                                </div>


                                                <div
                                                    class="col-md-1 col-sm-12 col-lg-1 col-xl-1 d-flex justify-content-center align-items-center">
                                                    <form action="" method="get">
                                                        <input type="hidden" name="cartId"
                                                            value="<?php echo $result['cartId']; ?>">
                                                        <button type="submit" name="deleteCartItem"
                                                            class="text-danger border-0 bg-transparent">Xóa</button>
                                                    </form>
                                                </div>
                                            </div>

                                            <hr class="my-4">
                                            <?php

                                        }

                                    }
                                    if ($tongSp == 0) {
                                        echo "<h5>Giỏ hàng Trống</h5>";
                                    }
                                    ?>
                                    <div class="pt-5 d-flex justify-content-end">
                                        <h6 class="mb-0"><a href="./products.php" class="text-body"><i
                                                    class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 bg-grey" id="checkoutForm">
                                <form method="post">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Thông tin đơn hàng</h3>
                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">
                                                Số lượng:
                                                <?php echo $slSp; ?>
                                            </h5>
                                            <!-- <h5>
                                                <?php echo $fm->formatNumber($tongSp); ?>
                                            </h5> -->
                                        </div>



                                        <div class="d-flex justify-content-between mb-4 flex-column"
                                            style="gap: 0.8rem">
                                            <h5 class="text-uppercase">
                                                Mã giảm
                                            </h5>
                                            <input id="couponCode" name="couponCode" type="text" class="form-control"
                                                placeholder="Coupon..." />

                                            <?php if (isset($couponResult) && isset($couponResult['errorMessage'])) {
                                                echo $couponResult['errorMessage'];
                                            } ?>
                                        </div>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Tổng cộng</h5>
                                            <h5>
                                                <?php
                                                echo $fm->formatNumber($gia);
                                                ?>
                                            </h5>
                                        </div>
                                        <input min="0" name="quantity" value="<?php echo $result['quantity'] ?>" hidden
                                            type="number" />
                                        <input value="<?php echo $result['cartId']; ?>" type="hidden" name="cartId">
                                        <button type="button" class="btn btn-dark btn-block btn-sm w-100 p-3 disabled"
                                            data-mdb-ripple-color="dark">Thanh Toán Online</button>
                                        <button type="submit" class="btn btn-dark btn-block btn-sm mt-3 w-100 p-3"
                                            data-mdb-ripple-color="dark">
                                            Thanh Toán
                                            Khi
                                            Nhận Hàng

                                            <!-- <a href="javascript:void(0);" onclick="redirectToOfflinePage()">Thanh Toán
                                                Khi
                                                Nhận Hàng</a> -->
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end blogs -->

<!-- footer -->
<?php
include 'inc/footer.php';
?>