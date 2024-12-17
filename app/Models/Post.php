<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Post extends Pivot
{
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'image',
        'created_at',
        'updated_at',
    ];
}
