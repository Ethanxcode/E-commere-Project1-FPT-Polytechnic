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
                                    if ($get_product_cart) {
                                        foreach ($get_product_cart as $result) {
                                            $slSp++;

                                            ?>

                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src="./admin/uploads/<?php echo $result['image'] ?>"
                                                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                </div>
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <h6 class="text-muted">Tên Sản phẩm</h6>
                                                    <h6 class="text-black mb-0">
                                                        <?php echo $result['productName'] ?>
                                                    </h6>
                                                </div>
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <h6 class="text-muted">Giá</h6>
                                                    <h6 class="text-black mb-0">
                                                        <?php echo $result['price'] ?>
                                                    </h6>
                                                </div>

                                                <div class="col-md-2 col-lg-2 col-xl-2 ">
                                                    <!-- <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                    <i class="fas fa-minus"></i>
                                                </button> -->
                                                    <h6 class="text-muted">Số lượng</h6>
                                                    <form class="d-flex" action="" method="post">
                                                        <input value="<?php echo $result['cartId']; ?>" type="hidden"
                                                            name="cartId">
                                                        <input id="form1" min="0" name="quantity"
                                                            value="<?php echo $result['quantity'] ?>" type="number"
                                                            class="form-control form-control-sm" />
                                                        <button class="btn btn-link px-2">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                    </form>


                                                    <!-- <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                    <i class="fas fa-plus"></i>
                                                </button> -->
                                                </div>
                                                <!-- <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="text-muted">Tổng Giá</h6>

                                                    <h6 class="mb-0">
                                                        <?php
                                                        $gia = $result['price'] * $result['quantity'];
                                                        $tongSp += $gia;

                                                        echo $fm->formatNumber($gia);
                                                        ?>
                                                    </h6>
                                                </div> -->
                                                <div
                                                    class="col-md-1 col-lg-1 col-xl-1 d-flex align-items-center justify-content-center">
                                                    <a href="?cartId=<?php echo $result['cartId']; ?>" class="text-muted"
                                                        style="font-size: 16px;"><i class="fas fa-times"></i></a>
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



                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="./index.php" class="text-body"><i
                                                    class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Thông tin đơn hàng</h3>
                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase">
                                            <?php echo $slSp; ?> Sản Phẩm
                                        </h5>
                                        <h5>
                                            <?php echo $fm->formatNumber($tongSp); ?>
                                        </h5>
                                    </div>

                                    <h5 class="text-uppercase mb-3">VAT 10%</h5>

                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Total price</h5>
                                        <h5>
                                            <?php echo $fm->formatNumber($tongSp + $tongSp * 0.1); ?>
                                        </h5>
                                    </div>

                                    <button type="button" class="btn btn-dark btn-block btn-sm"
                                        data-mdb-ripple-color="dark">Thanh Toán Online</button>
                                    <button type="button" class="btn btn-dark btn-block btn-sm mt-3"
                                        data-mdb-ripple-color="dark"><a href="./offline.php">Thanh Toán Khi Nhận
                                            Hàng</a></button>

                                </div>
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