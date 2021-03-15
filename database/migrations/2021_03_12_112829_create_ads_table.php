<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id()->autoIncrement();

            $table->string('title');
            $table->text('content')->nullable();
            $table->string('pic')->nullable();
            $table->tinyInteger('pic_only')->nullable();
            $table->tinyInteger('content_only')->nullable();
            $table->tinyInteger('disabled')->nullable();
            $table->date('date_to_dis')->nullable();
            $table->date('date_created')->nullable();
            $table->tinyInteger('deleted')->nullable();
            $table->date('date_delete')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
