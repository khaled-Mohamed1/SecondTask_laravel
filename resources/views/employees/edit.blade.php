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
            <h1>تعديل بيانات الموظف</h1>
        </div>
        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-success">رجوع</a>
        <br>
        <br>
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <h6 class="nav-link active">البيانات الأساسية</h6>
                </li>
            </ul>
        </div>

        <div class="row">
            <form class="row g-3 input-group" id="form-1" action="{{ route('employees.update', $employee->id) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-md-3">
                    <label class="form-label">الاسم الأول</label>
                    <input name="firstname" type="text" class="form-control" value="{{ $employee->firstname }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">الاسم الثاني</label>
                    <input name="secondname" type="text" class="form-control" value="{{ $employee->secondname }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">الاسم الثالث</label>
                    <input name="thirdname" type="text" class="form-control" value="{{ $employee->thirdname }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">الاسم الرابع</label>
                    <input name="fourthname" type="text" class="form-control" value="{{ $employee->fourthname }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">رقم الهوية</label>
                    <input name="IDnumber" type="text" class="form-control" value="{{ $employee->IDnumber }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">الرقم الوظيفي</label>
                    <input name="job_number" type="text" class="form-control" value="{{ $employee->job_number }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">التخصص</label>
                    <input name="specialty" type="text" class="form-control" value="{{ $employee->specialty }}">

                </div>

                <div class="col-md-4">
                    <label class="form-label">الحالة الاجتماعية</label>
                    <select name="status" class="form-select">
                        <option {{ $employee->status == 'اعزب' ? 'selected' : '' }} value="اعزب">اعزب</option>
                        <option {{ $employee->status == 'متزوج' ? 'selected' : '' }} value="متزوج">متزوج</option>
                        <option {{ $employee->status == 'مطلق' ? 'selected' : '' }} value="مطلق">مطلق</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">الجنس</label>
                    <select name="gender" class="form-select">
                        <option {{ $employee->gender == 'ذكر' ? 'selected' : '' }} value="ذكر">ذكر</option>
                        <option {{ $employee->gender == 'انثى' ? 'selected' : '' }} value="انثى">انثى</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">الجوال</label>
                    <input name="phone" type="text" class="form-control" value="{{ $employee->phone }}">

                </div>

                <div class="col-md-4">
                    <label class="form-label">الهاتف</label>
                    <input name="telephone" type="text" class="form-control" value="{{ $employee->telephone }}">

                </div>

                <div class="col-md-4">
                    <label class="form-label">الايميل</label>
                    <input name="email" type="email" class="form-control" value="{{ $employee->email }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">العنوان</label>
                    <input name="address" type="text" class="form-control" value="{{ $employee->address }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">تاريخ التعيين</label>
                    <input name="hiring_date" type="date" class="form-control"
                        value="{{ $employee->hiring_date }}">

                </div>

                <div class="col-md-6">
                    <label class="form-label">تاريخ الميلاد</label>
                    <input name="date_of_birth" type="date" class="form-control"
                        value="{{ $employee->date_of_birth }}">

                </div>

                <div class="col-md-6">
                    <label class="form-label">الصورة الشخصية </label>
                    <input name="personal_image" type="file" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">الصورة الهوية</label>
                    <input name="IDimage" type="file" class="form-control">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">تعديل</button>
                </div>

            </form>

        </div>
        <br>
</body>



</html>
