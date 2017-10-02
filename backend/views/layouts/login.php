<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use backend\assets\DefaultAsset;
use backend\assets\UpAsset;
use backend\assets\LoginAsset;

LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!Doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->


<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <?= Html::csrfMetaTags() ?>
        <title><?= 'healthylifestyle ||' . $this->title; ?></title>
        <script type="text/javascript">
            //<![CDATA[
            var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-56895490-1']); _gaq.push(['_trackPageview']); (function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); })(); //]]>
        </script><script type="text/javascript">
            //<![CDATA[
            try{if (!window.CloudFlare) {var CloudFlare = [{verbose:0, p:0, byc:0, owlid:"cf", bag2:1, mirage2:0, oracle:0, paths:{cloudflare:"/cdn-cgi/nexp/dok3v=1613a3a185/"}, atok:"ff45b23316720f61c4d3b39fbde0d331", petok:"ee80b5acdf89669360750446e8de5b45eeb519e3-1497792702-1800", zone:"revox.io", rocket:"0", apps:{"ga_key":{"ua":"UA-56895490-1", "ga_bs":"1"}}}]; !function(a, b){a = document.createElement("script"), b = document.getElementsByTagName("script")[0], a.async = !0, a.src = "../../../../ajax.cloudflare.com/cdn-cgi/nexp/dok3v%3d85b614c0f6/cloudflare.min.js", b.parentNode.insertBefore(a, b)}()}} catch (e){};
            //]]>
        </script>
        <?php $this->head() ?>

        <link rel="shortcut icon" href="images/icons/favicon.png" type="image/x-icon" />
    </head>
    <body class="error-body no-top lazy" data-original="images/carousel/pexels-photo.jpg" style="background-image: url('images/carousel/pexels-photo.jpg')">

        <?php $this->beginBody() ?>
        <div class="container">
            <?= $content; ?>
        </div>
        <?php $this->endBody() ?>
    </body>
    <?php $this->endPage() ?>

</html>



