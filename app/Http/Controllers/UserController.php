<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        // lazy load to prevent multiple query in blade to get one link at a time
        // this load all links before go to blade
        $user->load('links');
        
        return view('users.show', [
            'user' => $user
        ]);
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
