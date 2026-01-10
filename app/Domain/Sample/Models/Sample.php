<?php

namespace App\Domain\Sample\Models;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];
}
