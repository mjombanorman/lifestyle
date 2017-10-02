<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class UpAsset extends AssetBundle {

    public function init() {
        $this->jsOptions['position'] = View::POS_HEAD;
        parent::init();
    }

    public $basePath = '@webroot';
    public $baseUrl = '@web/frontend/web';
    public $css = [
    ];
    public $js = [
        'js/vendor/modernizr-2.8.3.min.js',
        'js/vendor/jquery-3.1.1.min.js',
            // 'js/jquery.min.js',
    ];
    public $depends = [
            // 'yii\web\YiiAsset',
            //'yii\bootstrap\BootstrapAsset',
    ];

}
