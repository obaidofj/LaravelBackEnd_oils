<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name' ,200);
            $table->string('mobile' ,20);
            $table->string('company' ,200);
            $table->string('Address' ,250);
            $table->string('phone' ,20);
            $table->integer('times' ,6);
            $table->date('first_date');
            $table->date('last_date');
            $table->integer('sex' ,2) ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
