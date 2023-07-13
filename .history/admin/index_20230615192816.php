<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>
<?php include '../classes/user.php'; ?>

<?php
$user = new user();
$show_index = $user->show_index();
$cart1 = 0;
$cart2 = 0;
$cart3 = 0;
$cart4 = 0;
if ($show_index) {
    foreach ($show_index as $result) {
        $cart1 += $result['sales'];
        $cart2 += $result['price'] * 1.1;
    }
}


$pd = new product();
$cat = new category();

$categoryData = $pd->countProductsByCategory();
$show_cate = $cat->show_category();

$data = [];
$data[] = ['Category', 'Quantity'];

foreach ($show_cate as $cat) {
    $catId = $cat["catId"];
    $catName = $cat["catName"];

    $count = 0;
    foreach ($categoryData as $row) {
        if ($row[0] == $catId) {
            $count = $row[1];
            break;
        }
    }

    $data[] = [$catName, $count];

}
var_dump(($data));

?>
<script>
    // // Set new default font family and font color to mimic Bootstrap's default styling
// (Chart.defaults.global.defaultFontFamily = 'Nunito'),
// 	'-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
// Chart.defaults.global.defaultFontColor = '#858796';

// // Pie Chart Example
// var ctx = document.getElementById('myPieChart');
// var myPieChart = new Chart(ctx, {
// 	type: 'doughnut',
// 	data: {
// 		labels: ['Direct', 'Referral', 'Social'],
// 		datasets: [
// 			{
// 				data: [55, 30, 15],
// 				backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
// 				hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
// 				hoverBorderColor: 'rgba(234, 236, 244, 1)',
// 			},
// 		],
// 	},
// 	options: {
// 		maintainAspectRatio: false,
// 		tooltips: {
// 			backgroundColor: 'rgb(255,255,255)',
// 			bodyFontColor: '#858796',
// 			borderColor: '#dddfeb',
// 			borderWidth: 1,
// 			xPadding: 15,
// 			yPadding: 15,
// 			displayColors: false,
// 			caretPadding: 10,
// 		},
// 		legend: {
// 			display: false,
// 		},
// 		cutoutPercentage: 80,
// 	},
// });

</script>

<script>
    (Chart.defaults.global.defaultFontFamily = 'Nunito'),
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';
    // Hàm để nhận dữ liệu từ PHP
    function setDataFromPHP(data) {
        var phpData = data;

        // Pie Chart Example
        var ctx = document.getElementById('myPieChart');
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: phpData.map(function (item) {
                    return item[0];
                }),
                datasets: [{
                    data: phpData.map(function (item) {
                        return item[1];
                    }),
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#000', '#17a673', '#2c9faf'],
                    hoverBorderColor: 'rgba(234, 236, 244, 1)',
                }],
            },
            // ...
        });
    }

    // Gọi hàm để truyền dữ liệu từ PHP sang JavaScript
    setDataFromPHP(<?php echo json_encode($data); ?>);
</script>

<div class="container-fluid">
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
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
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
                                <?php echo $cart2 ?>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-12 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
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
    </div>

    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Referral
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


<?php include 'inc/part4.php'; ?>