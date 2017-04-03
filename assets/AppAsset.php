<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
//        'css/bootstrap.min.css',
        'lib/css/nivo-slider.css',
        'css/core.css',
        'css/shortcode/shortcodes.css',
        'css/style.css',
        'css/responsive.css',
        'css/color/skin-default.css',
        'css/custom.css',
    ];
    public $js = [
        'js/vendor/modernizr-2.8.3.min.js',
        'js/vendor/jquery-3.1.1.min.js',
//        'js/bootstrap.min.js',
        'lib/js/jquery.nivo.slider.js',
        'js/plugins.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
