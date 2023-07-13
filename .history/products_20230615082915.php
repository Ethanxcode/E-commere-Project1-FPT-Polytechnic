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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tukhoa = $_POST['tukhoa'];
    $search_product = $product->search_product($tukhoa, $current_page);
    $query = "SELECT * FROM tbl_product WHERE  productName like '%$tukhoa%' ";
    $stmt = $db->select($query);
    $total_results = count($stmt);
} elseif (isset($_GET['catid'])) {
    $catname = $_GET['catid'];
    $show_category_product = $product->show_category_product($catname, $current_page);
    $query = "SELECT * FROM tbl_product WHERE catId = '$catname'  ";
    $stmt = $db->select($query);
    $total_results = count($stmt);
} elseif (isset($_GET['brandid'])) {
    $brandname = $_GET['brandid'];
    $show_brand_product = $product->show_brand_product($brandname, $current_page);
    $query = "SELECT * FROM tbl_product WHERE brandId = '$brandname' ";
    $stmt = $db->select($query);
    $total_results = count($stmt);
} else {
    // Xác định trang hiện tại

    $all_product = $product->all_product($current_page);
    $query = "SELECT * FROM tbl_product ";
    $stmt = $db->select($query);
    $total_results = count($stmt);
    echo $total_results;
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
                <a href="./index.php">home</a>
                <span><i class='bx bxs-chevrons-right'></i></span>
                <a href="products.php">all products</a>

                <?php
                if (isset($_POST['tukhoa']) && $_POST['tukhoa'] != "") {
                    ?>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a href="">
                        <?php echo $_POST['tukhoa'] ?>
                    </a>
                    <?php
                } ?>
                <span><i class='bx bxs-chevrons-right'></i></span>
                <a href="">Có
                    <?php echo $total_results ?> sản phẩm
                </a>
            </div>
        </div>
        <div class="box">
            <div class="row">
                <div class="col-3 filter-col" id="filter-col">
                    <div class="box filter-toggle-box">
                        <button class="btn-flat btn-hover" id="filter-close">close</button>
                    </div>
                    <div class="box">
                        <span class="filter-header">
                            CATEGORIES
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
                        <span class="filter-header">
                            BRANDS
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
                    <!-- <div class="box">
                        <span class="filter-header">
                            Price
                        </span>
                        <div class="price-range">
                            <input type="text">
                            <span>-</span>
                            <input type="text">
                        </div>
                    </div>
                    <div class="box">
                        <span class="filter-header">
                            rating
                        </span>
                        <ul class="filter-list">
                            <li>
                                <div class="group-checkbox">
                                    <input type="checkbox" id="remember1">
                                    <label for="remember1">
                                        <span class="rating">
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                        </span>
                                        <i class='bx bx-check'></i>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="group-checkbox">
                                    <input type="checkbox" id="remember1">
                                    <label for="remember1">
                                        <span class="rating">
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bx-star'></i>
                                        </span>
                                        <i class='bx bx-check'></i>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="group-checkbox">
                                    <input type="checkbox" id="remember1">
                                    <label for="remember1">
                                        <span class="rating">
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bx-star'></i>
                                            <i class='bx bx-star'></i>
                                        </span>
                                        <i class='bx bx-check'></i>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="group-checkbox">
                                    <input type="checkbox" id="remember1">
                                    <label for="remember1">
                                        <span class="rating">
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bx-star'></i>
                                            <i class='bx bx-star'></i>
                                            <i class='bx bx-star'></i>
                                        </span>
                                        <i class='bx bx-check'></i>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="group-checkbox">
                                    <input type="checkbox" id="remember1">
                                    <label for="remember1">
                                        <span class="rating">
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bx-star'></i>
                                            <i class='bx bx-star'></i>
                                            <i class='bx bx-star'></i>
                                            <i class='bx bx-star'></i>
                                        </span>
                                        <i class='bx bx-check'></i>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div> -->
                </div>
                <div class="col-9 col-md-12">
                    <div class="box filter-toggle-box">
                        <button class="btn-flat btn-hover" id="filter-toggle">filter</button>
                    </div>
                    <div class="box">
                        <div class="row" id="productss">
                            <?php
                            if (isset($search_product) && $search_product != null) {
                                foreach ($search_product as $result) {

                                    ?>
                                    <div class="col-3 col-md-6 col-sm-12">
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
                                                    <button class="btn-flat btn-hover btn-cart-add">
                                                        <i class='bx bxs-cart-add'></i>
                                                    </button>
                                                    <button class="btn-flat btn-hover btn-cart-add">
                                                        <i class='bx bxs-heart'></i>
                                                    </button>
                                                </div>
                                                <div class="product-card-name">
                                                    <?php
                                                    echo $result['productName'];
                                                    ?>
                                                </div>
                                                <div class="product-card-price">
                                                    <span><del>
                                                            <?php echo $fm->formatNumber($result['price'] * 1.2); ?>
                                                        </del></span>
                                                    <span class="curr-price">
                                                        <?php
                                                        echo $fm->formatNumber($result['price']);
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } elseif (isset($show_category_product)) {
                                foreach ($show_category_product as $result) {
                                    ?>
                                    <div class="col-3 col-md-6 col-sm-12">
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
                                                    <button class="btn-flat btn-hover btn-cart-add">
                                                        <i class='bx bxs-cart-add'></i>
                                                    </button>
                                                    <button class="btn-flat btn-hover btn-cart-add">
                                                        <i class='bx bxs-heart'></i>
                                                    </button>
                                                </div>
                                                <div class="product-card-name">
                                                    <?php
                                                    echo $result['productName'];
                                                    ?>
                                                </div>
                                                <div class="product-card-price">
                                                    <span><del>
                                                            <?php echo $fm->formatNumber($result['price'] * 1.2); ?>
                                                        </del></span>
                                                    <span class="curr-price">
                                                        <?php
                                                        echo $fm->formatNumber($result['price']);
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } elseif (isset($show_brand_product)) {
                                foreach ($show_brand_product as $result) {
                                    ?>
                                    <div class="col-3 col-md-6 col-sm-12">
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
                                                    <button class="btn-flat btn-hover btn-cart-add">
                                                        <i class='bx bxs-cart-add'></i>
                                                    </button>
                                                    <button class="btn-flat btn-hover btn-cart-add">
                                                        <i class='bx bxs-heart'></i>
                                                    </button>
                                                </div>
                                                <div class="product-card-name">
                                                    <?php
                                                    echo $result['productName'];
                                                    ?>
                                                </div>
                                                <div class="product-card-price">
                                                    <span><del>
                                                            <?php echo $fm->formatNumber($result['price'] * 1.2); ?>
                                                        </del></span>
                                                    <span class="curr-price">
                                                        <?php
                                                        echo $fm->formatNumber($result['price']);
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } elseif (isset($all_product)) {
                                foreach ($all_product as $result) {
                                    ?>
                                    <div class="col-3 col-md-6 col-sm-12">
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
                                                    <button class="btn-flat btn-hover btn-cart-add">
                                                        <i class='bx bxs-cart-add'></i>
                                                    </button>
                                                    <button class="btn-flat btn-hover btn-cart-add">
                                                        <i class='bx bxs-heart'></i>
                                                    </button>
                                                </div>
                                                <div class="product-card-name">
                                                    <?php
                                                    echo $result['productName'];
                                                    ?>
                                                </div>
                                                <div class="product-card-price">
                                                    <span><del>
                                                            <?php echo $fm->formatNumber($result['price'] * 1.2); ?>
                                                        </del></span>
                                                    <span class="curr-price">
                                                        <?php
                                                        echo $fm->formatNumber($result['price']);
                                                        ?>
                                                    </span>
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