<?php
include 'inc/header.php';

$login_check = Session::get('customer_login');
if (!$login_check) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $customer_id = Session::get('customer_id');
    $insertOrder = $ct->insertOrder($customer_id);

    // Lấy giá trị từ form
    $message = isset($_POST['message']) ? $_POST['message'] : '';
    $coupon_code = isset($_POST['coupon_code']) ? $_POST['coupon_code'] : '';
    $shipping_fee = isset($_POST['shipping_fee']) ? $_POST['shipping_fee'] : '';

    // Tính toán giá trị tổng đơn hàng với mã giảm giá, phí vận chuyển và thuế
    $total_price = 0;
    $get_product_cart = $ct->get_product_cart();
    if ($get_product_cart) {
        foreach ($get_product_cart as $result) {
            $quantity = $result['quantity'];
            $price = $result['price'] * $quantity;
            $total_price += $price;
        }
    }
    
    // Áp dụng mã giảm giá nếu có
    if (!empty($coupon_code)) {
        // TODO: Xử lý mã giảm giá và tính toán giá sau khi áp dụng mã giảm giá
        // $discounted_price = ... // Tính giá sau khi áp dụng mã giảm giá
        // $total_price = $discounted_price;
    }

    // Thêm phí vận chuyển
    if (!empty($shipping_fee)) {
        $total_price += $shipping_fee;
    }

    // Thêm thuế (VAT)
    $vat = 0.1 * $total_price;
    $total_price += $vat;

    // Thêm các giá trị vào câu truy vấn đơn hàng
    $get_product_cart = $ct->get_product_cart();
    if ($get_product_cart) {
        foreach ($get_product_cart as $result) {
            $productId = $result['productId'];
            $productName = $result['productName'];
            $quantity = $result['quantity'];
            $price = ($result['price'] * $quantity) * 1.1;
            $image = $result['image'];
            $customer_id = $customer_id;

            // Thêm thông tin lời nhắn, mã giảm giá, phí vận chuyển và tổng giá vào câu truy vấn
            $insert_order = "INSERT INTO tbl_order (productId, productName, quantity, price, image, customer_id, message, coupon_code, shipping_fee, total_price) 
                VALUES ('$productId', '$productName', '$quantity', '$price', '$image', '$customer_id', '$message', '$coupon_code', '$shipping_fee', '$total_price')";
            $insert_order = $this->db->insert($insert_order);
        }
    }

    $delCart = $ct->dell_data_cart();
    header('Location: success.php');
    exit();
}
?>

<div class="container">
    <div class="row">
        <div class="col-7">
            <!-- Nội dung giỏ hàng -->
        </div>
        <div class="col-5">
            <form method="POST" action="?orderid=order">
                <div class="p-5">
                    <h1 class="fw-bold mb-0 text-black">Thông Tin khách hàng</h1>
                    <div class="pt-5">
                        <!-- Thông tin khách hàng -->
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Lời nhắn</p>
                        </div>
                        <div class="col-sm-9">
                            <input name="message" placeholder="Lưu ý cho người bán..." class="form-control text-muted mb-0" />
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Mã giảm giá</p>
                        </div>
                        <div class="col-sm-9">
                            <input name="coupon_code" placeholder="Mã giảm giá..." class="form-control text-muted mb-0" />
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Phí vận chuyển</p>
                        </div>
                        <div class="col-sm-9">
                            <input name="shipping_fee" placeholder="Phí vận chuyển..." class="form-control text-muted mb-0" />
                        </div>
                    </div>
                    <hr>
                    <div class="pt-5">
                        <h3 class="fw-bold mb-5 mt-2 pt-1">Tóm tắt đơn hàng</h3>
                        <!-- Tóm tắt đơn hàng -->
                        <button type="submit" name="submit" class="btn btn-dark btn-block btn-lg w-100" data-mdb-ripple-color="dark">Mua Ngay</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include 'inc/footer.php';
?>
