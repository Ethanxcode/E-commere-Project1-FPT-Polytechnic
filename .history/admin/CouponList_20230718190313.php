<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>

<?php
$pd = new product();
$coupon = new coupon();

if (isset($_GET['delid'])) {
    $id = $_GET['delid'];
    $delCat = $cat->delete_category($id);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catName = $_POST['catName'];
    $insertCat = $cat->insert_category($catName);
}


$showCoupon = $coupon->showCoupon();


$categoryData = $pd->getProductStatsByCategory();
$categoryCount = [];
foreach ($categoryData as $row) {
    $catId = $row['category'];
    $count = $row['count'];
    $maxPrice = $row['maxPrice'];
    $avgPrice = $row['avgPrice'];
    $minPrice = $row['minPrice'];
    $categoryCount[$catId] = $count;
    $categoryMaxPrice[$catId] = $maxPrice;
    $categoryAvgPrice[$catId] = $avgPrice;
    $categoryMinPrice[$catId] = $minPrice;
}


?>
<div class="container-fluid">
    <?php
    if (isset($delCat)) {
        echo $delCat;
    }
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách danh mục</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table border-primary table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Tên mã</th>
                            <th>Phần trăm giảm giá</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Giá sản phẩm thấp nhất</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($showCoupon)) {

                            $i = 0;
                            foreach ($showCoupon as $result) {
                                $i++;
                                ?>
                                <tr class="odd gradeX">
                                    <td>
                                        <?php echo $i; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['couponCode']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result[''] ?>
                                    </td>
                                    <td>
                                        <?php echo isset($categoryMaxPrice[$result['catId']]) ? $categoryMaxPrice[$result['catId']] : 0; ?>
                                    </td>
                                    <td>
                                        <?php echo isset($categoryAvgPrice[$result['catId']]) ? $categoryAvgPrice[$result['catId']] : 0; ?>
                                    </td>
                                    <td>
                                        <?php echo isset($categoryMinPrice[$result['catId']]) ? $categoryMinPrice[$result['catId']] : 0; ?>
                                    </td>
                                    <td style="display: flex; flex-wrap: nowrap; gap: 4px">
                                        <button type="button" class="btn btn-primary">
                                            <a class="text-white"
                                                href="catedit.php?catid=<?php echo $result['catId'] ?>">Sửa</a>
                                        </button>
                                        <button type="button" class="btn btn-danger">
                                            <a class="text-white" onclick="return confirm('Bạn chắc chắn xóa chứ ?')"
                                                href="?delid=<?php echo $result['catId'] ?>">Xóa</a>
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/part4.php'; ?>