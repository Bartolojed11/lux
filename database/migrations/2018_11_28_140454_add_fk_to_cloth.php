<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToCloth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cloth', function ($table) {            
            $table->integer('cl_cat_id')->unsigned();
            $table->foreign('cl_cat_id')->references('id')->on('cloth_cat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cloth', function ($table) {
            $table->dropForeign('cl_cat_id');
            $table->dropColumn('cl_cat_id');
        });
    }
}
