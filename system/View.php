<?php

namespace System;

class View
{
    public static function render(string $file, array $data = []): void
    {
        foreach ($data as $k => $v) {
            $$k = $v;
        }
        include ROOT_PATH . 'views/' . $file . '.php';
    }
}
