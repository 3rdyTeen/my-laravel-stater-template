<?php

namespace App\Domain\Sample\Models;

use App\Models\BaseModel;

class Sample extends BaseModel
{
    protected $fillable = [
        'title',
        'description',
    ];
}
