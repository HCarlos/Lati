<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichafilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichafiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ficha_id')->deault(0);
            $table->string('isbn',50);
            $table->string('root',150);
            $table->string('filename',100);
            $table->unsignedInteger('num')->deault(0);
            $table->timestamps();
//            $table->foreign('ficha_id')->references('id')->on('fichas');
            $table->foreign('ficha_id')
                ->references('id')->on('fichas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fichafiles');
    }
}
