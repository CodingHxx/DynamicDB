@extends('layout')
@section('title', 'Login')
@section('content')

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-4 col-sm-12 text-white p-4 rounded bg-black bg-gradient shadow">
        <!-- Login Form -->
        <form id="loginForm" method="POST" action="{{ route('login.post') }}">
            @csrf
            <h3 class="text-center">Login</h3>
            <hr>
            <div class="mb-3">
                <label for="loginEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="loginEmail" required>
            </div>
            <div class="mb-3">
                <label for="loginPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="loginPassword" required>
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
                <input type="text" class="form-control" name="name" id="registerName" required>
            </div>
            <div class="mb-3">
                <label for="registerEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="registerEmail" required>
            </div>
            <div class="mb-3">
                <label for="registerPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="registerPassword" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Register</button>
            <div class="text-center mt-2">
                <a href="#" id="backToLoginFromRegister">Back to Login</a>
            </div>
        </form>

        <!-- Forgot Password Form (Optional - Needs backend implementation) -->
        <form id="forgotPasswordForm" method="POST" action="" class="d-none">
            @csrf
            <h3 class="text-center">Forgot Password</h3>
            <hr>
            <div class="mb-3">
                <label for="forgotEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="forgotEmail" required>
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