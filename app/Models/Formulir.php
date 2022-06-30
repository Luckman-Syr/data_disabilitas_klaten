<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulir extends Model
{
    use HasFactory;

    protected $table = 'formulir';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'no_formulir', 'id_kecamatan','tanggal_pendataan',
        'petugas_pendataan','instansi','no_telepon',
        'catatan','foto','petugas_verifikasi',
        'tanggal_verifikasi','tahun', 'disabilitas','id_personal'
    ];
}
