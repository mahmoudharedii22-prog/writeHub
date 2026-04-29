<x-auth-layout title="Register" subtitle="Create your account and start sharing">


    <form method="POST" action="/register" enctype="multipart/form-data">
        @csrf


        <div class="mb-3">
            <label class="form-label small fw-semibold">Name</label>
            <input type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror"
                placeholder="Enter your name" value="{{ old('name') }}">
            <x-validation-error name="name" />
        </div>


        <div class="mb-3">
            <label class="form-label small fw-semibold">Username</label>
            <input type="text" name="username"
                class="form-control form-control-lg @error('username') is-invalid @enderror"
                placeholder="e.g. mahmoud_dev" value="{{ old('username') }}">
            <x-validation-error name="username" />
        </div>

    
        <div class="mb-3">
            <label class="form-label small fw-semibold">Email</label>
            <input type="email" name="email"
                class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Enter your email"
                value="{{ old('email') }}">
            <x-validation-error name="email" />
        </div>


        <div class="mb-3">
            <label class="form-label small fw-semibold">Bio</label>
            <textarea name="bio" class="form-control form-control-lg @error('bio') is-invalid @enderror"
                placeholder="Tell us about yourself">{{ old('bio') }}</textarea>
            <x-validation-error name="bio" />
        </div>

        <div class="mb-3">
            <label class="form-label small fw-semibold">Profile Image</label>
            <input type="file" name="image"
                class="form-control form-control-lg @error('image') is-invalid @enderror">
            <x-validation-error name="image" />
        </div>


        <div class="mb-3">
            <label class="form-label small fw-semibold">Password</label>
            <input type="password" name="password"
                class="form-control form-control-lg @error('password') is-invalid @enderror"
                placeholder="Create a password">
            <x-validation-error name="password" />
        </div>


        <div class="mb-3">
            <label class="form-label small fw-semibold">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control form-control-lg"
                placeholder="Confirm your password">
        </div>


        <button class="btn btn-primary w-100 btn-lg">
            Create Account
        </button>

        <div class="text-center mt-3 small">
            Already have an account?
            <a href="{{ route('login.show') }}" class="text-decoration-none fw-semibold">Login</a>
        </div>

    </form>
</x-auth-layout>
