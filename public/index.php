<?php

/**
 * 项目入口文件 
 * 更新时间: 2022/1/4
 * 版本：0.0.1
 */

header('Content-Type: text/html; charset=utf-8');

// 设置时区
date_default_timezone_set('Asia/Shanghai');

// Composer 依赖项自动加载
require __DIR__ . '/../vendor/autoload.php';

// 定义项目根目录
define('ROOT_PATH', dirname(__DIR__) . '/');

// 定义项目应用文件夹
define('APP_PATH', ROOT_PATH . 'app' . '/');

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
