<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Forgot Password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-section mb-40">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-md-push-3">
                <div class="site-request-password-reset">
                    <h6 class="widget-title border-left mb-25"> FORGOT PASSWORD</h6>

                    <div class="login-account p-30 box-shadow">

                        <p>Please fill out your email. A link to reset password will be sent there.</p>

                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                $form = ActiveForm::begin([
                                            'id' => 'request-password-reset-form',
                                            'validateOnBlur' => false,
                                            'validateOnType' => false,
                                            'validateOnChange' => false,
                                ]);
                                ?>

                                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>


                                <div class="form-group">
                                    <?= Html::submitButton('Send', ['class' => 'submit-btn-1 mt-20 btn-hover-1']) ?>
                                </div>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
