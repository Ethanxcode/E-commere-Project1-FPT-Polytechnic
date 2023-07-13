<?php
// Kết nối tới cơ sở dữ liệu và khởi tạo các đối tượng cần thiết

if (isset($_GET['couponCode'])) {
    $couponCode = $_REQUEST['couponCode'];
    $currentTime = date('Y-m-d'); // Lấy thời gian hiện tại

    // Tạo đối tượng của class chứa hàm checkCoupon()

    // Gọi hàm checkCoupon() và nhận kết quả
    $result = $ct->checkCoupon($couponCode, $currentTime);

    // Trả về kết quả dưới dạng JSON
    echo json_encode($result);
}
?>