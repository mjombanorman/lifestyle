<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use backend\assets\DefaultAsset;
use backend\assets\UpAsset;
use common\models\User;

UpAsset::register($this);
DefaultAsset::register($this);

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
        <?= Html::csrfMetaTags() ?>
        <title><?= 'healthylifestyle || ' . Html::encode($this->title) ?></title>
        <script type="text/javascript">
            //<![CDATA[
            var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-56895490-1']); _gaq.push(['_trackPageview']); (function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); })(); //]]>
        </script>
        <script type="text/javascript">
            //<![CDATA[
            try{if (!window.CloudFlare) {var CloudFlare = [{verbose:0, p:0, byc:0, owlid:"cf", bag2:1, mirage2:0, oracle:0, paths:{cloudflare:"/cdn-cgi/nexp/dok3v=1613a3a185/"}, atok:"ff45b23316720f61c4d3b39fbde0d331", petok:"fe56b369de3c3e84070667767b24d117fa511157-1497792701-1800", zone:"revox.io", rocket:"0", apps:{"ga_key":{"ua":"UA-56895490-1", "ga_bs":"1"}}}]; !function(a, b){a = document.createElement("script"), b = document.getElementsByTagName("script")[0], a.async = !0, a.src = "/lifestyle/backend/web/ajax.cloudflare.com/cdn-cgi/nexp/dok3v%3d85b614c0f6/cloudflare.min.js", b.parentNode.insertBefore(a, b)}()}} catch (e){};
//]]>
        </script>
        <?php $this->head() ?>
        <link rel="shortcut icon" href="<?= Yii::getAlias('@web') . '/images/icons/favicon.png' ?>" type="image/x-icon" />
    </head>
    <body class="">
        <?php $this->beginBody() ?>

        <!-- Render Header -->
        <?= $this->render('header'); ?>
        <div class="page-container row-fluid">

            <!-- Render Sidebar -->
            <?= $this->render('sidebar'); ?>

            <div class="page-content">
                <div id="portlet-config" class="modal hide">
                    <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button"></button>
                        <h3>Widget Settings</h3>
                    </div>
                    <div class="modal-body"> Widget settings form goes here </div>
                </div>
                <div class="clearfix"></div>
                <div class="content">
                    <div class="" style="display:inline">
                        <div class="pull-right">
                            <ul class="breadcrumb">
                                <li>
                                    <p><?= strtoupper(Yii::$app->controller->module->id) ?></p>
                                </li>
                                <li><a href="#" class="active">Dashboard</a>
                                </li>
                            </ul>
                        </div>
                        <div class="page-title"> <a href="<?= Yii::$app->request->referrer ?>"><i class="icon-custom-left"></i></a>
                            <h3><?= ucfirst(Yii::$app->controller->module->id) ?> - <span class="semi-bold"><?= ucfirst($this->title) ?></span></h3>
                        </div>
                    </div>
                    <!--Start Page content-->
                    <?= $content ?>
                    <!--End Page content-->

                </div>
            </div>
            <div  class="footer copy-section">
                <div class="pull-right">
                    <p style="padding:10px 5px">&copy; 2017 MIMI E-commerce. All rights reserved | Powered By Wale Wabaya</a></p>
                </div>
            </div>
        </div>

        <?php $this->endBody() ?>
    </body>
    <?php $this->endPage() ?>

</html>



