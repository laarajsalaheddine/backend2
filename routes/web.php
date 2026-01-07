<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;

Route::get(
    '/employees',
    [EmployeeController::class, 'index']
);

Route::get(
    '/employees/{id}',
    [EmployeeController::class, 'show']
)->name('view');

Route::get(
    '/employees/create',
    [EmployeeController::class, 'create']
)->name('create');