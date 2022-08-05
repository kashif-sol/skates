<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tab2 extends Model
{
    use HasFactory;
    protected $fillable = ['size','figure'];
    public $table = "tab_2";

}
