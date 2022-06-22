<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disabilitas extends Model
{
    use HasFactory;

    protected $table = "master.disabilitas";
    protected $fillable = ['nama'];
    public $timestamps = false;
    public $incrementing = false;
}
