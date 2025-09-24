<?php

namespace App\Models;

use App\Enums\StatusTypes;

class User
{
    protected $fillable = [
        'role',
        'status',
    ];

    protected $casts = [
        'status' => StatusTypes::class,
    ];

}