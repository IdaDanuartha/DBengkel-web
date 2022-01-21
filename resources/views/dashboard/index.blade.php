@extends('dashboard.layouts.main')

@section('content') 
    <h1 style="margin: 50px auto; text-align: center;">Welcome Back, {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h1>
@endsection