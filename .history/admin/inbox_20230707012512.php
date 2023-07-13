<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/cart.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
$ct = new cart();
if (isset($_GET['shiftid'])) {

	$id = $_GET['shiftid'];
	$time = $_GET['time'];
	$price = $_GET['price'];
	$shifted = $ct->shifted($id, $time, $price);
}
if (isset($_GET['delid'])) {
	$id = $_GET['delid'];
	$time = $_GET['time'];
	$price = $_GET['price'];
	$del_shifted = $ct->del_shifted($id, $time, $price);
}

?>
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Xử lý đơn hàng</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">

				<?php
				if (isset($shifted)) {
					echo $shifted;
				}
				if (isset($del_shifted)) {
					echo $del_shifted;
				}
				?>
				<table class="table border-primary table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Mã đơn</th>
							<th>Thời gian đặt hàng</th>
							<th>Sản phẩm</th>
							<th>Số lượng</th>
							<th>Giá</th>
							<th>Tên khách hàng</th>
							<th>Thông tin</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$ct = new cart();
						$fm = new Format();
						$get_inbox_cart = $ct->get_inbox_cart();
						if ($get_inbox_cart) {
							$i = 0;
							foreach ($get_inbox_cart as $result) {
								$i++;
								?>
								<tr class="odd gradeX">
									<td>
										<?php echo $i ?>
									</td>
									<td>
										<?php echo $fm->formatDate($result['date_order']) ?>
									</td>
									<td>
										<?php echo $result['productName'] ?>
									</td>
									<td>
										<?php echo $result['quantity'] ?>
									</td>
									<td>
										<?php echo $result['price'] ?>
									</td>
									<td>
										<?php echo $result['fullName'] ?>
									</td>
									<td>
									</td>
									<?php
									if ($result['status'] == 0) {
										?>
										<td><a class="btn btn-warning"
												href="?shiftid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Đang
												chờ xử lý</a></td>
										<?php
									} elseif ($result['status'] == 1) {
										?>

										<td><a href="">Đã Xử lí</a></td>
										<?php
									} else {
										?>
										<td><a class="btn btn-danger"
												href="?delid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Xóa</a>
											<a class="btn btn-primary"
												href="customerInfo.php?customerid=<?php echo $result['customer_id'] ?>">Xem thông
												tin</a>
										</td>
										<?php
									}
									?>
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
</div>
<script type="text/javascript">
	$(document).ready(function () {
		setupLeftMenu();

		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>
<?php include 'inc/part4.php'; ?>