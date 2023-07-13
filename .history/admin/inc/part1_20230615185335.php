<?php
include_once '../lib/session.php';
// include_once '../classes/category.php';
include '../classes/product.php';
include '../classes/brand.php';
include '../classes/category.php';

Session::checkSession();
?>
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");

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


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Dashboard</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(<?php echo json_encode($data); ?>);

            var options = {
                title: 'Product Quantity by Category',
                is3D: true,
                colors: ['#004182', '#118DF0', '#FBFFA3', '#FC7300', '#1B9C85'],
                backgroundColor: 'transparent',
            };

            var chart = new google.visualization.PieChart(document.getElementById('myPieChart'));
            chart.draw(data, options);
        }
    </script>
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img width="50"
                        src="https://cdn0.iconfinder.com/data/icons/web-hosting-technicons-vol-1/256/Authorization_Manager-512.png"
                        alt="">
                </div>
                <div class="sidebar-brand-text mx-3">TPShop Admin</div>
            </a>
            <hr class="sidebar-divider">
            <!-- ///////////////////////////// -->
            <div class="sidebar-heading">
                Quản Lý Sản Phẩm
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#one" aria-expanded="true"
                    aria-controls="one">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Xem chức năng</span>
                </a>
                <div id="one" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Slider:</h6>
                        <a class="collapse-item" href="slideradd.php">Thêm slider</a>
                        <a class="collapse-item" href="sliderlist.php">Danh sách slider</a>
                        <h6 class="collapse-header">Danh mục sản phẩm:</h6>
                        <a class="collapse-item" href="catadd.php">Thêm danh mục</a>
                        <a class="collapse-item" href="catlist.php">Danh sách danh mục</a>
                        <h6 class="collapse-header">Thương hiệu sản phẩm:</h6>
                        <a class="collapse-item" href="brandadd.php">Thêm thương hiệu</a>
                        <a class="collapse-item" href="brandlist.php">Danh sách thương hiệu</a>
                        <h6 class="collapse-header">Sản phẩm:</h6>
                        <a class="collapse-item" href="productadd.php">Thêm Sản phẩm</a>
                        <a class="collapse-item" href="productlist.php">Danh sách Sản phẩm</a>

                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <!-- ///////////////////////////// -->
            <div class="sidebar-heading">
                Quản lý người dùng
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#two" aria-expanded="true"
                    aria-controls="two">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Xem chức năng</span>
                </a>
                <div id="two" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="users.php">Thông tin người dùng</a>

                    </div>
                </div>
            </li>
            <!-- 
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#three" aria-expanded="true" aria-controls="three">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Thương hiệu sản phẩm</span>
                </a>
                <div id="three" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#five" aria-expanded="true" aria-controls="five">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Sản phẩm</span>
                </a>
                <div id="five" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                    </div>
                </div>
            </li> -->
            <hr class="sidebar-divider">
            <!-- ///////////////////////////// -->
            <div class="sidebar-heading">
                Xử Lý
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#six" aria-expanded="true"
                    aria-controls="six">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Inbox</span>
                </a>
                <div id="six" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="inbox.php">Xử lý đơn hàng</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">


            <!-- /////////////////////////////////// -->

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>