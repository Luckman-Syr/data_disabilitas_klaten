<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CDataAnggotaKeluarga extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'c_data_anggota_keluarga';
    protected $fillable = [
        'id_formulir','no_kk','nama',
        'nik','jenis_kelamin','tanggal_lahir',
        'pekerjaan','penghasilan','hubungan_difabel',
        'keteragan',
    ];
}
