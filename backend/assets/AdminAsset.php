<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback',
        'lte/css/adminlte.min.css',
        'lte/plugins/fontawesome-free/css/all.min.css',
        'lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'
    ];
    public $js = [
        'lte/js/adminlte.js',
        'lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
