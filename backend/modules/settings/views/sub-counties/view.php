<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\SettingsSubCounties */
?>
<div class="settings-sub-counties-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'county_code',
            'const_code',
            'const_name',
        ],
    ]) ?>

</div>
