<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('ficha_no')->nullable();
                $table->date('fecha')->nullable();
                $table->datetime('fecha_mod')->nullable();
                $table->string('datos_fijos',100)->nullable();
                $table->text('etiqueta_marc')->nullable();
                $table->unsignedTinyInteger('tipo_material')->nullable()->default(1);
                $table->string('isbn',30)->nullable();
                $table->string('titulo',250)->nullable();
                $table->string('autor',250)->nullable();
                $table->string('clasificacion',30)->nullable();
                $table->char('status',2)->nullable();
                $table->unsignedInteger('no_coleccion')->nullable();
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
        Schema::dropIfExists('fichas');
    }
}
