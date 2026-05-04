<x-auth-layout title="Login" subtitle="Welcome back, please login to your account">

    <form method="POST" action="{{ route('login.store') }}">
        @csrf


        <div class="mb-3">
            <label class="form-label small fw-semibold">Email or Username</label>
            <input type="text" name="login" class="form-control form-control-lg @error('email') is-invalid @enderror"
                placeholder="Email or Username" value="{{ old('email') }}">
            <x-validation-error name="login" />
        </div>


        <div class="mb-3">
            <label class="form-label small fw-semibold">Password</label>
            <input type="password" name="password"
                class="form-control form-control-lg @error('password') is-invalid @enderror"
                placeholder="Enter your password">
            <x-validation-error name="password" />
        </div>


        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label small" for="remember">
                Remember me
            </label>
        </div>


        <button class="btn btn-dark w-100 btn-lg">
            Login
        </button>

  
        <div class="text-center mt-3 small">
            Don’t have an account?
            <a href="{{ route('register') }}" class="text-decoration-none fw-semibold">
                Create account
            </a>
        </div>

    </form>

</x-auth-layout>
