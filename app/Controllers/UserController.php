<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function index()
    {
        $user = new User();
        $users = $user->all();

        view('user/index', ["users" => $users]);
    }

    
}
