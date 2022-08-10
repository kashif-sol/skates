<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tab1 extends Model
{
    use HasFactory;
    protected $fillable = ['size','priority','multiple'];
    public $table = "tab_1";
}
