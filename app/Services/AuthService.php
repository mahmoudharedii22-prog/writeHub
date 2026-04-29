<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function register(array $data): User
    {
        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $path = $data['image']->store('image', 'public');
            $data['image'] = $path;
        }

        return User::create($data);
    }

    public function login(array $data): bool
    {
        $fieldName = filter_var($data['login'], FILTER_VALIDATE_EMAIL)
        ? 'email'
        : 'username';

        if (! Auth::attempt([
            $fieldName => $data['login'],
            'password' => $data['password'],
        ])) {
            return false;
        }

        return true;
    }
}
