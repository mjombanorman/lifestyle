<?php
$url = Yii::$app->urlManager;
?>
<!-- widget-search -->
<aside class="widget-search mb-30">
    <form action="#">
        <input type="text" placeholder="Search here...">
        <button type="submit"><i class="zmdi zmdi-search"></i></button>
    </form>
</aside>
<!-- widget-categories -->
<aside class="widget widget-categories box-shadow mb-30">
    <h6 class="widget-title border-left mb-20">Categories</h6>
    <div id="cat-treeview" class="product-cat">
        <ul>
            <?php foreach ($model as $category) { ?>
                <li class="closed"><a href="<?= $url->createUrl(['blog', 'cat_id' => $category->cat_id]) ?>"><?= $category->cat_name ?></a>

                </li>
            <?php } ?>

        </ul>
    </div>
</aside>

<!-- widget-color -->
<aside class="widget widget-color box-shadow mb-30">
    <h6 class="widget-title border-left mb-20">Tags</h6>
    <ul>
        <li class="color-1"><a href="#">Clean 9</a></li>

    </ul>
</aside>
<!-- widget-product -->
<aside class="widget widget-product box-shadow">
    <h6 class="widget-title border-left mb-20">recent topics</h6>
    <!-- product-item start -->
    <div class="product-item">
        <div class="product-img">
            <a href="single-product.html">
                <img src="" alt=""/>
            </a>
        </div>
        <div class="product-info">
            <h6 class="product-title">
                <a href="single-product.html"></a>
            </h6>
            <h3 class="pro-price"></h3>
        </div>
    </div>
    <!-- product-item end -->

</aside>