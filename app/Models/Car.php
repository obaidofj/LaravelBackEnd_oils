<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable=['car_plate_no','car_model_year','car_type','customer_id'];

    use HasFactory;

    public function customer(){
        return $this->belongsTo('App\Models\Customer');
    }

    public function maintinances () {
        return $this->hasMany('App\Models\Maintenance_done');
    }


}
