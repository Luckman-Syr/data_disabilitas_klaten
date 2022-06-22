<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $table = "master.kelurahan";
    protected $fillable = ['nama'];
    public $timestamps = false;
    public $incrementing = false;
}
