<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>
<?php
$product = new product();
if (isset($_POST['submit'])) {
    $insertSlider = $product->insert_slider($_POST, $_FILES);
}
?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm slider</h6>
        </div>
        <div class="alert alert-light" role="alert">
            <a href="./sliderlist.php" class="alert-link">Quay lại danh sách</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                if (isset($insertSlider)) {
                    echo $insertSlider;
                }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Slider Title..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="sliderName" placeholder="Enter Slider Title..."
                                    class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>DESC</label>
                            </td>
                            <td>
                                <input type="text" name="sliderDesc" placeholder="Enter Slider Title..."
                                    class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Type</label>

                            </td>
                            <td>
                                <select name="type" id="">
                                    <option value="1">on</option>
                                    <option value="0">off</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Save</button>

                            </td>
                        </tr>
                    </table>
                </form>
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
<!-- Load TinyMCE -->
<?php include 'inc/part4.php'; ?>