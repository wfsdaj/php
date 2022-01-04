<?php

namespace System;

class View
{
    public static function render(string $file, array $data = []): void
    {
        foreach ($data as $k => $v) {
            $$k = $v;
        }
        require __DIR__ . '/../views/' . $file . '.php';
    }
}
