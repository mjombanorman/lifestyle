<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\SettingsNumberingFormat */
?>
<div class="settings-numbering-format-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type',
            'description',
            'next_number',
            'min_digits',
            'prefix',
            'suffix',
            'preview',
            'module',
            'date_created',
            'created_by',
        ],
    ]) ?>

</div>
