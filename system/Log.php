<?php

/**
 * 日志类
 * 记录日志信息到文件，或者系统错误日志。
 */

namespace System;

class Log
{
    const LEVELS = [
        'alert',
        'error',
        'warning',
        'notice',
        'info',
        'debug',
    ];

    private $folder = 'runtime/logs/';

    /**
     * 代理方法来记录不同级别的消息
     *
     * @param  string  $method  方法名
     * @param  mixed   $args    方法参数
     */
    public function __call(string $method, $args)
    {
        if (in_array($method, self::LEVELS) && isset($args[0])) {
            $this->log(ucfirst($method), $args[0], $args[1] ?? []);
        }
    }

    /**
     * 记录消息
     *
     * @param string $level  日志级别
     * @param string $msg    日志内容
     */
    private function log(string $level, string $msg): void
    {
        $this->mkdir();
        $this->writeToFile(
            sprintf(
                '[%s][%s] %s: %s',
                date('H:i:s'),
                getClientIP(),
                $level,
                $msg
            )
        );
    }

    /**
     * 如果日志文件夹不存在，则创建该文件夹
     */
    private function mkdir(): void
    {
        if (!file_exists($this->folder)) {
            mkdir($this->folder, 0755, true);
        }
    }

    /**
     * 将内容写入当前日志文件
     *
     * @param  string  $data  要附加的内容
     */
    private function writeToFile(string $data): void
    {
        file_put_contents($this->getFilename(), $data . PHP_EOL, FILE_APPEND);
    }

    /**
     * 返回日志文件名
     *
     * @return string the log filename
     */
    private function getFilename(): string
    {
        return $this->folder . '/' . sprintf('%s.log', date('Y-m-d'));
    }
}
