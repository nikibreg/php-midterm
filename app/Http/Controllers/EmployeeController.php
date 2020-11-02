<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'asc')->get();
        return view('employee_list', [
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $employee = Employee::findOrFail($id);
            return view('edit', [
                'employee' => $employee
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'surname' => 'required|min:5|max:255',
            'position' => 'required|min:5|max:255',
            'phone' => 'required|min:9|max:255',
            'is_hired' => 'nullable',
        ]);
        
        $employee = Employee::findOrFail($id);
        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->position = $request->position;
        $employee->phone = $request->phone;
        $employee->is_hired = $request->has('is_hired');
        $employee->save();
        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
