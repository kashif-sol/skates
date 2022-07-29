<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sqft extends Model
{
    use HasFactory;
    protected $fillable = ['sqft'];
    public function skatersSqft()
    {
        return $this->hasMany(SkatersSqft::class,'sqfts_id');
    }
}
