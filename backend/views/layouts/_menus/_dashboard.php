<li class="start <?= Yii::$app->controller->id == 'site' ? 'open active' : '' ?>"> <a href="#"><i class="material-icons">home</i> <span class="title">Dashboard</span> <span class="selected"></span> <span class="arrow "></span> </a>
    <ul class="sub-menu">
        <li> <a href="<?= Yii::$app->urlManager->createUrl(['index']) ?>"> Dashboard </a> </li>
    </ul>
</li>