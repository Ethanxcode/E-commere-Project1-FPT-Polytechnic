<?php
include 'inc/header.php';
include './slider.php';
?>



<div class="promotion">
    <div class="section container">
        <div class="row">
            <div class="col-4 col-md-12 col-sm-12">
                <div class="promotion-box">
                    <div class="text">
                        <h3>Iphone</h3>
                        <button class="btn-flat btn-hover"><a href="./products.php?catid=18"><span>shop
                                    collection</span></a></button>
                    </div>
                    <img src="./images/iPad_Pro_12-9_Cellular_Silver-1.jpg" alt="">
                </div>
            </div>
            <div class="col-4 col-md-12 col-sm-12">
                <div class="promotion-box">
                    <div class="text">
                        <h3>Ipad</h3>
                        <button class="btn-flat btn-hover"><a href="./products.php?catid=19"><span>shop
                                    collection</span></a></button>
                    </div>
                    <img src="./images/iphone-13-pro-max-128gb-didongviet_5.webp" alt="">

                </div>
            </div>
            <div class="col-4 col-md-12 col-sm-12">
                <div class="promotion-box">
                    <div class="text">
                        <h3>Macbook</h3>
                        <button class="btn-flat btn-hover"><a href="./products.php?catid=20"><span>shop
                                    collection</span></a></button>
                    </div>
                    <img src="./images/1686008185161_thumb_macbook_air_m2_2023_didongviet.webp" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end promotion section -->

<!-- product list -->
<div class="section">
    <div class="container">
        <div class="section-header">
            <h2>Featured product</h2>
        </div>
        <div class="row" id="latest-productss">
            <?php
            $product_feathered = $product->getproduct_feathered();
            if ($product_feathered) {
                foreach ($product_feathered as $result) {

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
                                    <button class="btn-flat btn-hover btn-shop-now"><a
                                            href="product-detail.php?proid=<?php echo $result['productId'] ?>">shop
                                            now</a></button>
                                    <!-- <button class="btn-flat btn-hover btn-cart-add">
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
            } ?>
        </div>
        <div class="section-footer">
            <a href="./products.php" class="btn-flat btn-hover">view all</a>
        </div>
    </div>
</div>
<!-- end product list -->

<!-- special product -->
<div class="bg-second">
    <div class="section container">
        <div class="row">
            <div class="col-4 col-md-4">
                <div class="sp-item-img">
                    <img src="./images/project-6.jpg" alt="">
                </div>
            </div>
            <div class="col-7 col-md-8">
                <div class="sp-item-info">
                    <div class="sp-item-name">MacBook Pro 14 inch M2 Pro 2023</div>
                    <p class="sp-item-description">
                        AppleCare+ 2026 Màu sắc: Space Gray CPU: Apple M2 Max with 12‑core
                        CPU GPU: 38‑core GPU, 16‑core Neural Engine RAM: 32GB Storage: 1TB SSD Màn hình: 16-inch Liquid
                        Retina XDR display Interface: Three Thunderbolt 4 ports, HDMI port, SDXC card slot, headphone
                        jack, MagSafe 3 port Backlit Magic Keyboard with Touch ID – US English Touch ID, TouchBar Trọng
                        lượng: 2.16 Kg


                    </p>
                    <button class="btn-flat btn-hover"><a href="product-detail.php?proid=39">Shop Now</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end special product -->

<!-- product list -->
<div class="section">
    <div class="container">
        <div class="section-header">
            <h2>new product</h2>
        </div>
        <div class="row" id="best-productss">
            <?php
            $product_new = $product->getproduct_new();
            if ($product_new) {
                foreach ($product_new as $result_new) {

                    ?>
                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="product-card">
                            <div class="product-card-img">
                                <img src="./admin//uploads/<?php
                                echo $result_new['image'];
                                ?>" alt="">
                                <img src="./admin//uploads/<?php
                                echo $result_new['image'];
                                ?>" alt="">
                            </div>
                            <div class="product-card-info">
                                <div class="product-btn">
                                    <button class="btn-flat btn-hover btn-shop-now"><a
                                            href="product-detail.php?proid=<?php echo $result_new['productId'] ?>">shop
                                            now</a></button>
                                    <!-- <button class="btn-flat btn-hover btn-cart-add">
                                        <i class='bx bxs-heart'></i>

                                    </button> -->
                                </div>
                                <div class="product-card-name">
                                    <?php
                                    echo $result_new['productName'];
                                    ?>
                                </div>
                                <div class="product-card-description">
                                    <span class="">
                                        Sales:
                                        <?php echo $result_new['sales'] ?>
                                    </span>
                                    <span><del>
                                            <?php echo $fm->formatNumber($result_new['price'] * 1.2); ?>
                                        </del></span>
                                    <div class="product-card-price">


                                        <span class="curr-price">
                                            <?php
                                            echo $fm->formatNumber($result_new['price']);
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } ?>
        </div>
        <div class="section-footer">
            <a href="./products.php" class="btn-flat btn-hover">view all</a>
        </div>
    </div>
</div>
<!-- end product list -->

<!-- blogs -->
<div class="section">
    <div class="container">
        <div class="section-header">
            <h2>Pictures</h2>
        </div>
        <div class="row justify-content-between align-items-center">
            <div class="blog  ">
                <div class="blog-img">
                    <img src="./images/Mobile Phones Unboxing _ iPhone - Apple (IN) _ Samsung India _ Mobile _ TV New mobile launch - FULL.jpg"
                        alt="">
                    <div class="blog-info">
                        <div class="blog-title">
                            Lorem ipsum dolor sit amet
                        </div>

                        <!-- <button class="btn-flat btn-hover">read more</button> -->
                    </div>
                </div>
            </div>

            <div class="blog col-sm-12 ">
                <div class="blog-img ">
                    <img src="./images/blogn.jpg" alt="">
                    <div class="blog-info">
                        <div class="blog-title">
                            Lorem ipsum dolor sit amet
                        </div>

                        <!-- <button class="btn-flat btn-hover">read more</button> -->
                    </div>
                </div>

            </div>
            <div class="blog col-sm-12 ">
                <div class="blog-img ">
                    <img src="./images/project-4.jpg" alt="">
                    <div class="blog-info">
                        <div class="blog-title">
                            Lorem ipsum dolor sit amet
                        </div>

                        <!-- <button class="btn-flat btn-hover">read more</button> -->
                    </div>
                </div>

            </div>
            <div class="blog col-sm-12 ">
                <div class="blog-img ">
                    <img src="./images/project-3.jpg" alt="">
                    <div class="blog-info">
                        <div class="blog-title">
                            Lorem ipsum dolor sit amet
                        </div>

                        <!-- <button class="btn-flat btn-hover">read more</button> -->
                    </div>
                </div>

            </div>
            <div class="blog col-sm-12 ">
                <div class="blog-img ">
                    <img src="./images/project-3.jpg" alt="">
                    <div class="blog-info">
                        <div class="blog-title">
                            Lorem ipsum dolor sit amet
                        </div>

                        <!-- <button class="btn-flat btn-hover">read more</button> -->
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- <div class="section-footer">
        <a href="#" class="btn-flat btn-hover">view all</a>
    </div> -->
</div>
</div>
<!-- end blogs -->

<!-- footer -->
<?php
include 'inc/footer.php';
?>