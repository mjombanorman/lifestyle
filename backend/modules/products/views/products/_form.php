<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use backend\modules\products\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\modules\products\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="products-form">

    <?php
    $form = ActiveForm::begin([
                //'enableAjaxValidation' => true,
                'options' => [
                    'id' => 'add-product',
                    'enctype' => 'multipart/form-data',
                ]
    ]);
    ?>

    <?php // $form->field($model, 'category_id')->textInput() ?>
    <?php
    echo $form->field($model, 'category_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Category::find()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Select Category ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6, 'id' => 'mytextarea']) ?>

    <?= $form->field($model, 'price')->textInput() ?>


    <?php // $form->field($model, 'prod_img')->textInput(['maxlength' => true])  ?>


    <?=
    FileInput::widget([
        'model' => $model,
        'attribute' => 'prod_img',
        'pluginOptions' => [
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'browseClass' => 'form-control btn btn-primary btn-block',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' => 'Select Image'
        ],
        'options' => ['accept' => 'image/*']
    ]);
    ?>
    <br>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Add Product' : 'Update Product', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    $(document).ready(function () {
        $('#mytextarea').wysihtml5();
    });
</script>
