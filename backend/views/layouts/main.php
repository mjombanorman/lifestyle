<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use backend\assets\DefaultAsset;
use backend\assets\UpAsset;
use common\models\User;
use common\widgets\Alert;
use backend\assets\BootAsset;

UpAsset::register($this);
DefaultAsset::register($this);
BootAsset::register($this);

$user = Yii::$app->user->identity;
?>
<?php $this->beginPage() ?>
<!Doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->


<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <script src="<?= Yii::$app->urlManager->baseUrl ?>/themes/p_theme/cdn-cgi/apps/head/vAzQ3pO_LVF9Y_-CSxLP87NslSA.js"></script>
        <?= Html::csrfMetaTags() ?>
        <title><?= 'healthylifestyle || ' . Html::encode($this->title) ?></title>

        <?php $this->head() ?>
        <link rel="shortcut icon" href="<?= Yii::getAlias('@web') . '/images/icons/favicon.png' ?>" type="image/x-icon" />
    </head>
    <body class="fixed-header ">
        <?php $this->beginBody() ?>

        <!-- Render Sidebar -->
        <?= $this->render('sidebar'); ?>
        <div class="page-container ">

            <!-- Render Header -->
            <?= $this->render('header'); ?>

            <div class="page-content-wrapper ">

                <div class="content ">

                    <div class="jumbotron" data-pages="parallax">
                        <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
                            <div class="inner">

                                <!--<ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                    <li class="breadcrumb-item active">Blank template</li>
                                </ol>-->
                                <?php
                                echo
                                Breadcrumbs::widget([
                                    'homeLink' => [
                                        'label' => '<i class="fa fa-dashboard"></i> ' . Html::encode(Yii::t('yii', 'Home')),
                                        'url' => Yii::$app->homeUrl,
                                        'encode' => false,
                                    ],
                                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                ]);
                                ?>



                            </div>
                        </div>
                    </div>

                    <div class=" container-fluid   container-fixed-lg">
                        <?php echo Alert::widget() ?>
                        <!--Start Page content-->
                        <?= $content ?>
                        <!--End Page content-->
                    </div>

                </div>

                <div class=" container-fluid  container-fixed-lg footer">
                    <div class="copyright sm-text-center">
                        <p class="small no-margin pull-left sm-pull-reset">
                            <span class="hint-text">Copyright &copy; <?= date('Y') ?> </span>
                            <span class="font-montserrat">1221 Devplus Inc.</span>.
                            <span class="hint-text">All rights reserved. </span>
                            <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> <span class="muted">|</span> <a href="#" class="m-l-10">Privacy Policy</a></span>
                        </p>
                        <p class="small no-margin pull-right sm-pull-reset">
                            Coffee <span class="hint-text">&amp; code</span>
                        </p>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>

        </div>
        <!--Render QuickView Right Sidebar-->
        <?php // $this->render('quick_view') ?>

        <!--Render Search-->
        <?= $this->render('search') ?>

        <!--Important Scripts-->
        <script>
            window.intercomSettings = {
                app_id: "xt5z6ibr"
            };
        </script>
        <script>
            (function () {
                var w = window;
                var ic = w.Intercom;
                if (typeof ic === "function") {
                    ic('reattach_activator');
                    ic('update', intercomSettings);
                } else {
                    var d = document;
                    var i = function () {
                        i.c(arguments)
                    };
                    i.q = [];
                    i.c = function (args) {
                        i.q.push(args)
                    };
                    w.Intercom = i;

                    function l() {
                        var s = d.createElement('script');
                        s.type = 'text/javascript';
                        s.async = true;
                        s.src = 'https://widget.intercom.io/widget/xt5z6ibr';
                        var x = d.getElementsByTagName('script')[0];
                        x.parentNode.insertBefore(s, x);
                    }
                    if (w.attachEvent) {
                        w.attachEvent('onload', l);
                    } else {
                        w.addEventListener('load', l, false);
                    }
                }
            })()
        </script>

        <?php $this->endBody() ?>
    </body>
    <?php $this->endPage() ?>

</html>



