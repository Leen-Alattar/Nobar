<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();

        return view('admin.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('admin.employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate incoming request

        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email?? null,
            'company' => $request->company?? null,
            'phone' => $request->phone?? null,
        ]);

        return redirect()
            ->route('employee.index')
            ->with('message', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $companies = Company::all();
        return view('admin.employee.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate incoming request

        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        // dd($request);
        Employee::where('id', '=', $id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email?? null,
            'company' => $request->company?? null,
            'phone' => $request->phone?? null,
        ]);

        return redirect()
            ->route('employee.index')
            ->with('message', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $employee = Employee::find($id);
        $employee->destroy($id);
        return redirect()
            ->route('employee.index')
            ->with('delete', 'Deleted Successfully');
    }
}
