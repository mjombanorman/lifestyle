<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="login-section mb-40">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-push-3">
                <div class="registered-customers">

                    <h6 class="widget-title border-left mb-25">REGISTERED CUSTOMERS</h6>
                    <!--<form action="#">-->
                    <?php
                    $form = ActiveForm::begin([
                                'id' => 'login-form',
                                'validateOnBlur' => false,
                                'validateOnType' => false,
                                'validateOnChange' => false,
                    ]);
                    ?>
                    <div class="login-account p-30 box-shadow">
                        <p>Log in to healthylifestyle:</p>
                        <!--<input name="name" placeholder="Email Address" type="text">-->
                        <?= $form->field($model, 'login')->textInput(['placeholder' => 'Email Address', 'autofocus' => true])->label(false) ?>
                        <!--<input name="password" placeholder="Password" type="password">-->
                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                        <p><small><a href="<?= Yii::$app->urlManager->createUrl(['/user/recovery/request']); ?>">Forgot your password?</a></small></p>
                        <p><small>Don't have an acccount, <a href="<?= Yii::$app->urlManager->createUrl(['/user/register']) ?>">Sign Up</a></small></p>
                        <button name="login-button" class="submit-btn-1 btn-hover-1" type="submit">login</button>
                    </div>
                    <!--</form>-->
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>