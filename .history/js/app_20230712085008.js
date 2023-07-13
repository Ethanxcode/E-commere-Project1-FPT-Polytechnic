// document.querySelectorAll('.dropdown > a').forEach(e => {
//     e.addEventListener('click', (event) => event.preventDefault())
// })

// document.querySelectorAll('.mega-dropdown > a').forEach(e => {
//     e.addEventListener('click', (event) => event.preventDefault())
// })

document.querySelector('#mb-menu-toggle').addEventListener('click', () => document.querySelector('#header-wrapper').classList.add('active'))

document.querySelector('#mb-menu-close').addEventListener('click', () => document.querySelector('#header-wrapper').classList.remove('active'))

function applyCoupon() {
    // Lấy giá trị mã giảm giá từ trường nhập
    var couponCode = document.getElementsByName('couponCode')[0].value;

    // Gửi yêu cầu AJAX đến check_coupon.php
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'check_coupon.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Nhận phản hồi từ máy chủ
            var response = JSON.parse(xhr.responseText);

            // Kiểm tra kết quả từ máy chủ
            if (response.success) {
                // Cập nhật giao diện với số tiền được giảm
                var total = <?php echo $tongSp; ?>; // Tổng tiền hiện tại
                var discount = response.discountAmount; // Số tiền được giảm
                var newTotal = total - discount; // Tổng tiền mới

                // Hiển thị tổng tiền mới trên giao diện
                document.getElementById('total_price').innerText = newTotal;
            } else {
                // Cập nhật giao diện với thông báo lỗi
                alert(response.errorMessage);
            }
        }
    };
    xhr.send('couponCode=' + couponCode);
}
