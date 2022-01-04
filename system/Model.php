<?php

namespace System;

use PDO;

class Model
{
    // 数据库连接
    public $db = null;

    // 无论何时创建模型，都要打开数据库连接。
    function __construct()
    {
        try {
            $this->openDatabaseConnection();
        } catch (\PDOException $e) {
            exit('无法建立数据库连接。');
        }
    }

    /**
     * 使用 config/db.php 中的凭据打开数据库连接
     */
    private function openDatabaseConnection()
    {
        $host     = config('db', 'host');
        $database = config('db', 'database');
        $username = config('db', 'username');
        $password = config('db', 'password');
        $charset  = config('db', 'charset');
        $dsn      = "mysql:host={$host};dbname={$database};charset={$charset}";

        // 设置 PDO 连接的（可选）选项。在本例中，我们将 fetch 模式设置为 FETCH_OBJ
        // 这意味着所有结果都是对象，如：$result->user_name
        // 如果是 FETCH_ASSOC 将返回如下结果：$result['user_name']
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_WARNING
        ];

        // 使用PDO连接器生成数据库连接
        // $this->db = new PDO('mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['database'], $config['db']['username'], $config['db']['password'], $options);

        $this->db = new PDO($dsn, $username, $password, $options);
    }
}
