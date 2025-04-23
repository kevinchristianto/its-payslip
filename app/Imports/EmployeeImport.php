<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithSkipDuplicates;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class EmployeeImport implements ToModel, WithBatchInserts, WithSkipDuplicates, SkipsEmptyRows, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'nip' => $row['NIP'],
            'name' => $row['NAMA PEGAWAI'],
            'status' => $row['STATUS'],
            'email' => $row['EMAIL'],
            'bank_name' => $row['NAMA BANK'],
            'bank_account_number' => $row['NOMOR REKENING'],
            'bank_account_name' => $row['NAMA DI REKENING'],
        ]);
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function rules(): array
    {
        return [
            'nip' => 'required|unique:employees,nip',
            'email' => 'required|email|unique:employees,email',
        ];
    }
}
