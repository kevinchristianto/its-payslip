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
                        <h5 class="card-title">Unggah Rekapan Penggajian</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('payslip.blast') }}" method="post" enctype="multipart/form-data" onsubmit="return confirm('Unggah rekapan penggajian ini? Setelah rekapan diunggah, PDF slip gaji akan dibuat secara otomatis dan pegawai yang terdata di file rekapan akan menerima email berisi slip gajinya. Lanjutkan?')">
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
                                <label for="spreadsheet" class="form-label">File Rekapan Penggajian</label>
                                <input type="file" class="form-control" id="spreadsheet" name="spreadsheet" required>
                                <small class="text-danger">Perlu diperhatikan bahwa file spreadsheet daftar pegawai harus sesuai format yang ditentukan. Untuk mengunduh formatnya silakan <a href="{{ route('download.template', ['type' => 'payslip']) }}">unduh formatnya disini</a>.</small>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-success float-end d-flex align-items-center gap-2" type="submit">
                                    <i class="bi bi-cloud-arrow-up"></i>
                                    Unggah
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if (session()->has('missing_emails'))
                @foreach (session()->get('missing_emails') as $email)
                    <div class="col-lg-6 col-12 mt-3">
                        <div class="alert alert-danger" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            Email untuk <strong>{{ $email['name'] }} ({{ $email['nip'] }})</strong> belum terdaftar di sistem. Slip gaji gagal dikirim untuk pegawai tersebut.
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection