@extends('auth.layouts.AuthMain')

@section('content')
    <div class="text-center">
    <h1 class="h3 my-light-dark-text mb-4" style="font-weight: 700;">REGISTER FORM</h1>
    </div>

    <form action="/register" method="post" class="login-form" onsubmit="submitForm('Creating')">
    @csrf
    <div class="row row-cols-lg-2 row-cols-md-2 row-cols-1 mx-1">
        <div class="form-group mb-3">
            <input type="text" class="@error('first_name')is-invalid @enderror" id="first_name" name="first_name" required autocomplete="off" value="{{ old('first_name') }}">
            <span></span>
            <label for="first_name" class="my-light-dark-text"><i class="fas fa-user me-1"></i> First Name</label>
            @error('first_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <input type="text" class="@error('last_name')is-invalid @enderror" id="last_name" name="last_name" required autocomplete="off" value="{{ old('last_name') }}">
            <span></span>
            <label for="last_name" class="my-light-dark-text"><i class="fas fa-user me-1"></i> Last Name</label>
            @error('last_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>  
    <div class="form-group mb-3">
        <input type="text" id="email" class="@error('email')is-invalid @enderror" name="email" required autocomplete="off" value="{{ old('email') }}">
        <span></span>
        <label for="email" class="my-light-dark-text"><i class="fas fa-envelope me-1"></i> Email Address</label>
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="row row-cols-lg-2 row-cols-md-2 row-cols-1 mx-1">
    <div class="form-group password-container mb-3">
        <input class="form-password @error('password')is-invalid @enderror" type="password" id="password" name="password" required>   
        <span></span>
        <label for="password" class="my-light-dark-text"><i class="fas fa-lock me-1"></i> Password</label>
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group password-container mb-3">
        <input class="form-password @error('confirm_password')is-invalid @enderror" type="password" id="confirm_password" required name="confirm_password">   
        <span></span>
        <label for="confirm_password" class="my-light-dark-text"><i class="fas fa-lock me-1"></i> Confirm Password</label>
        @error('confirm-password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    </div>
    <div class="mt-2">
        <input type="checkbox" class="form-checkbox mr-1" id="show-pass">
        <label class="inline-block my-light-dark-text" for="show-pass">
          Show Password
        </label>
    </div>
    {{-- <div class="toggle toggle-show" onclick="showHide()">
        <i class="bi bi-eye-fill my-light-dark-text"></i>
    </div>
    <div class="toggle toggle-hide d-none" onclick="showHide()">
        <i class="bi bi-eye-slash-fill my-light-dark-text"></i>
    </div> --}}
    <button type="submit" class="rounded-pill btn-submit" name="register">
        Create New Account
    </button>
    </form>
    <hr>
    <div class="text-div d-flex justify-content-between">
        <a href="/"><i class="bi bi-arrow-left"></i> Back to Home</a>
        <span class="small me-1 my-light-dark-text">Already Have an Account? <a href="/login">Sign In</a></span>
    </div>
    
@endsection
    