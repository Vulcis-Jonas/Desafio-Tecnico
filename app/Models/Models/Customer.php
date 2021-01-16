<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Modale;

class Customer extends Modal
{
    use HasFactory;

    protected $fillable = [
        'time_start',
        'time_end',
    ];
}
