<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = "master.kecamatan";
    protected $fillable = ['nama'];
    public $timestamps = false;
    public $incrementing = false;
    
}
