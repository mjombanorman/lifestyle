<?php

use backend\modules\products\models\Products; ?>
<!-- BANNER-SECTION START -->
<div class="banner-section ptb-60">
    <div class="container">
        <div class="row">
            <!-- banner-item start -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="banner-item banner-2">
                    <div class="banner-img">
                        <a href="#"><img src="<?= Yii::$app->urlManager->baseUrl ?>/frontend/web/images/bg/bg2.png" alt=""></a>
                    </div>
                    <h3 class="banner-title-2"><a href="#"></a></h3>
                    <h3 class="pro-price">Ksh 3041.00</h3>
                    <div class="banner-button">
                        <a href="<?= yii\helpers\Url::to(['shop']) ?>">Shop now <i class="zmdi zmdi-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- banner-item end -->
            <!-- banner-item start -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="banner-item banner-3">
                    <div class="banner-img">
                        <a href="#"><img src="<?= Yii::$app->urlManager->baseUrl ?>/frontend/web/images/bg/bg4.png" alt=""></a>
                    </div>
                    <div class="banner-info">
                        <h3 class="banner-title-2"><a href="#">F.I.T 15</a></h3>
                        <ul class="banner-featured-list">
                            <li>
                                <i class="zmdi zmdi-check"></i><span></span>
                            </li>
                            <li>
                                <i class="zmdi zmdi-check"></i><span></span>
                            </li>
                            <li>
                                <i class="zmdi zmdi-check"></i><span></span>
                            </li>
                            <li>
                                <i class="zmdi zmdi-check"></i><span></span>
                            </li>
                            <li>
                                <i class="zmdi zmdi-check"></i><span></span>
                            </li>
                        </ul>
                        <div class="banner-button">
                            <a href="<?= yii\helpers\Url::to(['shop']) ?>">Discover <i class="zmdi zmdi-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- banner-item end -->
            <!-- banner-item start -->
            <div class="col-md-4 hidden-sm col-xs-12">
                <div class="banner-item banner-4">
                    <div class="banner-img">
                        <a href="#"><img src="<?= Yii::$app->urlManager->baseUrl ?>/frontend/web/images/bg/bg3.png" alt=""></a>
                    </div>
                    <h3 class="banner-title-2"><a href="#"></a></h3>
                    <div class="banner-button">
                        <a href="<?= yii\helpers\Url::to(['shop']) ?>">Shop now <i class="zmdi zmdi-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- banner-item end -->
        </div>
    </div>
</div>
<!-- BANNER-SECTION END -->

<!-- FEATURED PRODUCT SECTION START -->
<div class="featured-product-section mb-40  ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-left mb-40">
                    <h2 class="uppercase">Popular Products</h2>
                    <h6>Wide range of products that are popular among consumers.</h6>
                </div>
            </div>
        </div>
        <div class="featured-product">
            <div class="row active-featured-product slick-arrow-2">
                <?php foreach ($products as $product) { ?>
                    <!-- product-item start -->
                    <div class="col-xs-12">
                        <div class="product-item">
                            <div class="product-img">
                                <a href="<?= Yii::$app->urlManager->createUrl(['site/view', 'id' => $product->id]) ?>">
                                    <img style="height:300px; width: 270px; padding:30px;" src="<?= Yii::$app->urlManager->baseUrl ?>/admin/<?= $product->prod_img ?>" alt=""/>
                                </a>
                            </div>
                            <div class="product-info">
                                <h6 class="product-title">
                                    <a href="<?= Yii::$app->urlManager->createUrl(['site/view', 'id' => $product->id]) ?>"><?= $product->name ?></a>
                                </h6>
                                <!-- <div class="pro-rating">
                                     <a href="#"><i class="zmdi zmdi-star"></i></a>
                                     <a href="#"><i class="zmdi zmdi-star"></i></a>
                                     <a href="#"><i class="zmdi zmdi-star"></i></a>
                                     <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                     <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                 </div>-->
                                <h3 class="pro-price"><?= $product->price ?></h3>
                                <ul class="action-button">

                                    <li>
                                        <a href="<?= Yii::$app->urlManager->createUrl(['site/view', 'id' => $product->id]) ?>" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                    </li>

                                    <li>
                                        <a href="#"  data-id="<?= $product->id ?>" class="cart" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- product-item end -->
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- FEATURED PRODUCT SECTION END -->

<!-- UP COMMING PRODUCT SECTION START -->
<div class="up-comming-product-section mb-80">
    <div class="container">
        <div class="row">
            <!-- up-comming-pro -->
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="up-comming-pro gray-bg clearfix">
                    <div class="up-comming-pro-img f-left">
                        <a href="#">
                            <img src="<?= Yii::$app->urlManager->baseUrl ?>/frontend/web/img/banner/all.jpg" alt="">
                        </a>
                    </div>
                    <div class="up-comming-pro-info f-left">
                        <h3><a href="#">Clean 9 - Weight Management</a></h3>
                        <p>The Clean 9 diet is a nine-day detox diet for fast weight loss. It's a low-calorie plan that focuses on the use of meal replacement drinks and weight loss supplements. Proponents of the diet claim that it helps cleanse your body and make you feel lighter, look better and lose weight in just nine days. </p>
                        <p>Other products include F15 and Vital5.</p>

                    </div>
                </div>
            </div>
            <div class="col-md-4 hidden-sm col-xs-12">
                <div class="banner-item banner-1">
                    <div class="ribbon-price">
                        <span>Ksh 13,200</span>
                    </div>
                    <div class="banner-img">
                        <a href="#"><img src="<?= Yii::$app->urlManager->baseUrl ?>/frontend/web/img/banner/c9.jpg" alt=""></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- UP COMMING PRODUCT SECTION END -->

<!-- PRODUCT TAB SECTION START -->
<div class="product-tab-section mb-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="section-title text-left mb-40">
                    <h2 class="uppercase">Popular Products</h2>
                    <h6>Wide range of products that are popular among consumers.</h6>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="pro-tab-menu text-right">
                    <!-- Nav tabs -->
                    <ul class="" >
                        <li class="active"><a href="#popular-product" data-toggle="tab">Popular Products </a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="product-tab">
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- popular-product start -->
                <div class="tab-pane active" id="popular-product">
                    <div class="row">
                        <?php foreach ($products as $product) { ?>
                            <!-- product-item start -->
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="<?= Yii::$app->urlManager->createUrl(['site/view', 'id' => $product->id]) ?>">
                                            <img style="height:300px; width: 270px; padding:30px;" src="<?= Yii::$app->urlManager->baseUrl ?>/admin/<?= $product->prod_img ?>" alt=""/>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="<?= Yii::$app->urlManager->createUrl(['site/view', 'id' => $product->id]) ?>"><?= $product->name ?></a>
                                        </h6>
                                        <!-- <div class="pro-rating">
                                             <a href="#"><i class="zmdi zmdi-star"></i></a>
                                             <a href="#"><i class="zmdi zmdi-star"></i></a>
                                             <a href="#"><i class="zmdi zmdi-star"></i></a>
                                             <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                             <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                         </div>-->
                                        <h3 class="pro-price"><?= $product->price ?></h3>
                                        <ul class="action-button">

                                            <li>
                                                <a href="<?= Yii::$app->urlManager->createUrl(['site/view', 'id' => $product->id]) ?>" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                            </li>

                                            <li>
                                                <a href="#"  data-id="<?= $product->id ?>" class="cart" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- product-item end -->
                        <?php } ?>



                    </div>
                </div>
                <!-- popular end -->


            </div>
        </div>
    </div>
</div>
<!-- PRODUCT TAB SECTION END -->


<!-- BLOG SECTION START -->
<div class="blog-section-2 pt-60 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-left mb-40">
                    <h2 class="uppercase">Latest blog</h2>
                    <h6>Have a look at our blog</h6>
                </div>
            </div>
        </div>
        <div class="blog">
            <div class="row active-blog-2">
                <?php $count = 0; ?>
                <?php foreach ($blog as $content) { ?>
                    <?php $count++; ?>
                    <!-- blog-item start -->
                    <div class="col-xs-12">
                        <div class="blog-item-2">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="blog-image">
                                        <a href="blog-details.html"><img src="<?= Yii::$app->urlManager->baseUrl ?>/admin/<?= $content->post_img ?>" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="blog-desc">
                                        <h5 class="blog-title-2"><a href="#"><?= $content->post_title ?></a></h5>
                                        <p></p>
                                        <div class="read-more">
                                            <a href="#">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- blog-item end -->
                    <?php
                    if ($count >= 5) {
                        break;
                    }
                    ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- BLOG SECTION END -->

<!-- NEWSLETTER SECTION START -->
<div class="newsletter-section section-bg-tb pt-60 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-12">
                <div class="newsletter">
                    <div class="newsletter-info text-center">
                        <h2 class="newsletter-title">get a newsletter</h2>
                        <p>Make sure that you never miss our interesting news <br class="hidden-xs">by joining our newsletter program.</p>
                    </div>
                    <div class="subcribe clearfix">
                        <form action="#">
                            <input type="text" name="email" placeholder="Enter your email here..."/>
                            <button class="submit-btn-2 btn-hover-2" type="submit">subcribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- NEWSLETTER SECTION END -->