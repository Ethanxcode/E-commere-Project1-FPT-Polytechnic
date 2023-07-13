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
    function redirectToOfflinePage() {
        var couponCode = document.getElementById('couponCode').value;

        // Kiểm tra nếu giá trị coupon là null hoặc rỗng
        if (!couponCode) {
            alert('Vui lòng nhập mã giảm giá.');
            return; // Dừng hàm và không chuyển hướng đến trang "offline.php"
        }

        var url = 'offline.php?couponCode=' + couponCode;
        window.location.href = url;
    }

</script>

</body>

</html>