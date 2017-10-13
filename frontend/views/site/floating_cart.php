
<?php $count = 0; ?>
<?php $session = Yii::$app->session ?>
<div class="total-cart-in">
    <div class="cart-toggler">
        <a href="#">
            <span class="cart-quantity" id="count_no"><?= count($list); ?></span><br>
            <span class="cart-icon">
                <i class="zmdi zmdi-shopping-cart-plus"></i>
            </span>
        </a>
    </div>
    <ul>
        <li>
            <div class="top-cart-inner your-cart">
                <h5 class="text-capitalize"><a href = "<?= Yii::$app->urlManager->createUrl(['site/viewcart']) ?>">View Cart</a></h5>
            </div>
        </li>
        <li>
            <div class="total-cart-pro" >



                <?php foreach ($list as $detail) { ?>

                    <?php
                    if ($session->has('quantity')) {
                        $prod_quantity = isset($_SESSION['quantity'][$detail->id]) ? $_SESSION['quantity'][$detail->id] : 1;
                    } else {
                        $prod_quantity = 1;
                    }
                    ?>

                    <?php
                    $prod_total = $prod_quantity * $detail->price;
                    $count = $count + $prod_total;
                    ?>

                    <!-- single-cart -->
                    <div class="single-cart clearfix">
                        <div class="cart-img f-left">
                            <a href="#">
                                <img style="height:111px; width:100px;" src="<?= Yii::$app->urlManager->baseUrl ?>/admin/<?= $detail->prod_img ?>" alt="Cart Product" />
                            </a>
                            <div class="del-icon">
                                <a class="uncart" data-id = "<?= $detail->id ?>"  href="#">
                                    <i class="zmdi zmdi-close" ></i>
                                </a>
                            </div>
                        </div>
                        <div class="cart-info f-left">
                            <h6 class="text-capitalize">
                                <a href="#"><?= $detail->name ?></a>
                            </h6>
                            <p>
                                <?= $detail->category->name; ?>
                            </p>
                            <p>
                                Price &nbsp<strong>:</strong>&nbsp<?= 'Ksh ' . $detail->price ?>
                            </p>
                            <p>
                                Quantity &nbsp<strong>:</strong> &nbsp<?= $prod_quantity ?>
                            </p>
                            <p>
                                SubTotal &nbsp<strong>:</strong> &nbsp<?= 'Ksh ' . sprintf("%.2f", $prod_total) ?>
                            </p>
                        </div>
                    </div>
                    <!--End of Single Cart-->
                <?php } ?>


            </div>
        </li>
        <li>
            <div class="top-cart-inner subtotal">
                <h4 class="text-uppercase g-font-2">
                    Total  =
                    <span id="count_total"><?= 'Ksh ' . sprintf("%.2f", $count) ?></span>
                </h4>
            </div>
        </li>
        <!--  <li>
              <div class="top-cart-inner view-cart">
                  <h4 class="text-uppercase">
                      <a href="<?= Yii::$app->urlManager->createUrl(['site/viewcart']) ?>">View cart</a>
                  </h4>
              </div>
          </li>-->
        <li>
            <div class="top-cart-inner check-out">
                <h4 class="text-uppercase">
                    <a href="#">Check out</a>
                </h4>
            </div>
        </li>
    </ul>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.uncart').click(function (event) {
            event.preventDefault();

            $.ajax(
                    {
                        url: '<?= Yii::$app->urlManager->baseUrl ?>/uncart',
                        dataType: 'json',
                        method: 'GET',
                        data: {id: $(this).attr('data-id')},
                        success: function (data, textStatus, jqXHR) {
                            $('#load_cart').load("<?= Yii::$app->urlManager->baseUrl ?>/floatingcart");
                            $('#table_cart').load("<?= Yii::$app->urlManager->baseUrl ?>/tablecart");
                            $('.cart-icon').trigger('mouseenter');
                        },
                        beforeSend: function (xhr) {

                        },
                        error: function (jqXHR, textStatus, errorThrown) {

                        }
                    });
        }
        );
    });
</script>



