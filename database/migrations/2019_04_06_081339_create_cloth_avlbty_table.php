<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClothAvlbtyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cloth_avlbty', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cl_id')->unsigned();
            $table->foreign('cl_id')->references('id')->on('cloth');
            $table->integer('av_size')->unsigned();
            $table->integer('qty')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cloth_avlbty');
    }
}
