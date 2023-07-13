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
<?php
$customer_id = Session::get('customer_id');
$login_cheack = Session::get('customer_login');
if ($login_cheack == false) {
    header('Location:login.php');
} else {
}
if (isset($_GET['id'])) {
    $wishListId = $_GET['id'];
    $delete_wishlist = $product->delete_wishlist($wishListId);
}
?>

<section class="h-100 h-custom" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="p-5">
                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <h1 class="fw-bold mb-0 text-black">Sản Phẩm Yêu Thích</h1>
                                    <?php
                                    if (isset($delete_wishlist)) {
                                        echo $delete_wishlist;
                                    } ?>
                                </div>
                                <hr class="my-4">
                                <?php
                                $customer_id = Session::get('customer_id');

                                $get_compare = $product->get_wishlist($customer_id);
                                if ($get_compare) {
                                    $i = 0;
                                    foreach ($get_compare as $result) {
                                        $i++;
                                        ?>

                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <h6 class="text-muted">STT</h6>
                                                <h6 class="text-black mb-0">
                                                    <?php echo $i; ?>
                                                </h6>
                                            </div>
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img style="height: 100px;" src="./admin/uploads/<?php echo $result['image'] ?>"
                                                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                                            </div>
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <h6 class="text-muted">Tên SP</h6>
                                                <h6 class="text-black mb-0">
                                                    <?php echo $result['productName'] ?>
                                                </h6>
                                            </div>
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <h6 class="text-muted">Giá</h6>
                                                <h6 class="text-black mb-0">
                                                    <?php echo $fm->formatNumber($result['price']) ?>
                                                </h6>
                                            </div>

                                            <div class="col-md-2 col-lg-2 col-xl-2 text-end">
                                                <a href="./product-detail.php?proid=<?php echo $result['productId'] ?>"
                                                    class=" btn btn-dark text-light">Mua Ngay</a>
                                            </div>
                                            <div class="col-md-2 col-lg-2 col-xl-2 text-end">
                                                <a href="?id=<?php echo $result['id']; ?>" class="text-muted"><i
                                                        class="fas fa-times"></i></a>
                                            </div>


                                        </div>

                                        <hr class="my-4">
                                        <?php

                                    }
                                }
                                ?>
                                <div class="pt-5">
                                    <h6 class="mb-0"><a href="./index.php" class="text-body"><i
                                                class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
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