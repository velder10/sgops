<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use Yii;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @author Nenad Zivkovic <nenad@freetuts.org>
 * 
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@themes';

    public $css = [
        'css/bootstrap.min.css',
    	'css/AdminLTE.min.css',
    	'css/dataTables.bootstrap.css',
    	'css/_all-skins.min.css',
        'css/docs.css',
    	'css/css.css',
    	'css/font-awesome.min.css',
    	'css/ionicons.min.css',
    ];

    public $js = [
    	//'js/jquery-1.10.2.min.js',
    	'js/bootstrap.min.js',
    	'js/jquery-ui.min.js',
    	'js/jquery.dataTables.min.js',
    	'js/dataTables.bootstrap.min.js',
    	'js/app.min.js',
    	'js/moment.min.js',
    	'js/fullcalendar.min.js',
    	'js/fr.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
