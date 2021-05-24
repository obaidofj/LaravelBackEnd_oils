<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();
           $table->integer('car_types_id' );
           $table->string('car_plate_no' )->nullable();
           $table->string('car_model_year' );
           $table->integer('fuel_type' )->nullable();
           $table->tinyInteger('injection'  )->nullable();
           $table->tinyInteger('tearpo'  )->nullable();
           $table->tinyInteger('hydroleak_system'  )->nullable();
           $table->tinyInteger('normal_system'  )->nullable();
           $table->date('first_time' )->nullable();
           $table->date('last_time')->nullable();
           $table->integer('times' )->nullable();
           $table->text('notes')->nullable();
           $table->integer('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
