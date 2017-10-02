<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\items\models\ItemMainCategory;
use backend\modules\items\models\ItemSubCategory;
use backend\modules\items\models\ItemManu;
use backend\modules\items\models\ItemModels;
use backend\modules\shop\models\Shops;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\Items */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">

    <?php
    $form = ActiveForm::begin([
                //'enableAjaxValidation' => true,
                'options' => [
                    'id' => 'add-shop',
                    'enctype' => 'multipart/form-data',
                ]
    ]);
    ?>
    <div class="form-group">
        <div class="col-lg-10">
            <?php //$form->field($model, 'itm_cat_id')->textInput() ?>
            <?php
            echo $form->field($model, 'itm_cat_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(ItemMainCategory::find()->all(), 'ict_id', 'ict_name'),
                'options' => ['placeholder' => 'Select Category ...'],
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
            <?php // $form->field($model, 'itm_sub_cat_id')->textInput() ?>
            <?php
            echo $form->field($model, 'itm_sub_cat_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(ItemSubCategory::find()->all(), 'itp_id', 'itp_name'),
                'options' => ['placeholder' => 'Select SubCategory ...'],
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
            <?= $form->field($model, 'itm_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-10">
            <?= $form->field($model, 'itm_desc')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-10">
            <?php // $form->field($model, 'itm_man_id')->textInput() ?>
            <?php
            echo $form->field($model, 'itm_man_id')->widget(Select2::classname(), [
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
            <?php // $form->field($model, 'itm_model')->textInput(['maxlength' => true]) ?>
            <?php
            echo $form->field($model, 'itm_model')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(ItemModels::find()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Select Model ...'],
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
            <?php // $form->field($model, 'itm_shop_id')->textInput() ?>
            <?php
            echo $form->field($model, 'itm_shop_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Shops::find()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Select Shop ...'],
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
            <?= $form->field($model, 'itm_price')->textInput(['class' => 'form-control', 'placeHolder' => 'KES']) ?>
        </div>

    </div>

    <div class="form-group">
        <div class="col-lg-10">
            <?= $form->field($model, 'itm_serial')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-10">
            <?=
            FileInput::widget([
                'model' => $model,
                'attribute' => 'itm_image',
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
        </div>
    </div>


    <div class="form-group">
        <div class="col-lg-10">
            <?= Html::submitButton($model->isNewRecord ? 'Add New' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<?php $this->registerJsFile(Yii::getAlias('@web') . '/js/ajax_requests.js'); ?>