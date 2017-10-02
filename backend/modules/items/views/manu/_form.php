<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemManu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-manu-form">

    <?php
    $form = ActiveForm::begin([
                //'enableAjaxValidation' => true,
                'options' => [
                    'id' => 'add-shop',
                    'enctype' => 'multipart/form-data',
                ]
    ]);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?=
    FileInput::widget([
        'model' => $model,
        'attribute' => 'logo',
        'pluginOptions' => [
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'browseClass' => 'form-control btn btn-primary btn-block',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' => 'Select Logo'
        ],
        'options' => ['accept' => 'image/*']
    ]);
    ?>
    <br>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Add New' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
