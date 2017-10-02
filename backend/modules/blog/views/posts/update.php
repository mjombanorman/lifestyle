<?php

use yii\helpers\Html;
use backend\assets\BootAsset;

BootAsset::register($this);
/* @var $this yii\web\View */
/* @var $model backend\modules\blog\models\Posts */

$this->title = 'Update Post';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-update">
    <div class="">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>
