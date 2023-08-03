<?php
include 'inc/header.php';
?>
<?php
// set page 
$results_per_page = 8;

if (!isset($_GET['page']) || $_GET == null) {
    $current_page = 1;
} else {
    $current_page = $_GET['page'];
}
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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $keyword = $_POST['keyword'];
    $search_product = $product->search_product($keyword, $current_page);
    
    $total_results = count($search_product);
} elseif (isset($_GET['catid'])) {
    $catname = $_GET['catid'];
    $show_category_product = $product->show_category_product($catname, $current_page);
    $query = "SELECT * FROM tbl_product WHERE catId = '$catname'  ";
    $total_results = count($show_category_product);
} elseif (isset($_GET['brandid'])) {
    $brandname = $_GET['brandid'];
    $show_brand_product = $product->show_brand_product($brandname, $current_page);
    $query = "SELECT * FROM tbl_product WHERE brandId = '$brandname' ";
    $total_results = count($show_brand_product);
} elseif (isset($_GET['isStock'])) {
    $isStock = filter_var($_GET['isStock'], FILTER_VALIDATE_BOOLEAN);
    $show_isStock_product = $product->show_isStock_product($isStock, $current_page);
    if($isStock) {
        $query = "SELECT * FROM tbl_product WHERE stock > 0  ";
    }
    else {
    $query = "SELECT * FROM tbl_product WHERE stock < 0  ";
    }
    $total_results = count($show_isStock_product);
} else {
    // Xác định trang hiện tại
    $all_product = $product->all_product($current_page);
    $total_results = count($all_product);
}
?>
<?php
// phân trang
// phân trang
// Tính toán vị trí của sản phẩm đầu tiên trên trang
$first_result = ($current_page - 1) * $results_per_page;
// Tính toán số lượng trang
$total_pages = ceil($total_results / $results_per_page);
?>
<div class="bg-main">
    <div class="container">
        <div class="box">
            <div class="breadcumb">
                <a href="./index.php">Home</a>
                <span><i class='bx bxs-chevrons-right'></i></span>
                <a href="products.php">Tất cả sản phẩm</a>

                <?php
                if (isset($_POST['keyword']) && $_POST['keyword'] != "") {
                    ?>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a href="">
                        <?php echo $_POST['keyword'] ?>
                    </a>
                    <?php
                } ?>
                <span><i class='bx bxs-chevrons-right'></i></span>
                <a href="">
                    <?php echo $total_results ?> sản phẩm
                </a>
            </div>
        </div>

        <div class="box">
            <div class="row">
                <div class="col-3 filter-col" id="filter-col">
                    <!-- <div class="box filter-toggle-box">
                        <button class="btn-flat btn-hover" id="filter-close">close</button>
                    </div> -->

                    <div class="box">
                        <span class="filter-header text-uppercase">
                            Danh mục
                        </span>
                        <ul class="filter-list">
                            <?php
                            $show_cate = $cat->show_category();
                            if ($show_cate) {
                                foreach ($show_cate as $result) {
                                    ?>
                                    <li><a href="?catid=<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></a>
                                    </li>
                                    <?php
                                }
                            }
                            ?>

                        </ul>
                    </div>
                    <div class="box">
                        <span class="filter-header text-uppercase">
                            thương hiệu
                        </span>
                        <ul class="filter-list">
                            <?php
                            $show_brand = $brand->show_brand();
                            if ($show_brand) {
                                foreach ($show_brand as $result) {
                                    ?>
                                    <li><a href="?brandid=<?php echo $result['brandId']; ?>"><?php echo $result['brandName']; ?></a></li>
                                            <?php
                                }
                            }
                            ?>

                        </ul>
                    </div>
                    <div class="box">
                        <span class="filter-header text-uppercase">
                            Khác
                        </span>
                        <ul class="filter-list">
                            <li><a href="?isStock=true">Có sẵn</a></li>
                            <li><a href="?isStock=false">sold out</a></li>
                            
                        </ul>
                    </div>


                </div>
                <div class="col-9 col-md-12">
                    <div class="box filter-toggle-box">
                        <button class="btn-flat btn-hover" id="filter-toggle">filter</button>
                    </div>
                    <div class="box">
                        <div class="row" id="products">
                            <?php
                            if (isset($search_product) && $search_product != null) {
                                foreach ($search_product as $result) {

                                    ?>
                                    <div class="col-4 col-md-6 col-sm-12">
                                        <div class="product-card">
                                            <div class="product-card-img">
                                                <img src="./admin//uploads/<?php
                                                echo $result['image'];
                                                ?>" alt="">
                                                <!-- hover ảnh  -->
                                                <img src="./admin//uploads/<?php
                                                echo $result['image'];
                                                ?>" alt="">
                                            </div>
                                            <div class="product-card-info">
                                                <div class="product-btn">
                                                    <button class="btn-flat btn-hover btn-shop-now"> <a
                                                            href="product-detail.php?proid=<?php echo $result['productId'] ?>">shop
                                                            now</a></button>
                                                    <!-- <button class="btn-flat btn-hover btn-cart-add">
                                                        <i class='bx bxs-cart-add'></i>
                                                    </button>
                                                    <button class="btn-flat btn-hover btn-cart-add">
                                                        <i class='bx bxs-heart'></i>
                                                    </button> -->
                                                </div>
                                                <div class="product-card-name">
                                                    <?php
                                                    echo $result['productName'];
                                                    ?>
                                                </div>
                                                <div class="product-card-description">
                                                    <span class="">
                                                        Sales:
                                                        <?php echo $result['sales'] ?>
                                                    </span>
                                                    <span><del>
                                                            <?php echo $fm->formatNumber($result['price'] * 1.2); ?>
                                                        </del></span>
                                                    <div class="product-card-price">


                                                        <span class="curr-price">
                                                            <?php
                                                            echo $fm->formatNumber($result['price']);
                                                            ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } elseif (isset($show_category_product)) {
                                foreach ($show_category_product as $result) {
                                    ?>
                                    <div class="col-4 col-md-6 col-sm-12">
                                        <div class="product-card">
                                            <div class="product-card-img">
                                                <img src="./admin//uploads/<?php
                                                echo $result['image'];
                                                ?>" alt="">
                                                <!-- hover ảnh  -->
                                                <img src="./admin//uploads/<?php
                                                echo $result['image'];
                                                ?>" alt="">
                                            </div>
                                            <div class="product-card-info">
                                                <div class="product-btn">
                                                    <button class="btn-flat btn-hover btn-shop-now"> <a
                                                            href="product-detail.php?proid=<?php echo $result['productId'] ?>">shop
                                                            now</a></button>
                                                    <!-- <button class="btn-flat btn-hover btn-cart-add">
                                                        <i class='bx bxs-cart-add'></i>
                                                    </button>
                                                    <button class="btn-flat btn-hover btn-cart-add">
                                                        <i class='bx bxs-heart'></i> -->
                                                    </button>
                                                </div>
                                                <div class="product-card-name">
                                                    <?php
                                                    echo $result['productName'];
                                                    ?>
                                                </div>
                                                <div class="product-card-description">
                                                    <span class="">
                                                        Sales:
                                                        <?php echo $result['sales'] ?>
                                                    </span>
                                                    <span><del>
                                                            <?php echo $fm->formatNumber($result['price'] * 1.2); ?>
                                                        </del></span>
                                                    <div class="product-card-price">


                                                        <span class="curr-price">
                                                            <?php
                                                            echo $fm->formatNumber($result['price']);
                                                            ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } elseif (isset($show_brand_product)) {
                                foreach ($show_brand_product as $result) {
                                    ?>
                                    <div class="col-4 col-md-6 col-sm-12">
                                        <div class="product-card">
                                            <div class="product-card-img">
                                                <img src="./admin//uploads/<?php
                                                echo $result['image'];
                                                ?>" alt="">
                                                <!-- hover ảnh  -->
                                                <img src="./admin//uploads/<?php
                                                echo $result['image'];
                                                ?>" alt="">
                                            </div>
                                            <div class="product-card-info">
                                                <div class="product-btn">
                                                    <button class="btn-flat btn-hover btn-shop-now"> <a
                                                            href="product-detail.php?proid=<?php echo $result['productId'] ?>">shop
                                                            now</a></button>
                                                    <!-- <button class="btn-flat btn-hover btn-cart-add">
                                                        <i class='bx bxs-cart-add'></i>
                                                    </button>
                                                    <button class="btn-flat btn-hover btn-cart-add">
                                                        <i class='bx bxs-heart'></i>
                                                    </button> -->
                                                </div>
                                                <div class="product-card-name">
                                                    <?php
                                                    echo $result['productName'];
                                                    ?>
                                                </div>
                                                <div class="product-card-description">
                                                    <span class="">
                                                        Sales:
                                                        <?php echo $result['sales'] ?>
                                                    </span>
                                                    <span><del>
                                                            <?php echo $fm->formatNumber($result['price'] * 1.2); ?>
                                                        </del></span>
                                                    <div class="product-card-price">


                                                        <span class="curr-price">
                                                            <?php
                                                            echo $fm->formatNumber($result['price']);
                                                            ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } elseif (isset($all_product)) {
                                foreach ($all_product as $result) {
                                    ?>
                                    <div class="col-4 col-md-6 col-sm-12">
                                        <div class="product-card">
                                            <div class="product-card-img">
                                                <img src="./admin//uploads/<?php
                                                echo $result['image'];
                                                ?>" alt="">
                                                <!-- hover ảnh  -->
                                                <img src="./admin//uploads/<?php
                                                echo $result['image'];
                                                ?>" alt="">
                                            </div>
                                            <div class="product-card-info">
                                                <div class="product-btn">
                                                    <button class="btn-flat btn-hover btn-shop-now"> <a
                                                            href="product-detail.php?proid=<?php echo $result['productId'] ?>">shop
                                                            now</a></button>
                                                    <!-- <button class="btn-flat btn-hover btn-cart-add">
                                                        <i class='bx bxs-cart-add'></i>
                                                    </button>
                                                    <button class="btn-flat btn-hover btn-cart-add">
                                                        <i class='bx bxs-heart'></i>
                                                    </button> -->
                                                </div>
                                                <div class="product-card-name">
                                                    <?php
                                                    echo $result['productName'];
                                                    ?>
                                                </div>
                                                <div class="product-card-description">
                                                    <span class="">
                                                        Sales:
                                                        <?php echo $result['sales'] ?>
                                                    </span>
                                                    <span><del>
                                                            <?php echo $fm->formatNumber($result['price'] * 1.2); ?>
                                                        </del></span>
                                                    <div class="product-card-price">


                                                        <span class="curr-price">
                                                            <?php
                                                            echo $fm->formatNumber($result['price']);
                                                            ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="box">
                        <ul class="pagination">
                            <li><a href="products.php?page=<?php
                            if ($current_page > 1) {
                                $pageBack = $current_page - 1;
                                echo $pageBack;
                            } else {
                                echo $total_pages;
                            }
                            ?><?php if (isset($brandname) || isset($catname)) {
                                if (isset($brandname)) {
                                    echo '&brandid=' . $brandname;
                                } else {
                                    echo '&catid=' . $catname;
                                }
                            } ?>"><i class='bx bxs-chevron-left'></i></a></li>
                            <?php
                            for ($page = 1; $page <= $total_pages; $page++) {
                                ?>
                                <li>
                                    <a class="<?php if ($page == $current_page) {
                                        echo "active";
                                    } ?>" href="products.php?page=<?php echo $page ?><?php if (isset($brandname) || isset($catname)) {
                                            if (isset($brandname)) {
                                                echo '&brandid=' . $brandname;
                                            } else {
                                                echo '&catid=' . $catname;
                                            }
                                        } ?>"><?php echo $page ?></a>
                                <li>


                                    <?php
                            } ?>

                            <li><a href="products.php?page=<?php
                            if ($current_page < $total_pages) {
                                $pageNext = $current_page + 1;
                                echo $pageNext;
                            } else {
                                echo 1;
                            }
                            ?><?php if (isset($brandname) || isset($catname)) {
                                if (isset($brandname)) {
                                    echo '&brandid=' . $brandname;
                                } else {
                                    echo '&catid=' . $catname;
                                }
                            } ?>"><i class='bx bxs-chevron-right'></i></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./js/products.js"></script>
<?php
include 'inc/footer.php';
?>