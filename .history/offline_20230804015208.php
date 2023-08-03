<?php
include 'inc/header.php';


?>
<?php
$discountAmount = isset($_GET['discountAmount']) ? $_GET['discountAmount'] : 0;
$login_cheack = Session::get('customer_login');
if ($login_cheack == false) {
    header('Location:login.php');
    exit();
}
$get_product_cart = $ct->get_product_cart();

$quantity = 0;
$tongSp = 0;
if ($get_product_cart) {
    foreach ($get_product_cart as $result) {
        $tongSp += $result['price'] * $result['quantity'];
        $quantity += $result['quantity'];
    }
}

// Calculate total price based on $tongSp and discount
$shippingFee = 20000;
$discountValue = $tongSp * ($discountAmount / 100);
$totalPrice = $tongSp + $shippingFee - $discountValue;

?>
<?php

if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $customer_id = Session::get('customer_id');
    $notes = isset($_POST['notes']) ? $_POST['notes'] : ''; // Get the value of the notes field from the form
    $address = isset($_POST['address']) ? $_POST['address'] : ''; // Change to $address
    $order_id = $_GET['orderid'];

    $insertOrder = $ct->insertOrder($customer_id, $totalPrice, $notes, $address, $discountAmount, $quantity); // Pass the notes parameter
    $delCart = $ct->dell_data_cart();
    header("Location: success.php?orderid=$order_id");
    exit();
}

?>



<div class="container">
    <div class="row">
        <div class="col-8 col-md-12 col-sm-12">
            <div class="p-5">
                <div class="d-flex justify-content-between align-items-center mb-2 ">
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
                $tongSp = 0;
                $slSp = 0;
                $shippingFee = 2000;
                if (!empty($get_product_cart)) {
                    foreach ($get_product_cart as $result) {
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
                                    <?php echo $fm->formatNumber($result['price']) ?>
                                </h6>
                            </div>

                            <div class="col-md-2 col-lg-2 col-xl-2">
                                <h6 class="text-muted">Số Lượng</h6>
                                <h6 class="text-black mb-0">
                                    <?php echo $result['quantity'] ?>
                                </h6>
                            </div>
                            <!-- <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h6 class="text-muted">Tổng Cộng</h6>

                                <h6 class="mb-0">
                                    <?php
                                    $gia = $result['price'] * $result['quantity'];
                                    $tongSp += $gia;

                                    echo $fm->formatNumber($gia);

                                    ?>
                                </h6>
                            </div> -->
                            <!-- <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                <a href="?cartId=<?php echo $result['cartId']; ?>" class="text-muted"><i class="fas fa-times"></i></a>
                            </div> -->
                        </div>


                        <hr class="my-4">
                        <?php

                    }
                }
                if ($tongSp == 0) {
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
            <form method="post" action="?orderid=order">
                <div class="p-5 d-flex flex-column" style="gap: .8rem;">
                    <!-- <h1 class="fw-bold mb-0 text-black">Thông Tin khách hàng</h1> -->
                    <div class="pt-5 d-flex flex-column " style="gap: .8rem">

                        <?php
                        $id = Session::get('customer_id');
                        $get_customer = $cs->shows_customer($id);
                        if ($get_customer) {
                            foreach ($get_customer as $result) {
                                ?>

                                <div class="card-body bg-second" style="border-radius: 4px;
    position: relative;
    padding: 16px;font-size: 14px;
    line-height: 20px;

    ">
                                    <h6 class="text-muted">Giao tới</h6>
                                    <div class="row  align-content-center">
                                        <!-- <div class="col-sm-3">
                                                <p class="mb-0">Họ và tên</p>
                                            </div> -->
                                        <div class="col-sm-9 w-100 mb-0" style=" display: flex;
                                        
        -webkit-box-align: center;
        align-items: center;
        color: rgb(56, 56, 61);
        font-weight: 600;
    ">
                                            <p class="text-black mb-0">
                                                <?php echo $result['fullName'] ?>
                                            </p>
                                            <i
                                                style="display: block ;width: 1px; height: 20px; background: rgba(235, 235, 240); margin: 0px 8px"></i>
                                            <p class="text-black mb-0">
                                                <?php echo $result['phoneNumber'] ?>
                                            </p>
                                        </div>
                                        <div style="color: rgb(128, 128, 137); font-weight: normal;"
                                            class="col-sm-9 w-100 mb-0">
                                            <?php if (!empty($result['address'])) { ?>
                                                <span style="font-weight: 500; color: rgb(0, 171, 86); flex-wrap: nowrap;
                                                background-color: rgb(239, 255, 244); font-size: 12px; line-height: 16px;
                                                padding: 0px 6px; border-radius: 100px; height: 18px; display: inline-flex;
                                                -webkit-box-align: center; align-items: center;"
                                                    class="text-success">Nhà</span>
                                                <input name="address" type="hidden" class="form-control text-muted mb-0"
                                                    value="<?php echo $result['address']; ?>">
                                                <span>
                                                    <?php echo $result['address'] ?>
                                                </span>
                                            <?php } else { ?>
                                                <span style="font-weight: 500; color: rgb(0, 171, 86); flex-wrap: nowrap;
                                                background-color: rgb(239, 255, 244); font-size: 12px; line-height: 16px;
                                                padding: 0px 6px; border-radius: 100px; height: 18px; display: inline-flex;
                                                -webkit-box-align: center; align-items: center;" class="text-danger"">Nhà</span>
                                            <input type=" text" name="address" class="form-control text-muted mb-0"
                                                    placeholder="vui lòng nhập địa chỉ">
                                                <?php } ?>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body bg-second " style="border-radius: 4px;
    position: relative;
    padding: 16px;font-size: 14px;
    line-height: 20px;

    ">
                                    <h6 class="text-muted">Lời nhắn</h6>

                                    <div class="row">

                                        <div class="col-sm-9 w-100">
                                            <input name="notes" placeholder="Lưu ý cho người bán..."
                                                class="form-control text-muted mb-0">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php

                            }
                        } ?>
                    <div class="card-body bg-second " style="border-radius: 4px;
    position: relative;
    padding: 16px;font-size: 14px;
    line-height: 20px;
    font-weight: 400;

    ">
                        <!-- <h3 class="fw-bold mb-5 mt-2 pt-1">Tóm tắt đơn hàng</h3> -->
                        <div class="" style=" -webkit-box-align: center;
        align-items: center;
        color: rgb(56, 56, 61);
        font-weight: 600;">
                            <h6 class="">Đơn hàng</h6>
                            <p class=" text-muted">

                                <?php echo $slSp; ?>
                                Sản phẩm.
                            </p>
                        </div>
                        <hr>

                        <!-- <div class="d-flex justify-content-between mb-4">
                        
                        <h5>
                            <?php echo $fm->formatNumber($tongSp); ?>
                        </h5>
                    </div> -->
                        <div class="d-flex justify-content-between mb-2 ">
                            <h6 class=" text-muted">Tạm tính</h6>
                            <h6>
                                <?php echo $fm->formatNumber($tongSp + 0.1 * $tongSp) ?>
                            </h6>
                        </div>
                        <div class="d-flex justify-content-between mb-2 ">
                            <h6 class=" text-muted">Phí vận chuyển</h6>
                            <h6>
                                <?php echo $fm->formatNumber(20000) ?>
                            </h6>
                        </div>


                        <div class="d-flex justify-content-between mb-2 ">
                            <h6 class=" text-muted">Giảm giá</h6>

                            <h6 id="couponResult">
                                <?php echo $discountAmount; ?>%
                            </h6>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-between mb-2 ">
                            <h6 class=" text-muted">Tổng tiền</h6>
                            <div class="d-flex flex-column " style="align-items: flex-end;">
                                <h6 id="total_price" class="text-danger">
                                    <?php $discountValue = $tongSp * ($discountAmount / 100);
                                    $totalPrice = $tongSp + $shippingFee - $discountValue;
                                    echo $fm->formatNumber($totalPrice); ?>


                                </h6>
                                <span class="text-muted" style="font-size: 12px; line-height:16px">(Đã bao gồm VAT
                                    nếu
                                    có)</span>
                            </div>
                        </div>

                        <!-- <button type="submit" name="orderid" value="order" class="btn btn-dark btn-block btn-lg w-100"
                            data-mdb-ripple-color="dark"><a href="?orderid=order">Mua Ngay</a></button> -->
                        <button type="submit" name="orderid" value="order" class="btn btn-dark btn-block btn-lg w-100"
                            data-mdb-ripple-color="dark">Mua Ngay</button>

                    </div>
                </div>

            </form>
        </div>
    </div>

</div>





<?php
include 'inc/footer.php';
?>