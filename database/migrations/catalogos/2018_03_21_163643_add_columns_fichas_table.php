<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsFichasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fichas', function (Blueprint $table) {
            $table->boolean('prestado')->default(false);
            $table->date('fecha_salida')->default(NULL)->nullable();
            $table->date('fecha_entrega')->default(NULL)->nullable();
            $table->string('observaciones',560)->default('')->nullable();
            $table->unsignedSmallInteger('idemp')->default(0)->nullable();
            $table->unsignedSmallInteger('status_ficha')->default(1)->nullable();
            $table->string('ip',150)->default('')->nullable();
            $table->string('host',150)->default('')->nullable();
            $table->index('isbn')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fichas', function (Blueprint $table) {
            $table->dropColumn('prestado');
            $table->dropColumn('fecha_salida');
            $table->dropColumn('fecha_entrega');
            $table->dropColumn('observaciones');
            $table->dropColumn('idemp');
            $table->dropColumn('status_ficha');
            $table->dropColumn('ip');
            $table->dropColumn('host');
            $table->dropIndex('fichas_isbn_index')->change();
        });
    }
}
