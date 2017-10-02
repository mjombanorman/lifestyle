<?php

use yii\helpers\Url; ?>
<li class="<?= Yii::$app->controller->module->id == 'settings' || 'admin' ? 'open active' : '' ?>" > <a href="javascript:;"> <i class="fa fa-cogs"></i> <span class="title">Settings</span> <span class=" arrow"></span> </a>
    <ul class="sub-menu">
        <!-- <li> <a href="#">Settings 1</a> </li>-->
        <li class="<?= Yii::$app->controller->module->id == 'settings' ? 'open' : '' ?>"> <a href="javascript:;"> <span class="title">Configurations</span> <span class="arrow <?= Yii::$app->controller->module->id == 'settings' ? 'open' : '' ?>"></span> </a>
            <ul class="sub-menu" style="display: <?= Yii::$app->controller->module->id == 'settings' ? 'block' : 'none' ?>;">
                <li> <a href="<?= Url::to(['/settings/countries/index']) ?>">  Countries </a> </li>
                <li> <a href="<?= Url::to(['/settings/counties/index']) ?>"> Counties </a> </li>
                <li> <a href="<?= Url::to(['/settings/sub-counties/index']) ?>"> Sub Counties </a> </li>
                <li> <a href="<?= Url::to(['/settings/constituencies/index']) ?>"> Constituencies </a> </li>
                <li> <a href="<?= Url::to(['/settings/towns/index']) ?>"> Towns </a> </li>
                <li> <a href="<?= Url::to(['/settings/currency/index']) ?>"> Currency </a> </li>
                <li> <a href="<?= Url::to(['/settings/numbering-format/index']) ?>"> Numbering Format </a> </li>
                <li> <a href="<?= Url::to(['/settings/payment-methods/index']) ?>"> Payment Methods </a> </li>
            </ul>
        </li>
        <li class="<?= Yii::$app->controller->module->id == 'admin' ? 'open' : '' ?>"> <a href="javascript:;"> <span class="title">AccessControl</span> <span class="arrow"></span> </a>
            <ul class="sub-menu" style="display: <?= Yii::$app->controller->module->id == 'admin' ? 'block' : 'none' ?>;">
                <li> <a href="<?= Url::to(['/admin/index']) ?>"> Assignment </a> </li>
                <li> <a href="<?= Url::to(['/admin/role']) ?>">Roles  </a> </li>
                <li> <a href="<?= Url::to(['/admin/permission']) ?>">Permissions  </a> </li>
                <!--<li> <a href="<?= Url::to(['/admin/index']) ?>">Rules  </a> </li>-->
                <li> <a href="<?= Url::to(['/admin/route']) ?>">Routes  </a> </li>
                <li> <a href="<?= Url::to(['/admin/menu']) ?>">Menu  </a> </li>
                <li> <a href="<?= Url::to(['/admin/user']) ?>">Users  </a> </li>
            </ul>
        </li>
    </ul>
</li>



