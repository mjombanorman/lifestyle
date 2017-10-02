
<!-- SHOP SECTION START -->
<div class="shop-section mb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-12">
                <ul class="cart-tab">
                    <li>
                        <a class="active" href="<?= Yii::$app->urlManager->createUrl(['site/viewcart']) ?>" data-toggle="tab">
                            <span>01</span>
                            Shopping cart
                        </a>
                    </li>
                    <li>
                        <a href="<?= Yii::$app->urlManager->createUrl(['site/checkout']) ?>" data-toggle="tab">
                            <span>02</span>
                            Checkout
                        </a>
                    </li>
                    <li>
                        <a href="<?= Yii::$app->urlManager->createUrl(['site/payment']) ?>" data-toggle="tab">
                            <span>03</span>
                            Payment
                        </a>
                    </li>
                    <li>
                        <a href="<?= Yii::$app->urlManager->createUrl(['site/complete']) ?>" data-toggle="tab">
                            <span>04</span>
                            Order Completion
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 col-sm-12" >

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- shopping-cart start -->
                    <div class="tab-pane active" id="shopping-cart">
                        <div class="shopping-cart-content" id="table_cart">


                        </div>
                    </div>
                    <!-- shopping-cart end -->

                </div>

            </div>
        </div>
    </div>
</div>
<!-- SHOP SECTION END -->

<script type="text/javascript">
    $(document).ready(function () {
        $('#table_cart').load("<?= Yii::$app->urlManager->baseUrl ?>/tablecart");

    }
    );

</script>