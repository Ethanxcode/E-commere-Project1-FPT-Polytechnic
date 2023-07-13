<?php
include 'inc/header.php';
?>

<?php
// $cs = new customer();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
  $insertCustomer = $cs->insert_Customer($_POST, $_FILES);
}

?>
<div class="container">
  <section class="text-center">
    <!-- Background image -->

    <!-- Background image -->

    <div class="card mx-4 mx-md-5 shadow-5-strong mt-5" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
      <div class="card-body py-5 px-md-5">

        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="fw-bold mb-5">Đăng Ký</h2>

            <?php
            if (isset($insertCustomer)) {
              echo $insertCustomer;
            }
            ?>
            </h5>
            <!-- ///////////////////////////// -->
            <form action="" method="post">
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input placeholder="Họ & Tên" name="fullName" type="text" class="form-control" />
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input placeholder="Số Điện Thoại" name="phoneNumber" type="text" class="form-control" />
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input placeholder="Tên Đăng Nhập" name="username" type="text" class="form-control" />
              </div>
              <div class="form-outline mb-4">
                <input placeholder="Email" name="email" type="text" class="form-control" />
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input placeholder="Mật Khẩu" type="password" name="matkhau" class="form-control" />
              </div>
              <div class="form-outline mb-4">
                <input placeholder="Nhập Lại Mật Khẩu" type="password" class="form-control" />
              </div>

              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                <label class="form-check-label" for="form2Example33">
                  Subscribe to our newsletter
                </label>
              </div>

              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">
                Đăng Ký
              </button>

              <!-- Register buttons -->
              <div class="text-center">
                <a class="text-red" href="./login.php">Đăng Nhập</a>

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
            <!-- ///////////////////////////// -->
            <!-- ///////////////////////////// -->

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