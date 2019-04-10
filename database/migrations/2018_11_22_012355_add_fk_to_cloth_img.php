<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToClothImg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cloth_img', function ($table) {
            $table->integer('cl_id')->unsigned();
            $table->foreign('cl_id')->references('id')->on('cloth');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cloth_img', function (Blueprint $table) {
            $table->dropForeign('cl_id');
            $table->dropColumn('cl_id');
        });
    }
}
