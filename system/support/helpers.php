<?php

declare(strict_types=1);

use System\View;

function dump($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

function view(string $file, array $data = []): void
{
    View::render($file, $data);
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

// 返回当前客户端IP
function getClientIP(): string
{
    $client_ip = filter_var($_SERVER['HTTP_CLIENT_IP'] ?? '', FILTER_VALIDATE_IP);
    $forwarded = filter_var($_SERVER['HTTP_X_FORWARDED_FOR'] ?? '', FILTER_VALIDATE_IP);

    if (!empty($client_ip)) {
        return $client_ip;
    } elseif (!empty($forwarded)) {
        return $forwarded;
    }

    return $_SERVER['REMOTE_ADDR'] ?? '';
}

function e(string $string)
{
    return htmlspecialchars($string, ENT_QUOTES);
}