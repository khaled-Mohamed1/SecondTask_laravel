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
                {{-- <a class="btn btn-success" href="{{ route('employees.create') }}">اضافة موظف</a> --}}
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
                    <a class="nav-link active" href="#">البيانات الأساسية</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">الشهادات الجامعية</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">الدورات</a>

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
            <form class="row g-3 input-group" id="form-1" action="{{ route('employees.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="col-md-3">
                    <label class="form-label">الاسم الأول</label>
                    <input name="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror"
                        value="{{ old('firstname') }}">
                    @error('firstname')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label">الاسم الثاني</label>
                    <input name="secondname" type="text"
                        class="form-control @error('secondname') is-invalid @enderror"
                        value="{{ old('secondname') }}">
                    @error('secondname')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label">الاسم الثالث</label>
                    <input name="thirdname" type="text" class="form-control @error('thirdname') is-invalid @enderror"
                        value="{{ old('thirdname') }}">
                    @error('thirdname')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label">الاسم الرابع</label>
                    <input name="fourthname" type="text"
                        class="form-control @error('fourthname') is-invalid @enderror"
                        value="{{ old('fourthname') }}">
                    @error('fourthname')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">رقم الهوية</label>
                    <input name="IDnumber" type="text" class="form-control @error('IDnumber') is-invalid @enderror"
                        value="{{ old('IDnumber') }}">
                    @error('IDnumber')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">الرقم الوظيفي</label>
                    <input name="job_number" type="text"
                        class="form-control @error('job_number') is-invalid @enderror"
                        value="{{ old('job_number') }}">
                    @error('job_number')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">التخصص</label>
                    <input name="specialty" type="text" class="form-control @error('specialty') is-invalid @enderror"
                        value="{{ old('specialty') }}">
                    @error('specialty')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>
                
                <div class="col-md-4">
                    <label class="form-label">الحالة الاجتماعية</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                        <option selected disabled value="">Choose...</option>
                        <option value="اعزب" {{ old('status') == 'اعزب' ? 'selected' : '' }}>اعزب</option>
                        <option value="متزوج" {{ old('status') == 'متزوج' ? 'selected' : '' }}>متزوج</option>
                        <option value="مطلق" {{ old('status') == 'مطلق' ? 'selected' : '' }}>مطلق</option>
                    </select>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">الجنس</label>
                    <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                        <option selected disabled value="">Choose...</option>
                        <option value="ذكر" {{ old('gender') == 'ذكر' ? 'selected' : '' }}>ذكر</option>
                        <option value="انثى" {{ old('gender') == 'انثى' ? 'selected' : '' }}>انثى</option>
                    </select>
                    @error('gender')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">الجوال</label>
                    <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone') }}">
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">الهاتف</label>
                    <input name="telephone" type="text"
                        class="form-control @error('telephone') is-invalid @enderror"
                        value="{{ old('telephone') }}">
                    @error('telephone')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">الايميل</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">العنوان</label>
                    <input name="address" type="text" class="form-control @error('address') is-invalid @enderror"
                        value="{{ old('address') }}">
                    @error('address')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">تاريخ التعيين</label>
                    <input name="hiring_date" type="date"
                        class="form-control @error('hiring_date') is-invalid @enderror"
                        value="{{ old('hiring_date') }}">
                    @error('hiring_date')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">تاريخ الميلاد</label>
                    <input name="date_of_birth" type="date"
                        class="form-control @error('date_of_birth') is-invalid @enderror"
                        value="{{ old('date_of_birth') }}">
                    @error('date_of_birth')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">الصورة الشخصية </label>
                    <input name="personal_image" type="file"
                        class="form-control @error('personal_image') is-invalid @enderror">
                    @error('personal_image')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label class="form-label">الصورة الهوية</label>
                    <input name="IDimage" type="file"
                        class="form-control @error('IDimage') is-invalid @enderror">
                    @error('IDimage')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">حفظ بيانات</button>
                </div>
            </form>

        </div>
        <br>
    </div>
</body>


</html>
