@extends('layouts.master')

@section('title', 'Register')

@section('content')

<div class="container mt-5" style="text-align: right">
    <h2 class="text-center mb-4">التسجيل</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name">الاسم الاول</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required value="{{ old('first_name') }}">
        </div>
        <div class="form-group">
            <label for="last_name">الاسم الاخير</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required value="{{ old('last_name') }}">
        </div>
        <div class="form-group">
            <label for="age">العمر</label>
            <input type="number" class="form-control" id="age" name="age" required value="{{ old('age') }}">
        </div>
        <div class="form-group">
            <label for="gender">الجنس</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nationality">الجنسية</label>
            <input type="text" class="form-control" id="nationality" name="nationality" required value="{{ old('nationality') }}">
        </div>
        <div class="form-group">
            <label for="residence">مكان السكن</label>
            <input type="text" class="form-control" id="residence" name="residence" required value="{{ old('residence') }}">
        </div>
        <div class="form-group">
            <label for="email">البريد الالكتروني</label>
            <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="password">كلمة السر</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">تأكيد كلمة السر</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
        <button type="submit" class="btn btn-dark btn-block">التسجيل</button>
    </form>
</div>

@endsection
