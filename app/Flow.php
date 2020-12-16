<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flow extends Model
{
    protected $table = 'flow';

    protected $fillable = [
        'name', 'level', 'slug', 'image'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s'
    ];
}
