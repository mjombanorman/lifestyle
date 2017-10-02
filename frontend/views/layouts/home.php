<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\DefaultAsset;
use frontend\assets\UpAsset;
use common\widgets\Alert;

DefaultAsset::register($this);
UpAsset::register($this);
$this->title = "Healthy Lifestyle";
?>
<?php $this->beginPage() ?>
<!Doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

    <html lang="<?= Yii::$app->language ?>">
        <head>
            <meta charset="<?= Yii::$app->charset ?>">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <?= Html::csrfMetaTags() ?>
            <title><?= Html::encode($this->title) ?></title>
            <?php $this->head() ?>
            <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
            <link rel="shortcut icon" href="<?= Yii::$app->urlManager->baseUrl ?>/frontend/web/img/icon/favicon.png" type="image/x-icon" />
        </head>
        <body>
            <?php $this->beginBody() ?>
            <!-- Body main wrapper start -->
            <div class="wrapper">

                <?= $this->render("header"); ?>
                <br>
                <?= $this->render("slider"); ?>

                <!-- START PAGE CONTENT -->
                <section id="page-content" class="page-wrapper">

                    <?= $content ?>

                </section>
                <!-- END PAGE CONTENT -->

                <!-- START FOOTER AREA -->
                <?= $this->render('footer') ?>
                <!-- END FOOTER AREA -->
                <?= $this->render('modal_view') ?>
            </div>
            <!-- Body main wrapper end -->

            <?php $this->endBody() ?>
        </body>
    </html>
    <?php $this->endPage() ?>








