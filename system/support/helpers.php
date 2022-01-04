<?php

declare(strict_types=1);

function dump($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

function view(string $file, array $data = []): void
{
    // 从关联数组创建变量
    foreach ($data as $key => $value) {
        $$key = $value;
    }

    include ROOT_PATH . 'views/' . $file . 'php';
}

function redirect($path)
{
    header('location: ' . $path);
}

function config($key1 = null, $key2 = null)
{
    static $config = null;

    $file = APP_PATH . 'config.php';

    if ($config == null && is_readable($file)) {
        $config = require $file;
    }

    if (is_null($key1)) {
        return $config;
    }

    if (is_null($key2)) {
        if (isset($config[$key1])) {
            return $config[$key1];
        }
        return null;
    }

    if (isset($config[$key1][$key2])) {
        return $config[$key1][$key2];
    }

    return null;
}

function isPost(): bool
{
    return strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
}

function isGet(): bool
{
    return strtoupper($_SERVER['REQUEST_METHOD']) === 'GET';
}