<?php include 'inc/part1.php'; ?>
<?php include 'inc/part2.php'; ?>
<div class="login-box">
    <div class="row">
        <div class="col-sm-6">
            <div class="logo">
                <span class="logo-font">Go</span>Snippets
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <br>
            <h3 class="header-title">LOGIN</h3>
            <form class="login-form">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email or UserName">
                </div>
                <div class="form-group">
                    <input type="Password" class="form-control" placeholder="Password">
                    <a href="#!" class="forgot-password">Forgot Password?</a>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block">LOGIN</button>
                </div>
                <div class="form-group">
                    <div class="text-center">New Member? <a href="#!">Sign up Now</a></div>
                </div>
            </form>
        </div>
        <div class="col-sm-6 hide-on-mobile">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1" class=""></li>
                </ul>
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="slider-feature-card">
                            <img src="https://i.imgur.com/YMn8Xo1.png" alt="">
                            <h3 class="slider-title">Title Here</h3>
                            <p class="slider-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, odio!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="slider-feature-card">
                            <img src="https://i.imgur.com/Yi5KXKM.png" alt="">
                            <h3 class="slider-title">Title Here</h3>
                            <p class="slider-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, debitis?</p>
                        </div>
                    </div>
                </div>
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/part4.php'; ?>