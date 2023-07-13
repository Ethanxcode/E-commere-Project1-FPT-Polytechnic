<?php
include 'inc/header.php';


?>
<?php
$login_cheack = Session::get('customer_login');
if ($login_cheack == false) {
    header('Location:login.php');
} else {
}
?>
<?php
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $customer_id = Session::get('customer_id');
    $insertOrder = $ct->insertOrder($customer_id);
    header('Location:success.php');
}
if (isset($_GET['cartId'])) {
    $cartId = $_GET['cartId'];
    $delcart = $ct->delete_product_cart($cartId);
}
if (isset($_GET['conf'])) {

    $id = $_GET['conf'];
    $time = $_GET['time'];
    $price = $_GET['price'];
    $shifted_conf = $ct->shifted_conf($id, $time, $price);
}

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $quantity = $_POST['quantity'];
//     $cartId = $_POST['cartId'];
//     $update_quantity_cart = $ct->update_quantity_cart($quantity, $cartId);
// }
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
                $get_cart_order = $ct->get_cart_order($customer_id);
                $slSp = 0;
                if ($get_cart_order) {
                    foreach ($get_cart_order as $result) {
                        $slSp++;

                        ?>

                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                            <div class="col-md-2 col-lg-2 col-xl-2">
                                <img src="./admin/uploads/<?php echo $result['image'] ?>" class="img-fluid rounded-3"
                                    alt="Cotton T-shirt">
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3 col-sm-12">
                                <h6 class="text-muted">Tên Sản phẩm</h6>
                                <h6 class="text-black mb-0">
                                    <?php echo $result['productName'] ?>
                                </h6>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3 col-sm-12">
                                <h6 class="text-muted">Giá</h6>
                                <h6 class="text-black mb-0">
                                    <?php echo $fm->formatNumber($result['price'] / $result['quantity'] + $result['price'] / $result['quantity'] * 0.1) ?>
                                </h6>
                            </div>

                            <div class="col-md-4 col-lg-3 col-xl-3 col-sm-12">
                                <h6 class="text-muted">Số Lượng</h6>
                                <h6 class="text-black mb-0">
                                    <?php echo $result['quantity'] ?>
                                </h6>
                            </div>

                            <div class="col-md-4 col-lg-3 col-xl-3 col-sm-12">
                                <h6 class="text-muted">Tổng Giá</h6>

                                <h6 class="mb-0">
                                    <?php
                                    echo $fm->formatNumber($result['price'] + $result['price'] * 0.1);
                                    ?>
                                </h6>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3 col-sm-12">
                                <h6 class="text-muted">Ngày đặt</h6>
                                <h6 class="text-black mb-0">
                                    <?php echo $fm->formatDate($result['date_order']) ?>
                                </h6>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3 col-sm-12">
                                <h6 class="text-muted">Tình trạng</h6>
                                <h6 class="text-black mb-0 alert alert-primary">
                                    <?php
                                    if ($result['status'] == 0) {
                                        echo '<h6 class="text-black mb-0 alert alert-primary">Đang chờ xử lý</h6>';
                                    } elseif ($result['status'] == 1) {
                                        echo ' <h6 class="text-black mb-0 alert alert-primary">Đã xử lý</h6>';
                                        ?>
                                        <!-- <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <button class="btn-primary btn"><a href="?conf=<?php echo $customer_id ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Đã nhận hàng</a></button>
                                        </div> -->
                                        <?php
                                    } else {
                                        ?>
                                        <h6 class="text-success alert alert-success mb-0">Đã Nhận </h6>

                                        <?php
                                    }
                                    ?>
                                </h6>
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
                    <h6 class="mb-0"><a href="./cart.php" class="text-body"><i
                                class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                </div>
            </div>
        </div>

    </div>




    <?php
    include 'inc/footer.php';
    ?>