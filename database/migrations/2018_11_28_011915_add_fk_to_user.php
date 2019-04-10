<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('role');   
            $table->integer('pid')->unsigned();
            $table->foreign('pid')->references('id')->on('prov');
            $table->integer('cid')->unsigned();
            $table->foreign('cid')->references('id')->on('city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropForeign('role_id');
            $table->dropColumn('role_id');
            $table->dropForeign('pid');
            $table->dropColumn('pid');
            $table->dropForeign('cid');
            $table->dropColumn('cid');
        });
    }
}
