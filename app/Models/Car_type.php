<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_type extends Model
{
    use HasFactory;

    public function cars(){
        return $this->hasMany('App\Models\Car');
    }
    
}
