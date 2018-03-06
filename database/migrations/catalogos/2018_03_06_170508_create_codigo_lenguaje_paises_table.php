<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodigoLenguajePaisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codigo_lenguaje_paises', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idmig')->default(0)->nullable();
            $table->string('codigo',10)->nullable();
            $table->string('lenguaje',150)->nullable();
            $table->char('tipo')->default('L')->nullable();
            $table->unsignedTinyInteger('idemp')->default(0)->nullable();
            $table->unsignedSmallInteger('status_lenguaje')->default(1)->nullable();
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
        Schema::dropIfExists('codigo_lenguaje_paises');
    }
}
