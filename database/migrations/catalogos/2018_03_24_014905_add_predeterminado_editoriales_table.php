<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPredeterminadoEditorialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('editoriales', function (Blueprint $table) {
            $table->boolean('predeterminado')->default(false)->nonullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('editoriales', function (Blueprint $table) {
            $table->dropColumn('predeterminado');
        });
    }
}
