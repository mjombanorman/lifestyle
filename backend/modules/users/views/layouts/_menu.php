<?php

use backend\modules\users\components\UsersModuleConstants; ?>
<?php $url = Yii::$app->urlManager; ?>


<li class="<?= Yii::$app->controller->MENU == UsersModuleConstants::MENU_USERS ? 'open active' : '' ?>">
    <a href="javascript:;"><span class="title">Users</span>
        <span class=" arrow"></span></a>
    <span class="<?= Yii::$app->controller->MENU == UsersModuleConstants::MENU_USERS ? 'bg-success' : '' ?>  icon-thumbnail"><i class="fa fa-users"></i></span>
    <ul class="sub-menu">
        <li class="<?= Yii::$app->controller->SUB_MENU == UsersModuleConstants::SUB_MENU_ALL ? 'active' : '' ?>">
            <a href="<?= Yii::$app->urlManager->createUrl(['users/user/index']); ?>"> All Users</a>
            <span class="icon-thumbnail">u</span>
        </li>

    </ul>
</li>
