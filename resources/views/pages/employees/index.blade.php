@extends('layout.app')

@section('title', 'Manage Employees')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manage Employees</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Employees</h5>
                            <button class="btn btn-outline-primary btn-sm d-flex gap-2 align-items-center" data-bs-target="#add-employee" data-bs-toggle="modal">
                                <i class="bi bi-plus-lg"></i>
                                Add New Employee
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Choose and Upload Spreadsheet</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('employees.index') }}" method="post">
                            <div class="mb-3">
                                <label for="spreadsheet" class="form-label">Employee List</label>
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

@section('modal-section')
    <div class="modal fade" id="add-employee">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
@endsection