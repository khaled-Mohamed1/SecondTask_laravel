@extends('layouts.layout')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body style="font-family: Cairo; direction: rtl;">
    <br>
    <div class="container">
        <div class="row">
            <h3>صفحة الرئيسية</h3>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="btn btn-primary" href="{{ route('employees.index') }}">الموظفين</a>
                <a class="btn btn-success" href="{{ route('employees.create') }}">اضافة موظف</a>
            </div>
        </nav>

        <div class="row">
            @if ($employees->isEmpty())
                <div>
                    لا يوجد موظفين
                </div>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">رقم الهوية</th>
                            <th scope="col">الرقم الوظيفي</th>
                            <th scope="col">التخصص</th>
                            <th scope="col">الحالة الاجتماعية</th>
                            {{-- <th scope="col">المؤهل</th> --}}
                            <th scope="col">عرض</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($employees as $employee)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $employee->firstname }} {{ $employee->secondname }}
                                    {{ $employee->thirdname }} {{ $employee->fourthname }}
                                </td>
                                <td>{{ $employee->IDnumber }}</td>
                                <td>{{ $employee->job_number }}</td>
                                <td>{{ $employee->specialty }}</td>
                                <td>{{ $employee->status }}</td>
                                {{-- <td>{{ $employee->degrees->qualification }}</td> --}}
                                {{-- <td>
                                @if ($employee->degrees->isEmpty())
                                    -
                                @else
                                    @foreach ($employee->degrees as $degree)
                                        @if ($loop->first)
                                            {{ $degree->qualification }}
                                        @endif
                                    @endforeach
                                @endif
                            </td> --}}
                                <td>
                                    <a class="btn btn-success" href="{{ route('employees.show', $employee->id) }}"
                                        role="button">عرض</a>

                                </td>
                                <td>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>

    </div>

    {!! $employees->links() !!}

</body>

</html>
