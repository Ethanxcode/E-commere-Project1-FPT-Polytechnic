<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>
<?php include '../classes/user.php'; ?>

<?php
$cs = new customer();
$user = new user();
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
			<h6 class="m-0 font-weight-bold text-primary">Danh sách khách hàng</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<?php // $deleteUser = $cs->deleteUser($customerId);
				if ($deleteUser) {
					return $deleteUser;
				} ?>
				<table class="table border-primary table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
							<th>Tên khách hàng</th>
							<th>Tên đăng nhập</th>
							<th>Email</th>
							<th>SĐT</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$get_user = $user->show_customer();


						if ($get_user) {
							$i = 0;
							foreach ($get_user as $result) {
								$i++;
								?>
								<tr class="odd gradeX">
									<td>
										<?php echo $i ?>
									</td>
									<td>
										<?php
										echo $result['fullName'];
										?>
									</td>
									<td>
										<?php
										echo $result['username'];
										?>
									</td>
									<td>
										<?php
										echo $result['email'];
										?>
									</td>
									<td>
										<?php
										echo $result['phoneNumber'];
										?>
									</td>
									<td style="display: flex; flex-wrap: nowrap; gap: 4px"><button type="button"
											class="btn btn-primary"><a class="text-white"
												href="userEdit.php?customerid=<?php echo $result['customer_id'] ?>">Xem</a></button>
										<button type="button" class="btn btn-danger"><a class="text-white"
												onclick="return confirm('Bạn chắc chắn xóa chứ ?')"
												href="?delid=<?php echo $result['customer_id'] ?>">Xóa</a></button>
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
</div>

<!-- /////// -->
<!-- /////// -->
<?php include 'inc/part4.php'; ?>