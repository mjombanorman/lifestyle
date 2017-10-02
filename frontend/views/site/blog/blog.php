<div class="blog-section mb-50">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-xs-12">
                <div class="row">
                    <!-- blog-option start -->
                    <div class="col-md-12">
                        <div class="blog-option box-shadow mb-30  clearfix">
                            <!-- categories -->
                            <div class="dropdown f-left">
                                <button class="option-btn">
                                    Categories
                                    <i class="zmdi zmdi-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu dropdown-width mt-30">
                                    <aside class="widget widget-categories box-shadow">
                                        <h6 class="widget-title border-left mb-20">Categories</h6>
                                        <div id="cat-treeview-2" class="product-cat">
                                            <ul class="treeview">
                                                <?php foreach ($category_all as $category) {
                                                    ?>
                                                    <li class="closed expandable"><div class="hitarea closed-hitarea expandable-hitarea"></div><a href="#"><?= $category->cat_name ?></a>

                                                    </li>
                                                <?php } ?>

                                            </ul>
                                        </div>
                                    </aside>
                                </div>
                            </div>
                            <!-- recent-product -->
                            <div class="dropdown f-left">
                                <button class="option-btn">
                                    Recent Post
                                    <i class="zmdi zmdi-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu dropdown-width mt-30">
                                    <aside class="widget widget-product box-shadow">
                                        <h6 class="widget-title border-left mb-20">recent products</h6>
                                        <!-- product-item start -->
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img src="img/cart/4.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-title multi-line mt-10">
                                                    <a href="#"></a>
                                                </h6>
                                            </div>
                                        </div>
                                        <!-- product-item end -->

                                    </aside>
                                </div>
                            </div>
                            <!-- Tags -->
                            <div class="dropdown f-left">
                                <button class="option-btn">
                                    Tags
                                    <i class="zmdi zmdi-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu dropdown-width mt-30">
                                    <aside class="widget widget-tags box-shadow">
                                        <h6 class="widget-title border-left mb-20">Tags</h6>
                                        <ul class="widget-tags-list">
                                            <?php foreach ($category_all as $category) { ?>
                                                <li><a href="#"><?= $category->cat_name ?></a></li>
                                            <?php } ?>

                                        </ul>
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- blog-option end -->
                </div>
                <div class="row">
                    <?php foreach ($model as $item) { ?>
                        <!-- blog-item start -->
                        <div class="col-sm-6 col-xs-12">
                            <div class="blog-item-2">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="blog-image">
                                            <a href="blog-details.html"><img style="max-height: 320px;" src="<?= Yii::$app->urlManager->baseUrl ?>/admin/<?= $item->post_img ?>" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="blog-desc">
                                            <h5 class="blog-title-2"><a href="#"><?= $item->post_title ?></a></h5>
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
                    <?php } ?>

                </div>
            </div>
            <!-- sidebar -->
            <div class="col-md-3 col-xs-12">
                <?= $this->render('sidebar', ['model' => $category_all]) ?>
            </div>
        </div>
    </div>
</div>
