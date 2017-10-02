<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\users\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="button">
    <h2><?= Html::encode($this->title) ?></h2>
</div>

<div class="panel panel-widget">
<div class="user-view">



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => 
            'username',
            'email:email',
            'status',
            'user_image',
            'user_level',
            'created_at',
          
        ],
    ]) ?>

</div>
</div>