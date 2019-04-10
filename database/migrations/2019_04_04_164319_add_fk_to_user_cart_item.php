<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToUserCartItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_cart_item', function ($table) {
            $table->integer('cl_id')->unsigned();
            $table->foreign('cl_id')->references('id')->on('cloth');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('user_cart_id')->unsigned();
            $table->foreign('user_cart_id')->references('id')->on('user_cart');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_cart_item', function ($table) {
            $table->dropForeign('cl_id');
            $table->dropColumn('cl_id');
            $table->dropForeign('user_id');
            $table->dropColumn('user_id');
            $table->dropForeign('user_cart_id');
            $table->dropColumn('user_cart_id');
        });
    }
}