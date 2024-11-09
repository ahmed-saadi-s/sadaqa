@extends('layouts.master')
@section('title', 'معلومات التبرع')
@section('content')
    <section class="donate-details" dir="rtl" style="text-align: right">
        <div class="container">
            <h1>معلومات التبرع</h1>
            <form action="{{ route('donations.store') }}" method="POST">
                @csrf
                <input type="hidden" name="charity_id" value="{{ $charity->id }}">
                <div class="form-group">
                    <label for="amount">المبلغ</label>
                    <input type="number" name="amount" id="amount" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="recipient_name">اسم المتبرع</label>
                    <input type="text" name="recipient_name" id="recipient_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="recipient_phone">رقم هاتف المتبرع</label>
                    <input type="text" name="recipient_phone" id="recipient_phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="province">المحافظة</label>
                    <select name="city" id="city" class="form-control" required>
                        <option value="دمشق">دمشق</option>
                        <option value="ريف دمشق">ريف دمشق</option>
                        <option value="حلب">حلب</option>
                        <option value="حمص">حمص</option>
                        <option value="حماة">حماة</option>
                        <option value="اللاذقية">اللاذقية</option>
                        <option value="طرطوس">طرطوس</option>
                        <option value="إدلب">إدلب</option>
                        <option value="درعا">درعا</option>
                        <option value="السويداء">السويداء</option>
                        <option value="دير الزور">دير الزور</option>
                        <option value="الرقة">الرقة</option>
                        <option value="الحسكة">الحسكة</option>
                        <option value="القنيطرة">القنيطرة</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="recipient_address">عنوان المتبرع</label>
                    <input type="text" name="recipient_address" id="recipient_address" class="form-control" required>
                </div>
               
                <button type="submit" class="btn btn-success">تبرع الآن</button>
            </form>
        </div>
    </section>
@endsection
