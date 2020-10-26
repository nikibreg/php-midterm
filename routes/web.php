<?php

use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/employees', function () {
    $employees = Employee::orderBy('created_at', 'asc')->get();
    return view('employee_list', [
        'employees' => $employees
    ]);
});

Route::get('/employees/{id}/edit', function ($id) {
    $employee = Employee::findOrFail($id);
    return view('edit', [
        'employee' => $employee
    ]);
});

Route::post('/employees/{id}/edit', function ($id, Request $request) {
    $employee = Employee::findOrFail($id);
    $employee->name = $request->name;
    $employee->surname = $request->surname;
    $employee->position = $request->position;
    $employee->phone = $request->phone;
    $employee->is_hired = $request->is_hired;
    $employee->save();
    return redirect('/employees');
})->name('employees.edit');;
