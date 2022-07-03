@extends('layouts.layout')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>الشهادات الجامعية</title>
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
            <h1>تعديل بيانات الموظف</h1>
        </div>
        <a href="{{ route('employees.show', $degree->EmployeeDegree->id) }}" class="btn btn-success">رجوع</a>
        <br>
        <br>
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <h6 class="nav-link active">الشهادات الجامعية</h6>
                </li>
            </ul>
        </div>

        <div class="row">

            <form class="row g-3" action="{{ route('degrees.update', $degree->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <label class="form-label">الإسم</label>
                    <input type="text" class="form-control" value="{{ $degree->EmployeeDegree->firstname }} {{ $degree->EmployeeDegree->secondname }} {{ $degree->EmployeeDegree->thirdname }} {{ $degree->EmployeeDegree->fourthname }}" disabled>
                </div>

                <div class="col-md-6">
                    <input name="employee_id" type="hidden" value="{{ $degree->EmployeeDegree->id }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">المؤهل العلمي</label>
                    <select name="qualification" class="form-select">
                        <option {{ $degree->qualification == 'باكلوريس' ? 'selected' : '' }} value="باكلوريس">باكلوريس
                        </option>
                        <option {{ $degree->qualification == 'دبلوم' ? 'selected' : '' }} value="دبلوم">دبلوم
                        </option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">التخصص</label>
                    <input name="specialty" type="text" class="form-control" value="{{ $degree->specialty }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">الجامعة</label>
                    <select name="University" class="form-select">
                        <option {{ $degree->University == 'اسلامية' ? 'selected' : '' }} value="اسلامية">اسلامية
                        </option>
                        <option {{ $degree->University == 'الأزهر' ? 'selected' : '' }} value="الأزهر">الأزهر
                        </option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">تاريخ التخصص</label>
                    <input name="specialty_date" type="date" class="form-control"
                        value="{{ $degree->specialty_date }}">
                </div>
                {{-- <div class="col-md-12">
                    <label class="form-label">تفاصيل</label>
                    <textarea name="details" form="usrform" class="form-control"></textarea>
                </div> --}}
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">حفظ بيانات</button>
                </div>
            </form>

        </div>

</body>


</html>
