<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SpreadsheetController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SpreadsheetController::class, 'index'])->name('blast.index');
Route::get('employees/index', [EmployeeController::class, 'index'])->name('employees.index');

Route::post('process-payslip', [SpreadsheetController::class, 'processPayslip'])->name('blast.process');
