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
            $table->integer('oil_change' )->nullable();
            $table->string('type_of_oil' ,150)->nullable();
            $table->integer('oil_filter' ,100)->nullable();
            $table->integer('air_filter' ,100)->nullable();
            $table->integer('solar_filter' ,100)->nullable();
            $table->integer('benzen_filter' ,100)->nullable();
            $table->integer('conditioner_filter' ,100)->nullable();
            $table->integer('bojehat' ,100)->nullable();
            $table->integer('front_break' ,100)->nullable();
            $table->integer('back_break' ,100)->nullable();
            $table->integer('rodater_water' ,100)->nullable();
            $table->string('timing_Scrap' ,100)->nullable();
            $table->integer('gear_oil' ,100)->nullable();
            $table->integer('bkaks_oil' ,100)->nullable();
            $table->integer('lubrication' ,100)->nullable();
            $table->integer('axat_lubrication',100)->nullable();

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
