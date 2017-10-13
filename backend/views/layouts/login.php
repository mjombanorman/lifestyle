<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use backend\assets\DefaultAsset;
use backend\assets\UpAsset;
use backend\assets\LoginAsset;

DefaultAsset::register($this);
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

        <?php $this->head() ?>
        <script type="text/javascript">
            window.onload = function ()
            {
                // fix for windows 8
                if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                    document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
            }
        </script>

        <link rel="shortcut icon" href="images/icons/favicon.png" type="image/x-icon" />
    </head>
    <body class="fixed-header ">
        <?php $this->beginBody() ?>

        <?= $content; ?>

        <?php $this->endBody() ?>
        <script>
            $(function ()
            {
                $('#form-login').validate()
            })
        </script>
    </body>
</body>
<?php $this->endPage() ?>

</html>



