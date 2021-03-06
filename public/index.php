<?php

/**
 * 项目入口文件 
 * 更新时间: 2022/1/4
 * 版本：0.0.1
 */

// 定义项目根目录
define('ROOT_PATH', dirname(__DIR__) . '/');

// 定义项目应用文件夹
define('APP_PATH',  ROOT_PATH . 'app' .   '/');
define('VIEW_PATH', ROOT_PATH . 'views' . '/');



// 内存及运行时间起始记录，用于计算运行耗时
define('START_MEMORY', memory_get_usage());
define('START_TIME',   microtime(true));

header('Content-Type: text/html; charset=utf-8');
header("Referrer-Policy: no-referrer-when-downgrade");
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: SAMEORIGIN");

// 设置时区
date_default_timezone_set('Asia/Shanghai');

// Composer 依赖项自动加载
require __DIR__ . '/../vendor/autoload.php';

// 是否显示错误消息
if (config('debug') === true) {
    error_reporting(E_ALL);
    ini_set("display_errors", '1');
} else {
    error_reporting(0);
    ini_set("display_errors", '0');
}

// 启动应用程序
$app = new System\App();
