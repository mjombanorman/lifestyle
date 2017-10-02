<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assets/plugins/pace/pace-theme-flash.css',
        'assets/plugins/bootstrapv3/css/bootstrap.min.css',
        'assets/plugins/bootstrapv3/css/bootstrap-theme.min.css',
        'fonts.googleapis.com/icone91f.css?family=Material+Icons',
        'assets/plugins/animate.min.css',
        'assets/plugins/jquery-scrollbar/jquery.scrollbar.css',
        'webarch/css/webarch.css',
    ];
    public $js = [
        'assets/plugins/pace/pace.min.js',
        'assets/plugins/jquery/jquery-1.11.3.min.js',
        'assets/plugins/bootstrapv3/js/bootstrap.min.js',
        'assets/plugins/jquery-block-ui/jqueryblockui.min.js',
        'assets/plugins/jquery-unveil/jquery.unveil.min.js',
        'assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js',
        'assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js',
        'assets/plugins/jquery-validation/js/jquery.validate.min.js',
        'assets/plugins/bootstrap-select2/select2.min.js',
        'webarch/js/webarch.js',
        'assets/js/chat.js',
    ];
    public $depends = [
            // 'yii\web\YiiAsset',
            // 'yii\bootstrap\BootstrapAsset',
    ];

}
