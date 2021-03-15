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
            $table->id()->autoIncrement();;
            $table->timestamps();
            $table->string('name' ,200);
            $table->string('mobile' ,20)->nullable();
            $table->string('company' ,200)->nullable();
            $table->string('Address' ,250)->nullable();
            $table->string('phone' ,20)->nullable();
            $table->integer('times' )->nullable();
            $table->date('first_date')->nullable();
            $table->date('last_date')->nullable();
            $table->integer('sex' )->nullable() ;
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
