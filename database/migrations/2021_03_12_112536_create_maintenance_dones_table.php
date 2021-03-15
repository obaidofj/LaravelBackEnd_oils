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
            $table->id()->autoIncrement();
            $table->timestamps();
            $table->integer('car_id' );
            $table->date('mant_date');
            $table->integer('current_meter' );
            $table->integer('distance_to_reach' )->nullable();
            $table->integer('coming_meter' )->nullable();
            $table->string('type_of_oil' ,150)->nullable();
            $table->string('oil_filter' ,100)->nullable();
            $table->string('air_filter' ,100)->nullable();
            $table->string('solar_filter' ,100)->nullable();
            $table->string('benzen_filter' ,100)->nullable();
            $table->string('conditioner_filter' ,100)->nullable();
            $table->string('bojehat' ,100)->nullable();
            $table->string('front_break' ,100)->nullable();
            $table->string('back_break' ,100)->nullable();
            $table->string('rodater_water' ,100)->nullable();
            $table->string('timing_Scrap' ,100)->nullable();
            $table->string('gear_oil' ,100)->nullable();
            $table->string('bkaks_oil' ,100)->nullable();
            $table->string('lubrication' ,100)->nullable();
            $table->string('axat_lubrication',100)->nullable();

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
