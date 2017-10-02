<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\assets\ViewAsset;
use backend\assets\BootAsset;

ViewAsset::register($this);
BootAsset::register($this);
/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\Items */

$this->title = $model->itm_name;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-widget">
<div class="container">
    <div class="row">
        <div class="col-xs-5 item-photo">
            <img class="thumbnail" style="max-width:100%;" src="<?= $model->itm_image ? Yii::getAlias('@web') . '/' . $model->itm_image : Yii::getAlias('@web') . '/images/gallery/9.jpg' ?>" />
        </div>
        <div class="col-xs-6" style="border:0px solid gray">
            <!-- Datos del vendedor y titulo del producto -->
            <h3><?= $model->itm_name; ?></h3>
            <h5 style="color:#337ab7; padding-top:15px;"><span style="color:#337ab7"><?= $model->manu->name . ' - ' . $model->model->name ?></span></h5>

            <!-- Precios -->
            <h6 class="title-price"><small>Price</small></h6>
            <h3 style="margin-top:0px;"><?= 'Ksh ' . $model->itm_price ?></h3>

            <h6 class="title-price"><small>Category</small></h6>
            <h3 style="margin-top:0px;"><?= $model->category->ict_name ?></h3>

            <h6 class="title-price"><small>Shop</small></h6>
            <h3 style="margin-top:0px;"><?= $model->shop->name ?></h3>

        </div>

        <div class="col-xs-11">
            <ul class="menu-items">
                <li class="active">Specifications</li>

            </ul>
            <div style="width:100%;border-top:1px solid silver">
                <?=
                DetailView::widget([
                    'model' => $model,
                    'attributes' => [

                        'itm_desc:ntext',
                    ],
                ])
                ?>
            </div>
        </div>
    </div>
</div>
</div>