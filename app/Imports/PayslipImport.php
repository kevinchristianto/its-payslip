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
                'gaji_pokok' => is_numeric($row[6]) ? number_format($row[6] ?? 0, 0) : 0,
                'tunjangan_jabatan' => is_numeric($row[17]) ? number_format($row[17] ?? 0, 0) : 0,
                'tunjangan_lembur' => is_numeric($row[18]) ? number_format($row[18] ?? 0, 0) : 0,
                'lembur_hari_kerja' => $row[12] ?? 0,
                'bayaran_lembur_hari_kerja' => is_numeric($row[19]) ? number_format($row[19] ?? 0, 0) : 0,
                'lembur_hari_libur' => $row[13] ?? 0,
                'bayaran_lembur_hari_libur' => is_numeric($row[20]) ? number_format($row[20] ?? 0, 0) : 0,
                'backup' => $row[14] ?? 0,
                'bayaran_backup' => is_numeric($row[21]) ? number_format($row[21] ?? 0, 0) : 0,
                'bayaran_tabungan' => is_numeric($row[22]) ? number_format($row[22] ?? 0, 0) : 0,
                'bayaran_kekurangan_lemburan' => is_numeric($row[23]) ? number_format($row[23] ?? 0, 0) : 0,
                'cuti_tahunan' => $row[15] ?? 0,
                'absen_izin' => $row[8] ?? 0,
                'potongan_absen_izin' => is_numeric($row[25]) ? number_format($row[25] ?? 0, 0) : 0,
                'absen_sakit' => $row[9] ?? 0,
                'potongan_absen_sakit' => is_numeric($row[26]) ? number_format($row[26] ?? 0, 0) : 0,
                'absen_sds' => $row[10] ?? 0,
                'potongan_absen_sds' => is_numeric($row[27]) ? number_format($row[27] ?? 0, 0) : 0,
                'absen_alpa' => $row[11] ?? 0,
                'potongan_absen_alpa' => is_numeric($row[28]) ? number_format($row[28] ?? 0, 0) : 0,
                'koperasi_tabungan_wajib' => is_numeric($row[29]) ? number_format($row[29] ?? 0, 0) : 0,
                'koperasi_tambahan' => is_numeric($row[30]) ? number_format($row[30] ?? 0, 0) : 0,
                'koperasi_pinjaman' => is_numeric($row[31]) ? number_format($row[31] ?? 0, 0) : 0,
                'koperasi_kasbon' => is_numeric($row[32]) ? number_format($row[32] ?? 0, 0) : 0,
                'pot_bpjs_kesehatan' => is_numeric($row[33]) ? number_format($row[33] ?? 0, 0) : 0,
                'pot_tambahan_bpjs_kesehatan' => is_numeric($row[34]) ? number_format($row[34] ?? 0, 0) : 0,
                'pot_jht' => is_numeric($row[35]) ? number_format($row[35] ?? 0, 0) : 0,
                'pot_jp' => is_numeric($row[36]) ? number_format($row[36] ?? 0, 0) : 0,
                'pot_lainnya' => is_numeric($row[37]) ? number_format($row[37] ?? 0, 0) : 0,
                'nama_bank' => $row[40],
                'nomor_rekening' => $row[41],
                'nama_rekening' => $row[42],
                'today' => $today,
                'jumlah_penerimaan' => (is_numeric($row[6]) ? $row[6] : 0) + (is_numeric($row[17]) ? $row[17] : 0) + (is_numeric($row[18]) ? $row[18] : 0) + (is_numeric($row[19]) ? $row[19] : 0) + (is_numeric($row[20]) ? $row[20] : 0) + (is_numeric($row[21]) ? $row[21] : 0) + (is_numeric($row[22]) ? $row[22] : 0) + (is_numeric($row[23]) ? $row[23] : 0),
                'jumlah_pengurangan' => (is_numeric($row[25]) ? $row[25] : 0) + (is_numeric($row[26]) ? $row[26] : 0) + (is_numeric($row[27]) ? $row[27] : 0) + (is_numeric($row[28]) ? $row[28] : 0) + (is_numeric($row[29]) ? $row[29] : 0) + (is_numeric($row[30]) ? $row[30] : 0) + (is_numeric($row[31]) ? $row[31] : 0) + (is_numeric($row[32]) ? $row[32] : 0) + (is_numeric($row[33]) ? $row[33] : 0) + (is_numeric($row[34]) ? $row[34] : 0) + (is_numeric($row[35]) ? $row[35] : 0) + (is_numeric($row[36]) ? $row[36] : 0) + (is_numeric($row[37]) ? $row[37] : 0),
            ];
            $data['take_home_pay'] = is_numeric($data['jumlah_penerimaan']) && is_numeric($data['jumlah_pengurangan']) ? number_format($data['jumlah_penerimaan'] - $data['jumlah_pengurangan'], 0) : 0;
            $data['jumlah_penerimaan'] = is_numeric($data['jumlah_penerimaan']) ? number_format($data['jumlah_penerimaan'], 0) : 0;
            $data['jumlah_pengurangan'] = is_numeric($data['jumlah_pengurangan']) ? number_format($data['jumlah_pengurangan'], 0) : 0;
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
