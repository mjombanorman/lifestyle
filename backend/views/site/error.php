<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use backend\assets\BootAsset;

BootAsset::register($this);

$this->title = $name;
?>




<div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-offset-1 col-xs-10">
        <div class="error-container">
            <div class="error-main">
                <div class="error-number"> 404 </div>
                <div class="error-description"> We seem to have lost you in the clouds. </div>
                <div class="error-description-mini"> <?= nl2br(Html::encode($message)) ?></div>
                <br>
                <div class="row">
                    <div class="input-with-icon col-md-12"> <i class="fa fa-search"></i>
                        <input type="text" class="form-control" id="form1Name" name="form1Name">
                    </div>
                </div>
                <br>
                <a class="btn btn-warning btn-big"  href="<?= \yii\helpers\Url::to(['index']) ?>">Back to Home</a>
            </div>
        </div>
    </div>
</div>

