<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemMainCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-main-category-form">

    <?php
    $form = ActiveForm::begin([
                //'enableAjaxValidation' => true,
                'options' => [
                    'id' => 'add-shop',
                    'enctype' => 'multipart/form-data',
                ]
    ]);
    ?>

    <?= $form->field($model, 'ict_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ict_desc')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Add New' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
