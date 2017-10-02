<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ViewAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //  'css/site.css',
        'css/view_item.css',
    ];
    public $js = [
        'js/view_item.js',
    ];
    public $depends = [
            //  'yii\web\YiiAsset',
            //'yii\bootstrap\BootstrapAsset',
    ];

}
