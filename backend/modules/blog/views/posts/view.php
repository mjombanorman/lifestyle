<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\blog\models\Posts */
backend\assets\BootAsset::register($this);
$this->title = 'Post #' . $model->post_id;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-md-12" id="preview-email-wrapper" style="">
        <div class="row">
            <div class="col-md-12">
                <div class="grid simple">
                    <div class="grid-title no-border">
                        <h4></h4>
                        <div class="tools">
                            <a class="" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="grid-body no-border" style="min-height: 400px;">
                        <div class="pull-right">
                            <?= Html::a('<i class="fa fa-edit"></i>', ['update', 'id' => $model->post_id], ['class' => 'btn btn-primary']) ?>
                            <?=
                            Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $model->post_id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ])
                            ?>
                        </div>
                        <div class="">
                            <h1 id="emailheading">
                                <?= $model->post_title ?>
                            </h1>

                            <br>
                            <div class="control">
                                <div class="pull-left">
                                    <div class="btn-group">
                                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#"><?= $model->author->first_name . ' ' . $model->author->last_name ?> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#">About Author</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <label class="inline">
                                        <span class="muted">&nbsp;&nbsp;category:</span>
                                        <span class="bold small-text">
                                            <a class="__cf_email__" href="" data-cfemail=""><?= $model->category->cat_name ?></a><script data-cfhash='f9e31' type="text/javascript">/* <![CDATA[ */!function(t, e, r, n, c, a, p){try{t = document.currentScript || function(){for (t = document.getElementsByTagName('script'), e = t.length; e--; )if (t[e].getAttribute('data-cfhash'))return t[e]}(); if (t && (c = t.previousSibling)){p = t.parentNode; if (a = c.getAttribute('data-cfemail')){for (e = '', r = '0x' + a.substr(0, 2) | 0, n = 2; a.length - n; n += 2)e += '%' + ('0' + ('0x' + a.substr(n, 2) ^ r).toString(16)).slice( - 2); p.replaceChild(document.createTextNode(decodeURIComponent(e)), c)}p.removeChild(t)}} catch (u){}}()/* ]]> */</script>
                                        </span>
                                    </label>
                                </div>
                                <div class="pull-right">
                                    <span class="muted small-text"><?= Yii::$app->formatter->asDatetime($model->post_date, 'long') ?></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <br>
                            <div class="email-body">
                                <?php // $model->post_content ?>
                                <?=
                                DetailView::widget([
                                    'model' => $model,
                                    'attributes' => [
                                            [
                                            'attribute' => 'post_content',
                                            'label' => 'HTML Code'
                                        ],
                                            [
                                            'attribute' => 'post_content',
                                            'format' => 'raw',
                                            'label' => 'Content'
                                        ],
                                    ],
                                ]);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
