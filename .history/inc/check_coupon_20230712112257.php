if (isset($_GET['couponCode'])) {
$couponCode = $_GET['couponCode'];
$currentTime = date('Y-m-d'); // Lấy thời gian hiện tại

// Tạo đối tượng của class chứa hàm checkCoupon()

// Gọi hàm checkCoupon() và nhận kết quả
$result = $ct->checkCoupon($couponCode, $currentTime);

// Trả về kết quả dưới dạng JSON
echo json_encode($result);
}
?>