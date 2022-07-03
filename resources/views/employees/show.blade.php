@extends('layouts.layout')

@php
$iDegree = 0;
$iCourse = 0;
$iExperience = 0;
$iFamily = 0;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>بيانات الموظف</title>
</head>

<body style="font-family: Cairo; direction: rtl;">
    <br>
    <div class="container">
        <div class="row">
            <h3>بيانات الموظف <span class="badge bg-secondary">{{ $employee->name }}</span></h3>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="btn btn-primary" href="{{ route('employees.index') }}">الموظفين</a>
            </div>
        </nav>
        <br>

        <div class="row">
            <div class="card" style="width: 50%">
                {{-- <img src="{{ URL::asset($employee->personal_image) }}" class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title">بيانات أساسية <span><a href="{{ route('employees.edit', $employee->id) }}"
                                class="btn btn-success btn-sm">تعديل</a></span></h5>
                    <div class="row">
                        <div class="col">
                            <p class="card-text">الأسم: <span class="fw-bolder"> {{ $employee->firstname }}
                                    {{ $employee->secondname }} {{ $employee->thirdname }}
                                    {{ $employee->fourthname }} </span></p>
                            <p class="card-text">رقم الهوية: <span class="fw-bolder">{{ $employee->IDnumber }}</span>
                            <p class="card-text">الجنس: <span class="fw-bolder">{{ $employee->gender }}</span>
                            <p class="card-text">الإيميل: <span class="fw-bolder">{{ $employee->email }}</span>
                            </p>
                        </div>
                        <div class="col">
                            <p class="card-text">رقم الجوال: <span class="fw-bolder">{{ $employee->phone }}</span>
                            </p>
                            <p class="card-text">الرقم الوظيفي: <span
                                    class="fw-bolder">{{ $employee->job_number }}</span>
                            </p>
                            <p class="card-text">الحالة الإجتماعية: <span
                                    class="fw-bolder">{{ $employee->status }}</span></p>
                            <p class="card-text">التخصص: <span class="fw-bolder">{{ $employee->specialty }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        @if ($message = Session::get('degreeedit'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">
            <div class="card" style="width: full">
                <div class="card-body">
                    <h5 class="card-title">المؤهلات
                        <span>
                            <a href="{{ route('degree.createone', $employee->id) }}"
                                class="btn btn-primary btn-sm">اضافة</a>
                        </span>

                    </h5>
                    <div class="row">
                        @if ($employee->degrees->isEmpty())
                            لا يوجد مؤهلات
                        @else
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">المؤهل</th>
                                        <th scope="col">التخصص</th>
                                        <th scope="col">الجامعة</th>
                                        <th scope="col">تاريخ التخصص</th>
                                        <th scope="col">#</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employee->degrees as $degree)
                                        <tr>
                                            <th scope="row">{{ ++$iDegree }}</th>
                                            <td>{{ $degree->qualification }}</td>
                                            <td>{{ $degree->specialty }}</td>
                                            <td>{{ $degree->University }}</td>
                                            <td>{{ $degree->specialty_date }}</td>
                                            <td><a href="{{ route('degrees.edit', $degree->id) }}"
                                                    class="btn btn-success btn-sm">تعديل</a></td>
                                            <td>
                                                <form action="{{ route('degrees.destroy', $degree->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" type="submit">حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <br>

        @if ($message = Session::get('courseedit'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">
            <div class="card" style="width: full">
                <div class="card-body">
                    <h5 class="card-title">دورات <span><a href="{{ route('course.createone', $employee->id) }}"
                                class="btn btn-primary btn-sm">اضافة</a></span></h5>
                    <div class="row">
                        @if ($employee->courses->isEmpty())
                            لا يوجد دورات
                        @else
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">اسم الدورة</th>
                                        <th scope="col">المكان</th>
                                        <th scope="col">تاريخ البداية</th>
                                        <th scope="col">تاريخ النهاية</th>
                                        <th scope="col">#</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employee->courses as $course)
                                        <tr>
                                            <th scope="row">{{ ++$iCourse }}</th>
                                            <td>{{ $course->course_name }}</td>
                                            <td>{{ $course->place }}</td>
                                            <td>{{ $course->start_date }}</td>
                                            <td>{{ $course->expiry_date }}</td>
                                            <td><a href="{{ route('courses.edit', $course->id) }}"
                                                    class="btn btn-success btn-sm">تعديل</a></td>
                                            <td>
                                                <form action="{{ route('courses.destroy', $course->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" type="submit">حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <br>


        @if ($message = Session::get('experienceedit'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">
            <div class="card" style="width: full">
                <div class="card-body">
                    <h5 class="card-title">خبرات <span><a href="{{ route('experience.createone', $employee->id) }}"
                                class="btn btn-primary btn-sm">اضافة</a></span></h5>
                    <div class="row">
                        @if ($employee->experiences->isEmpty())
                            لا يوجد خبرات
                        @else
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">مكان العمل</th>
                                        <th scope="col">المسمى الوظيفي</th>
                                        <th scope="col">الراتب</th>
                                        <th scope="col">تاريخ البداية</th>
                                        <th scope="col">تاريخ النهاية</th>
                                        <th scope="col">#</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employee->experiences as $experience)
                                        <tr>
                                            <th scope="row">{{ ++$iExperience }}</th>
                                            <td>{{ $experience->work_place }}</td>
                                            <td>{{ $experience->job_title }}</td>
                                            <td>{{ $experience->salary }}-{{ $experience->currency }}</td>
                                            <td>{{ $experience->start_date }}</td>
                                            <td>{{ $experience->expiry_date }}</td>
                                            <td><a href="{{ route('experiences.edit', $experience->id) }}"
                                                    class="btn btn-success btn-sm">تعديل</a></td>
                                            <td>
                                                <form action="{{ route('experiences.destroy', $experience->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" type="submit">حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <br>

        @if ($message = Session::get('familyedit'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">
            <div class="card" style="width: full">
                <div class="card-body">
                    <h5 class="card-title">بيانات العائلة <span><a
                                href="{{ route('family.createone', $employee->id) }}"
                                class="btn btn-primary btn-sm">اضافة</a></span></h5>
                    <div class="row">
                        @if ($employee->families->isEmpty())
                            لا يوجد عائلة
                        @else
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">الاسم</th>
                                        <th scope="col">رقم الهوية</th>
                                        <th scope="col">صلة القرابة</th>
                                        <th scope="col">تاريخ الميلاد</th>
                                        <th scope="col">الحالة الاجتماعية</th>
                                        <th scope="col">هل يدرس</th>
                                        <th scope="col">هل يعمل</th>
                                        <th scope="col">#</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employee->families as $family)
                                        <tr>
                                            <th scope="row">{{ ++$iFamily }}</th>
                                            <td>{{ $family->firstname }} {{ $family->secondname }}
                                                {{ $family->thirdname }} {{ $family->fourthname }}
                                            </td>
                                            <td>{{ $family->IDnumber }}</td>
                                            <td>{{ $family->relation }}</td>
                                            <td>{{ $family->date_of_birth }}</td>
                                            <td>{{ $family->status }}</td>
                                            <td>{{ $family->study }}</td>
                                            <td>{{ $family->work }}</td>
                                            <td><a href="{{ route('families.edit', $family->id) }}"
                                                    class="btn btn-success btn-sm">تعديل</a></td>
                                            <td>
                                                <form action="{{ route('families.destroy', $family->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" type="submit">حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>
