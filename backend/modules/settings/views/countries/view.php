<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\SettingsCountries */
?>
<div class="settings-countries-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'code',
            'name',
        ],
    ]) ?>

</div>
