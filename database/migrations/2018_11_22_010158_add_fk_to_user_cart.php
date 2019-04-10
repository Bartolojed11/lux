<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToUserCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_cart', function ($table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('cart_stat_id')->unsigned();
            $table->foreign('cart_stat_id')->references('id')->on('cart_stat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_cart', function ($table) {
            $table->dropForeign('user_id');
            $table->dropColumn('user_id');
            $table->dropForeign('cart_stat_id');
            $table->dropColumn('cart_stat_id');
        });
    }
}
