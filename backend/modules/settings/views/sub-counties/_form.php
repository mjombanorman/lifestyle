<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\SettingsSubCounties */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="settings-sub-counties-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'county_code')->textInput() ?>

    <?= $form->field($model, 'const_code')->textInput() ?>

    <?= $form->field($model, 'const_name')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
