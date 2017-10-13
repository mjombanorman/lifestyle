<?php $url = Yii::$app->urlManager; ?>


<li>
    <a href="javascript:;"><span class="title">Users</span>
        <span class=" arrow"></span></a>
    <span class="icon-thumbnail"><i class="fa fa-users"></i></span>
    <ul class="sub-menu">
        <li class="">
            <a href="<?= Yii::$app->urlManager->createUrl(['users/user/index']); ?>"> All Users</a>
            <span class="icon-thumbnail">u</span>
        </li>

    </ul>
</li>