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
           $table->integer('car_type' ,6)->nullable();
           $table->string('car_plate_no' ,100);
           $table->string('car_model_year' ,60);
           $table->integer('fuel_type' ,3);
           $table->tinyInteger('injection'  ,1);
           $table->tinyInteger('tearpo'  ,1);
           $table->tinyInteger('hydroleak_system'  ,1);
           $table->tinyInteger('normal_system'  ,1);
           $table->date('first_time' );
           $table->date('last_time');
           $table->integer('times' ,6);
           $table->text('notes');
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
