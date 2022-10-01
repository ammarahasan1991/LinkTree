<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        return $user;
    }

    public function edit()
    {
        return 'UserController@edit';
    }

    public function update()
    {
        return 'UserController@update';
    }
}
