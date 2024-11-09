@extends('layouts.master')
@section('title', 'Home')
@section('content')

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .sadaqa-container {
            direction: rtl;
            text-align: right;
            background-color: #f8f9fa;
            font-family: 'Tajawal', sans-serif;
            padding: 20px;
        }
        .sadaqa-container h2 {
            font-size: 1.8rem;
            color: #007bff;
            position: relative;
            display: inline-block;
            margin-bottom: 30px;
            padding-bottom: 10px;
        }
        .sadaqa-container h2::after {
            content: '';
            position: absolute;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 3px;
            background-color: #007bff;
        }
        .sadaqa-container .card img {
            height: 200px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }
        .sadaqa-container .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .sadaqa-container .card:hover {
            transform: scale(1.05);
        }
        .sadaqa-container .card-title {
            font-size: 1.4rem;
            font-weight: 700;
        }
        .sadaqa-container .card-text {
            font-size: 1rem;
            margin-bottom: 15px;
        }
        .sadaqa-container .btn {
            font-size: 1rem;
            padding: 10px 20px;
        }
        .sadaqa-container .join-section {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .sadaqa-container .join-section h2 {
            font-size: 1.6rem;
            color: #333;
        }
        .sadaqa-container .join-section ul {
            padding-left: 20px;
        }
        .sadaqa-container .join-section ul li {
            font-size: 1rem;
            margin-bottom: 10px;
        }
        .sadaqa-container .join-section a {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    @if (session('success'))
    <div class="alert alert-success" role="alert" dir="rtl" style="text-align: right">
        {{ session('success') }}
    </div>
@endif
<div class="container sadaqa-container">
    <div class="row">
        <div class="col-12">
            <h2>قائمة الجمعيات</h2>
        </div>
        <!-- بطاقة جمعية 1 -->
    
        @foreach ($randomCharities as $charity)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="{{ asset('images/' . $charity->image) }}" class="card-img-top" alt="{{ $charity->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $charity->name }}</h5>
                    <p class="card-text">{{ $charity->description }}</p>
                    <ul class="list-unstyled">
                        <li>نوع الصدقات: {{ $charity->type }}</li>
                        <li>الموقع: {{ $charity->location }}</li>
                    </ul>
                    <a href="" class="btn btn-primary">تبرع الان</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row mt-5">
        <div class="col-12 join-section">
            <h2>كيف تنضم كجمعية جديدة؟</h2>
            <p>إذا كنت ترغب في الانضمام إلى مشروعنا كجمعية جديدة، يرجى اتباع الخطوات التالية:</p>
            <ul>
                <li>الاتصال بنا عبر البريد الإلكتروني: <a href="mailto:info@sadaqa.com">admin@sadaqa.com</a></li>
                <li>تقديم معلومات حول جمعيتك وأهدافها.</li>
                <li>سنقوم بمراجعة طلبك والتواصل معك للحصول على المزيد من التفاصيل.</li>
            </ul>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 join-section">
            <h2>كيفية التبرع</h2>
            <p>يمكنك التبرع للجمعيات المختلفة عبر إتباع الخطوات التالية:</p>
            <ul>
                <li>اختر الجمعية التي ترغب في التبرع لها من خلال موقعنا.</li>
                <li>املأ معلومات التوصيل الخاصة بك (الاسم، رقم الهاتف، العنوان).</li>
                <li>سيقوم موظفنا بزيارة العنوان المذكور لاستلام المبلغ والتوصيل إلى الجمعية المختارة.</li>
            </ul>
            <a href="{{url('/associations')}}" class="btn btn-success">تبرع الآن</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>

@endsection
