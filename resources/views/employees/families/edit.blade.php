@extends('layouts.layout')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>بيانات عائلية</title>
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
            <h1>تعديل بيانات عائلة</h1>
        </div>
        <br>
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">البيانات العائلية</a>
                </li>
            </ul>
        </div>

        <a href="{{ route('employees.show', $family->EmployeeFamily->id) }}" class="btn btn-success">رجوع</a>
        <br>
        <br>

        <div class="row">

            <form class="row g-3" action="{{ route('families.update', $family->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <label class="form-label">الإسم</label>
                    <input type="text" class="form-control"
                        value="{{ $family->EmployeeFamily->firstname }} {{ $family->EmployeeFamily->secondname }} {{ $family->EmployeeFamily->thirdname }} {{ $family->EmployeeFamily->fourthname }}"
                        disabled>
                </div>

                <div class="col-md-6">
                    <input name="employee_id" type="hidden" class="form-control"
                        value="{{ $family->EmployeeFamily->id }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">الاسم الأول</label>
                    <input name="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror"
                        value="{{ $family->firstname }}">
                    @error('firstname')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label">الاسم الثاني</label>
                    <input name="secondname" type="text"
                        class="form-control @error('secondname') is-invalid @enderror"
                        value="{{ $family->secondname }}">
                    @error('secondname')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label">الاسم الثالث</label>
                    <input name="thirdname" type="text" class="form-control @error('thirdname') is-invalid @enderror"
                        value="{{ $family->thirdname }}">
                    @error('thirdname')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label">الاسم الرابع</label>
                    <input name="fourthname" type="text"
                        class="form-control @error('fourthname') is-invalid @enderror"
                        value="{{ $family->fourthname }}">
                    @error('fourthname')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">رقم الهوية</label>
                    <input name="IDnumber" type="text" class="form-control @error('IDnumber') is-invalid @enderror"
                        value="{{ $family->IDnumber }}">
                    @error('IDnumber')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">صلة القرابة</label>
                    <select name="relation" class="form-select @error('relation') is-invalid @enderror">
                        <option selected disabled value="">Choose...</option>
                        <option value="زوجة" {{ $family->relation == 'زوجة' ? 'selected' : '' }}>زوجة
                        </option>
                        <option value="ابن" {{ $family->relation == 'ابن' ? 'selected' : '' }}>ابن
                        </option>
                        <option value="ابنة" {{ $family->relation == 'ابنة' ? 'selected' : '' }}>ابنة
                        </option>
                    </select>
                    @error('relation')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">تاريخ الميلاد</label>
                    <input name="date_of_birth" type="date"
                        class="form-control @error('date_of_birth') is-invalid @enderror"
                        value="{{ $family->date_of_birth }}">
                    @error('date_of_birth')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">الحالة الاجتماعية</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                        <option value="اعزب" {{ $family->status == 'اعزب' ? 'selected' : '' }}>اعزب</option>
                        <option value="متزوج" {{ $family->status == 'متزوج' ? 'selected' : '' }}>متزوج</option>
                        <option value="مطلق" {{ $family->status == 'مطلق' ? 'selected' : '' }}>مطلق</option>
                    </select>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">هل يدرس</label>
                    <select name="study" class="form-select @error('study') is-invalid @enderror">
                        <option value="طالب مدرسي" {{ $family->study == 'طالب مدرسي' ? 'selected' : '' }}>طالب مدرسي
                        </option>
                        <option value="طالب جامعي" {{ $family->study == 'طالب جامعي' ? 'selected' : '' }}>طالب جامعي
                        </option>
                        <option value="خريج" {{ $family->study == 'خريج' ? 'selected' : '' }}>خريج
                        </option>
                        <option value="دراسات عليا" {{ $family->study == 'دراسات عليا' ? 'selected' : '' }}>دراسات
                            عليا
                        </option>
                        <option value="لا يدرس" {{ $family->study == 'لا يدرس' ? 'selected' : '' }}>لا يدرس
                        </option>
                    </select>
                    @error('study')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">هل يعمل</label>
                    <select name="work" class="form-select @error('work') is-invalid @enderror">
                        <option value="عمل خاص" {{ $family->work == 'عمل خاص' ? 'selected' : '' }}>عمل خاص</option>
                        <option value="عمل لدى شركة" {{ $family->work == 'عمل لدى شركة' ? 'selected' : '' }}>عمل لدى
                            شركة</option>
                        <option value="لا يعمل" {{ $family->work == 'لا يعمل' ? 'selected' : '' }}>لا يعمل</option>
                    </select>
                    @error('work')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                {{-- <div class="col-md-12">
                    <label class="form-label">الصورة الهوية</label>
                    <input name="IDimage" type="file"
                        class="form-control @error('IDimage') is-invalid @enderror">
                    @error('IDimage')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div> --}}

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">حفظ بيانات</button>
                </div>
            </form>
        </div>

        <br>


    </div>

</body>


</html>
