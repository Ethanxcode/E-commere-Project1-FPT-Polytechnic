<div class="hero  " style="margin-top: 3.5rem ">
    <div class="slider">
        <div class="container">
            <!-- slide item -->
            <?php
            $get_slider = $product->show_slider();
            if ($get_slider) {
                foreach ($get_slider as $result_slider) {
                    ?>
                    <div class="slide active">
                        <div class="info">
                            <div class="info-content">
                                <h3 class="top-down">
                                    <!-- JBL TUNE 750TNC -->
                                    <?php
                                    echo $result_slider['title'];
                                    ?>
                                </h3>
                                <h2 class="top-down trans-delay-0-2">
                                    <!-- Next-gen design -->
                                    <?php
                                    echo $result_slider['sliderName'];
                                    ?>
                                </h2>
                                <p class="top-down trans-delay-0-4">
                                    <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati dolor commodi dignissimos culpa, eaque eos necessitatibus possimus veniam, cupiditate rerum deleniti? Libero, ducimus error? Beatae velit dolore sint explicabo! Fugit. -->
                                    <?php
                                    echo $result_slider['sliderDesc'];
                                    ?>
                                </p>
                                <div class="top-down trans-delay-0-6">
                                    <button class="btn-flat btn-hover">
                                        <a href="products.php">Shop Now</a>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="img top-down">
                            <img src="./admin/uploads/<?php
                            echo $result_slider['image'];
                            ?>" alt="">
                        </div>
                    </div>
                    <?php
                }
            } ?>
            <!-- end slide item -->
            <!-- slide item -->
            <!-- <div class="slide">
                    <div class="info">
                        <div class="info-content">
                            <h3 class="top-down">
                                JBL Quantum ONE
                            </h3>
                            <h2 class="top-down trans-delay-0-2">
                                Ipsum dolor
                            </h2>
                            <p class="top-down trans-delay-0-4">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. A optio, voluptatum aperiam nobis quis maxime corporis porro alias soluta sunt quae consectetur aliquid blanditiis perspiciatis labore cumque, ullam, quam eligendi!
                            </p>
                            <div class="top-down trans-delay-0-6">
                                <button class="btn-flat btn-hover">
                                    <span>shop now</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="img right-left">
                        <img src="./images/JBL_E55BT_KEY_BLACK_6175_FS_x1-1605x1605px.png" alt="">
                    </div>
                </div> -->
            <!-- end slide item -->
            <!-- slide item -->
            <!-- <div class="slide">
                    <div class="info">
                        <div class="info-content">
                            <h3 class="top-down">
                                JBL JR 310BT
                            </h3>
                            <h2 class="top-down trans-delay-0-2">
                                Consectetur Elit
                            </h2>
                            <p class="top-down trans-delay-0-4">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo aut fugiat, libero magnam nemo inventore in tempora beatae officiis temporibus odit deserunt molestiae amet quam, asperiores, iure recusandae nulla labore!
                            </p>
                            <div class="top-down trans-delay-0-6">
                                <button class="btn-flat btn-hover">
                                    <span>shop now</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="img left-right">
                        <img src="./images/JBL_JR 310BT_Product Image_Hero_Skyblue.png" alt="">
                    </div>
                </div> -->
            <!-- end slide item -->
        </div>
        <!-- slider controller -->
        <button class="slide-controll slide-next">
            <i class='bx bxs-chevron-right'></i>
        </button>
        <button class="slide-controll slide-prev">
            <i class='bx bxs-chevron-left'></i>
        </button>
        <!-- end slider controller -->
    </div>
</div>