@extends('layout.app')

@section('title', 'Upload Spreadsheet')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Choose and Upload Spreadsheet</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('payslip.blast') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="period-start" class="form-label">Periode</label>
                                <div class="d-flex gap-2 align-items-center">
                                    <input type="date" class="form-control" id="period-start" name="period_start" required>
                                    <span>s.d.</span>
                                    <input type="date" class="form-control" id="period-end" name="period_end" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="spreadsheet" class="form-label">Payroll Report Spreadsheet</label>
                                <input type="file" class="form-control" id="spreadsheet" name="spreadsheet" required>
                                <small class="text-danger">Please note, the content format of the spreadsheet must be in the same format as the example spreadsheet. Download the template <a href="#">here</a></small>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-success float-end d-flex align-items-center gap-2" type="submit">
                                    <i class="bi bi-floppy"></i>
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection