<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

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
        'css/styles.css',
        'css/super-treadmille.css',
        'http://cdn.datatables.net/1.10.5/css/jquery.dataTables.css',
    ];
    public $js = [
        'js/modalresume.js',
        'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js',
        'https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js',
        'http://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js',
        'js/datatables.js',
        'js/scripts.js',
        'js/super-treadmill.js',
        'js/super-treadmill.min.js',
        'js/message_form.js',
        'js/imageloader.js',
        

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
