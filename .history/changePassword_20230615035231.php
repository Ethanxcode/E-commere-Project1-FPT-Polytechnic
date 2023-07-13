<?php
include 'inc/header.php';
?>
<?php
$login_cheack = Session::get('customer_login');
if ($login_cheack == false) {
    header('Location:index.php');
} else {
}
$id = Session::get('customer_id');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $updateProfile = $cs->update_profile($_POST, $_FILES, $id);
}
?>

<?php
$get_customer = $cs->shows_customer($id);
if (isset($updateProfile)) {
    echo $updateProfile;
}
if ($get_customer) {
    foreach ($get_customer as $result) {

        ?>

        <section style="background-color: #eee;">
            <div class="container py-5">
                <div class="row">
                    <div class="col">
                        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                                <li class="breadcrumb-item "><a href="./profile.php">User Profile</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php echo $result['username'] ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="./admin/uploads/<?php echo $result['userImage'] ?>" alt="avatar"
                                    class="img-fluid img-profile"
                                    style="width: 150px; height: 140px; border-radius: 50%; object-fit: cover; object-position: center;">
                                <h5 class="my-3">
                                    <?php echo $result['fullName'] ?>
                                </h5>
                                <p class="text-muted mb-1">Full Stack Developer</p>
                                <p class="text-muted mb-4">
                                    <?php echo $result['phoneNumber'] ?>
                                </p>
                                <div class="d-flex justify-content-center mb-2">
                                    <!-- <button type="button" class="btn btn-primary">Follow</button>
                            <button type="button" class="btn btn-outline-primary ms-1">Message</button> -->
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fas fa-globe fa-lg text-warning"></i>
                                        <p class="mb-0">https://mdbootstrap.com</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                        <p class="mb-0">mdbootstrap</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                        <p class="mb-0">@mdbootstrap</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                        <p class="mb-0">mdbootstrap</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                        <p class="mb-0">mdbootstrap</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <form action="" method="post">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="oldPassword" class="mb-0">Mật khẩu cũ</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="password" name="oldPassword" class="form-control" id="oldPassword">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="newPassword" class="mb-0">Mật khẩu mới</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="password" name="newPassword" class="form-control" id="newPassword">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="confirmPassword" class="mb-0">Xác nhận mật khẩu</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="password" name="confirmPassword" class="form-control"
                                                id="confirmPassword">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-primary w-100" type="submit">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                                </p>
                                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                <div class="progress rounded mb-2" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    -->
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
?>
<?php
include 'inc/footer.php';
?>