<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = ' Login';
?>


<?php /*
  $form = ActiveForm::begin(['options' => ['class' => 'form-signin'], 'fieldConfig' => [
  'options' => [
  'enableajaxValidation' => true,
  'tag' => false,
  ],
  ],]);
  ?>
  <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control', 'placeholder' => 'Username'])->label(false) ?>

  <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Password'])->label(false) ?>



  <?php ActiveForm::end(); */ ?>









<div class="row login-container animated fadeInUp">
    <div class="col-md-7 col-md-offset-2 tiles white no-padding">
        <div class="p-t-30 p-l-40 p-b-20 xs-p-t-10 xs-p-l-10 xs-p-b-10">
            <h2 class="normal">
                Sign in to hl.
            </h2>
            <p>
                Please enter your credentials.<br>
            </p>
        </div>
        <div class="tiles grey p-t-20 p-b-20 no-margin text-black tab-content">
            <div role="tabpanel" class="tab-pane active" id="tab_login">
                <!--<form class="animated fadeIn validate" id="" name="">-->
                <?php
                $form = ActiveForm::begin(['options' => ['class' => 'animated fadeIn vslidate', 'enctype' => 'multipart/form-data',], 'fieldConfig' => [
                                'options' => [
                                    'enableajaxValidation' => true,
                                    'tag' => false,
                                ],
                            ],]);
                ?>
                <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                    <div class="col-md-5 col-sm-5">
                        <!--<input class="form-control" id="login_username" name="login_username" placeholder="Username" type="email" required>-->
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control', 'placeholder' => 'Username'])->label(false) ?>
                    </div>
                    <div class="col-md-5 col-sm-5">
                       <!-- <input class="form-control" id="login_pass" name="login_pass" placeholder="Password" type="password" required>-->
                        <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Password'])->label(false) ?>
                    </div>
                    <div class="col-md-1 col-sm-1">
                        <input type="submit" class="btn btn-primary" value="Sign In!" >
                    </div>
                </div>
                <div class="row p-t-10 m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                    <div class="control-group col-md-10">
                        <div class="checkbox checkbox check-success">
                            <a href="#">Trouble login in?</a>&nbsp;&nbsp; <input id="checkbox1" type="checkbox" value="1"> <label for="checkbox1">Keep me reminded</label>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
                <!--</form>-->
            </div>

        </div>
    </div>
</div>