<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>

<?php
$cat = new category();

if (isset($_GET['delid'])) {
	$id = $_GET['delid'];
	$delCat = $cat->delete_category($id);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$catName = $_POST['catName'];
	$insertCat = $cat->insert_category($catName);
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
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Quant Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$show_cate = $cat->show_category();
						if ($show_cate) {
							$i = 0;
							foreach ($show_cate as $result) {
								$i++;


								?>
								<tr class="odd gradeX">
									<td>
										<?php echo $i; ?>
									</td>
									<td>
										<?php echo $result['catName']; ?>
									</td>
									<td style="display: flex; flex-wrap: nowrap; gap: 4px"><button type="button"
											class="btn btn-primary"><a class="text-white"
												href="userEdit.php?userId=<?php echo $result['catId'] ?>">EDIT</a></button>
										<button type="button" class="btn btn-danger"><a class="text-white"
												onclick="return confirm('Bạn chắc chắn xóa chứ ?')"
												href="?delid=<?php echo $result['catId'] ?>">DELETE</a></button> </td>
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