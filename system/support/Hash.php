<?php

namespace System\Support;

/**
 * method make(string $password): string
 */
class Hash
{
    /**
     * 创建密码的散列
     *
     * @param  string $password
     * @return string
     */
    public static function make(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function verify(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}
