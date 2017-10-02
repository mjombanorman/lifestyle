<?php $url = Yii::$app->urlManager; ?>

<li <?= Yii::$app->controller->module->id == 'blog' ? 'open active' : '' ?> > <a href="javascript:;"> <i class="material-icons">flip</i><span class="title"> Blog</span> <span class=" arrow"></span> </a>
    <ul class="sub-menu">
        <li> <a href="<?= $url->createUrl(['blog/posts/index']) ?>"> Posts </a> </li>
        <li> <a href="<?= $url->createUrl(['blog/category/index']) ?>"> Category</a> </li>

    </ul>
</li>