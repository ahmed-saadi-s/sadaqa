<!-- resources/views/zakat/index.blade.php -->
@extends('layouts.master')

@section('title', 'حساب الزكاة')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">احسب زكاتك الآن</h2>
                <form action="{{ route('calculate-zakat.calculate') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="wealth" class="form-label">إجمالي الثروة (بالدولار)</label>
                        <input type="number" name="wealth" id="wealth" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">احسب الزكاة</button>
                </form>

                @if(isset($zakat))
                    <div class="mt-4">
                        <h4 class="mb-3">الزكاة المستحقة</h4>
                        <p><strong>إجمالي الثروة:</strong> ${{ number_format($wealth, 2) }}</p>
                        <p><strong>الزكاة المستحقة:</strong> ${{ number_format($zakat, 2) }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
