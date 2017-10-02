<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\items\models\ItemMainCategory;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemSubCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-sub-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'itm_main_cat_id')->dropDownList(ArrayHelper::map(ItemMainCategory::find()->all(), 'ict_id', 'ict_name'), ['class' => 'form-control', 'prompt' => 'Select Category']) ?>

    <?= $form->field($model, 'itp_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'itp_description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Add New' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
