<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Custom bootstrap asset bundle
 */
class BootAsset extends AssetBundle {

    public function init() {
        $this->jsOptions['position'] = View::POS_END;
        parent::init();
    }

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'themes/p_theme/assets/plugins/bootstrap/css/bootstrap.min.css',
            // 'themes/p_theme/assets/plugins/bootstrapv3/css/bootstrap-theme.min.css',
    ];
    public $js = [
            //  'assets/plugins/bootstrapv3/js/bootstrap.min.js',
    ];
    public $depends = [
            //'yii\web\YiiAsset',
            //'yii\web\JqueryAsset',
            //'yii\bootstrap\BootstrapAsset',
    ];

}

?>