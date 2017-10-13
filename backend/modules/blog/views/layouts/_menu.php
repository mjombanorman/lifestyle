<?php

use backend\modules\blog\components\BlogModuleConstants; ?>
<?php $url = Yii::$app->urlManager; ?>


<li class="<?= Yii::$app->controller->MENU == \backend\modules\blog\components\BlogModuleConstants::MENU_BLOG ? 'open active' : '' ?>">
    <a href="javascript:;"><span class="title">Blog</span>
        <span class=" arrow <?= Yii::$app->controller->MENU == \backend\modules\blog\components\BlogModuleConstants::MENU_BLOG ? 'open active' : '' ?>"></span></a>
    <span class="icon-thumbnail <?= Yii::$app->controller->MENU == \backend\modules\blog\components\BlogModuleConstants::MENU_BLOG ? 'bg-success' : '' ?>"><i class="fa fa-book"></i></span>
    <ul class="sub-menu">
        <li class="<?= Yii::$app->controller->SUB_MENU == \backend\modules\blog\components\BlogModuleConstants::SUB_MENU_CATEGORY ? 'active' : '' ?>">
            <a href="<?= $url->createUrl(['blog/posts/index']) ?>"> Posts</a>
            <span class="icon-thumbnail">po</span>
        </li>
        <li class="<?= Yii::$app->controller->SUB_MENU == \backend\modules\blog\components\BlogModuleConstants::SUB_MENU_CATEGORY ? 'active' : '' ?>">
            <a href="<?= $url->createUrl(['blog/category/index']) ?>">Category</a>
            <span class="icon-thumbnail">ca</span>
        </li>
    </ul>
</li>