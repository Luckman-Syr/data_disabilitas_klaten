<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulir extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'formulir';
    protected $fillable = [
        //'id_formulir',
        'id_kecamatan', 'tanggal_pendataan', 'petugas_pendataan', 'instansi', 'no_telepon', 'catatan', 'foto', 'petugas_verifikasi', 'tanggal_verifikasi', 'tahun',
        'pekerjaan', 'jenis_pekerjaan', 'alasan_tdk_bekerja', 'pendapatan', 'pengeluaran', 'pendapatan_lain', 'jml_pendapatan_lain', 'minat_kerja', 'keterampilan', 'pelatihan_diikuti', 'pelatihan_diminati',
        'status_rumah', 'lantai', 'kamar_mandi', 'akses_rumah', 'dinding', 'sumber_air', 'penerangan',
        'paud', 'tk', 'slb', 'sd_abk', 'smp_abk', 'sma_smk_abk', 'jml_posyandu_desa', 'posyandu_rutin', 'layanan_kesehatan_desa',
        'tingkat_sosialisasi', 'keterlibatan_ormas', 'kegiatan_diikuti', 'keterlibatan_musrenbang', 'waktu_musrenbang',
        'alat_bantu', 'modal_usaha', 'peralatan_uep', 'bantuan_lainnya',
        'keahlian','prestasi','kontak_darurat','rehabilitasi',
        'id_personal'
    ];
}
