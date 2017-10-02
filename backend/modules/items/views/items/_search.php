<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'itm_id') ?>

    <?= $form->field($model, 'itm_cat_id') ?>

    <?= $form->field($model, 'itm_sub_cat_id') ?>

    <?= $form->field($model, 'itm_name') ?>

    <?= $form->field($model, 'itm_desc') ?>

    <?php // echo $form->field($model, 'itm_reviews') ?>

    <?php // echo $form->field($model, 'itm_status') ?>

    <?php // echo $form->field($model, 'itm_status_date') ?>

    <?php // echo $form->field($model, 'itm_man_id') ?>

    <?php // echo $form->field($model, 'itm_price') ?>

    <?php // echo $form->field($model, 'itm_usage') ?>

    <?php // echo $form->field($model, 'itm_model') ?>

    <?php // echo $form->field($model, 'itm_serial') ?>

    <?php // echo $form->field($model, 'itm_uom') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'itm_active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
