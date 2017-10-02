<?php

use yii\helpers\Html;
use backend\assets\BootAsset;

BootAsset::register($this);
/* @var $this yii\web\View */
/* @var $model backend\modules\blog\models\Posts */

$this->title = 'Create Post';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">


        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>
