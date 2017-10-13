<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\users\models\User */

$this->title = 'Add New User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

//backend\assets\BootAsset::register($this);
?>

<?=

$this->render('_form', [
    'model' => $model,
    'profile' => $profile,
    'img_model' => $img_model,
    'title' => $this->title,
])
?>


