<footer class="bg-second">
    <div class="container">
        <div class="row">
            <div class="col-3 col-md-6">
                <h3 class="footer-head">Products</h3>
                <ul class="menu">
                    <li><a href="#">Help center</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">product help</a></li>
                    <li><a href="#">warranty</a></li>
                    <li><a href="#">order status</a></li>
                </ul>
            </div>
            <div class="col-3 col-md-6">
                <h3 class="footer-head">services</h3>
                <ul class="menu">
                    <li><a href="#">Help center</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">product help</a></li>
                    <li><a href="#">warranty</a></li>
                    <li><a href="#">order status</a></li>
                </ul>
            </div>
            <div class="col-3 col-md-6">
                <h3 class="footer-head">support</h3>
                <ul class="menu">
                    <li><a href="#">Help center</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">product help</a></li>
                    <li><a href="#">warranty</a></li>
                    <li><a href="#">order status</a></li>
                </ul>
            </div>
            <div class="col-3 col-md-6 col-sm-12">
                <div class="contact">
                    <h3 class="contact-header">
                        XSHOP
                    </h3>
                    <ul class="contact-socials">
                        <li><a href="#">
                                <i class='bx bxl-facebook-circle'></i>
                            </a></li>
                        <li><a href="#">
                                <i class='bx bxl-instagram-alt'></i>
                            </a></li>
                        <li><a href="#">
                                <i class='bx bxl-youtube'></i>
                            </a></li>
                        <li><a href="#">
                                <i class='bx bxl-twitter'></i>
                            </a></li>
                    </ul>
                </div>
                <div class="subscribe">
                    <input type="email" placeholder="ENTER YOUR EMAIL">
                    <button>subscribe</button>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->

<!-- app js -->
<!-- <script src="./js/app.js"></script> -->
<script src="./js/index.js"></script>
<script src="https://kit.fontawesome.com/18f6e92ffa.js" crossorigin="anonymous"></script>
<script>
    function applyCoupon() {
        var couponCode = document.getElementById('couponCode').value;

        // Tạo yêu cầu POST với fetch
        fetch(window.location.href, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'couponCode=' + couponCode
        })
            .then(function (response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Lỗi kết nối máy chủ');
                }
            })
            .then(function (data) {
                // Xử lý kết quả từ máy chủ
                if (data.isValid) {
                    var discountAmount = data.discountAmount;
                    var totalPrice = parseFloat(<?php echo $tongSp; ?>);
                    var newTotalPrice = totalPrice - discountAmount;
                    document.getElementById('total_price').innerText = newTotalPrice.toFixed(2);
                } else {
                    alert(data.errorMessage);
                }
            })
            .catch(function (error) {
                alert(error.message);
            });
    }

    document.getElementById('couponCode').addEventListener('input', function () {
        applyCoupon();
    });
</script>
</body>

</html>