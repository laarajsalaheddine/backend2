<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;

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

