<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nip' => '123456789',
                'name' => 'Christian',
                'gender' => 'M',
                'status' => 'PKWT',
                'email' => 'christiantok12@gmail.com',
                'bank_name' => 'Bank of America',
                'bank_account_name' => 'Account Name',
                'bank_account_number' => '1234567890',
            ],
            [
                'nip' => '123456780',
                'name' => 'Kevin',
                'gender' => 'M',
                'status' => 'PKWT',
                'email' => 'kevinchristianto22@gmail.com',
                'bank_name' => 'Bank of America',
                'bank_account_name' => 'Account Name',
                'bank_account_number' => '1234567899',
            ]
        ];

        Employee::upsert($data, []);
    }
}
