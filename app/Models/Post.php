<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * @var array
     */

    use HasFactory;

        protected $table = 'log_users';
        protected $fillable = [
            'title', 'content_update'
        ];
}
