@extends('layouts.layout')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>البيانات الأساسية</title>
</head>
<style>
    body {
        font-family: Cairo;
        direction: rtl;
    }
</style>

<body style="font-family: Cairo;">

    <div class="container">
        <br>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="btn btn-primary" href="{{ route('employees.index') }}">الموظفين</a>
            </div>
        </nav>

        <br>

        <div class="row">
            <h1>إضافة موظف</h1>
        </div>
        <br>
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link " href="#">البيانات الأساسية</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">الشهادات الجامعية</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">الدورات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">الخبرات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">البيانات العائلية</a>
                </li>
            </ul>
        </div>


        <div class="row">

            <form class="row g-3" action="{{ route('courses.store') }}" method="POST">
                @csrf

                <div class="col-md-6">
                    <label class="form-label">الإسم</label>
                    <input type="text" class="form-control" value="{{ $employees->firstname }} {{ $employees->secondname }} {{ $employees->thirdname }} {{ $employees->fourthname }}" disabled>
                </div>

                <div class="col-md-6">
                    <input name="employee_id" type="hidden" class="form-control" value="{{ $employees->id }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">اسم الدورة</label>
                    <input name="course_name" type="text"
                        class="form-control @error('course_name') is-invalid @enderror"
                        value="{{ old('course_name') }}">
                    @error('course_name')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">المكان</label>
                    <input name="place" type="text" class="form-control @error('place') is-invalid @enderror"
                        value="{{ old('place') }}">
                    @error('place')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">تاريخ البداية</label>
                    <input name="start_date" type="date"
                        class="form-control @error('start_date') is-invalid @enderror"
                        value="{{ old('start_date') }}">
                    @error('start_date')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">تاريخ النهاية</label>
                    <input name="expiry_date" type="date"
                        class="form-control @error('expiry_date') is-invalid @enderror"
                        value="{{ old('expiry_date') }}">
                    @error('expiry_date')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                {{-- <div class="col-md-12">
                    <label class="form-label">تفاصيل</label>
                    <textarea name="details" form="usrform" class="form-control">تفاصيل...</textarea>
                </div> --}}

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">حفظ بيانات</button>
                </div>
            </form>

        </div>


    </div>

</body>


</html>
