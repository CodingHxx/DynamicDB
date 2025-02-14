@extends('layout')
@section('title', 'Login')
@section('content')

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-4 col-sm-12 text-white p-4 rounded bg-black bg-gradient shadow">
        <!-- Display general errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Add this new error message -->
        @if (session('business_credentials_required'))
            <div class="alert alert-warning">
                {{ session('business_credentials_required') }}
                <a href="{{ route('business.setup') }}" class="alert-link">Set up your business profile</a>
            </div>
        @endif

        <!-- Login Form -->
        <form id="loginForm" method="POST" action="{{ route('login') }}">
            @csrf
            <h3 class="text-center">Login</h3>
            <hr>
            <div class="mb-3">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <div class="text-center mt-2">
                <a href="#" id="showForgotPassword">Forgot Password?</a> | 
                <a href="#" id="showRegister">Register</a>
            </div>
        </form>

        <!-- Register Form -->
        <form id="registerForm" method="POST" action="{{ route('register.post') }}" class="d-none">
            @csrf
            <h3 class="text-center">Register</h3>
            <hr>
            <div class="mb-3">
                <label for="registerName" class="form-label">Full Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="registerName" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="registerEmail" class="form-label">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="registerEmail" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="registerPassword" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="registerPassword" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success w-100">Register</button>
            <div class="text-center mt-2">
                <a href="#" id="backToLoginFromRegister">Back to Login</a>
            </div>
        </form>

        <!-- Forgot Password Form -->
        <form id="forgotPasswordForm" method="POST" action="" class="d-none">
            @csrf
            <h3 class="text-center">Forgot Password</h3>
            <hr>
            <div class="mb-3">
                <label for="forgotEmail" class="form-label">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="forgotEmail" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-warning w-100">Reset Password</button>
            <div class="text-center mt-2">
                <a href="#" id="backToLoginFromForgot">Back to Login</a>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#showForgotPassword').click(function(e) {
            e.preventDefault();
            $('#loginForm').addClass('d-none');
            $('#forgotPasswordForm').removeClass('d-none');
        });

        $('#showRegister').click(function(e) {
            e.preventDefault();
            $('#loginForm').addClass('d-none');
            $('#registerForm').removeClass('d-none');
        });

        $('#backToLoginFromForgot, #backToLoginFromRegister').click(function(e) {
            e.preventDefault();
            $('#forgotPasswordForm, #registerForm').addClass('d-none');
            $('#loginForm').removeClass('d-none');
        });
    });
</script>
@endsection