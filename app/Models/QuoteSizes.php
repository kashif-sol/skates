<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteSizes extends Model
{
    use HasFactory;
    protected $fillable = ['size','figure' , 'hockey' , 'quote_id'];

}
