<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\SettingsCounties */
?>
<div class="settings-counties-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'county',
            'tour',
            'former_province',
            'area',
            'population_census_2009',
            'capital',
        ],
    ]) ?>

</div>
