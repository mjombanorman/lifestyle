<?php $url = Yii::$app->urlManager; ?>

<li>
    <a href="javascript:;"><span class="title">Inventory</span>
        <span class=" arrow"></span></a>
    <span class="icon-thumbnail"><i class="fa fa-list"></i></span>
    <ul class="sub-menu">
        <li class="">
            <a href="<?= $url->createUrl(['products/products/index']) ?>"> Products</a>
            <span class="icon-thumbnail">pr</span>
        </li>
        <li class="">
            <a href="<?= $url->createUrl(['products/category/index']) ?>">Category</a>
            <span class="icon-thumbnail">pc</span>
        </li>
    </ul>
</li>