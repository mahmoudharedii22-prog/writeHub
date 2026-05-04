<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $user->loadCount(['posts', 'followers', 'following']);

        return view('profile.show', compact('user'));
    }

    public function followers(User $user)
    {
        return view('profile.followers', [
            'user' => $user,
            'followers' => $user->followers()->with('followers')->get(),
        ]);
    }

    public function following(User $user)
    {
        return view('profile.following', [
            'user' => $user,
            'following' => $user->following()->with('following')->get(),
        ]);
    }
}
