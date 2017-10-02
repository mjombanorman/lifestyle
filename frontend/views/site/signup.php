<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use backend\modules\users\models\Towns;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>


 <br>
<div class="login-section mb-80">
    <div class="container">
        <div class="row">
        <div class="col-md-9">
                <div class="new-customers">
                    <!--<form action="#">-->
                      <?php  $form = ActiveForm::begin([
                //'enableAjaxValidation' => true,
                'options' => [
                    'id' => 'form-signup',
                    'enctype' => 'multipart/form-data',
                              ]
                    ]); ?>
                    <h6 class="widget-title border-left mb-50">NEW CUSTOMERS</h6>
                   
                    <div class="login-account p-30 box-shadow">
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($model, 'email')->textInput(['autofocus' => true,'placeholder'=>'Email'])->label(false) ?>
                            </div>
                            <div class="col-sm-6">
                                <!--<input type="text" placeholder="First Name">-->
                                <?= $form->field($model, 'first_name')->textInput(['placeholder'=>'First Name'])->label(false) ?>
                            </div>
                            <div class="col-sm-6">
                               <!-- <input type="text" placeholder="last Name">-->
                               <?= $form->field($model, 'last_name')->textInput(['placeholder'=>'Last Name'])->label(false) ?>
                           </div>
                           <div class="col-sm-6">
                            <?= $form->field($model,'gender')->dropDownList([1=>'Male',2=>'Female'],['prompt'=>'Select Gender', 'class'=>'custom-select'])->label(false)?>
                        </div>
                        <div class="col-sm-6">
                           <!-- <input type="text" placeholder="last Name">-->
                           <?= $form->field($model, 'phone')->textInput(['placeholder'=>'Phone +254'])->label(false) ?>
                       </div>
                       <div class="col-sm-6">
                        <?= $form->field($model,'country')->dropDownList(['Kenya'],['prompt'=>'Select Country', 'class'=>'custom-select'])->label(false)?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model,'town')->dropDownList(ArrayHelper::map(Towns::find()->all(),'id','name'),['prompt'=>'Select Town/City', 'class'=>'custom-select'])->label(false)?>
                    </div>
                    <div class="col-sm-6">
                       <!-- <input type="text" placeholder="last Name">-->
                       <?= $form->field($model, 'address')->textarea(['rows'=>5,'placeholder'=>'Delivery address'])->label(false) ?>
                   </div>
                   <div class="col-sm-6">
                     <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password'])->label(false) ?>
                 </div>

                 <div class="col-sm-6">
                     <?= $form->field($model, 'password_confirm')->passwordInput(['placeholder'=>'Confirm Password'])->label(false) ?>

                 </div>
             </div>

             <div class="checkbox">
                <label class="mr-10"> 
                    <small>
                       <?= $form->field($model, 'newsletter')->checkbox(['unchecked'=>0,'checked'=>1,'label'=>'Receive Newsletters about our products and promos']) ?>
                   </small>
               </label>

           </div>
           <div class="row">
            <div class="col-md-6">
                <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" >Sign Up</button>
            </div>
            <div class="col-md-6">
                <button class="submit-btn-1 mt-20 btn-hover-1 f-right" type="reset">Clear</button>
            </div>
        </div>
    </div>
    <!--</form>-->

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>
</div>
