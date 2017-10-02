<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\SettingsTowns */
?>
<div class="settings-towns-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'details:ntext',
            'created_at',
            'created_by',
        ],
    ]) ?>

</div>
