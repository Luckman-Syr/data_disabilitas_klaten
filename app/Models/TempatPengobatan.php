<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatPengobatan extends Model
{
    use HasFactory;

    protected $table = "master.tempat_pengobatan";
    protected $fillable = ['nama'];
    public $timestamps = false;
    public $incrementing = false;
}
