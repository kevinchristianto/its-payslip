<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SpreadsheetController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [SpreadsheetController::class, 'index'])->name('blast.index');
    Route::resource('employees', EmployeeController::class);

    Route::post('employees/import', [SpreadsheetController::class, 'importEmployees'])->name('employees.import');
    Route::post('payslip/blast', [SpreadsheetController::class, 'blast'])->name('payslip.blast');

    Route::get('download/template', [SpreadsheetController::class, 'download_template'])->name('download.template');

    Route::get('test', [SpreadsheetController::class, 'test'])->name('test');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
