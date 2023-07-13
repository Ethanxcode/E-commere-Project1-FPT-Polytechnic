<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>
<?php
$product = new product();

if (isset($_GET['slidertype'])) {
	$type = $_GET['slidertype'];
	$id = $_GET['sliderid'];
	$update_slider = $product->update_type_slider($type, $id);
}
if (isset($_GET['delslider'])) {
	$id = $_GET['delslider'];
	$del_slider = $product->del_slider($id);
}
?>


<div class="container-fluid">
	<?php
	if (isset($del_slider)) {
		echo $del_slider;
	}
	if (isset($update_slider)) {
		echo $update_slider;
	}
	?>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Danh sách Slider</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table border-primary table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
							<th>Slider Title</th>
							<th>Slider Image</th>
							<th>Type</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$get_slider = $product->show_list_slider();
						if ($get_slider) {
							$i = 0;
							foreach ($get_slider as $result_slider) {
								$i++;
								?>
								<tr class="odd gradeX">
									<td>
										<?php echo $i ?>
									</td>
									<td>
										<?php
										echo $result_slider['title'];
										?>
									</td>
									<td><img src="./uploads/<?php
									echo $result_slider['image'];
									?>" height="100px" width="100px" /></td>
									<td>
										<?php
										if ($result_slider['type'] == 1) {
											?>
											<button type="button" class="btn btn-primary"><a class="text-white"
													href="?slidertype=<?php echo $result_slider['type']; ?>&sliderid=<?php echo $result_slider['id']; ?>">Đã
													Hiện</a></button>


											<?php
										} else {

											?>
											<button type="button" class="btn btn-warning"><a class="text-white"
													href="?slidertype=<?php echo $result_slider['type']; ?>&sliderid=<?php echo $result_slider['id']; ?>">Đã
													Tắt</a></button>



											<?php
										}
										?>
									</td>
									<td>
										<button type="button" class="btn btn-danger"><a class="text-white"
												href="?delslider=<?php echo $result_slider['id']; ?>"
												onclick="return confirm('Are you sure to Delete!');">Delete</a></button>

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