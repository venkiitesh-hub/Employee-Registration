<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('employees', EmployeeController::class);
Route::get('export-excel', [EmployeeController::class, 'exportExcel'])->name('employees.export');
Route::post('import-excel', [EmployeeController::class, 'importExcel'])->name('employees.import');
