<?php

use backend\modules\products\components\ProductsModuleConstants; ?>
<?php $url = Yii::$app->urlManager; ?>

<li class="<?= Yii::$app->controller->MENU == ProductsModuleConstants::MENU_PRODUCTS ? 'open active' : '' ?>">
    <a href="javascript:;"><span class="title">Inventory</span>
        <span class=" arrow <?= Yii::$app->controller->MENU == ProductsModuleConstants::MENU_PRODUCTS ? 'open active' : '' ?>"></span></a>
    <span class="icon-thumbnail <?= Yii::$app->controller->MENU == ProductsModuleConstants::MENU_PRODUCTS ? 'bg-success' : '' ?>"><i class="fa fa-list"></i></span>
    <ul class="sub-menu">
        <li class="<?= Yii::$app->controller->SUB_MENU == ProductsModuleConstants::SUB_MENU_ALL ? 'active' : '' ?>">
            <a href="<?= $url->createUrl(['products/products/index']) ?>"> Products</a>
            <span class="icon-thumbnail">pr</span>
        </li>
        <li class="<?= Yii::$app->controller->SUB_MENU == ProductsModuleConstants::SUB_MENU_CATEGORY ? 'active' : '' ?>">
            <a href="<?= $url->createUrl(['products/category/index']) ?>">Category</a>
            <span class="icon-thumbnail">pc</span>
        </li>
    </ul>
</li>

