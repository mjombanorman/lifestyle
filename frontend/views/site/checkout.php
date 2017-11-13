<?php

use yii\helpers\Url;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\settings\models\SettingsPaymentMethods;

$session = Yii::$app->session;
$count = null;
?>
<!-- SHOP SECTION START -->
<div class="shop-section mb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <ul class="cart-tab">
                    <li>
                        <a class="active" href="<?= Yii::$app->urlManager->createUrl(['site/viewcart']) ?>">
                            <span>01</span>
                            Shopping cart
                        </a>
                    </li>
                    <li>
                        <a class="active" href="<?= Yii::$app->urlManager->createUrl(['site/check-out']) ?>" data-toggle="tab">
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
                        <a href="#" data-toggle="tab">
                            <span>04</span>
                            Order Completion
                        </a>
                    </li>
                </ul>
            </div>
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
            <?php } ?>
            <div class="col-md-10">
                <!-- Tab panes -->
                <div class="tab-content">

                    <!-- checkout start -->
                    <div class="tab-pane active" id="checkout">
                        <div class="checkout-content box-shadow p-30">
                            <!--                            <form action="#">-->
                            <?php
                            $form = ActiveForm::begin([
                                        'id' => 'login-form',
                                        'enableClientValidation' => true,
                                        'validateOnBlur' => false,
                                        'validateOnType' => true,
                                        'validateOnChange' => true,
                            ]);
                            ?>
                            <div class="row">
                                <!-- billing details -->
                                <div class="col-md-6">
                                    <div class="billing-details pr-10">
                                        <h6 class="widget-title border-left mb-20">Address & Profile Details</h6>

                                        <?= $form->field($profile, 'name')->textInput(['placeholder' => 'Your Name Here',])->label(false) ?>
                                        <?= $form->field($profile, 'public_email')->textInput(['placeholder' => 'Email Address Here'])->label(false) ?>
                                        <?= $form->field($profile, 'phone')->textInput(['placeholder' => 'Phone Here'])->label(false) ?>
                                        <?= $form->field($profile, 'country')->dropDownList(['KE' => 'Kenya'], ['class' => 'custom-select'])->label(false) ?>
                                        <?= $form->field($profile, 'town')->textInput(['placeholder' => 'Enter town/city'])->label(false) ?>
                                        <?= $form->field($profile, 'address')->textarea(['placeholder' => 'Your Address Here', 'class' => 'custom-textarea', 'rows' => 3])->label(false) ?>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- our order -->
                                    <div class="payment-details pl-10 mb-50">
                                        <h6 class="widget-title border-left mb-20">Order Details</h6>
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
                                    </div>
                                    <!-- payment-method -->
                                    <div class="payment-method">
                                        <h6 class="widget-title border-left mb-20">payment method</h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="">
                                                    <?= $form->field($profile, 'payment_method', ['template' => "<div class=\"radio\">\n{label}\n{input}\n{error}\n{hint}\n</div>"])->radioList(ArrayHelper::map(SettingsPaymentMethods::find()->where(['active' => true])->all(), 'id', 'payment_type'), ['class' => ''])->label('Select payment method') ?>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- payment-method end -->
                                        <div class="pull-right">
                                            <button class="submit-btn-1 mt-50 btn-hover-1" type="submit"> --Next-- </button>
                                        </div>
                                    </div>
                                </div>
                                <?php ActiveForm::end() ?>
                                <!--                            </form>-->
                            </div>
                        </div>
                        <!-- checkout end -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP SECTION END -->
