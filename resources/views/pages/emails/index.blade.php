@extends('layout.app')

@section('title', 'Upload Spreadsheet')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Employee Emails</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Employee Email List</h5>
                        <button class="btn btn-outline-primary btn-sm d-flex gap-2 align-items-center">
                            <i class="bi bi-plus-lg"></i>
                            Add New Email
                        </button>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Choose and Upload Spreadsheet</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('emails.index') }}" method="post">
                            <div class="mb-3">
                                <label for="spreadsheet" class="form-label">Employee Email List</label>
                                <input type="file" class="form-control" id="spreadsheet" name="spreadsheet">
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