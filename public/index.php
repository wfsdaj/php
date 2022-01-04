<?php

/**
 * 项目入口文件 
 * 更新时间: 2022/1/4
 * 版本：0.0.1
 */

use System\App;

// Composer 依赖项自动加载
require __DIR__ . '/../vendor/autoload.php';

// 定义项目根目录
define('ROOT_PATH', dirname(__DIR__) . '/');

// 定义项目应用文件夹
define('APP_PATH', ROOT_PATH . 'app' . '/');

// 启动应用程序
$app = new App();
