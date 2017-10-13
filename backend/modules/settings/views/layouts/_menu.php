<?php

use yii\helpers\Url;
use backend\modules\settings\components\SettingsModuleConstants;
use mdm\admin\models\form\Signup;
?>

<li class="<?= Yii::$app->controller->MENU == SettingsModuleConstants::MENU_SETTINGS ? 'open active' : '' ?>">
    <a href="javascript:;"><span class="title">Settings</span>
        <span class="arrow"></span></a>
    <span class="<?= Yii::$app->controller->MENU == SettingsModuleConstants::MENU_SETTINGS ? 'bg-success' : '' ?> icon-thumbnail"><i class="fa fa-cogs"></i></span>
    <ul class="sub-menu">
        <li class="<?= Yii::$app->controller->SUB_MENU == SettingsModuleConstants::SUB_MENU_CONFIG ? 'open active' : '' ?>">
            <a href="javascript:;"><span class="title">Configurations</span>
                <span class="arrow "></span></a>
            <span class="icon-thumbnail">co</span>
            <ul class="sub-menu">
                <li class="<?= Yii::$app->controller->SUB_SUB_MENU == SettingsModuleConstants::SUB_SUB_MENU_COUNTRIES ? 'active' : '' ?>">
                    <a href="<?= Url::to(['/settings/countries/index']) ?>">Countries</a>
                    <span class="icon-thumbnail">c</span>
                </li>
                <li class="<?= Yii::$app->controller->SUB_SUB_MENU == SettingsModuleConstants::SUB_SUB_MENU_COUNTIES ? 'active' : '' ?>">
                    <a href="<?= Url::to(['/settings/counties/index']) ?>">Counties</a>
                    <span class="icon-thumbnail">c</span>
                </li>
                <li class="<?= Yii::$app->controller->SUB_SUB_MENU == SettingsModuleConstants::SUB_SUB_MENU_SUB_COUNTIES ? 'active' : '' ?>">
                    <a href="<?= Url::to(['/settings/sub-counties/index']) ?>">Sub Counties</a>
                    <span class="icon-thumbnail">s</span>
                </li>
                <li  class="<?= Yii::$app->controller->SUB_SUB_MENU == SettingsModuleConstants::SUB_SUB_MENU_TOWNS ? 'active' : '' ?>">
                    <a href="<?= Url::to(['/settings/towns/index']) ?>">Towns</a>
                    <span class="icon-thumbnail">t</span>
                </li>
                <li class="<?= Yii::$app->controller->SUB_SUB_MENU == SettingsModuleConstants::SUB_SUB_MENU_CURRENCY ? 'active' : '' ?>">
                    <a href="<?= Url::to(['/settings/currency/index']) ?>">Currency</a>
                    <span class="icon-thumbnail">c</span>
                </li>
                <li class="<?= Yii::$app->controller->SUB_SUB_MENU == SettingsModuleConstants::SUB_SUB_MENU_NF ? 'active' : '' ?>">
                    <a href="<?= Url::to(['/settings/numbering-format/index']) ?>">Numbering Format</a>
                    <span class="icon-thumbnail">n</span>
                </li>
                <li class="<?= Yii::$app->controller->SUB_SUB_MENU == SettingsModuleConstants::SUB_SUB_MENU_PM ? 'active' : '' ?>">
                    <a href="<?= Url::to(['/settings/payment-methods/index']) ?>">Payment Methods</a>
                    <span class="icon-thumbnail">p</span>
                </li>
            </ul>
        </li>
        <li class="<?= Yii::$app->controller->SUB_MENU == SettingsModuleConstants::SUB_MENU_ACCESS ? 'open active' : '' ?>">
            <a href="javascript:;"><span class="title">Access Control</span>
                <span class="arrow"></span></a>
            <span class="icon-thumbnail">ac</span>
            <ul class="sub-menu">
                <li class="<?= Yii::$app->controller->SUB_SUB_MENU == SettingsModuleConstants::SUB_SUB_MENU_ASS ? 'active' : '' ?>">
                    <a href="<?= Url::to(['/admin/assignment']) ?>">Assignment</a>
                    <span class="icon-thumbnail">a</span>
                </li>
                <li class="<?= Yii::$app->controller->SUB_SUB_MENU == SettingsModuleConstants::SUB_SUB_MENU_ROLES ? 'active' : '' ?>">
                    <a href="<?= Url::to(['/admin/role']) ?>">Roles</a>
                    <span class="icon-thumbnail">r</span>
                </li>
                <li class="<?= Yii::$app->controller->SUB_SUB_MENU == SettingsModuleConstants::SUB_SUB_MENU_PERMISSIONS ? 'active' : '' ?>">
                    <a href="<?= Url::to(['/admin/permission']) ?>">Permissions</a>
                    <span class="icon-thumbnail">p</span>
                </li>
                <!--Rules-->
                <li class="<?= Yii::$app->controller->SUB_SUB_MENU == SettingsModuleConstants::SUB_SUB_MENU_ROUTES ? 'active' : '' ?>">
                    <a href="<?= Url::to(['/admin/route']) ?>">Routes</a>
                    <span class="icon-thumbnail">r</span>
                </li>
                <li class="<?= Yii::$app->controller->SUB_SUB_MENU == SettingsModuleConstants::SUB_SUB_MENU_MENU ? 'active' : '' ?>">
                    <a href="<?= Url::to(['/admin/menu']) ?>">Menu</a>
                    <span class="icon-thumbnail">m</span>
                </li>
                <li class="<?= Yii::$app->controller->SUB_SUB_MENU == SettingsModuleConstants::SUB_SUB_MENU_USERS ? 'active' : '' ?>">
                    <a href="<?= Url::to(['/admin/user']) ?>">Users</a>
                    <span class="icon-thumbnail">u</span>
                </li>
            </ul>
        </li>
    </ul>
</li>

