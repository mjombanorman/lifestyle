<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\items\models\ItemManu;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemModels */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">

    <?php
    $form = ActiveForm::begin([
                //'enableAjaxValidation' => true,
                'options' => [
                    'id' => 'add-shop',
                    'enctype' => 'multipart/form-data',
                ],
    ]);
    ?>

    <?php // $form->field($model, 'man_id')->textInput()   ?>


    <div class="form-group">
        <div class="col-lg-10">
            <?php
            echo $form->field($model, 'man_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(ItemManu::find()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Select make ...'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);
            ?>
        </div>
        <div class="col-lg-2">

            <button class="btn btn-primary" style="margin-top: 25px;"><i class="glyphicon glyphicon-plus"></i> </button>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-10">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-10">
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-10">

            <?= Html::submitButton($model->isNewRecord ? 'Add New' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
