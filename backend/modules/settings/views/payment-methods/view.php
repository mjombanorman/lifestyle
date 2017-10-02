<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\SettingsPaymentMethods */
?>
<div class="settings-payment-methods-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'payment_type',
            'active',
            'date_created',
            'created_by',
        ],
    ]) ?>

</div>
