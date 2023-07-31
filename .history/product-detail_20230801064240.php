<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>


<?php
if (!isset($_GET['proid']) || $_GET['proid'] == null) {
    // echo "<script>window.location ='index.php'</script>";
} else {
    $id = $_GET['proid'];
}
$customer_id = Session::get('customer_id');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['quantity'])) {
    $quantity = $_POST['quantity'];
    $add_to_cart = $ct->add_to_cart($quantity, $id);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {
    $productid = $_POST['productid'];
    $insertCompare = $product->insertCompare($productid, $customer_id);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])) {
    $productid = $_POST['productid'];
    $insertWishlist = $product->insertWishlist($productid, $customer_id);
}
// comment
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment']) && $_POST['comment'] != null) {
    $productid = $_GET['proid'];
    $comment = $_POST['comment'];
    $customerId = Session::get('customer_id');

    $customerName = Session::get('customer_name');
    $insertWishlist = $product->insert_comment($productid, $customerId, $customerName, $comment);
    header("Location: product-detail.php?proid=" . $id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_comment'])) {
    $productid = $_GET['proid'];
    $customerName = Session::get('customer_name');
    $comment = $_POST['comment'];
    $deleteResult = $product->delete_comment($productid, $customerName, $comment);
    header("Location: product-detail.php?proid=" . $id);
}

?>



<div class="bg-main">
    <div class="container">
        <?php
        $get_product_detail = $product->get_details($id);
        if ($get_product_detail) {
            foreach ($get_product_detail as $result_detail) {


                ?>
                <div class="box">
                    <div class="breadcumb">
                        <a href="./index.php">home</a>
                        <span><i class='bx bxs-chevrons-right'></i></span>
                        <a href="./products.php">
                            <?php
                            echo $result_detail['catName'];
                            ?>
                        </a>
                        <span><i class='bx bxs-chevrons-right'></i></span>
                        <a href="./product-detail.php">
                            <?php
                            echo $result_detail['productName'];
                            ?>
                        </a>
                    </div>
                </div>
                <!-- ///////////// -->
                <?php
                if (isset($insertCompare)) {
                    echo $insertCompare;
                } ?>
                <?php
                if (isset($insertWishlist)) {
                    echo $insertWishlist;
                } ?>
                <div class="row product-row">
                    <div class="col-5 col-md-12">
                        <div class="product-img" id="product-img">
                            <img src="./admin//uploads/<?php
                            echo $result_detail['image'];
                            ?>" alt="">
                        </div>
                        <div class="box">
                            <div class="product-img-list">
                                <div class="product-img-item">
                                    <img src="./admin//uploads/<?php
                                    echo $result_detail['image'];
                                    ?>" alt="">
                                </div>
                                <div class="product-img-item">
                                    <img src="./admin//uploads/<?php
                                    echo $result_detail['image'];
                                    ?>" alt="">
                                </div>
                                <div class="product-img-item">
                                    <img src="./admin//uploads/<?php
                                    echo $result_detail['image'];
                                    ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7 col-md-12">
                        <div class="product-info">
                            <h1>
                                <?php
                                echo $result_detail['productName'];
                                ?>
                            </h1>
                            <div class="product-info-detail">
                                <span class="product-info-detail-title">Brand:</span>
                                <a href="#">
                                    <?php
                                    echo $result_detail['brandName'];
                                    ?>
                                </a>
                            </div>
                            <div class="product-info-detail">
                                <span class="product-info-detail-title">Rated:</span>
                                <span class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </span>
                            </div>
                            <p class="product-description">

                            </p>
                            <div class="product-info-price">$
                                <?php
                                echo $fm->formatNumber($result_detail['price']);
                                ?>
                            </div>
                            <form action="" method="post">
                                <h3 style="font-weight: bold;">Quantity</h3>
                                <input value="<?php echo $result_detail['catId']; ?>" type="hidden" name="cartId">
                                <input style="margin: 0; " value="1" min="1" type="number" name="quantity"
                                    class="product-quantity form-control"><br><br>
                                <hr><br>
                                <div class="d-flex align-items-center" style="gap: .4rem">
                                    <div>
                                        <button type="submit" name="submit" class="btn-flat btn-hover">Giỏ hàng</button>

                                    </div>

                                    <?php
                                    $login_check = Session::get('customer_login');
                                    if ($login_check == false) {
                                    } else {
                                        ?>
                                        <form action="" method="post">
                                            <!-- <input type="hidden" name="productid" class="btn-flat btn-hover"
                                                value="<?php echo $result_detail['productId'] ?>"></button>
                                            <input type="submit" name="compare" class="btn-flat btn-hover" value="So Sánh"></button> -->

                                        </form>
                                        <form action="" method="post">
                                            <input type="hidden" name="productid" class="btn-flat btn-hover"
                                                value="<?php echo $result_detail['productId'] ?>"></button>
                                            <input type="submit" name="wishlist" class="btn-flat btn-hover"
                                                value="Yêu Thích"></button>

                                        </form>
                                        <?php
                                    }
                                    ?>

                                </div>
                            </form>
                            <?php
                            if (isset($add_to_cart)) {
                                ?>
                                <h5 style="font-weight: bold; color: red;">
                                    <?php echo $add_to_cart;
                                    ?>
                                </h5>
                            <?php } ?>


                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box-header">
                        description
                    </div>
                    <div class="product-detail-description">
                        <button class="btn-flat btn-hover btn-view-description" id="view-all-description">
                            view all
                        </button>
                        <div class="product-detail-description-content">
                            <p>
                                <?php
                                echo $result_detail['product_desc'];
                                ?>
                            </p>
                            <img src="./admin/upload/<?php
                            echo $result_detail['image'];
                            ?>" alt="">
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
        <!-- comment -->
        <div class="box">
            <div class="box-header">
                review
            </div>
            <div>
                <?php
                if (isset($insert_comment)) {
                    echo $insert_comment;
                } ?>
                <!--  -->
                <?php
                $login_check = Session::get('customer_login');
                if ($login_check == false) {
                    ?>
                    <p class="">Đăng nhập để bình luận! <a href="./login.php" class="text-uppercase text-danger">Đăng
                            nhập</a></p>

                    <?php
                } else {

                    $customer = $cs->shows_customer(Session::get('customer_id'));
                    if ($customer) {
                        ?>
                        <div class="user-rate">
                            <div class="user-info">

                                <img src="./admin/uploads/<?php echo $customer[0]['userImage']; ?>"
                                    style="     
                                                                                                            height: 150px;
                                                                                                            border-radius: 50%;
                                                                                                            height: 60px;
                                                                                                            width: 60px;
                                                                                                            overflow: hidden;">

                                <div class=" user-name">
                                    <?php
                                    echo '<span class="name">' . Session::get('customer_name') . '</span>';

                                    ?>

                                </div>
                            </div>
                            <div class="user-rate-content">
                                <form action="" method="post">
                                    <textarea name="comment" placeholder="Đánh giá của bạn" class="form-control"
                                        id="exampleFormControlTextarea1" rows="4"></textarea>
                                    <button class="btn btn-primary mt-2" type="submit">Gửi</button>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                <!--  -->



            </div>
        </div>
        <!-- comment-- -->
        <div class="box">
            <div>

                <!--  -->
                <!--  -->
                <!--  -->

                <?php
                $show_comment = $product->get_comment($_GET['proid']);

                if ($show_comment) {
                    foreach ($show_comment as $result) {
                        $customerId = $result['customerId'];
                        $comment = $result['comment'];

                        // Lấy thông tin của người dùng từ customerId
                        $customer = $cs->shows_customer($customerId);
                        if ($customer) {
                            $customerName = $customer[0]['fullName'];
                            $customerImage = $customer[0]['userImage'];

                            ?>
                            <div class="user-rate">
                                <div class=" d-flex justify-content-between align-items-center">
                                    <div class="user-info align-items-start d-flex justify-content-between">
                                        <img src="./admin/uploads/<?php echo $customerImage; ?>"
                                            style="     
                                                                                                                                                    height: 150px;
                                                                                                                                                    border-radius: 50%;
                                                                                                                                                    height: 60px;
                                                                                                                                                    width: 60px;
                                                                                                                                                    overflow: hidden;
                                                                                                                                                    object-fit: cover; ">
                                        <div class="d-flex flex-column">
                                            <div class="user-name">
                                                <span class="name">
                                                    <?php echo $customerName; ?>
                                                </span>
                                                <span
                                                    style="
                                                                                                                                                                    margin-bottom: 0.9375rem;
                                                                                                                                                                    color: rgba(0,0,0,.54); font-size: 14px;">
                                                    <?php echo date('d-m-Y H:i', strtotime($result['CreatedAt'])); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="dropdown"><i style="font-size: 24px; " class='bx bx bx-edit'></i>
                                        <div class="dropdown-content">
                                            <li><a href="./index.php">home</a></li>
                                            <li><a href="./index.php">home</a></li>
                                        </div>
                                    </ul>
                                </div>
                                <textarea class="user-rate-content form-control" style="resize: none; " disabled readonly
                                    rows="4"><?php echo $comment; ?></textarea>


                            </div>
                            <?php
                        }
                    }
                }
                ?>




                <!-- <div class="user-rate">
                    <div class="user-info">
                        <div class="user-avt">
                            <img src="./images/tuat.jpg" alt="">
                        </div>
                        <div class="user-name">
                            <span class="name">tuat tran anh</span>
                        </div>
                    </div>
                    <div class="user-rate-content">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio ea iste, veritatis nobis amet illum, cum alias magni dolores odio, eius quo excepturi veniam ipsa voluptatibus natus voluptas vero? Aspernatur!
                    </div>
                </div> -->
                <!--  -->
                <!--  -->
                <!--  -->


                <!-- <div class="box">
                    <ul class="pagination">
                        <li><a href="#"><i class='bx bxs-chevron-left'></i></a></li>
                        <li><a href="#" class="active">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><i class='bx bxs-chevron-right'></i></a></li>
                    </ul>
                </div> -->
            </div>
        </div>
        <!-- <div class="box">
            <div class="box-header">
                related products
            </div>
            <div class="row" id="related-products"></div>
        </div> -->

    </div>
    <!-- comment-- -->

</div>
<!-- end product-detail content -->

<!-- footer -->
<?php
include 'inc/footer.php';
?>