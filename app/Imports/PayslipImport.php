<?php

namespace App\Imports;

use App\Jobs\BlastEmail;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Ngekoding\Terbilang\Terbilang;

class PayslipImport implements ToCollection, WithStartRow
{
    public function __construct(private $periode, private $user_id)
    {
        
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $today = date('d F Y');
        $dir = 'payslip/' . str_replace(' ', '_', $today);
        if (!Storage::disk('local')->exists($dir)) {
            Storage::disk('local')->makeDirectory($dir);
        }

        $missing_email = [];
        foreach ($collection as $row) {
            if (Employee::where('nip', $row[1])->doesntExist()) {
                $missing_email[] = [
                    'nip' => $row[1],
                    'name' => $row[2],
                ];

                continue;
            }

            $recipient = Employee::where('nip', $row[1])->first()->email;
            $data = [
                'periode' => $this->periode,
                'nip' => $row[1],
                'nama_pegawai' => $row[2],
                'jabatan' => $row[3],
                'wilayah' => $row[4],
                'status' => $row[5],
                'gaji_pokok' => number_format($row[6] ?? 0, 0),
                'tunjangan_jabatan' => number_format($row[17] ?? 0, 0),
                'tunjangan_lembur' => number_format($row[18] ?? 0, 0),
                'lembur_hari_kerja' => $row[12] ?? 0,
                'bayaran_lembur_hari_kerja' => number_format($row[19] ?? 0, 0),
                'lembur_hari_libur' => $row[13] ?? 0,
                'bayaran_lembur_hari_libur' => number_format($row[20] ?? 0, 0),
                'backup' => $row[14] ?? 0,
                'bayaran_backup' => number_format($row[21] ?? 0, 0),
                'bayaran_tabungan' => number_format($row[22] ?? 0, 0),
                'bayaran_kekurangan_lemburan' => number_format($row[23] ?? 0, 0),
                'cuti_tahunan' => $row[15] ?? 0,
                'absen_izin' => $row[8] ?? 0,
                'potongan_absen_izin' => number_format($row[25] ?? 0, 0),
                'absen_sakit' => $row[9] ?? 0,
                'potongan_absen_sakit' => number_format($row[26] ?? 0, 0),
                'absen_sds' => $row[10] ?? 0,
                'potongan_absen_sds' => number_format($row[27] ?? 0, 0),
                'absen_alpa' => $row[11] ?? 0,
                'potongan_absen_alpa' => number_format($row[28] ?? 0, 0),
                'koperasi_tabungan_wajib' => number_format($row[29] ?? 0, 0),
                'koperasi_tambahan' => number_format($row[30] ?? 0, 0),
                'koperasi_pinjaman' => number_format($row[31] ?? 0, 0),
                'koperasi_kasbon' => number_format($row[32] ?? 0, 0),
                'pot_bpjs_kesehatan' => number_format($row[33] ?? 0, 0),
                'pot_tambahan_bpjs_kesehatan' => number_format($row[34] ?? 0, 0),
                'pot_jht' => number_format($row[35] ?? 0, 0),
                'pot_jp' => number_format($row[36] ?? 0, 0),
                'pot_lainnya' => number_format($row[37] ?? 0, 0),
                'nama_bank' => $row[40],
                'nomor_rekening' => $row[41],
                'nama_rekening' => $row[42],
                'today' => $today,
                'jumlah_penerimaan' => $row[6] + $row[17] + $row[18] + $row[19] + $row[20] + $row[21] + $row[22] + $row[23],
                'jumlah_pengurangan' => $row[25] + $row[26] + $row[27] + $row[28] + $row[29] + $row[30] + $row[31] + $row[32] + $row[33] + $row[34] + $row[35] + $row[36] + $row[37],
            ];
            $data['take_home_pay'] = number_format($data['jumlah_penerimaan'] - $data['jumlah_pengurangan'], 0);
            $data['jumlah_penerimaan'] = number_format($data['jumlah_penerimaan'], 0);
            $data['jumlah_pengurangan'] = number_format($data['jumlah_pengurangan'], 0);
            $data['terbilang'] = ucwords(Terbilang::convert($data['take_home_pay']) . ' Rupiah');
            $data['recipient'] = $recipient;

            BlastEmail::dispatch($data, $dir);
        }

        if (count($missing_email) > 0) {
            Cache::put("missing_email_{$this->user_id}", $missing_email, now()->addMinutes(10));
        }
    }

    public function startRow(): int
    {
        return 4;
    }
}
