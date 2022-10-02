<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

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
        return view('users.edit', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {
        // always want full hex e.g. #ff00ff
        $request->validate([
            'background_color' => 'required|size:7|starts_with:#',
            'text_color' => 'required|size:7|starts_with:#',
        ]);

        Auth::user()->update($request->only(['background_color', 'text_color']));

        return redirect()->back()->with(['success' => 'changes saved successfully']);
    }
}
