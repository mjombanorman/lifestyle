<?php

namespace backend\assets;

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
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'tinymce/js/tinymce/tinymce.min.js',
        'assets/plugins/jquery/jquery-1.11.3.min.js',
    ];
    public $depends = [
            // 'yii\web\YiiAsset',
            //'yii\bootstrap\BootstrapAsset',
    ];

}
