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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/18f6e92ffa.js" crossorigin="anonymous"></script>
<script>
    // Lắng nghe sự kiện onchange của input couponCode
    document.getElementById("couponCode").addEventListener("change", function () {
        // Lấy giá trị của input couponCode
        var couponCode = this.value;

        // Tạo đối tượng XMLHttpRequest
        var xhr = new XMLHttpRequest();

        // Xác định phương thức và URL của file PHP để xử lý yêu cầu
        xhr.open("GET", "check_coupon.php?couponCode=" + couponCode, true);

        // Xử lý kết quả trả về từ file PHP
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Kết quả trả về là một chuỗi JSON
                var result = JSON.parse(xhr.responseText);

                // Xử lý kết quả theo ý của bạn
                console.log(result); // In kết quả ra console
            }
        };

        // Gửi yêu cầu AJAX
        xhr.send();
    });
</script>

</body>

</html>