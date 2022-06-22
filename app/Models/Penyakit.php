<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = "master.penyakit";
    protected $fillable = ['nama'];
    public $timestamps = false;
    public $incrementing = false;
}
