<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    protected $fillable = [
        'from_person_id',
        'to_person_id',
        'is_liked',
    ];
}
