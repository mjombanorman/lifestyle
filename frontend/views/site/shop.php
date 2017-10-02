<?php

use yii\widgets\LinkPager;
use yii\base\ErrorException;
?>
<?php
$total = $pagination->totalCount;
$current_page = $pagination->page + 1;
$page_size = $pagination->pageSize;
$total_pages = intVal(ceil($total / $page_size));
$pages = [];
$next_page = $current_page == $total_pages ? $current_page : $current_page + 1;
$prev_page = $current_page >= 1 ? 1 : $current_page - 1;
$category = null;
try {
    $category = $_GET['cat'] ? $_GET['cat'] : null;
} catch (ErrorException $e) {
    $category = null;
}

// $lower_limit = $current_page == 1 ? 01 : $page_size * ($current_page - 1) +1 ;
// $upper_limit = $current_page == 1 ? $page_size : $page_size * $current_page;
//limit algo
if ($current_page == 1) {
    $lower_limit = $total == 0 ? 00 : 01;
    if ($total > $page_size) {
        $upper_limit = $page_size;
    } else {
        $upper_limit = $total;
    }
} else {
    $lower_limit = ($current_page - 1) * $page_size + 1;
    $upper_limit = $page_size * $current_page;
    if ($total > $upper_limit) {

    } else {
        $upper_limit = $total;
    }
}
?>

<!-- SHOP SECTION START -->
<div class="shop-section mb-80">
    <div class="container">
        <div class="row">
            <?php //former place ?>
            <div class="col-md-9 col-md-push-3  col-sm-12">
                <div class="shop-content">
                    <!-- shop-option start -->
                    <div class="shop-option box-shadow mb-30 clearfix">
                        <!-- Nav tabs -->
                        <ul class="shop-tab f-left" role="tablist">
                            <li class="active">
                                <a href="#grid-view" data-toggle="tab"><i class="zmdi zmdi-view-module"></i></a>
                            </li>
                            <li>
                                <a href="#list-view" data-toggle="tab"><i class="zmdi zmdi-view-list-alt"></i></a>
                            </li>
                        </ul>
                        <!-- short-by -->
                        <div class="short-by f-left text-center">
                            <span>Sort by :</span>
                            <select>
                                <option value="volvo">Newest </option>
                                <option value="saab">Recent</option>
                                <option value="mercedes">Ascending</option>
                                <option value="audi">Decending</option>
                            </select>
                        </div>
                        <!-- showing -->
                        <div class="showing f-right text-right">
                            <span>Showing : <?= $lower_limit ?>-<?= $upper_limit ?> of <?= $total ?>.</span>
                        </div>
                    </div>
                    <!-- shop-option end -->
                    <!-- Tab Content start -->
                    <div class="tab-content">
                        <!-- grid-view -->
                        <div role="tabpanel" class="tab-pane active" id="grid-view">
                            <div class="row">
                                <?php if (empty($model)) { ?>
                                    <div class="text-center"><p>No Results Found</p></div>
                                <?php } ?>
                                <?php foreach ($model as $product) { ?>
                                    <!-- product-item start -->
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="<?= Yii::$app->urlManager->createUrl(['site/view', 'id' => $product->id]); ?>">
                                                    <img style="height:300px; width: 270px; padding:30px;" src="<?= $product->prod_img ? Yii::$app->urlManager->baseUrl . '/admin/' . $product->prod_img : Yii::$app->urlManager->baseUrl . '/admin/images/icons/item.jpg' ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-title">
                                                    <a href="<?= Yii::$app->urlManager->createUrl(['site/view', 'id' => $product->id]); ?>"><?= $product->name ?> </a>
                                                </h6>
                                                <!--<div class="pro-rating">
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
                                                    </li><?php // Yii::$app->urlManager->createUrl(['site/cart','id'=>$product->id])    ?>

                                                    <li>
                                                        <a href="#" data-url = "<?= Yii::$app->urlManager->createUrl(['site/cart']) ?>" data-id="<?= $product->id ?>" title="Add to cart" class="cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-item end -->
                                <?php } ?>


                            </div>
                        </div>
                        <!-- list-view -->

                    </div>
                    <!-- Tab Content end -->
                    <!-- shop-pagination start -->
                    <ul class="shop-pagination box-shadow text-center ptblr-10-30">

                        <?php
                        for ($i = 1; $i <= $total_pages; $i++) {
                            $pages[] = $i;
                        }
                        ?>

                        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/shop', 'cat' => $category, 'page' => $prev_page, 'per-page' => $page_size]) ?>"><i class="zmdi zmdi-chevron-left"></i></a></li>

                        <?php foreach ($pages as $page) { ?>
                            <li class="<?= $page == $current_page ? 'active' : '#' ?>"><a href="<?= Yii::$app->urlManager->createUrl(['site/shop', 'cat' => $category, 'page' => $page, 'per-page' => $page_size]) ?>"><?= $page ?></a></li>
                        <?php } ?>

                        <li class="#"><a href="<?= Yii::$app->urlManager->createUrl(['site/shop', 'cat' => $category, 'page' => $next_page, 'per-page' => $page_size]) ?>"><i class="zmdi zmdi-chevron-right"></i></a></li>

                    </ul>
                    <!-- shop-pagination end -->
                    <div>

                    </div>
                </div>
            </div>
            <!--Sidebar Right-->
            <?= $this->render('sidebar', ['allCategories' => $allCategories]); ?>
        </div>
    </div>
</div>
<!-- SHOP SECTION END -->