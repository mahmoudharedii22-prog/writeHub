<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CreateUserRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    private $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function show()
    {
        return view('auth.register');
    }

    public function store(CreateUserRequest $request) {

       $user = $this->service->register($request->validated());

       Auth::login($user);

        return redirect()->route('login.show')->with('success', 'User created successfully');
    }

}
