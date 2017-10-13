<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
use backend\modules\users\models\ProfileImages;

//\backend\assets\BootAsset::register($this);
/* @var $this yii\web\View */
/* @var $model backend\modules\users\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$form = ActiveForm::begin([
            //'enableAjaxValidation' => true,
            'options' => [
                'id' => 'add-product',
                'enctype' => 'multipart/form-data',
            ]
        ]);
?>
<div class="row">
    <div class="col-xl-7 col-lg-6 ">

        <div class="card card-transparent">
            <div class="card-block">
                <h3><?= $title ?></h3>
                <!--<form id="form-personal" role="form" autocomplete="off">-->

                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group form-group-default required">
                            <label>First name</label>
                            <!--<input type="text" class="form-control" name="firstName" required>-->
                            <?= Html::activeTextInput($model, 'first_name', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-default required">
                            <label>Last name</label>
                            <!--<input type="text" class="form-control" name="lastName" required>-->
                            <?= Html::activeTextInput($model, 'last_name', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default input-group required">
                            <div class="form-input-group">
                                <label>Username(Email)</label>
                                <!--<input type="text" class="form-control" name="username" placeholder="You" required>-->
                                <?= Html::activeTextInput($model, 'email', ['class' => 'form-control', 'placeholder' => 'Enter Users Email']) ?>
                            </div>
                            <div class="input-group-addon d-flex ">
                                @
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default required" >
                            <label>Password</label>
                           <!-- <input type="password" class="form-control" name="password" placeholder="Minimum of 4 characters." required>-->
                            <?= Html::activePasswordInput($model, 'password', ['class' => 'form-control', 'placeholder' => 'Minimum of 6 characters.']) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default required" >
                            <label>Password Confirm</label>
                           <!-- <input type="password" class="form-control" name="password" placeholder="Minimum of 4 characters." required>-->
                            <?= Html::activePasswordInput($model, 'password_confirm', ['class' => 'form-control', 'placeholder' => 'Minimum of 6 characters.']) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?= Html::activeDropDownList($model, 'role', ['admin' => 'Admin', 'customer' => 'Customer'], ['class' => 'form-control', 'prompt' => 'Select User Role']) ?>
                        </div>
                    </div>
                </div>

                <p class="pull-left">
                    I agree to the <a href="#">Pages Terms</a> and <a href="#">Privacy</a>.
                </p>
                <p class="pull-right">
                    <a href="#">Help? Contact Support</a>
                </p>
                <div class="clearfix"></div>
                <!-- <button class="btn btn-primary" type="submit"></button>-->
                <?= Html::submitButton('Create a new account', ['class' => 'btn btn-primary']) ?>
                <!--</form>-->

            </div>
        </div>

    </div>
    <div class="col-xl-5 col-lg-6">

        <div class="card card-transparent">

            <div class="card-block">
                <h3>Profile Picture:</h3>
                <div class="col-lg-6">
                    <div class="row">

                        <?php
                        echo $form->field($img_model, 'profile_img', ['showLabels' => false])->widget(FileInput::classname(), [
                            'pluginOptions' => [
                                'allowedFileTypes' => ['image'],
                                'previewSettings' => [
                                    'image' => [
                                        'options' => [
                                            'width' => '150px',
                                            'height' => '150px',
                                        ]
                                    ]
                                ],
                                'initialPreview' => [
                                    Html::img(ProfileImages::getProfileImage(1), [
                                        'class' => 'img-responsive file-preview-image',
                                        'options' => [
                                            'height' => '150px',
                                            'width' => '150px',
                                        ]
                                    ]),
                                ],
                                //   'overwriteInitial' => false,
                                'showRemove' => false,
                                'showUpload' => false,
                                'showPreview' => true,
                                'showCaption' => false,
                                'elCaptionText' => '#customCaptionProfpic',
                                'browseClass' => 'btn btn-sm btn-default btn-block',
                                'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                                'browseLabel' => 'Select Profile Image',
                                'fileActionSettings' => [
                                    'showUpload' => true,
                                    'showRemove' => false,
                                ],
                            ]
                        ]);
                        ?>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<?php ActiveForm::end(); ?>
