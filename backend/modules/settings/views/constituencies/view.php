<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\SettingsConstituencies */
?>
<div class="settings-constituencies-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'county_id',
            'country_code',
        ],
    ]) ?>

</div>
