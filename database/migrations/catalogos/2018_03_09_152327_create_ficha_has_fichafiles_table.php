<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaHasFichafilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_has_fichafiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ficha_id')->unsigned();
            $table->integer('fichafile_id')->unsigned();
            $table->timestamps();

            $table->foreign('ficha_id')
                ->references('id')
                ->on('fichas')
                ->onDelete('cascade');

            $table->foreign('fichafile_id')
                ->references('id')
                ->on('fichafiles')
                ->onDelete('cascade');

//            $table->primary(['ficha_id', 'role_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_has_fichafiles');
    }
}
