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
                    <a class="nav-link" href="#">الشهادات الجامعية</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">الدورات</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">الخبرات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">البيانات العائلية</a>
                </li>
            </ul>
        </div>

        <div class="row">

            <form class="row g-3" action="{{ route('families.store') }}" method="POST">
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

                <div class="col-md-6">
                    <label class="form-label">رقم الهوية</label>
                    <input name="IDnumber" type="text" class="form-control @error('IDnumber') is-invalid @enderror"
                        value="{{ old('IDnumber') }}">
                    @error('IDnumber')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">صلة القرابة</label>
                    <select name="relation" class="form-select @error('relation') is-invalid @enderror"
                        value="{{ old('relation') }}">
                        <option selected disabled value="">Choose...</option>
                        <option value="زوجة" {{ old('relation') == 'زوجة' ? 'selected' : '' }}>زوجة
                        </option>
                        <option value="ابن" {{ old('relation') == 'ابن' ? 'selected' : '' }}>ابن
                        </option>
                        <option value="ابنة" {{ old('relation') == 'ابنة' ? 'selected' : '' }}>ابنة
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
                        value="{{ old('date_of_birth') }}">
                    @error('date_of_birth')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-6">
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

                <div class="col-md-6">
                    <label class="form-label">هل يدرس</label>
                    <select name="study" class="form-select @error('study') is-invalid @enderror">
                        <option selected disabled value="">Choose...</option>
                        <option value="طالب مدرسي" {{ old('study') == 'طالب مدرسي' ? 'selected' : '' }}>طالب مدرسي
                        </option>
                        <option value="طالب جامعي" {{ old('study') == 'طالب جامعي' ? 'selected' : '' }}>طالب جامعي
                        </option>
                        <option value="خريج" {{ old('study') == 'خريج' ? 'selected' : '' }}>خريج
                        </option>
                        <option value="دراسات عليا" {{ old('study') == 'دراسات عليا' ? 'selected' : '' }}>دراسات
                            عليا
                        </option>
                        <option value="لا يدرس" {{ old('study') == 'لا يدرس' ? 'selected' : '' }}>لا يدرس
                        </option>
                    </select>
                    @error('study')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">هل يعمل</label>
                    <select name="work" class="form-select @error('work') is-invalid @enderror">
                        <option selected disabled value="">Choose...</option>
                        <option value="عمل خاص" {{ old('work') == 'عمل خاص' ? 'selected' : '' }}>عمل خاص</option>
                        <option value="عمل لدى شركة" {{ old('work') == 'عمل لدى شركة' ? 'selected' : '' }}>عمل لدى
                            شركة</option>
                        <option value="لا يعمل" {{ old('work') == 'لا يعمل' ? 'selected' : '' }}>لا يعمل</option>
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

        <div class="row">
            @if ($employees->families->isEmpty())
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">رقم الهوية</th>
                            <th scope="col">صلة القرابة</th>
                            <th scope="col">تاريخ الميلاد</th>
                            <th scope="col">الحالة الاجتماعية</th>
                            <th scope="col">هل يدرس</th>
                            <th scope="col">هل يعمل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($employees->families as $family)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $family->firstname }} {{ $family->secondname }}
                                    {{ $family->thirdname }} {{ $family->fourthname }}
                                </td>
                                <td>{{ $family->IDnumber }}</td>
                                <td>{{ $family->relation }}</td>
                                <td>{{ $family->date_of_birth }}</td>
                                <td>{{ $family->status }}</td>
                                <td>{{ $family->study }}</td>
                                <td>{{ $family->work }}</td>
                            </tr>
                        @endforeach
                    </tbody>
            @endif
        </div>
    </div>

</body>


</html>
