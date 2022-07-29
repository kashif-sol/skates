<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkatersSqft extends Model
{
    use HasFactory;
    public function sqft()
    {
    	return $this->hasMany(Sqft::class,'id','sqfts_id');
    }
}
