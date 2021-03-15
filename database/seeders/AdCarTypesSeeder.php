<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdCarTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Car_types = new \App\Models\Car_type();
        $Car_types->car_type="مرسيدس";
        $Car_types->save();
        $Car_types = new \App\Models\Car_type();
        $Car_types->car_type="BMW";
        $Car_types->save();
        $Car_types = new \App\Models\Car_type();
        $Car_types->car_type="بيجو";
        $Car_types->sub_model="بيجو تندر";
        $Car_types->notes="";
        $Car_types->save();


    }
}
