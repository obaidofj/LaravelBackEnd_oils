<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceDonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_dones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('car_id' ,100);
            $table->date('man_date');
            $table->integer('current_meter' ,60);
            $table->integer('distance_to_reach' ,20);
            $table->integer('coming_meter' ,60);
            $table->string('type_of_oil' ,150);
            $table->string('oil_filter' ,100);
            $table->string('air_filter' ,100);
            $table->string('solar_filter' ,100);
            $table->string('benzen_filter' ,100);
            $table->string('conditioner_filter' ,100);
            $table->string('bojehat' ,100);
            $table->string('front_break' ,100);
            $table->string('back_break' ,100);
            $table->string('rodater_water' ,100);
            $table->string('timing_Scrap' ,100);
            $table->string('gear_oil' ,100);
            $table->string('bkaks_oil' ,100);
            $table->string('lubrication' ,100);
            $table->string('axat_lubrication',100);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenance_dones');
    }
}
