<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use backend\modules\products\models\Category;
use froala\froalaeditor\FroalaEditorWidget;
use kartik\grid\GridView;

backend\assets\BootAsset::register($this);
/* @var $this yii\web\View */
/* @var $model backend\modules\products\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$form = ActiveForm::begin([
            //'enableClientValidation' => true,
            'options' => [
                'id' => 'add-product',
                'enctype' => 'multipart/form-data',
            ]
        ]);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-8">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <?php
                            echo $form->field($model, 'category_id')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(Category::find()->all(), 'id', 'name'),
                                'options' => ['placeholder' => 'Select Category ...'],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'theme' => kartik\widgets\Select2::THEME_BOOTSTRAP,
                                ],
                            ]);
                            ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Enter Name...']) ?>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($model, 'price')->textInput(['placeholder' => 'Enter Price...']) ?>
                        </div>

                        <div class="col-sm-6">
                            <?= $form->field($model, 'status')->dropDownList([true => 'Active', false => 'Inactive'], ['prompt' => 'Select Status...']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php
                            echo FroalaEditorWidget::widget([
                                'model' => $model,
                                'attribute' => 'description',
                                'options' => [
                                    // html attributes
                                    'id' => 'content',
                                    'rows' => 15,
                                ],
                                'clientOptions' => [
                                    'toolbarInline' => false,
                                    'theme' => 'royal', //optional: dark, red, gray, royal
                                    'language' => 'en_us', // optional: ar, bs, cs, da, de, en_ca, en_gb, en_us ...
                                    'height' => 200,
                                ]
                            ]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel">
                <div class="panel-body">

                    <?=
                    FileInput::widget([
                        'model' => $model,
                        'attribute' => 'prod_img',
                        'pluginOptions' => [
                            'previewSettings' => [
                                'image' => ['width' => '190px', 'height' => '190px',]
                            ],
                            'initialPreview' => [
                                Html::img('@web/' . $model->prod_img, [
                                    'class' => 'img-responsive file-preview-image',
                                    'height' => '190px',
                                    'width' => '190px',
                                ]),
                            ],
                            'showPreview' => true,
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
                        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-plus-circle"></i> Add Product' : '<i class="fa fa-save"></i> Save', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block']) ?>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>