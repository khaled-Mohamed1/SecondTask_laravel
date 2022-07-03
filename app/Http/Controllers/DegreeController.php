<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UniversityDegree;
use App\Http\Requests\StoreUniversityDegreeRequest;
use App\Models\Employee;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'degree';
    }

    public function create()
    {
        $employees = Employee::all()->last();
        return view('employees.degrees.create', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createdegree($id)
    {
        $employee = Employee::findorFail($id);
        return view('employees.degrees.createone', compact('employee'));
    }

    public function storedegree(StoreUniversityDegreeRequest $request, $id)
    {

        UniversityDegree::create([
            'employee_id' => $request->employee_id,
            'qualification' => $request->qualification,
            'specialty' => $request->specialty,
            'University' => $request->University,
            'specialty_date' => $request->specialty_date,
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
    public function store(StoreUniversityDegreeRequest $request)
    {
        UniversityDegree::create([
            'employee_id' => $request->employee_id,
            'qualification' => $request->qualification,
            'specialty' => $request->specialty,
            'University' => $request->University,
            'specialty_date' => $request->specialty_date,
            // 'details' => $request->details,
        ]);

        return redirect()->route('courses.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $degree = UniversityDegree::findorFail($id);
        return view('employees.degrees.edit', compact('degree'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUniversityDegreeRequest $request, $id)
    {

        $degree = UniversityDegree::findorFail($id);
        $degree->update([
            'employee_id' => $request->employee_id,
            'qualification' => $request->qualification,
            'specialty' => $request->specialty,
            'University' => $request->University,
            'specialty_date' => $request->specialty_date,
            // 'details' => $request->details,
        ]);

        return redirect()->route('employees.show', $degree->employee_id)->with('degreeedit', 'تم تعديل المؤهل');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UniversityDegree::findorFail($id)->delete();
        return redirect()->back();
    }
}
