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
            $table->id();
            $table->timestamps();

            $table->string('title');
            $table->text('content');
            $table->string('pic');
            $table->tinyInteger('pic_only');
            $table->tinyInteger('content_only');
            $table->tinyInteger('disabled');
            $table->date('date_to_dis');
            $table->date('date_created');
            $table->tinyInteger('deleted');
            $table->date('date_delete');
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
