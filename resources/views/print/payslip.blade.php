<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Gaji</title>
    <style>
        @page {
            margin: 10mm 15mm;
            size: A4;

            @top-center {
                content: element(header);
                width: 100%;
            }
        }

        #page-number {
            content: counter(page) " of " counter(pages);
        }

        body, html {
            font-size: 9pt;
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            width: 100%;
        }
        table, th, td {
            border: none;
            border-spacing: 0;
            border-collapse: collapse;
        }
        table:not(.no-padding) th, table:not(.no-padding) td {
            padding: 2px 8px;
        }
        table thead tr th {
            border-top: 6px double #666;
            border-bottom: 6px double #666;
        }

        .header {
            position: running(header);
            width: 100%;
        }

        .bold {
            font-weight: bold;
        }

        h4 {
            margin: 0;
            padding-bottom: .5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <table class="header">
            <tr>
                <td rowspan="2" style="width: 30%; text-align: left">
                    <img src="assets/images/its-logo.png" alt="Logo ITS" style="width: 160px">
                </td>
                <td>
                    <h1 style="margin: 0">PT Inosantek Total Solusi</h1>
                </td>
            </tr>
            <tr>
                <td>
                    Perum. GCC D7 No. 24, Karangraharja, Cikarang Utara,<br>Kab. Bekasi 17435
                </td>
            </tr>
        </table>

        <table style="margin-top: 2rem;">
            <tr>
                <td width="50%" style="padding: 0">
                    <table class="no-padding">
                        <tr>
                            <td>Periode</td>
                            <td class="bold">:&nbsp; {{ $periode }}</td>
                        </tr>
                        <tr>
                            <td>NIP/ID Pegawai</td>
                            <td class="bold">:&nbsp; {{ $nip }}</td>
                        </tr>
                        <tr>
                            <td>Nama Pegawai</td>
                            <td class="bold">:&nbsp; {{ $nama_pegawai }}</td>
                        </tr>
                    </table>
                </td>
                <td style="padding: 0">
                    <table class="no-padding">
                        <tr>
                            <td>Departemen</td>
                            <td class="bold">:&nbsp; {{ $jabatan }}</td>
                        </tr>
                        <tr>
                            <td>Wilayah</td>
                            <td class="bold">:&nbsp; {{ $wilayah }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td class="bold">:&nbsp; {{ $status }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        {{-- DETAIL SLIP GAJI --}}
        <table style="margin-top: 1rem" class="no-padding">
            <thead>
                <tr>
                    <th></th>
                    <th>Keterangan</th>
                    <th colspan="3">Rincian</th>
                    <th style="width: 20%">Total</th>
                </tr>
            </thead>
            <tbody>
                {{-- PENERIMAAN --}}
                <tr>
                    <td style="text-align: right; padding-right: 2mm; width: 10%">
                        <h4 style="padding-top: 1rem;">A.</h4>
                    </td>
                    <td colspan="5">
                        <h4 style="padding-top: 1rem;">PENERIMAAN (+)</h4>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td style="width: 40%">Gaji Pokok</td>
                    <td style="width: 5%">1</td>
                    <td style="width: 10%">Bulan</td>
                    <td colspan="2">Rp{{ $gaji_pokok }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Tunjangan Jabatan</td>
                    <td>1</td>
                    <td>Bulan</td>
                    <td colspan="2">Rp{{ $tunjangan_jabatan }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Tunjangan Lembur</td>
                    <td>1</td>
                    <td>Bulan</td>
                    <td colspan="2">Rp{{ $tunjangan_lembur }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Lembur Hari Kerja (LK)</td>
                    <td>{{ $lembur_hari_kerja }}</td>
                    <td>Hari</td>
                    <td colspan="2">Rp{{ $bayaran_lembur_hari_kerja }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Lembur Hari Libur (LL)</td>
                    <td>{{ $lembur_hari_libur }}</td>
                    <td>Hari</td>
                    <td colspan="2">Rp{{ $bayaran_lembur_hari_libur }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Backup</td>
                    <td>{{ $backup }}</td>
                    <td>Hari</td>
                    <td colspan="2">Rp{{ $bayaran_backup }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Tabungan</td>
                    <td>&nbsp;</td>
                    <td>Bulan</td>
                    <td colspan="2">Rp{{ $bayaran_tabungan }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Penerimaan Tambahan</td>
                    <td>&nbsp;</td>
                    <td>Bulan</td>
                    <td colspan="2">Rp{{ $bayaran_kekurangan_lemburan }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Cuti Tahunan</td>
                    <td>{{ $cuti_tahunan }}</td>
                    <td>Hari</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="4">
                        <h4>TOTAL PENERIMAAN</h4>
                    </td>
                    <td align="center">
                        <strong>Rp{{ $jumlah_penerimaan }}</strong>
                    </td>
                </tr>
                {{-- END PENERIMAAN --}}

                {{-- PENGURANGAN --}}
                <tr>
                    <td style="text-align: right; padding-right: 2mm;">
                        <h4 style="padding-top: 1rem;">B.</h4>
                    </td>
                    <td colspan="5">
                        <h4 style="padding-top: 1rem;">PENGURANGAN (-)</h4>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="5" style="width: 40%">Presensi</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp; - Izin</td>
                    <td>{{ $absen_izin }}</td>
                    <td>Hari</td>
                    <td colspan="2">Rp{{ $potongan_absen_izin }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp; - Sakit</td>
                    <td>{{ $absen_sakit }}</td>
                    <td>Hari</td>
                    <td colspan="2">Rp{{ $potongan_absen_sakit }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp; - SDS</td>
                    <td>{{ $absen_sds }}</td>
                    <td>Hari</td>
                    <td colspan="2">Rp{{ $potongan_absen_sds }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp; - Alpa</td>
                    <td>{{ $absen_alpa }}</td>
                    <td>Hari</td>
                    <td colspan="2">Rp{{ $potongan_absen_alpa }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="5" style="width: 40%">Koperasi</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp; - Tabungan Wajib</td>
                    <td>1</td>
                    <td>Bulan</td>
                    <td colspan="2">Rp{{ $koperasi_tabungan_wajib }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp; - Tambahan</td>
                    <td>1</td>
                    <td>Bulan</td>
                    <td colspan="2">Rp{{ $koperasi_tambahan }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp; - Pinjaman</td>
                    <td>1</td>
                    <td>Bulan</td>
                    <td colspan="2">Rp{{ $koperasi_pinjaman }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp; - Kasbon</td>
                    <td>1</td>
                    <td>Bulan</td>
                    <td colspan="2">Rp{{ $koperasi_kasbon }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="5" style="width: 40%">BPJS</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp; - Pot. BPJS Kesehatan (1%)</td>
                    <td>1</td>
                    <td>Bulan</td>
                    <td colspan="2">Rp{{ $pot_bpjs_kesehatan }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp; - Pot. Tambahan BPJS Kes.</td>
                    <td>1</td>
                    <td>Bulan</td>
                    <td colspan="2">Rp{{ $pot_tambahan_bpjs_kesehatan }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp; - Pot. JHT (2%)</td>
                    <td>1</td>
                    <td>Bulan</td>
                    <td colspan="2">Rp{{ $pot_jht }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp; - Pot. JP (1%)</td>
                    <td>1</td>
                    <td>Bulan</td>
                    <td colspan="2">Rp{{ $pot_jp }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp; - Pot. Lainnya</td>
                    <td>1</td>
                    <td>Bulan</td>
                    <td colspan="2">Rp{{ $pot_lainnya }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="4">
                        <h4>JUMLAH PENGURANGAN</h4>
                    </td>
                    <td align="center">
                        <strong>Rp{{ $jumlah_pengurangan }}</strong>
                    </td>
                </tr>
                {{-- END PENGURANGAN --}}

                {{-- TAKE HOME PAY --}}
                <tr style="background-color: lightseagreen">
                    <td align="center" colspan="5" style="padding: 4px 0;">
                        <h4 style="padding: 0">TAKE HOME PAY</h4>
                    </td>
                    <td align="center">
                        <strong>Rp{{ $take_home_pay }}</strong>
                    </td>
                </tr>
                {{-- END TAKE HOME PAY --}}

                {{-- TERBILANG --}}
                <tr style="border-bottom: 6px double #666;">
                    <td colspan="1">
                        <strong>Terbilang:</strong>
                    </td> 
                    <td colspan="5" style="padding: .5rem 0;">
                        <strong style="margin-left: 2rem;">{{ $terbilang }}</strong>
                    </td>
                </tr>
                {{-- END TERBILANG --}}
            </tbody>
        </table>
        {{-- END DETAIL SLIP GAJI --}}

        {{-- REKENING --}}
        <table style="margin-top: 1rem;">
            <tr>
                <td colspan="2">Pembayaran:</td>
                <td align="center" width="35%">Cikarang, {{ $today }}</td>
            </tr>
            <tr>
                <td style="width: 10%">&nbsp;</td>
                <td colspan="2">
                    <strong>{{ $nama_bank }}</strong> &mdash; <strong>{{ $nomor_rekening }}</strong> a.n. <strong>{{ $nama_rekening }}</strong>
                </td>
            </tr>
        </table>
        {{-- END REKENING --}}

        {{-- TANDA TANGAN --}}
        <table style="margin-top: 2rem">
            <tr style="text-align: center">
                <td>Diterima,</td>
                <td>Dikeluarkan,</td>
                <td>Dibuat,</td>
            </tr>
            <tr>
                <td colspan="3" style="height: 3cm">&nbsp;</td>
            </tr>
            <tr style="text-align: center">
                <td style="width: 33.333333333%">
                    <u><strong>{{ $nama_pegawai }}</strong></u><br>
                    Pegawai
                </td>
                <td style="width: 33.333333333%">
                    <u><strong>Putri Arifa Nuralamsyah</strong></u><br>
                    HRD
                </td>
                <td>
                    <u><strong>Septiani Ananda P.</strong></u><br>
                    Finance
                </td>
            </tr>
        </table>
        {{-- END TANDA TANGAN --}}
    </div>
</body>
</html>