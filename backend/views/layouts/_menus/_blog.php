<?php $url = Yii::$app->urlManager; ?>


<li>
    <a href="javascript:;"><span class="title">Blog</span>
        <span class=" arrow"></span></a>
    <span class="icon-thumbnail"><i class="fa fa-book"></i></span>
    <ul class="sub-menu">
        <li class="">
            <a href="<?= $url->createUrl(['blog/posts/index']) ?>"> Posts</a>
            <span class="icon-thumbnail">po</span>
        </li>
        <li class="">
            <a href="<?= $url->createUrl(['blog/category/index']) ?>">Category</a>
            <span class="icon-thumbnail">ca</span>
        </li>
    </ul>
</li>