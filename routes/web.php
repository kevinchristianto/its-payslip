<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SpreadsheetController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SpreadsheetController::class, 'index'])->name('blast.index');
Route::resource('employees', EmployeeController::class);

Route::post('employees/import', [SpreadsheetController::class, 'importEmployees'])->name('employees.import');
Route::post('payslip/blast', [SpreadsheetController::class, 'blast'])->name('payslip.blast');

Route::get('test', [SpreadsheetController::class, 'test'])->name('test');
