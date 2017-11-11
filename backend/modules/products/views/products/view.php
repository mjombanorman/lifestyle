<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\modules\products\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'name',
        'description:ntext',
        'prod_img',
        'price',
        'category_id',
        'created_by',
        'created_at',
    ],
])
?>

<div class="card card-transparent">
    <div class="card-header  ">
        <div class="card-title">
            View Product
        </div>
    </div>
    <div class="m-0 row card-block">
        <div class="col-lg-4 no-padding">

            <div  class="card card-default">
                <div class="p-r-30">


                    <?=
                    Html::img('@web/' . $model->prod_img, [
                        'alt' => 'Product Image',
                        'class' => ' img-responsive',
                        'style' => [
                            // 'max-width' => '100px',
                            'width' => '100%',
                            'max-height' => '350px',
                            'float' => 'center',
                            'padding' => '10px',
                        ]
                    ])
                    ?>

                </div>
            </div>
        </div>
        <div class="col-lg-8 sm-no-padding">
            <div class="card card-transparent">
                <div class="card-block no-padding">

                    <div class="card-header  ">
                        <div class="card-title">
                            Product Details
                        </div>
                        <div class="card-controls">
                            <ul>
                                <li><a  href="<?= Url::to(Yii::$app->request->referrer) ?>" class="btn btn-success btn-sm" ><i class="pg-arrow_left_line_alt text-white"></i></a>
                                </li>
                                <li><a value="<?= Url::to(['/products/products/update', 'id' => $model->id]) ?>" href="<?= Url::to(['/products/products/update', 'id' => $model->id]) ?>" class="btn btn-warning btn-sm showModalButton" ><i class="pg-ui text-white"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block">

                        <h6>  <span class="text-primary">Product Name</span>:  <span class="semi-bold"><?= $model->name ?></span></h6>
                        <h6>  <span class="text-primary">Product Category</span>: <span class="semi-bold"><?= $model->category->name ?></span></h6>
                        <h6>  <span class="text-primary">Product Price</span>: <span class="semi-bold"><?= 'Ksh ' . $model->price ?></span></h6>
                        <h6> <span class="text-primary">Product Description:</span></h6>
                        <p>
                            <?= $model->description ?>
                        </p>
                        <br>
                        <div>
                            <div class="profile-img-wrapper m-t-5 inline">
                                <img width="35" height="35" data-src-retina="assets/img/profiles/avatar_small2x.jpg" data-src="assets/img/profiles/avatar_small.jpg" alt="" src="assets/img/profiles/avatar_small.jpg">
                                <div class="chat-status available">
                                </div>
                            </div>
                            <div class="inline m-l-10">
                                <p class="small hint-text m-t-5">Added by <?= $model->user->username ?>
                                    <br>Added on <?= Yii::$app->formatter->asDate($model->created_at) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>