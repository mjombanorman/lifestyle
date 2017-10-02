


<div class="footer-top footer-top-2 text-center ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="footer-logo">
                    <img src="<?= Yii::$app->urlManager->baseUrl ?>/frontend/web/img/logo/logo.png" alt="">
                </div>
                <ul class="footer-menu-2">
                    <li><a href="<?= yii\helpers\Url::to(['index']) ?>">Home</a></li>
                    <li><a href="<?= yii\helpers\Url::to(['shop']) ?>">Products</a></li>
                    <li><a href="<?= yii\helpers\Url::to(['blog']) ?>">Blog</a></li>
                    <li><a href="<?= yii\helpers\Url::to(['shop']) ?>">Shop</a></li>
                    <li><a href="<?= yii\helpers\Url::to(['about']) ?>">About us</a></li>
                    <li><a href="<?= yii\helpers\Url::to(['contact']) ?>">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="footer-bottom footer-bottom-2 text-center gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-5">
                <div class="copyright-text copyright-text-2">
                    <p>&copy; <a href="~" target="_blank">healthylifestyle</a> <?= date('Y') ?>. All Rights Reserved.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <ul class="footer-social footer-social-2">
                    <li>
                        <a class="facebook" href="" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                    </li>
                    <li>
                        <a class="google-plus" href="" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a>
                    </li>
                    <li>
                        <a class="twitter" href="" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                    </li>
                    <li>
                        <a class="rss" href="" title="RSS"><i class="zmdi zmdi-rss"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-3">
                <ul class="footer-payment">
                    <li>
                        <a href="#"><img src="<?= Yii::$app->urlManager->baseUrl ?>/frontend/web/img/payment/mpesa.png" alt=""></a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>