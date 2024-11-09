@extends('layouts.master')

@section('title', 'Login')

@section('content')

<div class="container mt-5" style="text-align: right">
    <h2 class="text-center mb-4">تسجيل الدخول</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">البريد الالكتروني</label>
            <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="password">كلمة السر</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-dark btn-block">تسجيل الدخول</button>
    </form>
</div>

@endsection
