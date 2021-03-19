<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    public function region(){
        $this->belongsTo(Region::class);
    }

    public function disease(){
        $this->hasMany(Disease::class);
    }
}
