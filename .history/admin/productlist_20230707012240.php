<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>
<?php

include_once '../helpers/format.php';
?>
<div id="wrapper">
	<div id="content-wrapper" class="d-flex flex-column">
		<div id="content">
			<div class="container-fluid">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">
							Danh sách sản phẩm
						</h6>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table border-primary table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>ID</th>
										<th>Product Name</th>
										<th>Price</th>
										<th>Image</th>
										<th>Category</th>
										<th>Brand</th>
										<!-- <th>DESC</th> -->
										<th>Type</th>
										<th>Comments</th>
										<th>Sales</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$pd = new product();
									$fm = new Format();
									if (isset($_GET['productid'])) {
										$id = $_GET['productid'];
										$delpro = $pd->delete_product($id);
										echo $delpro;
									}
									$pdlist = $pd->show_product();
									if ($pdlist) {
										$i = 0;
										foreach ($pdlist as $result) {
											$i++;

											?>
											<tr>
												<td>
													<?php echo $i; ?>
												</td>
												<td>
													<?php echo $result['productName'] ?>
												</td>
												<td>
													<?php echo $result['price'] ?>
												</td>
												<td><img src="./uploads/<?php echo $result['image'] ?>" height="40" alt=""></td>
												<td>
													<?php echo $result['catName'] ?>
												</td>
												<td>
													<?php echo $result['brandName'] ?>
												</td>
												<!-- <td><?php echo $fm->textShorten($result['product_desc'], 50); ?></td> -->
												<td>
													<?php if ($result['type'] == 1) {
														echo 'Featured';
													} else {
														echo 'Non Featured';
													} ?>
												</td>
												<td>
													<?php echo $result['commentCount'] ?>
												</td>
												<td>
													<?php echo $result['sales'] ?>
												</td>

												<!-- <td class="center"><?php echo $result['image'] ?></td> -->
												<td style="display: flex; flex-wrap: nowrap; gap: 4px">
													<button type="button" class="btn btn-primary"><a class="text-white"
															href="./productedit.php?productid=<?php echo $result['productId']; ?>">Xem
														</a>
													</button> <button type="button" class="btn btn-danger"><a class="text-white"
															href="?productid=<?php echo $result['productId'] ?>;">Xóa</a></button>
												</td>
											</tr>
											<?php
										}
									}
									;
									?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- <div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">


				

			</div>
		</div>
	</div>
</div> -->

<script type="text/javascript">
	$(document).ready(function () {
		setupLeftMenu();
		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>
<?php include 'inc/part4.php'; ?>