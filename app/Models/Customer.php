<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=['name','mobile'];

    use HasFactory;

    public function cars(){
        return $this->hasMany('App\Models\Car');
    }

    public function jobs(){
        return $this->belongsToMany('App\Models\Job')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    
}
