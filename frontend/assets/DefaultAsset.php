<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class DefaultAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web/frontend/web';
    public $css = [
        'css/bootstrap.min.css',
        'lib/css/nivo-slider.css',
        'css/core.css',
        'css/shortcode/shortcodes.css',
        'style.css',
        'css/responsive.css',
        'css/color/color-core.css',
        'css/custom.css',
            // 'css/site.css',
    ];
    public $js = [
        'js/vendor/modernizr-2.8.3.min.js',
        // 'js/vendor/jquery-3.1.1.min.js',
        'js/bootstrap.min.js',
        'lib/js/jquery.nivo.slider.js',
        'js/plugins.js',
        'js/main.js',
        'js/custom.js'
    ];
    public $depends = [
            // 'yii\web\YiiAsset',
            //'yii\bootstrap\BootstrapAsset',
    ];

}
