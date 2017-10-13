<?php

use mdm\admin\components\MenuHelper;
use mdm\admin\components\Helper;
use yii\helpers\Url;

$user = Yii::$app->user->identity;
$url = Yii::$app->urlManager;
?>
<?php
//var_dump(json_encode($items));
//die();
?>







<nav class="page-sidebar" data-pages="sidebar">

    <div class="sidebar-overlay-slide from-top" id="appMenu">
        <div class="row">
            <div class="col-xs-6 no-padding">
                <a href="#" class="p-l-40"><img src="themes/p_theme/assets/img/demo/social_app.svg" alt="socail">
                </a>
            </div>
            <div class="col-xs-6 no-padding">
                <a href="#" class="p-l-10"><img src="themes/p_theme/assets/img/demo/email_app.svg" alt="socail">
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 m-t-20 no-padding">
                <a href="#" class="p-l-40"><img src="themes/p_theme/assets/img/demo/calendar_app.svg" alt="socail">
                </a>
            </div>
            <div class="col-xs-6 m-t-20 no-padding">
                <a href="#" class="p-l-10"><img src="themes/p_theme/assets/img/demo/add_more.svg" alt="socail">
                </a>
            </div>
        </div>
    </div>

    <div class="sidebar-header">
        <img src="<?= Yii::$app->urlManager->baseUrl ?>/themes/p_theme/assets/img/logo_white.png" alt="logo" class="brand" data-src="<?= Yii::$app->urlManager->baseUrl ?>/themes/p_theme/assets/img/logo_white.png" data-src-retina="<?= Yii::$app->urlManager->baseUrl ?>/themes/p_theme/assets/img/logo_white.png" width="78" height="22">
        <div class="sidebar-header-controls">
            <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20 hidden-md-down" data-pages-toggle="#appMenu"><i class="fa fa-angle-down fs-16"></i>
            </button>
            <button type="button" class="btn btn-link hidden-md-down" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
            </button>
        </div>
    </div>

    <div class="sidebar-menu">

        <ul class="menu-items">
            <?php echo $this->render('_menus/_dashboard'); ?>

            <?php echo $this->render('@app/modules/products/views/layouts/_menu'); ?>

            <?php echo $this->render('_menus/_orders'); ?>

            <?php echo $this->render('@app/modules/blog/views/layouts/_menu'); ?>

            <?php echo $this->render('@app/modules/users/views/layouts/_menu'); ?>

            <?php echo $this->render('@app/modules/settings/views/layouts/_menu'); ?>

        </ul>
        <div class="clearfix"></div>
    </div>

</nav>