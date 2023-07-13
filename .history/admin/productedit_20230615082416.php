<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>

<?php
$pd = new product();

if (!isset($_GET['productid']) || $_GET['productid'] == null) {
    echo "<script>window.location ='productlist.php'</script>";
} else {
    $id = $_GET['productid'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateProduct = $pd->update_product($_POST, $_FILES, $id);
}

?>
<div class="container-fluid">
    <?php
    if (isset($updateProduct)) {
        echo $updateProduct;
    }
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sửa sản phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                $get_product_by_id = $pd->getproductbyid($id);
                if ($get_product_by_id) {
                    foreach ($get_product_by_id as $result_product) {
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <td>
                                        <label>Tên</label>
                                    </td>
                                    <td>
                                        <input type="text" name="productName"
                                            value="<?php echo $result_product['productName']; ?>" class="medium" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Category</label>
                                    </td>
                                    <td>
                                        <select id="select" name="category">
                                            <option>-----Select Category-----</option>
                                            <?php
                                            $cat = new category();
                                            $catlist = $cat->show_category();
                                            if ($catlist) {
                                                foreach ($catlist as $result) {
                                                    ?>
                                                    <option <?php if ($result['catId'] == $result_product['catId']) {
                                                        echo 'selected';
                                                    } ?> value="<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?>
                                                    </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Brand</label>
                                    </td>
                                    <td>
                                        <select id="select" name="brand">
                                            <option>-----Select Brand-----</option>
                                            <?php
                                            $brand = new brand();
                                            $brandlist = $brand->show_brand();
                                            if ($brandlist) {
                                                foreach ($brandlist as $result) {
                                                    ?>
                                                    <!-- <option <?php if ($result['brandId'] == $result_product['brandId']) {
                                                        echo 'selected';
                                                    } ?> value="<?php echo $result['brandId']; ?>"><?php echo $result['brandName']; ?></option> -->
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding-top: 9px;">
                                        <label>Description</label>
                                    </td>
                                    <td>
                                        <textarea name="product_desc"
                                            class="tinymce"><?php echo $result_product['product_desc']; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Price</label>
                                    </td>
                                    <td>
                                        <input name="price" type="text" value="<?php echo $result_product['price']; ?>"
                                            class="medium" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Upload Image</label>
                                    </td>
                                    <td>
                                        <img src="./uploads/<?php echo $result_product['image']; ?>" width="80" alt="">
                                        <input name="image" type="file" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Product Type</label>
                                    </td>
                                    <td>
                                        <select id="select" name="type">
                                            <option>Select Type</option>
                                            <?php
                                            if ($result_product['type'] == 1) {
                                                ?>
                                                <option selected value="1">Featured</option>
                                                <option value="2">Non-Featured</option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="1">Featured</option>
                                                <option selected value="2">Non-Featured</option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button class="btn btn-primary" type="submit" name="submit">Save</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['deleteSelected'])) {
        if (isset($_POST['selectedItems'])) {
            $selectedItems = $_POST['selectedItems'];
            $delete_selected_comments = $pd->delete_selected_comments($selectedItems);
        }
    }
    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Danh sách bình luận
            </h6>
        </div>
        <div class="card-body">
            <?php
            if (isset($delete_selected_comments)) {
                echo $delete_selected_comments;
            }
            ?>
            <form id="commentForm" action="" method="post">
                <div class="table-responsive">
                    <table class="table border-primary table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Mã bình luận</th>
                                <th>Tên khách hàng</th>
                                <th>Nội dung</th>
                                <th>Ngày bình luận</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET['productid'])) {
                                $id = $_GET['productid'];
                                $get_comment = $pd->get_comment($id);
                            }
                            if ($get_comment) {
                                $i = 0;
                                foreach ($get_comment as $result) {
                                    $i++;
                                    ?>
                                    <tr class="align-items-center">
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $result['customerName']; ?>
                                        </td>
                                        <td>
                                            <textarea class="form-control" style="resize: none;" cols="46" rows="4" disabled
                                                readonly><?php echo $result['comment']; ?></textarea>
                                        </td>
                                        <td>
                                            <?php echo date('d/m/Y H:i', strtotime($result['CreatedAt'])); ?>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    value="<?php echo $result['commentId']; ?>" name="selectedItems[]"
                                                    id="checkbox<?php echo $i; ?>">
                                                <label class="form-check-label" for="checkbox<?php echo $i; ?>">
                                                    Chọn
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-danger" name="deleteSelected">Xóa mục đã chọn</button>
            </form>

            <div class="row mt-3">
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" name="selectAll" onclick="selectAll()">Chọn
                        tất
                        cả</button>
                    <button type="button" class="btn btn-secondary" name="deselectAll" onclick="deselectAll()">Bỏ
                        chọn tất cả</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<script>
    function selectAll(event) {
        event.preventDefault(); // Ngăn chặn sự kiện mặc định của nút submit
        let checkboxes = document.getElementsByName('selectedItems[]');
        checkboxes.forEach((checkbox) => {
            checkbox.checked = true;
        });
    }

    function deselectAll(event) {
        event.preventDefault(); // Ngăn chặn sự kiện mặc định của nút submit
        let checkboxes = document.getElementsByName('selectedItems[]');
        checkboxes.forEach((checkbox) => {
            checkbox.checked = false;
        });
    }
</script>
<!-- Load TinyMCE -->
<?php include 'inc/part4.php'; ?>