@extends('auth.layouts.AuthMain')

@section('content')
    <div class="text-center">
    <h1 class="h3 my-light-dark-text mb-4" style="font-weight: 700;">REGISTER FORM</h1>
    </div>

    <form action="/register" method="post" class="login-form">
    @csrf
    <div class="row row-cols-lg-2 row-cols-md-2 row-cols-1 mx-1">
        <div class="form-group mb-3">
            <input class="@error('first_name')is-invalid @enderror" type="text" id="first_name" name="first_name" autocomplete="off" value="{{ old('first_name') }}" required>
            <span></span>
            <label for="first_name" class="my-light-dark-text"><i class="fas fa-user me-1"></i> First Name</label>
            @error('first_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <input class="@error('last_name')is-invalid @enderror" type="text" id="last_name" name="last_name" autocomplete="off" value="{{ old('last_name') }}" required>
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
        <input class="@error('email')is-invalid @enderror"" type="text" id="email" name="email" autocomplete="off" required value="{{ old('email') }}">
        <span></span>
        <label for="email" class="my-light-dark-text"><i class="fas fa-envelope me-1"></i> Email Address</label>
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <input class="@error('password')is-invalid @enderror"" type="password" id="password" name="password" autocomplete="off" required>   
        <span></span>
        <label for="password" class="my-light-dark-text"><i class="fas fa-lock me-1"></i> Password</label>

        <div class="toggle toggle-show" onclick="showHide()">
            <i class="bi bi-eye-fill my-light-dark-text"></i>
        </div>
        <div class="toggle toggle-hide d-none" onclick="showHide()">
            <i class="bi bi-eye-slash-fill my-light-dark-text"></i>
        </div>
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="rounded-pill" name="register">
        Register
    </button>
    </form>
    <hr>
    <div class="text-div d-flex justify-content-between">
        <a href="/"><i class="bi bi-arrow-left"></i> Back to Home</a>
        <span class="small me-1 my-light-dark-text">Already Have an Account? <a href="/login">Sign Up</a></span>
    </div>
    
@endsection
    