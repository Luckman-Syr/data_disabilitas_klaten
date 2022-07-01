<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BDisabilitas extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'b_disabilitas';
    protected $fillable = [
        'id_disabilitas','id_tempat','id_formulir','ket_disabilitas',
        'penyebab_disabilitas', 'diagnosa_sekarang','penyakit_lain',
        'tempat_pengobatan','pembantu_pengobatan','kemampuan_sehari_hari',
        'kesulitan_sekarang', 'alat_bantu', 'jaminan_kesehatan',
        'jaminan_sosial',
    ];
}
