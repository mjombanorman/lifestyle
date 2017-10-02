<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use backend\assets\BootAsset;

BootAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\blog\models\PostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Posts';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row" id="inbox-wrapper">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="grid simple">
                    <div class="grid-body no-border email-body">
                        <br>
                        <div class="row-fluid">
                            <div class="row-fluid dataTables_wrapper">
                                <h2 class=" inline">
                                    Posts
                                </h2>
                                <div class="pull-right">
                                    <?= Html::a('<i class="fa fa-plus"></i> New', ['create'], ['class' => 'btn btn-primary']) ?>
                                </div>
                                <div class="btn-group m-l-10 m-b-10">
                                    <a class="btn btn-white btn-mini dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret single"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="<?= \yii\helpers\Url::to(['create']) ?>">Add New Post</a>
                                        </li>


                                    </ul>
                                </div>
                                <div class="pull-right margin-top-20">


                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="email-list">
                                <table class="table table-striped table-fixed-layout table-hover" id="emails">
                                    <thead>
                                        <tr>
                                            <th class="small-cell"></th>
                                            <th class="small-cell"></th>
                                            <th class="medium-cell"></th>
                                            <th></th>
                                            <th class="medium-cell"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?=
                                        ListView::widget([
                                            'dataProvider' => $dataProvider,
                                            'itemOptions' => ['class' => 'item pull-right'],
                                            'itemView' => '_item',
                                        ])
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

