<?php $count = 0; ?>
<?php $session = Yii::$app->session; ?>


<form action="#">
    <div class="table-content table-responsive mb-50">
        <table class="text-center">
            <thead>
                <tr>
                    <th class="product-thumbnail">product</th>
                    <th class="product-price">price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-subtotal">total</th>
                    <th class="product-remove">remove</th>
                </tr>
            </thead>
            <tbody>
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
                    <!-- tr -->
                    <tr>
                        <td class="product-thumbnail">
                            <div class="pro-thumbnail-img">
                                <img src="<?= Yii::$app->urlManager->baseUrl ?>/admin/<?= $detail->prod_img ?>" alt="">
                            </div>
                            <div class="pro-thumbnail-info text-left">
                                <h6 class="product-title-2">
                                    <a href="#"><?= $detail->name ?></a>
                                </h6>
                                <p>Category: <?= $detail->category->name ?></p>
                               <!-- <p>Model: Grand s2</p>
                                <p> Color: Black, White</p>-->
                            </div>
                        </td>
                        <td class="product-price"><?= 'Ksh ' . $detail->price ?></td>
                        <td class="product-quantity">
                            <div class="cart-plus-minus f-left">
                                <input data-id="<?= $detail->id ?>" type="text" value="<?= $prod_quantity ?>" name="qtybutton" class="quan cart-plus-minus-box">
                            </div>
                        </td>
                        <td class="product-subtotal" id ="subtotal"><?= 'Ksh ' . sprintf("%.2f", $prod_total) ?></td>
                        <td class="product-remove">
                            <a href="#" class="uncart" data-id="<?= $detail->id ?>"><i class="zmdi zmdi-close"></i></a>
                        </td>
                    </tr>
                    <!-- tr -->
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="payment-details box-shadow p-30 mb-50">
                <h6 class="widget-title border-left mb-20">payment details</h6>
                <table>
                    <tr>
                        <td class="td-title-1">Cart Subtotal</td>
                        <td class="td-title-2"><?= 'Ksh ' . sprintf("%.2f", $count) ?></td>
                    </tr>
                    <tr>
                        <td class="td-title-1">Shipping and Delivery</td>
                        <td class="td-title-2">Ksh 0.00</td>
                    </tr>
                    <tr>
                        <td class="td-title-1">Vat</td>
                        <td class="td-title-2">Included</td>
                    </tr>
                    <tr>
                        <td class="order-total">Order Total</td>
                        <td class="order-total-price"><?= 'Ksh ' . sprintf("%.2f", $count) ?></td>
                    </tr>
                </table>
                <br>
                <a href ="<?= Yii::$app->urlManager->createUrl(['site/check-out']) ?>" class="btn submit-btn-1 black-bg btn-hover-2" >--Next--</a>
            </div>
        </div>


    </div>

</form>
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
                            $('#table_cart').load("<?= Yii::$app->urlManager->baseUrl ?>/tablecart");
                            $('#load_cart').load("<?= Yii::$app->urlManager->baseUrl ?>/floatingcart");
                        },
                        beforeSend: function (xhr) {

                        },
                        error: function (jqXHR, textStatus, errorThrown) {

                        }
                    });
        }
        );

        $('.quan').on("input", function (e) {
            $.ajax(
                    {
                        url: '<?= Yii::$app->urlManager->baseUrl ?>/quantity',
                        datatype: 'json',
                        method: 'GET',
                        data: {id: $(this).attr('data-id'), quantity: $(e.target).val()},
                        success: function (data, textStatus, jqXHR) {
                            $('#table_cart').load("<?= Yii::$app->urlManager->baseUrl ?>/tablecart");
                        },
                        beforeSend: function (xhr) {

                        },
                        error: function (jqXHR, textStatus, errorThrown) {

                        }
                    });
        });

    });
</script>