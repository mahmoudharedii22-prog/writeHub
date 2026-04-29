<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LogInUserRequest;
use App\Services\AuthService;

class LoginController extends Controller
{
    private $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function show()
    {
        return view('auth.login');

    }

    public function store(LogInUserRequest $request)
    {
        $this->service->login($request->validated());
        $request->session()->regenerate();

        return redirect()->route('home.index');
    }
}
