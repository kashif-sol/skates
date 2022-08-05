<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tab3 extends Model
{
    use HasFactory;
    protected $fillable = ['size','hockey'];
    public $table = "tab_3";
}
