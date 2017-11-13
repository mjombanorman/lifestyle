<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use backend\modules\users\models\Towns;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="login-section mb-40">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-md-push-3">
                <div class="new-customers">
                    <!--<form action="#">-->
                    <?php
                    $form = ActiveForm::begin([
                                //'enableAjaxValidation' => false,
                                'options' => [
                                    'id' => 'form-signup',
                                    'enctype' => 'multipart/form-data',
                                    'validateOnBlur' => false,
                                    'validateOnType' => false,
                                    'validateOnChange' => false,
                                ]
                    ]);
                    ?>
                    <h6 class="widget-title border-left mb-25">NEW CUSTOMERS</h6>

                    <div class="login-account p-30 box-shadow">
                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Username'])->label('Username') ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => 'Email'])->label('email') ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label('Password') ?>
                            </div>
                        </div>

                        <?php //echo $form->field($model, 'password_confirm')->passwordInput(['placeholder' => 'Confirm Password'])->label(false) ?>

                        <p><a href="<?= Yii::$app->urlManager->createUrl(['/user/login']) ?>">Already have an account? Log In</a></p>
                    </div>

                    <!--                        <div class="checkbox">
                                                <label class="mr-10">
                                                    <small>
                    <?php //echo $form->field($model, 'newsletter')->checkbox(['unchecked' => 0, 'checked' => 1, 'label' => 'Receive Newsletters about our products and promos']) ?>
                                                    </small>
                                                </label>

                                            </div>-->
                    <div class="row">
                        <div class="col-md-6">
                            <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" >Sign Up</button>
                        </div>
                        <div class="col-md-6">
                            <button class="submit-btn-1 mt-20 btn-hover-1 f-right" type="reset">Clear</button>
                        </div>
                    </div>
                </div>
                <!--</form>-->

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>
<!--</div>-->
