<?php

namespace App\Controllers;

use System\View;

class ErrorController
{
    public function index()
    {
        View::render('errors/404');
    }
}
