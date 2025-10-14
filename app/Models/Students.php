<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    /** @use HasFactory<\Database\Factories\StudentsFactory> */

    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'date_of_birth',
        'gender',
        'course',
    ];
}
