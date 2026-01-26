<?php

use App\Models\Student;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;

Route::get(
    '/employees',
    [EmployeeController::class, 'index']
);

Route::post(
    '/store',
    [EmployeeController::class, 'store']
);

Route::get(
    '/employees/create',
    [EmployeeController::class, 'create']
)->name('create');


Route::get(
    '/employees/{id}',
    [EmployeeController::class, 'show']
)->name('view');

Route::get(
    '/employees/{id}/edit',
    [EmployeeController::class, 'edit']
)->name('edit');
Route::post(
    '/employees/{id}/update',
    [EmployeeController::class, 'update']
)->name('update');

Route::get(
    '/employees/{id}/delete',
    [EmployeeController::class, 'delete']
)->name('delete');


Route::resource('students', StudentController::class);
//       /students/
//       /students/create
//       /students/store
//       /students/{id}
//       /students/{id}/edit
//       /students/{id}/destroy
//       students.create ...... route ({{ route('students.create') }})