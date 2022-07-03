@extends('layouts.layout')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>خبرات</title>
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
            <h1>إضافة خبرة</h1>
        </div>

        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-success">رجوع</a>
        <br>
        <br>

        <div class="row">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">الخبرات</a>
                </li>
            </ul>
        </div>

        <div class="row">

            <form class="row g-3" action="{{ route('experience.storeone', $employee->id) }}" method="POST">
                @csrf
                <div class="col-md-6">
                    <label class="form-label">الإسم</label>
                    <input type="text" class="form-control"
                        value="{{ $employee->firstname }} {{ $employee->secondname }} {{ $employee->thirdname }} {{ $employee->fourthname }}"
                        disabled>
                </div>

                <div class="col-md-6">
                    <input name="employee_id" type="hidden" class="form-control" value="{{ $employee->id }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">مكان العمل</label>
                    <input name="work_place" type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">المسمى الوظيفي</label>
                    <input name="job_title" type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">الراتب</label>
                    <input name="salary" type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">العملة</label>
                    <select name="currency" class="form-select">
                        <option selected disabled value="">Choose...</option>
                        <option value="شيكل">شيكل</option>
                        <option value="دولار">دولار</option>
                        <option value="دينار">دينار</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">تاريخ البداية</label>
                    <input name="start_date" type="date" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">تاريخ النهاية</label>
                    <input name="expiry_date" type="date" class="form-control" required>
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


    </div>

</body>


</html>
