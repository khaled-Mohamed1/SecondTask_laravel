<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\StoreExperienceRequest;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'Experience';
    }

    public function create()
    {
        $employees = Employee::all()->last();
        return view('employees.experiences.create', compact('employees'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createexperience($id)
    {
        $employee = Employee::findorFail($id);
        return view('employees.experiences.createone', compact('employee'));
    }

    public function storeexperience(StoreExperienceRequest $request, $id)
    {
        Experience::create([
            'employee_id' => $request->employee_id,
            'work_place' => $request->work_place,
            'job_title' => $request->job_title,
            'salary' => $request->salary,
            'currency' => $request->currency,
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
    public function store(StoreExperienceRequest $request)
    {
        Experience::create([
            'employee_id' => $request->employee_id,
            'work_place' => $request->work_place,
            'job_title' => $request->job_title,
            'salary' => $request->salary,
            'currency' => $request->currency,
            'start_date' => $request->start_date,
            'expiry_date' => $request->expiry_date,
            // 'details' => $request->details,
        ]);

        return redirect()->route('families.create');

        // return redirect()->route('employees.index')->with('success', 'Employee Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experience = Experience::findorFail($id);
        return view('employees.experiences.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(StoreExperienceRequest $request, $id)
    {
        $experience = Experience::findorFail($id);

        $experience->update([
            'employee_id' => $request->employee_id,
            'work_place' => $request->work_place,
            'job_title' => $request->job_title,
            'salary' => $request->salary,
            'currency' => $request->currency,
            'start_date' => $request->start_date,
            'expiry_date' => $request->expiry_date,
            // 'details' => $request->details,
        ]);
        return redirect()->route('employees.show', $experience->employee_id)->with('experienceedit', 'تم تعديل الخبرة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Experience::findorFail($id)->delete();
        return redirect()->back();
    }
}
