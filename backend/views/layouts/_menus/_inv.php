<?php $url = Yii::$app->urlManager; ?>
<li class="<?= Yii::$app->controller->module->id == 'products' ? 'open active' : '' ?>"> <a href="javascript:;"> <i class="fa fa-bars"></i> <span class="title">Inventory</span> <span class=" arrow"></span> </a>
    <ul class="sub-menu">
        <li> <a href="<?= $url->createUrl(['products/products/index']) ?>">Products </a> </li>
        <li> <a href="<?= $url->createUrl(['products/category/index']) ?>">Category</a> </li>
    </ul>
</li>
