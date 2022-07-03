<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\StoreFamilyRequest;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'Family';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all()->last();
        return view('employees.families.create', compact('employees'));
    }

    public function createfamily($id)
    {
        $employee = Employee::findorFail($id);
        return view('employees.families.createone', compact('employee'));
    }


    public function storefamily(StoreFamilyRequest $request, $id)
    {
        Family::create([
            'firstname' => $request->firstname,
            'secondname' => $request->secondname,
            'thirdname' => $request->thirdname,
            'fourthname' => $request->fourthname,
            'employee_id' => $request->employee_id,
            'IDnumber' => $request->IDnumber,
            'relation' => $request->relation,
            'date_of_birth' => $request->date_of_birth,
            'status' => $request->status,
            'study' => $request->study,
            'work' => $request->work,
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
    public function store(StoreFamilyRequest $request)
    {

        // $IDimage = $request->IDimage;
        // $newIDimage = time() . $IDimage->getClientOriginalName();
        // $IDimage->move('uploads/family', $newIDimage);

        Family::create([
            'firstname' => $request->firstname,
            'secondname' => $request->secondname,
            'thirdname' => $request->thirdname,
            'fourthname' => $request->fourthname,
            'employee_id' => $request->employee_id,
            'IDnumber' => $request->IDnumber,
            'relation' => $request->relation,
            'date_of_birth' => $request->date_of_birth,
            'status' => $request->status,
            'study' => $request->study,
            'work' => $request->work,
            // 'IDimage' => 'uploads/family' . $newIDimage,
        ]);

        // return redirect()->route('employees.index')->with('success', 'Employee Created Successfully');
        return redirect()->route('families.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function show(Family $family)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $family = Family::findorFail($id);
        return view('employees.families.edit', compact('family'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFamilyRequest $request, $id)
    {
        $family = Family::findorFail($id);
        $family->update([
            'firstname' => $request->firstname,
            'secondname' => $request->secondname,
            'thirdname' => $request->thirdname,
            'fourthname' => $request->fourthname,
            'employee_id' => $request->employee_id,
            'IDnumber' => $request->IDnumber,
            'relation' => $request->relation,
            'date_of_birth' => $request->date_of_birth,
            'status' => $request->status,
            'study' => $request->study,
            'work' => $request->work,
            // 'IDimage' => 'uploads/family' . $newIDimage,
        ]);
        return redirect()->route('employees.show', $family->employee_id)->with('familyedit', 'تم تعديل بيانات العائلة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Family::findorFail($id)->delete();
        return redirect()->back();
    }
}
