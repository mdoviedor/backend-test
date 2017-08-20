<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cubes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('matrix_size')->unsigned();
            $table->integer('number_operations')->unsigned();

            $table->integer('test_id')->unsigned();
            $table->foreign('test_id')->references('id')->on('tests');

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
        Schema::table('cubes', function (Blueprint $table) {
            //
        });
    }
}
