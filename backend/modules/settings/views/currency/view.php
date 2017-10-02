<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\SettingsCurrency */
?>
<div class="settings-currency-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'description',
            'symbol',
            'is_active',
            'decimal_places',
            'decimal_separator',
            'thousands_separator',
            'date_created',
            'created_by',
        ],
    ]) ?>

</div>
