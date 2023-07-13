<?php
include 'inc/header.php';
?>

<?php
$login_cheack = Session::get('customer_login');
if ($login_cheack == false) {
    // header('Location:index.php');
}else{
    // echo "đã đăng nhập";
    header('Location:index.php');
}
?>

<?php
// $cs = new customer();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
  $tendangnhap = $_POST['tendangnhap'];
  setcookie('username', $tendangnhap  , time() + 3600, '/');
  
  $loginCustomer = $cs->login_Customer($_POST);
}


?>


<?php


?>
<div class="container">
  <section class="text-center">


    <div class="card mx-4 mx-md-5 shadow-5-strong mt-5" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
      <div class="card-body py-5 px-md-5">

        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="fw-bold mb-5">Đăng Nhập</h2>
            <?php
            if (isset($loginCustomer)) {
              echo $loginCustomer;
            }
            ?>
            <form action="" method="post">

              <div class="form-outline mb-4">
                <input placeholder="Tên Đăng Nhập" name="tendangnhap" type="text" class="form-control" />
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input placeholder="Mật Khẩu" type="password" name="matkhau" class="form-control" />
              </div>

              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                <label class="form-check-label" for="form2Example33">
                  Subscribe to our newsletter
                </label>
              </div>

              <!-- Submit button -->
              <button type="submit" name="login" class="btn btn-primary btn-block mb-4">
                Đăng Nhập
              </button>

              <!-- Register buttons -->
              <div class="text-center">
                <a class="text-red" href="./signup.php">Đăng Ký Tài Khoản Mới</a>

                <p>or login with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-github"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Section: Design Block -->

<?php
include 'inc/footer.php';
?>