<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotes extends Model
{
    use HasFactory;
    protected $fillable = [
        'ice_sheet', 'length' , 'width', 'tab','user_id','email',
    ];
}
