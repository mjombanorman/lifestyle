
<?php

use yii\web\Session;
use backend\modules\products\models\Products;
use backend\modules\products\models\Category;

$count = 0;
$session = Yii::$app->session;
if ($session->isActive) {

} else {
    $session->open();
}
$categories = Category::find()->all();
$url = Yii::$app->urlManager;
?>

<!-- START HEADER AREA -->
<header class="header-area header-wrapper">
    <!-- header-top-bar -->
    <div class="header-top-bar plr-185">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 hidden-xs">
                    <div class="call-us">
                        <p class="mb-0 roboto">Call +254 - 710572042</p>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="top-link clearfix">
                        <ul class="link f-right">
                            <li>
                                <a href="#">
                                    <i class="zmdi zmdi-account"></i>
                                    <?= Yii::$app->user->isGuest ? 'Guest' : Yii::$app->user->identity->username; ?>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="zmdi zmdi-favorite"></i>
                                    Cart (0)
                                </a>
                            </li>
                            <li>
                                <a href="<?= Yii::$app->user->isGuest ? $url->createUrl(['/user/login']) : $url->createUrl(['site/logmeout']); ?>" data-method="post">
                                    <i class="zmdi zmdi-lock"></i>
                                    <?= Yii::$app->user->isGuest ? 'Login' : 'Log Out'; ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-middle-area -->
    <div id="sticky-header" class="header-middle-area plr-185">
        <div class="container-fluid">
            <div class="full-width-mega-dropdown">
                <div class="row">
                    <!-- logo -->
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="logo">
                            <a href="index.html">
                                <img src="/lifestyle/frontend/web/img/logo/logo.png" alt="main logo">
                            </a>
                        </div>
                    </div>
                    <!-- primary-menu -->
                    <div class="col-md-8 hidden-sm hidden-xs">
                        <nav id="primary-menu">
                            <ul class="main-menu text-center">
                                <li><a href="<?= $url->createUrl(['site/index']); ?>">Home</a>
                                </li>
                                <li class=""><a href="<?= $url->createUrl(['site/shop']); ?>">Shop</a>

                                </li>
                                <li class=""><a href="#">Products</a>
                                    <ul class="dropdwn">
                                        <?php foreach ($categories as $category) { ?>
                                            <li>
                                                <a href="<?= $url->createUrl(['site/shop', 'cat' => $category->id]) ?>"><?= $category->name; ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class=""><a href="<?= $url->createUrl(['site/about']) ?>">About Us</a>

                                </li>
                                <!--<li><a href="#">Testimonials</a>

                                </li>-->
                                <li>
                                    <a href="<?= $url->createUrl(['site/contact']) ?>">Contact Us</a>
                                </li>
                                <li>
                                    <a href="<?= $url->createUrl(['site/blog']) ?>">Blog</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- header-search & total-cart -->
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="search-top-cart  f-right">
                            <!-- header-search -->
                            <div class="header-search f-left">
                                <div class="header-search-inner">
                                    <button class="search-toggle">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                    <form action="#">
                                        <div class="top-search-box">
                                            <input type="text" placeholder="Search here your product...">
                                            <button type="submit">
                                                <i class="zmdi zmdi-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <!-- total-cart -->
                            <div class="total-cart f-left" id="load_cart">





                            </div>
                            <!--total cart-->
                            <script type="text/javascript">
                                function helpLoadCart() {
                                    alert('True');
                                    $('#load_cart').load("/lifestyle/frontend/web/site/floatingcart");
                                }
                            </script>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER AREA -->


<!-- START MOBILE MENU AREA -->
<div class="mobile-menu-area hidden-lg hidden-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul>
                            <li><a href="<?= $url->createUrl(['site/index']) ?>">Home</a>

                            </li>
                            <li>
                                <a href="<?= $url->createUrl(['site/shop']); ?>">Shop</a>
                            </li>
                            <li><a href="#">Products</a>
                                <ul>
                                    <?php foreach ($categories as $category) { ?>
                                        <li>
                                            <a href="<?= $url->createUrl(['site/shop', 'cat' => $category->id]); ?>"><?= $category->name; ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li><a href="<?= $url->createUrl(['site/about']); ?>">About Us</a>

                            </li>
                            <!-- <li>
                                 <a href="#">Testimonials</a>
                             </li>-->
                            <li>
                                <a href="<?= $url->createUrl(['site/contact']); ?>">Contact Us</a>
                            </li>
                            <li>
                                <a href="#">Blog</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MOBILE MENU AREA -->