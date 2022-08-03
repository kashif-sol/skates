<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = [
        'ice_sheets', 'total_sqfeet', 'no_skates','no_rental_skates','email',
    ];
}
