@extends('auth.layouts.AuthMain')

@section('content')

    <div class="text-center">
        <h1 class="h3 mb-4 my-light-dark-text" style="font-weight: 700;">LOGIN FORM</h1>
    </div>

    @if (session()->has('success'))
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
    </svg>
        <div class="alert alert-success d-flex align-items-center p-3" role="alert" style="margin-top: -10px;">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
            {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session()->has('loginFailed'))
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
    </svg>
    <div class="alert alert-danger d-flex align-items-center" role="alert" style="margin-top: -10px;">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
            {{ session('loginFailed') }}
        </div>
        </div>    
    @endif

    <form action="/login" method="post" class="login-form">
        @csrf
        <div class="form-group mb-3">
            <input type="text" class="@error('email')is-invalid @enderror" id="email" name="email" autocomplete="off" required autofocus value="{{ old('email') }}">
            <span></span>
            <label for="email" class="my-light-dark-text"><i class="fas fa-envelope"></i> Email Address</label>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-1">
            <input type="password" class="btn-password form-password" id="password" name="password" autocomplete="off" required>   
            <span></span>
            <label for="password" class="my-light-dark-text"><i class="fas fa-lock"></i> Password</label>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="flex justify-between mt-3">
            <div>
                <input type="checkbox" class="form-checkbox mr-1" id="show-pass">
                <label class="inline-block my-light-dark-text" for="show-pass">
                Show Password
                </label>
            </div>
            <div class="text-div d-flex justify-content-end">
                <a class="small" href="#">Forgot Password?</a>
            </div>
        </div>

        <button type="submit" class="rounded-pill" name="login">
            Sign In
        </button>
    </form>
    <hr>
    <div class="text-div d-flex justify-content-between">
        <a href="/"><i class="bi bi-arrow-left"></i> Back to Home</a>
        <span class="small me-1 my-light-dark-text">Not Registered? <a href="/register">Create an Account</a></span>
    </div>

@endsection


                            