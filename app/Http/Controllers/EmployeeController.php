<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {

        $personal_image = $request->personal_image;
        $newPersonal_image = time() . $personal_image->getClientOriginalName();
        $personal_image->move('uploads/personal_Iamge', $newPersonal_image);

        $IDimage = $request->IDimage;
        $newIDimage = time() . $IDimage->getClientOriginalName();
        $IDimage->move('uploads/IDimage', $newIDimage);

        Employee::create([
            'firstname' => $request->firstname,
            'secondname' => $request->secondname,
            'thirdname' => $request->thirdname,
            'fourthname' => $request->fourthname,
            'IDnumber' => $request->IDnumber,
            'job_number' => $request->job_number,
            'specialty' => $request->specialty,
            'status' => $request->status,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'hiring_date' => $request->hiring_date,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'personal_image' => 'uploads/personal_Iamge/' . $newPersonal_image,
            'IDimage' => 'uploads/IDiamge/' . $newIDimage,
        ]);

        return redirect()->route('degrees.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::with('degrees', 'courses', 'experiences')->findorFail($id);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findorFail($id);
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployeeRequest $request, $id)
    {
        $employee = Employee::find($id);

        $input = $request->all();

        if ($personal_image = $request->file('personal_image')) {
            $destinationPath = 'uploads/personal_Iamge/';
            $newPersonal_image = time() . "." . $personal_image->getClientOriginalExtension();
            $personal_image->move($destinationPath, $newPersonal_image);
            $input['personal_image'] = 'uploads/personal_Iamge/' . $newPersonal_image;
        } else {
            unset($input['personal_image']);
        }

        if ($IDimage = $request->file('IDimage')) {
            $destinationPath = 'uploads/IDimage/';
            $newIDimage = time() . "." . $IDimage->getClientOriginalExtension();
            $IDimage->move($destinationPath, $newIDimage);
            $input['IDimage'] = 'uploads/IDimage/' . $newIDimage;
        } else {
            unset($input['IDimage']);
        }

        $employee->update($input);
        return redirect()->route('employees.show', $employee->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::findorFail($id)->delete();
        return redirect()->route('employees.index');
    }
}
