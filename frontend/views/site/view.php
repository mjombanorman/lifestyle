<!-- SHOP SECTION START -->
<div class="shop-section mb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3 col-xs-12">
                <!-- single-product-area start -->
                <div class="single-product-area mb-80">
                    <div class="row">
                        <!-- imgs-zoom-area start -->
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="imgs-zoom-area">
                                <img id="zoom_03" style="padding: 30px;" src="<?= Yii::$app->urlManager->baseUrl ?>/admin/<?= $model->prod_img ?>" data-zoom-image="<?= Yii::$app->urlManager->baseUrl ?>/admin/<?= $model->prod_img ?>" alt="">
                                <!-- <div class="row">
                                     <div class="col-xs-12">
                                         <div id="gallery_01" class="carousel-btn slick-arrow-3 mt-30">

                                             <div class="p-c">
                                                 <a href="#" data-image="" data-zoom-image="">
                                                     <img class="zoom_03" src="" alt="">
                                                 </a>
                                             </div>

                                         </div>
                                     </div>
                                 </div>-->
                            </div>
                        </div>
                        <!-- imgs-zoom-area end -->
                        <!-- single-product-info start -->
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="single-product-info">
                                <h3 class="text-black-1"><?= $model->name ?></h3>
                                <h6 class="brand-name-2"><?= $model->category->name ?></h6>
                                <!-- hr -->
                                <hr>
                                <!-- single-product-tab -->
                                <div class="single-product-tab">
                                    <ul class="reviews-tab mb-20">
                                        <li  class="active"><a href="#description" data-toggle="tab">description</a></li>

                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="description">
                                            <p><?= $model->description ?></p>
                                        </div>

                                    </div>
                                </div>

                                <!-- hr -->
                                <hr>
                                <!-- plus-minus-pro-action -->
                                <div class="plus-minus-pro-action">
                                    <div class="sin-plus-minus f-left clearfix">
                                        <p class="color-title f-left">Qty</p>
                                        <div class="cart-plus-minus f-left">
                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                        </div>
                                    </div>
                                    <div class="sin-pro-action f-right">

                                        <button data-id="<?= $model->id ?>" class="cart submit-btn-1  btn-hover-1"><i class="zmdi zmdi-shopping-cart-plus"></i> Add to cart </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single-product-info end -->
                    </div>
                </div>
                <!-- single-product-area end -->
                <div class="related-product-area">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">related product</h2>
                                <h6>View other similar products...</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="active-related-product">
                            <?php $count = 0; ?>
                            <?php foreach ($related as $product) { ?>
                                <?php $count++; ?>

                                <!-- product-item start -->
                                <div class="col-xs-12">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="<?= Yii::$app->urlManager->createUrl(['site/view', 'id' => $product->id]); ?>">
                                                <img style="height:300px; width: 270px; padding:30px;" src="<?= Yii::$app->urlManager->baseUrl ?>/admin/<?= $product->prod_img ?>" alt=""/>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="<?= Yii::$app->urlManager->createUrl(['site/view', 'id' => $product->id]); ?>">Product Name</a>
                                            </h6>
                                            <!--  <div class="pro-rating">
                                                  <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                              </div>-->
                                            <h3 class="pro-price"><?= 'Ksh ' . $product->price ?></h3>
                                            <ul class="action-button">

                                                <li>
                                                    <a href="<?= Yii::$app->urlManager->createUrl(['site/view', 'id' => $product->id]); ?>"  title="View Product"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>

                                                <li>
                                                    <a href="#" class="cart" data-id="<?= $product->id ?>" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <?php
                                if ($count == 3) {
                                    break;
                                }
                                ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->render('sidebar', ['allCategories' => $allCategories]); ?>
        </div>
    </div>
</div>