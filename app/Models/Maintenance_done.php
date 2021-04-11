<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance_done extends Model
{
    protected $fillable = ['car_id', 'mant_date', 	'current_meter'];
    use HasFactory;

    public function car () {
        return $this->belongsTo('App\Models\Car');
    }
}
