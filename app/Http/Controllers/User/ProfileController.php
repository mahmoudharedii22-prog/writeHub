<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $user->loadCount(['posts', 'followers', 'followings']);

        return view('profile.show', compact('user'));
    }
}
