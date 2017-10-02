<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>


   


<!-- ERROR SECTION START -->
            <div class="error-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <?= nl2br(Html::encode($message)) ?>
                             </div>
                            <div class="error-404 box-shadow">
                                <img src="img/others/error.jpg" alt="">
                                <div class="go-to-btn btn-hover-2">
                                    <a href="<?= Yii::$app->urlManager->createUrl(['site/index'])?>">go to home page</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ERROR SECTION END --> 
