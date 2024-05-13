<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile_user(User $user){

        return view('includes.dashboard.profile_user', ['auth' => $user->username, 'posts' => $user->posts()->latest()->get(),
            'count' => $user->posts()->count() ]);

    }
}
