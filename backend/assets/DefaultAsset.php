<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class DefaultAsset extends AssetBundle {

    public function init() {
        $this->jsOptions['position'] = View::POS_END;
        parent::init();
    }

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'themes/p_theme/assets/plugins/pace/pace-theme-flash.css',
        'themes/p_theme/assets/plugins/bootstrap/css/bootstrap.min.css',
        'themes/p_theme/assets/plugins/font-awesome/css/font-awesome.css',
        'themes/p_theme/assets/plugins/jquery-scrollbar/jquery.scrollbar.css',
        'themes/p_theme/assets/plugins/select2/css/select2.min.css',
        'themes/p_theme/assets/plugins/switchery/css/switchery.min.css',
        'themes/p_theme/assets/plugins/nvd3/nv.d3.min.css',
        'themes/p_theme/assets/plugins/mapplic/css/mapplic.css',
        'themes/p_theme/assets/plugins/rickshaw/rickshaw.min.css',
        'themes/p_theme/assets/plugins/bootstrap-datepicker/css/datepicker3.css',
        'themes/p_theme/assets/plugins/jquery-metrojs/MetroJs.css',
        'themes/p_theme/pages/css/pages-icons.css',
        'themes/p_theme/pages/css/pages.css',
        'css/custom.css',
    ];
    public $js = [
        'themes/p_theme/assets/plugins/pace/pace.min.js',
        // 'themes/p_theme/assets/plugins/jquery/jquery-1.11.1.min.js',
        'themes/p_theme/assets/plugins/modernizr.custom.js',
        'themes/p_theme/assets/plugins/jquery-ui/jquery-ui.min.js',
        'themes/p_theme/assets/plugins/tether/js/tether.min.js',
        'themes/p_theme/assets/plugins/bootstrap/js/bootstrap.min.js',
        'themes/p_theme/assets/plugins/jquery/jquery-easy.js',
        'themes/p_theme/assets/plugins/jquery-unveil/jquery.unveil.min.js',
        'themes/p_theme/assets/plugins/jquery-ios-list/jquery.ioslist.min.js',
        'themes/p_theme/assets/plugins/jquery-actual/jquery.actual.min.js',
        'themes/p_theme/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js',
        //  'themes/p_theme/assets/plugins/select2/js/select2.full.min.js',
        'themes/p_theme/assets/plugins/classie/classie.js',
        'themes/p_theme/assets/plugins/switchery/js/switchery.min.js',
        'themes/p_theme/assets/plugins/nvd3/lib/d3.v3.js',
        'themes/p_theme/assets/plugins/nvd3/nv.d3.min.js',
        'themes/p_theme/assets/plugins/nvd3/src/utils.js',
        'themes/p_theme/assets/plugins/nvd3/src/tooltip.js',
        'themes/p_theme/assets/plugins/nvd3/src/interactiveLayer.js',
        'themes/p_theme/assets/plugins/nvd3/src/models/axis.js',
        'themes/p_theme/assets/plugins/nvd3/src/models/line.js',
        'themes/p_theme/assets/plugins/nvd3/src/models/lineWithFocusChart.js',
        'themes/p_theme/assets/plugins/mapplic/js/hammer.js',
        'themes/p_theme/assets/plugins/mapplic/js/jquery.mousewheel.js',
        'themes/p_theme/assets/plugins/mapplic/js/mapplic.js',
        'themes/p_theme/assets/plugins/jquery-metrojs/MetroJs.min.js',
        'themes/p_theme/assets/plugins/jquery-sparkline/jquery.sparkline.min.js',
        'themes/p_theme/assets/plugins/skycons/skycons.js',
        'themes/p_theme/pages/js/pages.min.js',
        'themes/p_theme/assets/js/scripts.js',
        'themes/p_theme/assets/js/demo.js',
        'js/modal_popup.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
