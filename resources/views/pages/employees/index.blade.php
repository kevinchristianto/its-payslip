@extends('layout.app')

@section('title', 'Kelola Pegawai')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Kelola Pegawai</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Daftar Pegawai</h5>
                            <button class="btn btn-outline-primary btn-sm d-flex gap-2 align-items-center" data-bs-target="#add-employee" data-bs-toggle="modal">
                                <i class="bi bi-plus-lg"></i>
                                Pegawai Baru
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama Pegawai</th>
                                        <th>Status</th>
                                        <th>Email</th>
                                        <th>Nama Bank</th>
                                        <th>Nomor Rekening</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1 @endphp
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->nip }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->email ?? '-' }}</td>
                                            <td>{{ $item->bank_name ?? '-' }}</td>
                                            <td>{{ $item->bank_account_number && $item->bank_account_name ? $item->bank_account_number . ' a.n. ' . $item->bank_account_name : '-' }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="#" class="btn btn-outline-primary btn-sm" onclick="editEmployee({{ $item->id }})">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <form action="{{ route('employees.destroy', $item->id) }}" method="post" onsubmit="return confirm('Anda yakin ingin menghapus pegawai ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-outline-danger btn-sm">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Unggah Daftar Pegawai</h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-warning">Fitur ini hanya direkomendasikan untuk digunakan dalam mengunggah data pegawai dalam jumlah banyak.</div>
                        <form action="{{ route('employees.import') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2">
                                <label for="spreadsheet" class="form-label">Daftar Pegawai</label>
                                <input type="file" class="form-control" id="spreadsheet" name="spreadsheet">
                                <small class="text-danger">Perlu diperhatikan bahwa file spreadsheet daftar pegawai harus sesuai format yang ditentukan. Untuk mengunduh formatnya silakan <a href="{{ route('download.template', ['type' => 'employee']) }}">unduh formatnya disini</a>.</small>
                            </div>
                            <div class="mb-2">
                                <button class="btn btn-success float-end d-flex align-items-center gap-2" type="submit">
                                    <i class="bi bi-cloud-arrow-up"></i>
                                    Unggah
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
                    <h5 class="modal-title">Tambah Pegawai Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('employees.store') }}" method="post" id="add-employee-form">
                        @csrf
                        @method('POST')
                        <div class="mb-2">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" required>
                        </div>
                        <div class="mb-2">
                            <label for="name" class="form-label">Nama Pegawai</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-2">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value selected disabled>--- Pilih status ---</option>
                                <option value="PKWT">PKWT</option>
                                <option value="PKWTT">PKWTT</option>
                                <option value="Outsource">Outsource</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-2">
                            <label for="bank_name" class="form-label">Nama Bank</label>
                            <input type="text" class="form-control" id="bank_name" name="bank_name">
                        </div>
                        <div class="mb-2">
                            <label for="bank_account_number" class="form-label">Nomor Rekening Bank</label>
                            <input type="text" class="form-control" id="bank_account_number" name="bank_account_number">
                        </div>
                        <div class="mb-2">
                            <label for="bank_account_name" class="form-label">Nama di Rekening Bank</label>
                            <input type="text" class="form-control" id="bank_account_name" name="bank_account_name">
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-outline-secondary d-flex gap-2" data-bs-dismiss="modal">
                                <i class="bi bi-x-lg"></i>
                                Batal
                            </a>
                            <button class="btn btn-outline-success d-flex gap-2">
                                <i class="bi bi-floppy"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}" />
@endsection

@section('custom-script')
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
    <script>
        $('.table').DataTable()

        editEmployee = id => {
            let url = `{{ route('employees.edit', ':id') }}`
            url = url.replace(':id', id)

            $.get(url, data => {
                url = `{{ route('employees.update', ':id') }}`
                url = url.replace(':id', id)

                $('#add-employee-form').attr('action', url)
                $('#add-employee-form input[name="_method"]').val('PATCH')
                $('#nip').val(data.nip)
                $('#name').val(data.name)
                $('#status').val(data.status)
                $('#email').val(data.email)
                $('#bank_name').val(data.bank_name)
                $('#bank_account_name').val(data.bank_account_name)
                $('#bank_account_number').val(data.bank_account_number)

                $('#add-employee').modal('show')
            })
        }

       $('#add-employee').on('hidden.bs.modal', () => {
           $('#add-employee-form input[name="_method"]').val('POST')
           $('#add-employee-form').attr('action', `{{ route('employees.store') }}`)
           $('#nip').val('')
           $('#name').val('')
           $('#status').val('')
           $('#email').val('')
           $('#bank_name').val('')
           $('#bank_account_name').val('')
           $('#bank_account_number').val('')
       })
    </script>
@endsection