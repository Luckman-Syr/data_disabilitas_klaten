<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPersonal extends Model
{
    use HasFactory;

    protected $table = 'data_personal';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'nama', 'tempat_tgl_lahir','status','dokumen_personal',
        'id_kelurahan','no_telpon', 'pendidikan', 'no_kk',
        'no_nik','gender','alamat_lengkap',
        'data_kk', 'jml_disabilitas_kk','keterangan_keluarga',
    ];
}
