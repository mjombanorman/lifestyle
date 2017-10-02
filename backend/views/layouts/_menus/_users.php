<?php $url = Yii::$app->urlManager; ?>
<li <?= Yii::$app->controller->module->id == 'users' ? 'open active' : '' ?> > <a href="javascript:;"> <i class="fa fa-users"></i> <span class="title">Users</span> <span class=" arrow"></span> </a>
    <ul class="sub-menu">
        <li> <a href="<?= Yii::$app->urlManager->createUrl(['users/user/index']); ?>"> All Users </a> </li>
    </ul>
</li>