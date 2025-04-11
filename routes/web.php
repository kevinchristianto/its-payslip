<?php

use App\Http\Controllers\EmployeeEmailController;
use App\Http\Controllers\SpreadsheetController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SpreadsheetController::class, 'index'])->name('blast.index');
Route::get('emails/index', [EmployeeEmailController::class, 'index'])->name('emails.index');

Route::post('process-payslip', [SpreadsheetController::class, 'processPayslip'])->name('blast.process');
