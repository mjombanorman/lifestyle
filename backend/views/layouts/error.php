<?php
/* @var $this \yii\web\View */
/* @var $content string */
$this->context->layout = 'error';

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use backend\assets\DefaultAsset;
use backend\assets\UpAsset;
use common\models\User;
use common\widgets\Alert;

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
        <script src="<?= Yii::$app->urlManager->baseUrl ?>/themes/p_theme/cdn-cgi/apps/head/vAzQ3pO_LVF9Y_-CSxLP87NslSA.js"></script>
        <?= Html::csrfMetaTags() ?>
        <title><?= 'healthylifestyle || ' . Html::encode($this->title) ?></title>

        <?php $this->head() ?>
        <link rel="shortcut icon" href="<?= Yii::getAlias('@web') . '/images/icons/favicon.png' ?>" type="image/x-icon" />
        <script type="text/javascript">
            window.onload = function () {
                // fix for windows 8
                if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                    document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
            }
        </script>
    </head>
    <body class="fixed-header ">
        <?php $this->beginBody() ?>



        <?= $content ?>



        <?php $this->endBody() ?>
    </body>
    <?php $this->endPage() ?>

</html>



