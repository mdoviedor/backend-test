<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsUpdateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('operations_update', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('x')->unsigned();
            $table->integer('y')->unsigned();
            $table->integer('z')->unsigned();
            $table->integer('W')->unsigned();

            $table->integer('cube_id')->unsigned();
            $table->foreign('cube_id')->references('id')->on('cubes');
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
        Schema::table('operations_update', function (Blueprint $table) {
            //
        });
    }
}
