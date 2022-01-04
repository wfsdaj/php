<?php

namespace App\Controllers;

use System\Http\Request;

class RegisterController
{
    public function index()
    {
        view('user/register');
    }

    public function add()
    {
        if (Request::isPost()) {
            $email    = Request::get('email');
            $password = Request::get('password');

            $data = [
                'email'    => $email,
                'password' => $password,
            ];

            dump($data);
        }
    }
}
