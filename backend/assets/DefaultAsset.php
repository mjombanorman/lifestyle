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
        // 'css/bootstrap.css',
        'assets/plugins/bootstrapv3/css/bootstrap.min.css',
        'assets/plugins/bootstrapv3/css/bootstrap-theme.min.css',
        'assets/plugins/font-awesome/css/font-awesome.css',
        'assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css',
        'assets/plugins/jquery-metrojs/MetroJs.min.css',
        'http://fonts.googleapis.com/css?family=Comfortaa:400,700,300',
        'http://fonts.googleapis.com/css?family=Muli:400,300,300italic,400italic',
        'assets/plugins/shape-hover/css/component.css',
        'assets/plugins/owl-carousel/owl.carousel.css',
        'assets/plugins/owl-carousel/owl.theme.css',
        'assets/plugins/jquery-slider/css/jquery.sidr.light.css',
        'assets/plugins/jquery-ricksaw-chart/css/rickshaw.css',
        'assets/plugins/Mapplic/mapplic/mapplic.css',
        'assets/plugins/pace/pace-theme-flash.css',
        //'assets/plugins/bootstrapv3/css/bootstrap.min.css',
        //'assets/plugins/bootstrapv3/css/bootstrap-theme.min.css',
        'fonts.googleapis.com/icone91f.css?family=Material+Icons',
        'assets/plugins/animate.min.css',
        'assets/plugins/jquery-scrollbar/jquery.scrollbar.css',
        'webarch/css/webarch.css',
    ];
    public $js = [
        // 'tinymce/js/tinymce/tinymce.min.js',
        'assets/plugins/pace/pace.min.js',
        //'assets/plugins/jquery/jquery-1.11.3.min.js',
        //'assets/plugins/bootstrapv3/js/bootstrap.min.js',
        'assets/plugins/jquery-block-ui/jqueryblockui.min.js',
        'assets/plugins/jquery-unveil/jquery.unveil.min.js',
        'assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js',
        'assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js',
        'assets/plugins/jquery-validation/js/jquery.validate.min.js',
        //'assets/plugins/bootstrap-select2/select2.min.js',
        'webarch/js/webarch.js',
        'assets/js/chat.js',
        'assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js',
        'assets/plugins/jquery-ui-touch/jquery.ui.touch-punch.min.js',
        'js/modal_popup.js',
        'assets/js/email_comman.js',
        'assets/plugins/owl-carousel/owl.carousel.min.js',
        'assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js',
        'assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js',
        'assets/plugins/Mapplic/js/jquery.easing.js',
        'assets/plugins/Mapplic/js/jquery.mousewheel.js',
        'assets/plugins/Mapplic/js/hammer.js',
        'assets/plugins/Mapplic/mapplic/mapplic.js',
        'assets/plugins/jquery-flot/jquery.flot.js',
        'assets/plugins/jquery-metrojs/MetroJs.min.js',
        'assets/plugins/bootstrapv3/js/bootstrap.min.js',
            // 'assets/js/dashboard_v2.js',
    ];
    public $depends = [
            // 'yii\web\YiiAsset',
            //'yii\bootstrap\BootstrapAsset',
    ];

}
