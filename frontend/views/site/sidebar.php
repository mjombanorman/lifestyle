
<?php

use backend\modules\products\models\Products; ?>
<div class="col-md-3 col-md-pull-9 col-xs-12">
    <!-- widget-search -->
    <aside class="widget-search mb-30">
        <form action="#">
            <input type="text" placeholder="Search here...">
            <!--<button type="submit"><i class="zmdi zmdi-search"></i></button>-->
        </form>
    </aside>
    <!-- widget-categories -->
    <aside class="widget widget-categories box-shadow mb-30">
        <h6 class="widget-title border-left mb-20">Categories</h6>
        <div id="cat-treeview" class="product-cat">
            <ul>
                <?php foreach ($allCategories as $category) { ?>
                    <li class="closed"><a href="<?= Yii::$app->urlManager->createUrl(['site/shop', 'cat' => $category->id]); ?>"><?= $category->name; ?></a>

                    </li>
                <?php } ?>
            </ul>
        </div>
    </aside>
    <!-- shop-filter -->
    <!--<aside class="widget shop-filter box-shadow mb-30">
          <h6 class="widget-title border-left mb-20">Price</h6>
          <div class="price_filter">
              <div class="price_slider_amount">
                  <input type="submit"  value="You range :"/>
                  <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
              </div>
              <div id="slider-range"></div>
          </div>
      </aside>-->
    <!-- widget-color -->
    <!--  <aside class="widget widget-color box-shadow mb-30">
          <h6 class="widget-title border-left mb-20">color</h6>
          <ul>
              <li class="color-1"><a href="#">LightSalmon</a></li>
              <li class="color-2"><a href="#">Dark Salmon</a></li>
              <li class="color-3"><a href="#">Tomato</a></li>
              <li class="color-4"><a href="#">Deep Sky Blue</a></li>
              <li class="color-5"><a href="#">Electric Purple</a></li>
              <li class="color-6"><a href="#">Atlantis</a></li>
          </ul>
      </aside>-->
    <!-- operating-system -->
    <!--  <aside class="widget operating-system box-shadow mb-30">
          <h6 class="widget-title border-left mb-20">operating system</h6>
          <form action="action_page.php">
              <label><input type="checkbox" name="operating-1" value="phone-1">Windows Phone</label><br>
              <label><input type="checkbox" name="operating-1" value="phone-1">Bleckgerry ios</label><br>
              <label><input type="checkbox" name="operating-1" value="phone-1">Android</label><br>
              <label><input type="checkbox" name="operating-1" value="phone-1">ios</label><br>
              <label><input type="checkbox" name="operating-1" value="phone-1">Windows Phone</label><br>
              <label><input type="checkbox" name="operating-1" value="phone-1">Symban</label><br>
              <label class="mb-0"><input type="checkbox" name="operating-1" value="phone-1">Bleckgerry os</label><br>
          </form>
      </aside>-->
    <!-- widget-product -->
    <aside class="widget widget-product box-shadow">
        <h6 class="widget-title border-left mb-20">recent products</h6>
        <?php
        $pr = Products::find()->all();
        $count = 0;
        foreach ($pr as $prod) {
            $count++;
            ?>
            <!-- product-item start -->
            <div class="product-item">
                <div class="product-img">
                    <a href="<?= Yii::$app->urlManager->createUrl(['site/view', 'id' => $prod->id]) ?>">
                        <img src="<?= Yii::$app->urlManager->baseUrl ?>/admin/<?= $prod->prod_img ?>" alt=""/>
                    </a>
                </div>
                <div class="product-info">
                    <h6 class="product-title">
                        <a href="<?= Yii::$app->urlManager->createUrl(['site/view', 'id' => $prod->id]) ?>"><?= $prod->name ?></a>
                    </h6>
                    <h3 class="pro-price"><?= 'Ksh ' . $prod->price ?></h3>
                </div>
            </div>
            <!-- product-item end -->
            <?php
            if ($count >= 3) {
                break;
            }
        }
        ?>
    </aside>
</div>