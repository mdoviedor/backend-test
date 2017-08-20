<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsQueryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('operations_query', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('x1')->unsigned();
            $table->integer('y1')->unsigned();
            $table->integer('z1')->unsigned();
            $table->integer('x2')->unsigned();
            $table->integer('y2')->unsigned();
            $table->integer('z2')->unsigned();

            $table->integer('result')->unsigned();

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
        Schema::table('operations_query', function (Blueprint $table) {
            //
        });
    }
}
