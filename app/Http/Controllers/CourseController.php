<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\StoreCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'course';
    }

    public function create()
    {
        $employees = Employee::all()->last();
        return view('employees.courses.create', compact('employees'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createcourse($id)
    {
        $employee = Employee::findorFail($id);
        return view('employees.courses.createone', compact('employee'));
    }

    public function storecourse(StoreCourseRequest $request, $id)
    {
        Course::create([
            'employee_id' => $request->employee_id,
            'course_name' => $request->course_name,
            'place' => $request->place,
            'start_date' => $request->start_date,
            'expiry_date' => $request->expiry_date,
            // 'details' => $request->details,
        ]);
        return redirect()->route('employees.show', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        Course::create([
            'employee_id' => $request->employee_id,
            'course_name' => $request->course_name,
            'place' => $request->place,
            'start_date' => $request->start_date,
            'expiry_date' => $request->expiry_date,
            // 'details' => $request->details,
        ]);

        return redirect()->route('experiences.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findorFail($id);
        return view('employees.Courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCourseRequest $request, $id)
    {
        $course = Course::findorFail($id);
        $course->update([
            'employee_id' => $request->employee_id,
            'course_name' => $request->course_name,
            'place' => $request->place,
            'specialty_date' => $request->specialty_date,
            'expiry_date' => $request->expiry_date,

            // 'details' => $request->details,
        ]);
        return redirect()->route('employees.show', $course->employee_id)->with('courseedit', 'تم تعديل الدورة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::findorFail($id)->delete();
        return redirect()->back();
    }
}
