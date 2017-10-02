
<!-- BLOG SECTION START -->
<div class="blog-section mb-50">
    <div class="container">
        <div class="row">
            <div class="col-md-9  col-xs-12">
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
                                            <ul>
                                                <li class="closed"><a href="#">Brand One</a>
                                                    <ul>
                                                        <li><a href="#">Mobile</a></li>
                                                        <li><a href="#">Tab</a></li>
                                                        <li><a href="#">Watch</a></li>
                                                        <li><a href="#">Head Phone</a></li>
                                                        <li><a href="#">Memory</a></li>
                                                    </ul>
                                                </li>
                                                <li class="open"><a href="#">Brand Two</a>
                                                    <ul>
                                                        <li><a href="#">Mobile</a></li>
                                                        <li><a href="#">Tab</a></li>
                                                        <li><a href="#">Watch</a></li>
                                                        <li><a href="#">Head Phone</a></li>
                                                        <li><a href="#">Memory</a></li>
                                                    </ul>
                                                </li>
                                                <li class="closed"><a href="#">Accessories</a>
                                                    <ul>
                                                        <li><a href="#">Footwear</a></li>
                                                        <li><a href="#">Sunglasses</a></li>
                                                        <li><a href="#">Watches</a></li>
                                                        <li><a href="#">Utilities</a></li>
                                                    </ul>
                                                </li>
                                                <li class="closed"><a href="#">Top Brands</a>
                                                    <ul>
                                                        <li><a href="#">Mobile</a></li>
                                                        <li><a href="#">Tab</a></li>
                                                        <li><a href="#">Watch</a></li>
                                                        <li><a href="#">Head Phone</a></li>
                                                        <li><a href="#">Memory</a></li>
                                                    </ul>
                                                </li>
                                                <li class="closed"><a href="#">Jewelry</a>
                                                    <ul>
                                                        <li><a href="#">Footwear</a></li>
                                                        <li><a href="#">Sunglasses</a></li>
                                                        <li><a href="#">Watches</a></li>
                                                        <li><a href="#">Utilities</a></li>
                                                    </ul>
                                                </li>
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
                                                <a href="single-product.html">
                                                    <img src="img/cart/4.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-title multi-line mt-10">
                                                    <a href="single-product.html">Dummy Blog Name</a>
                                                </h6>
                                            </div>
                                        </div>
                                        <!-- product-item end -->
                                        <!-- product-item start -->
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="single-product.html">
                                                    <img src="img/cart/5.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-title multi-line mt-10">
                                                    <a href="single-product.html">Dummy Blog Name</a>
                                                </h6>
                                            </div>
                                        </div>
                                        <!-- product-item end -->
                                        <!-- product-item start -->
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="single-product.html">
                                                    <img src="img/cart/6.jpg" alt=""/>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-title multi-line mt-10">
                                                    <a href="single-product.html">Dummy Blog Name</a>
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
                                            <li><a href="#">Bleckgerry ios</a></li>
                                            <li><a href="#">Symban</a></li>
                                            <li><a href="#">IOS</a></li>
                                            <li><a href="#">Bleckgerry</a></li>
                                            <li><a href="#">Windows Phone</a></li>
                                            <li><a href="#">Windows Phone</a></li>
                                            <li><a href="#">Androids</a></li>
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
                                            <a href="blog-details.html"><img src="/lifestyle/backend/web/<?= $item->post_img ?>" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="blog-desc">
                                            <h5 class="blog-title-2"><a href="#"><?= $item->post_title ?></a></h5>
                                            <p><?php
                                                $max_length = 300;

                                                if (strlen($item->post_content) > $max_length) {
                                                    $item->post_content = preg_replace("/(\/[^>]*>)([^<]*)(<)/", "\\1\\3", $item->post_content);
                                                    $offset = ($max_length - 3) - strlen($item->post_content);
                                                    $s = substr($item->post_content, 0, strrpos($item->post_content, ' ', $offset)) . '...';
                                                    echo $s;
                                                } else {
                                                    $item->post_content = preg_replace("/(\/[^>]*>)([^<]*)(<)/", "\\1\\3", $item->post_content);
                                                    $item->post_content;
                                                }
                                                ?></p>
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
            <div class="col-md-2 col-xs-12">
                <?= $this->render('sidebar', ['model' => $category_all]); ?>
            </div>

        </div>
    </div>
</div>
<!-- BLOG SECTION END -->