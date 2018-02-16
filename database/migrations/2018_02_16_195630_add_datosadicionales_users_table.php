<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDatosadicionalesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nombre_completo',150)->nullable();
            $table->string('twitter',50)->nullable();
            $table->string('facebook',50)->nullable();
            $table->string('instagram',50)->nullable();
            $table->string('foto',50)->nullable();
            $table->unsignedInteger('iduser_ps')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nombre_completo');
            $table->dropColumn('twitter');
            $table->dropColumn('facebook');
            $table->dropColumn('instagram');
            $table->dropColumn('foto');
        });
    }
}
