<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\file\FileInput;
use backend\modules\blog\models\Category;
use backend\modules\blog\models\Posts;

/* @var $this yii\web\View */
/* @var $model backend\modules\blog\models\Posts */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="grid simple">
    <div class="">
        <div class="grid-title no-border">

        </div>
        <div class="grid-body no-border">
            <?php
            $form = ActiveForm::begin([
                        //'enableAjaxValidation' => true,
                        'options' => [
                            'id' => 'post',
                            'enctype' => 'multipart/form-data',
                        ]
            ]);
            ?>

            <div class="col-lg-6">
                <?php
                echo $form->field($model, 'post_category_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Category::find()->all(), 'cat_id', 'cat_name'),
                    'options' => ['placeholder' => 'Select Category ...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]);
                ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'post_status')->dropDownList(Posts::generateStatus()) ?>
            </div>


            <div class="col-lg-12">
                <?= $form->field($model, 'post_title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-12">
                <br>
                <?=
                FileInput::widget([
                    'model' => $model,
                    'attribute' => 'post_img',
                    'pluginOptions' => [
                        'showCaption' => false,
                        'showRemove' => false,
                        'showUpload' => false,
                        'browseClass' => 'form-control btn btn-primary btn-block',
                        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                        'browseLabel' => 'Select Cover Image'
                    ],
                    'options' => ['accept' => 'image/*']
                ]);
                ?>
                <br>
            </div>
            <div class="col-lg-12">
                <?= $form->field($model, 'post_content')->textarea(['rows' => 20, 'id' => 'mytextarea']) ?>
            </div>
            <div class="form-group col-lg-6">
                <?= Html::submitButton($model->isNewRecord ? 'Create Post' : 'Update Post', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#mytextarea').wysihtml5();
    });
</script>
