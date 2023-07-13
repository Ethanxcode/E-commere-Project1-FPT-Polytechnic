<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['couponCode'])) {
    $couponCode = $_POST['couponCode'];
    $currentTime = date('Y-m-d'); // Lấy thời gian hiện tại

    // Tạo đối tượng của class chứa hàm checkCoupon()

    // Gọi hàm checkCoupon() và nhận kết quả
    $result = $ct->checkCoupon($couponCode, $currentTime);

    // Trả về kết quả dưới dạng JSON
    echo json_encode($result);
}

?>