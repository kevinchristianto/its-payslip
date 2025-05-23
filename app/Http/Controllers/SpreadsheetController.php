<?php

namespace App\Http\Controllers;

use App\Imports\EmployeeImport;
use App\Imports\PayslipImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;

class SpreadsheetController extends Controller
{
    public function index()
    {
        return view('pages.process.index');
    }

    public function importEmployees(Request $request)
    {
        Excel::import(new EmployeeImport, $request->file('spreadsheet'));

        return redirect()->route('employees.index')->with('success', 'Employee data imported successfully!');
    }

    public function blast(Request $request)
    {
        $date_start = date_format(date_create($request->period_start), 'd F Y');
        $date_end = date_format(date_create($request->period_end), 'd F Y');
        $directory_name = $date_start . '_' . $date_end;
        $periode = $date_start . ' - ' . $date_end;
        $import = Excel::import(new PayslipImport($periode, auth()->id()), $request->file('spreadsheet'));

        $missing_emails = Cache::pull("missing_email_{$request->user()->id}");

        if (!empty($missing_emails)) {
            $request->session()->flash('missing_emails', $missing_emails);
        }
        
        return redirect()->route('blast.index')->with('success', 'Slip gaji sedang dibuat. Seluruh pegawai yang terdata pada spreadsheet yang diunggah akan menerima email dalam beberapa saat...');
    }

    public function test()
    {
        $pdf = Pdf::loadView('print.payslip');

        return $pdf->stream();
    }

    public function download_template(Request $request)
    {
        if ($request->get('type') == 'payslip') {
            return response()->download(storage_path('app/private/format/FormatPerhitunganGaji.xlsx'));
        } else {
            return response()->download(storage_path('app/private/format/FormatImportPegawai.xlsx'));
        }
    }
}
