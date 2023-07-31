<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>
<?php include '../classes/user.php'; ?>

<?php
$fm = new Format();
$user = new user();
$show_index = $user->show_index();
$cart1 = $user->calculateTotalSales();
$cart2 = $user->calculateTotalRevenue();
$cart3 = 0;
$cart4 = $user->getOrderTypeCount();
$cart5 = $user->getOrderTypeCancel();
$cart6 = $user->getBrandCount();
$cart7 = $user->getCategoryCount();




// Lấy giá trị của $cart4 từ bảng tbl_order có type = 0

?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Sản Phẩm Đã Bán</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $cart1 ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="./inbox.php"> <i class="fas fa-calendar fa-2x text-gray-300"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Tổng doanh thu</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$
                                <?php echo $fm->formatNumber($cart2) ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Chỉ tiêu (
                                <?php echo $cart1 ?>/1000 )
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php echo $cart1 / 10 ?>%
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: <?php echo $cart1 / 10 ?>%" aria-valuenow="50"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center justify-content-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Đơn cần xử lý</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $cart4 ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="./inbox.php"> <i class="fas fa-comments fa-2x text-gray-300"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>
    <div class="row">
        <div class="col-xl-6 col-md-12 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Chart</h6>
                </div>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <!-- <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Đơn cần xử lý</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div> -->
                            <div id="adminChart" style="width:100%;  height:250px"></div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-12 mb-4 row">
            <div class="col-lg-5 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center justify-content-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Đơn bị hủy</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $cart5 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <a href="./inbox.php"> <i class="fas fa-comments fa-2x text-gray-300"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 mb-4">
                <div class="card bg-success text-white shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center justify-content-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Đơn bị hủy</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $cart6 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <a href="./inbox.php"> <i class="fas fa-comments fa-2x text-gray-300"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 mb-4">
                <div class="card bg-info text-white shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center justify-content-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Đơn bị hủy</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $cart6 ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <a href="./inbox.php"> <i class="fas fa-comments fa-2x text-gray-300"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                        Warning
                        <div class="text-white-50 small">#f6c23e</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mb-4">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                        Danger
                        <div class="text-white-50 small">#e74a3b</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                        Secondary
                        <div class="text-white-50 small">#858796</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 mb-4">
                <div class="card bg-light text-black shadow">
                    <div class="card-body">
                        Light
                        <div class="text-black-50 small">#f8f9fc</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 mb-4">
                <div class="card bg-dark text-white shadow">
                    <div class="card-body">
                        Dark
                        <div class="text-white-50 small">#5a5c69</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include 'inc/part4.php'; ?>