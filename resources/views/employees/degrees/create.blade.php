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
                    <a class="nav-link active" href="#">الشهادات الجامعية</a>

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

            <form class="row g-3" action="{{ route('degrees.store') }}" method="POST">
                @csrf
                <div class="col-md-6">
                    <label class="form-label">الإسم</label>
                    <input type="text" class="form-control"
                        value="{{ $employees->firstname }} {{ $employees->secondname }} {{ $employees->thirdname }} {{ $employees->fourthname }}"
                        disabled>
                </div>

                <div class="col-md-6">
                    <input name="employee_id" type="hidden" class="form-control" value="{{ $employees->id }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">المؤهل العلمي</label>
                    <select name="qualification" class="form-select @error('qualification') is-invalid @enderror"
                        value="{{ old('qualification') }}">
                        <option selected disabled value="">Choose...</option>
                        <option value="باكلوريس" {{ old('qualification') == 'باكلوريس' ? 'selected' : '' }}>باكلوريس
                        </option>
                        <option value="دبلوم" {{ old('qualification') == 'دبلوم' ? 'selected' : '' }}>دبلوم
                        </option>
                    </select>
                    @error('qualification')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">التخصص</label>
                    <input name="specialty" type="text" class="form-control @error('specialty') is-invalid @enderror"
                        value="{{ $employees->specialty }}">
                    @error('specialty')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">الجامعة</label>
                    <select name="University" class="form-select @error('University') is-invalid @enderror"
                        value="{{ old('University') }}">
                        <option selected disabled value="">Choose...</option>
                        <option value="اسلامية" {{ old('University') == 'اسلامية' ? 'selected' : '' }}>اسلامية
                        </option>
                        <option value="الأزهر" {{ old('University') == 'الأزهر' ? 'selected' : '' }}>الأزهر</option>
                    </select>
                    @error('University')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">تاريخ التخصص</label>
                    <input name="specialty_date" type="date"
                        class="form-control @error('specialty_date') is-invalid @enderror"
                        value="{{ old('specialty_date') }}">
                    @error('specialty_date')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
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
