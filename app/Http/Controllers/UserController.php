<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function edit(Request $request)
    {
        $user = User::find($request->user()->id);
        $user->name = $request->name;
        $user->name = $request->username;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->age = $request->age;
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }

    // ...
}
